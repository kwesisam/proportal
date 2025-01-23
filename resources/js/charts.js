import ApexCharts from "apexcharts";
const doughnutChartData = {
    data: {
        series: [],
        labels: [],
    },
};
document.addEventListener("DOMContentLoaded", () => {
    // Initialize the Pie Chart
    const chartData = document.querySelectorAll(".chartData1");
    chartData &&
        chartData.forEach((data) => {
            doughnutChartData.data.series.push(
                parseInt(data.getAttribute("data-value"))
            );
            doughnutChartData.data.labels.push(data.getAttribute("data-key"));
        });

    console.log(doughnutChartData.data.series);
    buildPieChart("#chart");
});

const buildPieChart = (selector) => {
    const element = document.querySelector(selector);
    if (!element) return;

    const options = {
        chart: {
            height: 420,
            width: 270,
            type: "donut",
            zoom: {
                enabled: false,
            },
        },
        plotOptions: {
            pie: {
                donut: {
                    size: "60%",
                },
            },
        },
        series: doughnutChartData.data.series ?? [0, 0, 0],
        labels: doughnutChartData.data.labels ?? ["", "", ""],
        legend: {
            show: true,
        },
        dataLabels: {
            enabled: true,
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
                    type: "none",
                },
            },
        },
        tooltip: {
            enabled: true,
            custom: function (props) {
                const colors = ["#fff", "#fff", "#000"]; // Adjust colors as needed
                return buildTooltipForDonut(props, colors);
            },
        },
        colors: [
            "#10b981",
            "#f59e0b",
            "#e5e7eb",
            "#3b82f6",
            "#22d3ee",
            "#f87171",
            "#fbbf24",
            "#f472b6",
            "#4b5563",
            "#6b7280",
            "#374151",
            "#1f2937",
            "#111827",
            "#1a202c",
            "#2d3748",
            "#4a5568",
            "#64748b",
            "#475569",
            "#334155",
            "#1e293b",
            "#0f172a",
            "#0d131e",
            "#0a0f14",
            "#06070b",
            "#030405",
            "#000000",
        ],
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
