function validatePassword() {
    var password = document.getElementById('password')
    var rpt_password = document.getElementById('rpt_password')
    var error = document.getElementById('error')

    if (password.value != rpt_password.value) {
        error.style.display = 'block'
        error.style.color = 'red'
        error.innerHTML = 'Password is must match with confirm password*'
        password.style.backgroundColor = 'pink';
        rpt_password.style.backgroundColor = 'pink';

        return false
    }
}