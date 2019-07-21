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


$('form#stat').on("submit", function(event)
{
    event.preventDefault();
    $.ajax(
    {
        url: '../../controller/traitement_stat.php',
        type: 'POST',
        data: $(this).serialize(),
        dataType: 'html'
    })
    
    .done(function(data)
    {
        console.log(data);
        chart.data.parse(data);
    })
    
    .fail(function(error)
    {
        alert('Error : ' + error);
    });
});

