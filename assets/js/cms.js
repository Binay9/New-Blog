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

    $('.delete').click(function (e) {
        e.preventDefault();
        url = $(this).attr('href');

        if (confirm("Are you sure to delete the user ?")) {
            location.href = url;
        }
    });

    $('#published_at').datetimepicker({
        icons: {
            time: "fa fa-clock",
        },
        format: 'YYYY-MM-DD HH:mm:ss',
        defaultDate: $('#published_at').data('default')
    });

}); 