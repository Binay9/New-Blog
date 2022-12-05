$(document).ready(function () {

    $('.alert').delay(2500).slideUp(700);

    $('#confirm_password').keyup(function () {
        npass = $('#password').val();
        cpass = $(this).val();

        if (npass == cpass) {
            document.querySelector('#confirm_password').setCustomValidity('');
        }
        else {
            document.querySelector('#confirm_password').setCustomValidity('Password not confirmed.');
        }
    });

}); 