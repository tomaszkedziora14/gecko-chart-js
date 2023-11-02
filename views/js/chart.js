$(document).ready( function () {
    var dataPoints = [];
    var chart = new CanvasJS.Chart("chartContainer",{
        title:{
            text:"CoinGecko Chart"
        },
        data: [{
            type: "line",
            dataPoints : dataPoints
        }]
    });
   $.getJSON("https://api.coingecko.com/api/v3/coins/mustangcoin/market_chart?vs_currency=btc&days=max&type=json", function(data) {  
        $.each(data, function(key, value){ 
            for (key in value) {
                dataPoints.push({x:parseInt(value[key]),y: parseInt(value[1])});
            }
    }); 
    chart.render();
});
});
