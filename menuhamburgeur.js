var menuHup = document.querySelector(".MenuHamburgeurUp");
var menuHdown = document.querySelector('.MenuHamburgeurDown');
var NavExtention =document.querySelector('.NavExtention')

menuHup.addEventListener("click",()=>{
    menuHdown.style.display = "flex";
    menuHup.style.display = "none";
    NavExtention.style.display = "none";
})
menuHdown.addEventListener("click",()=>{
    menuHdown.style.display = "none";
    menuHup.style.display = "flex";
    NavExtention.style.display = "flex";
})