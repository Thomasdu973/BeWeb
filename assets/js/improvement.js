$(document).ready(function()
{
    ////////////////////////////////////////////////////////////////////////////////////
    // Gestion de la suppression d'une ligne de vol
    $('td i').on('mouseover', function()
    {
        $(this).attr('class', 'icon fa-times');
    });

    $('td i').on('mouseout', function()
    {
        $(this).attr('class', 'icon fa-times-circle');
    });

    $('td i').on("click", function(event)
    {
        var id_vol = $(this).parent().parent().attr('id');
        console.log(id_vol);

        $.ajax(
        {
            url: '../../controller/traitement_suppression.php',
            type: 'POST',
            data: 'id_vol=' + id_vol,
            dataType: 'html'
        })

        .done(function(data)
        {
            console.log("Supprimé :" + data);
            window.location.reload() 
        })

        .fail(function(error)
        {
            alert('Error : ' + error);
        });
    });

    ////////////////////////////////////////////////////////////////////////////////////
    // Gestion du button Connexion
    $('#connect_button').on('mouseover', function()
    {
        $('#connect_button').attr('value', 'Je me connecte');
    });

    $('#connect_button').on('mouseout', function()
    {
        $('#connect_button').attr('value', 'Connexion');
    });

    ////////////////////////////////////////////////////////////////////////////////////
    // Gestion du button Inscription
    $('#subscribe_button').on('mouseover', function()
    {
        $('#subscribe_button').attr('value', 'Je m\'inscris');
    });

    $('#subscribe_button').on('mouseout', function()
    {
        $('#subscribe_button').attr('value', 'Inscription');
    });

    ////////////////////////////////////////////////////////////////////////////////////
    // Gestion du button Inscription
    $('#add_flight_button').on('mouseover', function()
    {
        $('#add_flight_button').attr('value', 'J\'ajoute mon vol');
    });

    $('#add_flight_button').on('mouseout', function()
    {
        $('#add_flight_button').attr('value', 'Inscription');
    });

    ////////////////////////////////////////////////////////////////////////////////////
    // Gestion de la modification d'une information d'une ligne de vol

    //turn to inline mode
    $.fn.editable.defaults.mode = 'inline';

    // Gestion des champs textes
    $('.text_area').editable(
    {
        name: "",
        type: 'text',
        pk: 1,
        url: '../../controller/traitement_editable.php',
        title: 'Enter comments',
        rows: 10,

        validate: function(value) {
            if(value == '') return 'Ce champ est requis'; 
        },

        success: function(response, newValue) 
        {
            if(response.status == 'error') return response.msg; //msg will be shown in editable form
            console.log(response);
        }
    });

    //Gestion des champs de selection
    $('.id_avion').editable(
    {
        type: 'select',
        pk: 1,
        url: "/post",
        title: "Select status",
        value: 2,
        source: function getSource() 
        {
            var url = "../../controller/traitement_editable.php";
            $.ajax({
                type:  'GET',
                async: true,
                url:   url,
                dataType: "json"
            })

            .done(function(data)
            {
                callb(data);
            });
        },
    });
});