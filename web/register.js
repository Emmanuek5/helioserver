const loginform = document.querySelector(".sign-up-form")

// create a funtion to send user input
loginform.onsubmit = (e) => {
    e.preventDefault();
    var xhr = new XMLHttpRequest
    xhr.open("POST", "php/register.php")
    xhr.onload = () => {
        var data = xhr.response
        if (data == "success") {

        } else {
            alert(data)
        }

    }

    formData = new FormData(loginform);

    xhr.send(formData)



}