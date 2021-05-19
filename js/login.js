const username= document.getElementById("username");
const time_login = document.getElementById("time_login");
const login = document.getElementById("login");

username.focus();

login.onclick = ()=>{

    let time = String(new Date()).slice(0 , 25);

    time_login.value = time;

}
