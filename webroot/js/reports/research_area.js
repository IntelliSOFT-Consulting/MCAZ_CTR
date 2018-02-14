$(function () { 
    // Get the CSV and create the chart
    
    //console.info('ready.. steady...');
    function sadrChart(data, loc, dname) {
        // console.log(JSON.stringify(data));        
        var myChart = Highcharts.chart(loc, {
                chart: {
                        type: 'column'
                },
                title: {
                    text: data.title
                },
                // series: [{
                //     data: data.data, //$.map(data.data, function(el) { return el }),//data.data,
                //     name: dname
                // }], 
                series: 
                    [{ data: data.data }], 
                xAxis: {
                    type: 'category'
                }
        });
    }

    $.ajax({
        url: '/reports/research-area.json',
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            console.log("begin display");
            console.log(data.data);
            sadrChart(data, 'research-area', "Research");
        }
    });
});