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
});