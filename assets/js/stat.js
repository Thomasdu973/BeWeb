var config = {
    type: "bar",
    scales: {
        "bottom" : {
            text: "jour"
        },
        "left" : {
            maxTicks: 10,
            max: 100,
            min: 0
        }
    },
    series: [
        {
            id: "A",
            value: "vol",
            color: "#5E83BA",
            pointType: "circle",
            fill: "#5E83BA",
            barWidth: 35
        }
    ]
};

var chart = new dhx.Chart("chart1", config);

// var heuresDeVol = [
//     { jour: "`02", "vol": 72},
//     { jour: "`03", "vol": 90},
//     { jour: "`04", "vol": 81},
//     { jour: "`05", "vol": 62},
//     { jour: "`06", "vol": 68},
//     { jour: "`07", "vol": 64},
//     { jour: "`08", "vol": 30},
//     { jour: "`09", "vol": 65},
//     { jour: "`10", "vol": 50},
//     { jour: "`11", "vol": 78}
// ];

chart.data.load('../../controller/traitement_stat.php');

chart.data.parse(heuresDeVol);

$('#test').on("click", function()
{
    $.ajax(
    {
        url: '../../controller/traitement_stat.php',
        type: 'GET',
        data: '',
        dataType: 'html'
    })
    
    .done(function(data)
    {
        $('#test').html(data);
        var heuresDeVol = data;
        
    })
    
    .fail(function(error)
    {
        alert('Error : ' + error);
    });
});

