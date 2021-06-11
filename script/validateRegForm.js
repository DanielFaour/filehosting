function validatePassword() {
    var username = document.getElementById('username');
    var password = document.getElementById('password');
    var rpt_password = document.getElementById('rpt_password');
    var error = document.getElementById('errorPass');
    //var errorName = document.getElementById('errorName');

    if (password.value != rpt_password.value) {
        error.style.display = 'block';
        error.style.color = 'red';
        password.style.backgroundColor = 'pink';
        rpt_password.style.backgroundColor = 'pink';

        errorName.style.display = 'none';
        username.style.backgroundColor = 'white';

        return false;

    } else {

        return true;
    }
}