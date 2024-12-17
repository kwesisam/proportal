import ApexCharts from "apexcharts";

document.addEventListener('DOMContentLoaded', () => {
    // Initialize the Pie Chart
    buildPieChart('#chart');
});

const buildPieChart = (selector) => {
    const element = document.querySelector(selector);
    if (!element) return;

    const options = {
        chart: {
            height: 420,
            width: 270,
            type: 'donut',
            zoom: {
                enabled: false,
            },
        },
        plotOptions: {
            pie: {
                donut: {
                    size: '60%',
                },
            },
        },
        series: [47, 23, 30],
        labels: ['Tailwind CSS', 'Preline UI', 'Others'],
        legend: {
            show: true,
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            width: 2,
        },
        grid: {
            padding: {
                top: -0,
                bottom: -11,
                left: -12,
                right: -12,
            },
        },
        states: {
            hover: {
                filter: {
                    type: 'none',
                },
            },
        },
        tooltip: {
            enabled: true,
            custom: function (props) {
                const colors = ['#fff', '#fff', '#000']; // Adjust colors as needed
                return buildTooltipForDonut(props, colors);
            },
        },
        colors: ['#3b82f6', '#22d3ee', '#e5e7eb'],
    };

    const chart = new ApexCharts(element, options);
    chart.render();
};

const buildTooltipForDonut = (props, colors) => {
    const { seriesIndex, series, w } = props;
    const value = series[seriesIndex];
    const label = w.config.labels[seriesIndex];
    return `
        <div>
            <strong>${label}</strong>: ${value}%
        </div>
    `;
};
