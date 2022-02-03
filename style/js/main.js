/*
    !*** Authorization form ***
 */

$('.login-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let login = $('input[name = "login"]').val(),
        password = $('input[name = "password"]').val();

    $.ajax({
        url: 'includes/auth.php',
        type: 'post',
        dataType: 'json',
        data: {
            login: login,
            password: password
        },
        success(data) {


            if (data.status) {
                document.location.href = '/profile.php';
            } else {

                if(data.type === 1){
                   data.fields.forEach(function (field) {
                       $(`input[name="${field}"]`).addClass('error');
                   });
                }

                $('.pass_not_mach').removeClass('none').text(data.message);
            }
        }
    });
});


/*
    !*** Registration form ***>
 */

$('.register-btn').click(function (e) {
    e.preventDefault();

    $(`input`).removeClass('error');

    let login = $('input[name = "login"]').val(),
        password = $('input[name = "password"]').val();
        full_name = $('input[name = "full_name"]').val();
        email = $('input[name = "email"]').val();
        password_confirm = $('input[name = "password_confirm"]').val();

    let formData = new FormData();
    formData.append('login', login);
    formData.append('full_name', full_name);
    formData.append('email', email);
    formData.append('password', password);
    formData.append('password_confirm', password_confirm);


    $.ajax({
        url: 'includes/signup.php',
        type: 'post',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,

        success(data) {


            if (data.status) {
                document.location.href = '/index.php';
            } else {

                if(data.type === 1){
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('error');
                    });
                }

                $('.pass_not_mach').removeClass('none').text(data.message);
            }
        }
    });
});