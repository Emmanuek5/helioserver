var input = document.getElementById('code');



var xhr = new XMLHttpRequest
xhr.open("POST", "php/getauthtoken.php")
xhr.onload = () => {
    var data = xhr.response
    input.value = data

}

xhr.send()


function reload(){
    var xhr = new XMLHttpRequest
    xhr.open("POST", "php/getauthtoken.php?new=true")
    xhr.onload = () => {
        var data = xhr.response
        input.value = data

    }

    xhr.send()


}