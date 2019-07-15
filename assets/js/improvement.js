$(document).ready(function()
{
    $.fn.editable.defaults.mode = 'inline';
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
    $('.qualif').editable({
        type:  'text',
        pk:    1,
        name:  'qualif',
        url:   '../../controller/traitement_editable.php',  
        title: 'Entrez une etape'
     });

     $('.hdv').editable({
        type:  'date',
        pk:    1,
        name:  'hdv',
        url:   '../../controller/traitement_editable.php',  
        title: 'Entrez une etape'
     });

     $('#dob').editable({
        type:  'date',
        pk:    1,
        name:  'dob',
        url:   'post.php',  
        title: 'Select Date of birth'
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