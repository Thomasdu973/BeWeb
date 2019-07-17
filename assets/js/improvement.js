$(document).ready(function()
{
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
    // Gestion de la modification d'une information d'une ligne de vol

    //turn to inline mode
    $.fn.editable.defaults.mode = 'inline';
    
    $('#username').editable(
    {
        type: 'text',
        pk: 1,
        url: '../../controller/traitement_editable.php',
        title: 'Enter username',

        success: function(response, newValue) 
        {
            if(response.status == 'error') return response.msg; //msg will be shown in editable form
            console.log(response);
        }
    });

     $('.date_depart').editable(
         {
            type: 'date',
            pk: 1,
            url: '../../controller/traitement_editable.php',
            title: 'Select date',
            format: 'yyyy-mm-dd',    
            viewformat: 'dd/mm/yyyy',    
            datepicker: 
            {
                    weekStart: 1
            },

            success: function(response, newValue) 
            {
                if(response.status == 'error') return response.msg; //msg will be shown in editable form
                console.log(response);
            }
        });

    $('.commentaires').editable(
        {
            type: 'text',
            params:function(params){
                params.pk = 1;//$(this).parent().parent().attr('id');
                return params.pk;
             },
            // pk: 1,
            url: '../../controller/traitement_editable.php',
            title: 'Enter comments',
            rows: 10,

            validate: function(value) {
                if(value == '') return 'Entrez un commentaires!'; 
            },

            success: function(response, newValue) 
            {
                if(response.status == 'error') return response.msg; //msg will be shown in editable form
                console.log(response);
            }
    });

    $('#test').on("click", function()
    {
        $.ajax(
            {
                type: "POST",
                dataType: 'html',
                url: "../../controller/traitement_editable.php",
                data: ""
            })

            .done(function(data)
            {
                $("#test").html(data);
            })

            .fail(function(retour)
            {
                console.log("Problème : " + retour);
            });
    });

    ////////////////////////////////////////////////////////////////////////////////////
    // Gestion de la suppression d'une ligne de vol
    $('.icon').on('mouseover', function()
    {
        $(this).attr('class', 'icon fa-times');
    });

    $('.icon').on('mouseout', function()
    {
        $(this).attr('class', 'icon fa-times-circle');
    });

    $('.icon').on('click', function()
    {
        var id_vol = $(this).parent().parent().attr('id');
        var fichier = "../../controller/ajax.php";
        var dataType1 = "html";
        var param = "num=1&id_vol=" + id_vol;
        var callb = function()
        {
            $(this.parent().parent()).remove();
            $("nav").after("<p> class='rep'>Elément supprimé</p>");
        }
        send_request(param, callb, fichier, dataType1);
    });

    function send_request(param, callb, fichier, dataType1)
    {
        $ajax({
            type : "POST",
            dataType : dataType1,
            url : fichier,
            data : param
        })

        .done(function(data)
        {
            callb(data);
        })

        .fail(function(retour)
        {
            alert("Problème : " + retour);
        });
    }

});