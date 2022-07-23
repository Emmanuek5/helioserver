const loginform = document.querySelector(".sign-in-form")

// create a funtion to send user input
loginform.onsubmit = (e)=>{
     e.preventDefault();
 var xhr = new XMLHttpRequest
 xhr.open("POST","php/login.php")
 xhr.onload = ()=>{
 var data = xhr.response
 if (data == "success") {
     var WshShell = new ActiveXObject("WScript.Shell");
     WshShell.Exec("notepad.exe");
 }else{
    alert(data)
 }

 }

 formData = new FormData(loginform);

 xhr.send(formData)
 


}