$(document).ready(function()
{
    $('#connect_button').on('mouseover', function()
    {
        $('#connect_button').attr('value', 'Je me connecte');
    });

    $('#connect_button').on('mouseout', function()
    {
        $('#connect_button').attr('value', 'Connexion');
    });

    $('#subscribe_button').on('mouseover', function()
    {
        $('#subscribe_button').attr('value', 'Je m\'inscris');
    });

    $('#subscribe_button').on('mouseout', function()
    {
        $('#subscribe_button').attr('value', 'Inscription');
    });

    $("#mainForm").validate({
    rules : {
        email : {
        required : true
        },
        mdp : {
        minlength : 3
        },	
        login : {
        required : true,
        mail : true
        }
    },
    messages : {
        firstName : "Veuillez fournir un prénom",
        lastName : "Veuillez fournir un nom d'au moins trois lettres",
        login : "L'email est incorrect"
    }
    });

    $.fn.editable.defaults.mode = 'inline';

    $('#date').editable({
        url: '/post',
        title: 'Enter username'
    });

    $('#dob').editable({
        type:  'date',
        pk:    1,
        name:  'dob',
        url:   'post.php',  
        title: 'Select Date of birth'
     });
});