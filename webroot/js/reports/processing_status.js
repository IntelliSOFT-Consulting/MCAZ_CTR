$(function () { 
    // Get the CSV and create the chart
    
    //console.info('ready.. steady...');
     function sadrChart(data, loc, dname) {
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
        url: '/reports/processing-status.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.log("begin display");
            console.log(data.data);
            sadrChart(data, 'processing-status', "Processing Status");
        }
    });
});