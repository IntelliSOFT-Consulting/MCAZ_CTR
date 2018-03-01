$(function () { 
    // Get the CSV and create the chart
    
    function columnChart(data, loc, dname) {
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
    function pieChart(data, loc, dname) {
        // console.log(JSON.stringify(data));        
        var myChart = Highcharts.chart(loc, {
                chart: {                    
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                        type: 'pie'
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
        url: '/reports/protocols-per-year.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            columnChart(data, 'protocols-year', "Year");
        }
    });
    $.ajax({
        url: '/reports/protocols-per-month.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.info(data);
            columnChart(data, 'protocols-month', "By Month");
        }
    });
});