$(document).ready(function() {
    $('#btn-register-container-1').click(function(e) {
        e.preventDefault();
        $('#register-container-1').hide('slide', { direction: 'left' }, 300, function() {
            $('#register-container-2').show('slide', { direction: 'right' }, 300);
        });
    });

    $('#btn-register-container-2').click(function(e) {
        e.preventDefault();
        $('#register-container-2').hide('slide', { direction: 'right' }, 300, function() {
            $('#register-container-1').show('slide', { direction: 'left' }, 300);
        });
    });

    $('#more-keywords').click(function() {
        $('#register-container-2').hide('slide', { direction: 'left' }, 300, function() {
            $('#register-container-3').show('slide', { direction: 'right' }, 300);
        });
    });

    $('#more-keywords-back').click(function() {
        $('#register-container-3').hide('slide', { direction: 'right' }, 300, function() {
            $('#register-container-2').show('slide', { direction: 'left' }, 300);
        });
    });

    $('.keyword-checkbox').click(function() {
        console.log($(this).id);
    });
});