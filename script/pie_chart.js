google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Present', 11],
        ['Absent', 20]
    ]);
    var data_one = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Pass', 11],
        ['Fail', 2],

    ]);

    var options1 = {
        title: 'Student involvement in this week',
        pieHole: 0.8,

    };

    var options2 = {
        title: 'Student Sucess',
        pieHole: 0.8,


    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart1'));
    chart.draw(data, options1);
    var chart2 = new google.visualization.PieChart(document.getElementById('donutchart2'));
    chart2.draw(data_one, options2);
}