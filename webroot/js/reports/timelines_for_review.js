$(function () { 
    // Get the CSV and create the chart
    

Highcharts.chart('timelines-review', {

    chart: {
        type: 'boxplot'
    },

    title: {
        text: 'Timelines for review'
    },

    legend: {
        enabled: false
    },

    xAxis: {
        categories: ['2014', '2015', '2016', '2017', '2018'],
        title: {
            text: 'Year.'
        }
    },

    yAxis: {
        title: {
            text: 'Days'
        },
        plotLines: [{
            value: 87,
            color: 'red',
            width: 1,
            label: {
                text: 'Theoretical mean: 87',
                align: 'center',
                style: {
                    color: 'gray'
                }
            }
        }]
    },

    series: [{
        name: 'Days',
        data: [
            [76, 81, 84, 89, 96],
            [73, 85, 99, 98, 100],
            [74, 72, 87, 87, 98],
            [24, 80, 86, 87, 95],
            [84, 83, 86, 88, 90]
        ],
        tooltip: {
            headerFormat: '<em>Timeline No. {point.key}</em><br/>'
        }
    }, {
        name: 'Outlier',
        color: Highcharts.getOptions().colors[0],
        type: 'scatter',
        data: [ // x, y positions where 0 is the first category
            [0, 64],
            [4, 78],
            [4, 91],
            [4, 99]
        ],
        marker: {
            fillColor: 'white',
            lineWidth: 1,
            lineColor: Highcharts.getOptions().colors[0]
        },
        tooltip: {
            pointFormat: 'Day: {point.y}'
        }
    }]

});

    /*//console.info('ready.. steady...');
    function sadrChart(data, loc, dname) {
        // console.log(JSON.stringify(data));        
        var myChart = Highcharts.chart(loc, {
                chart: {
                        type: 'column'
                },
                title: {
                    text: data.title
                },
                series: [{
                    data: data.data, //$.map(data.data, function(el) { return el }),//data.data,
                    name: dname
                }], 
                xAxis: {
                    type: 'category'
                }
        });
    }

    $.ajax({
        url: '/reports/timelines-for-review.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            sadrChart(data, 'timelines-for-review', "Timelines");
        }
    });*/
});