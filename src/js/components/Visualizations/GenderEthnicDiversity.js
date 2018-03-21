import { select, event } from 'd3-selection';
import { scaleLinear } from 'd3-scale';
import { lineRadial, curveBasisClosed } from 'd3-shape';
import scaleRadial from './helpers/scale-radial';
import wrap from './helpers/wrap-text';
import AbstractVisualization from './AbstractVisualization';

export default class GenderEthnicDiversityOriginal extends AbstractVisualization {
  constructor(el, config) {
    super(el, config);
    this.initialize();
  }

  initialize() {
    // fetch and then render
    this.fetchData()
      .then(() => {
        this.serializeData();
        this.render();
      });
  }

  serializeData() {
    const { data, config } = this;

    const mappedData = {};
    const labels = [];

    if (data && data.length) {
      Object.keys(data[0]).forEach((label) => {
        if (label !== config.orderBy) {
          mappedData[label] = { data: [] };
        }
      });
    }

    data.forEach((d) => {
      Object.keys(d).forEach((l) => {
        if (l !== this.config.orderBy) {
          const value = parseFloat(d[l]);
          mappedData[l].data.push({
            [config.orderBy]: d[config.orderBy],
            value: isNaN(value) ? 0 : value
          });
        }
      });
      labels.push(d[config.orderBy]);
    });

    this.mappedLabels = labels;
    this.mappedData = mappedData;
  }

  xScale() {
    return scaleLinear()
      .domain([0, this.mappedLabels.length])
      .range([0, (2 * Math.PI)]);
  }

  yScale() {
    return scaleRadial()
      .domain([0, 100]) // We are dealing with percentages
      .range(this.radialRange);
  }

  renderWrapperArc() {
    const yTick = this.labels
      .selectAll('g')
      .data(this.yScale.ticks(3))
      .enter().append('g');

    yTick.append('text')
      .attr('y', d => -this.yScale(d))
      .attr('dy', '1em')
      .text(d => `${d}%`);

    yTick.append('circle')
      .attr('fill', 'none')
      .attr('stroke', 'black')
      .attr('stroke-dasharray', ('10', '10'))
      .attr('opacity', 0.3)
      .attr('r', this.yScale);
  }

  renderLabels() {
    const bars = this.bars.selectAll('.bar');
    bars.append('text')
      .attr('dy', '0.31em')
      .style('font-size', '11px')
      .attr('opacity', 0.6)
      .attr('text-anchor', 'start')
      .attr('transform', () => {
        const yFirstPoint = this.yScale(0) + 15;
        return `translate(${yFirstPoint}, 0)`;
      })
      .text((d, i) => this.mappedLabels[i])
      .call(wrap, 120);
  }

  generateRadialLine(data, label) {
    const radialLine = lineRadial()
      .angle((d, i) => this.xScale(i))
      .radius(d => this.yScale(d.value))
      .curve(curveBasisClosed);

    this.lines.append('path')
      .datum(data)
      .attr('class', 'line')
      .attr('fill', 'none')
      .attr('stroke-width', 2)
      .attr('stroke', () => this.config.colors[label])
      .attr('d', radialLine);
  }

  // Finds the original data set
  findOriginalData(data) {
    return this.data.filter(d => d[this.config.orderBy] === data.company)[0];
  }

  handleMouseOver(data) {
    if (this.config.onMouseOver && typeof this.config.onMouseOver === 'function') {
      this.config.onMouseOver(event, this.findOriginalData(data));
    }
  }

  handleMouseOut(data) {
    if (this.config.onMouseOut && typeof this.config.onMouseOut === 'function') {
      this.config.onMouseOut(event, data);
    }
  }

  generateRadialBars(data = [], conf = { color: '#000' }) {
    const xCalculateBoundsInner = this.bars
      .selectAll('.bar')
      .data(data)
      .enter().append('g')
      .style('pointer-events', 'all')
      .attr('class', 'bar')
      .attr('text-anchor', 'middle')
      .attr('data-v', d => d.value)
      .attr('transform', (d, i) => {
        const yFirstPoint = this.yScale(0);
        return `rotate(${(((this.xScale(i)) * (180 / Math.PI)) - 90)})translate(${yFirstPoint}, 5)`;
      })
      .on('mouseover', this.handleMouseOver.bind(this))
      .on('mouseout', this.handleMouseOut.bind(this));

    xCalculateBoundsInner.append('line')
      .attr('x2', (d) => {
        const yFirstPoint = this.yScale(0);
        return this.yScale(d.value) - yFirstPoint;
      })
      .attr('stroke', conf.color)
      .attr('stroke-width', 10);

    // Hidden line that captures the hover event
    xCalculateBoundsInner.append('line')
      .attr('x2', () => {
        const yFirstPoint = this.yScale(0);
        return this.yScale(100) - yFirstPoint;
      })
      .attr('stroke', 'transparent')
      .attr('stroke-width', 10);
  }

  getData(label) {
    return this.mappedData[label].data;
  }

  paintChart() {
    const { config } = this;

    let bars = config.bars || [];
    let lines = config.lines || [];

    this.renderWrapperArc();

    Object.keys(this.mappedData).forEach((label) => {
      if (bars.indexOf(label) > -1) {
        this.generateRadialBars(this.getData(label), {
          color: this.config.colors[label]
        });
        bars = bars.filter(b => b !== label);
      }

      if (lines.indexOf(label) > -1) {
        this.generateRadialLine(this.getData(label), label);
        lines = lines.filter(l => l !== label);
      }
    });

    this.renderLabels(this.mappedLabels);
  }

  render() {
    const { config } = this;

    this.margin = config.margin || 0;
    this.radius = config.radius || 600;
    this.innerRadius = config.innerRadius || 180;

    // const margin = { top: 50, left: 50, right: 50, bottom: 50 };
    // const width = this.width - margin.left - margin.right;
    // const height = this.height - margin.top - margin.bottom;

    this.privateOffset = (this.radius / 2) + this.margin;

    this.svg = select(this.el).append('svg')
      .attr('width', this.width)
      .attr('height', this.height);

    const container = this.svg.append('g')
      .attr('class', 'container')
      .attr('transform', `translate(${(this.width / 2)}, ${(this.height / 2)})`);

    this.radialRange = [(this.innerRadius) - 40, this.privateOffset - 60];

    // svg groups
    this.bars = container.append('g').attr('class', 'bars');
    this.labels = container.append('g').attr('class', 'labels');
    this.lines = container.append('g').attr('class', 'lines');

    // Scales
    this.xScale = this.xScale();
    this.yScale = this.yScale();

    this.paintChart();
  }
}
