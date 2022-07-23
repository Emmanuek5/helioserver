var input = document.getElementById('auth');



var xhr = new XMLHttpRequest
xhr.open("POST", "php/getauthtoken.php")
xhr.onload = () => {
    var data = xhr.response
    input.value = data

}

xhr.send()


