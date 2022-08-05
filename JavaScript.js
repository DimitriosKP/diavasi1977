var navLinks = document.getElementById("navLinks");

function toggleMenu() {
    var menuBox = document.getElementById('navLinks');    
    //if(menuBox.style.display == "block") { // if is menuBox displayed, hide it
      if(menuBox.classList.contains("hidden-sm") == false){
        //menuBox.style.display = "none";
        menuBox.classList.add("hidden-sm");
        document.getElementById('bars').classList.remove("bars-close");
    }
    else { // if is menuBox hidden, display it
      //menuBox.style.display = "block";
      menuBox.classList.remove("hidden-sm");
      document.getElementById('bars').classList.add("bars-close");
    }
  }

function showMenu()
{
    navLinks.style.right = "200px";
}
function hideMenu()
{
    navLinks.style.right = "0px";
}
const toTop = document.querySelector(".topBtn");

window.addEventListener("scroll", () => 
{
    if (window.pageYOffset > 100)
    {
        toTop.classList.add("active");
    }
    else 
    {
        toTop.classList.remove("active");
    }
})   
document.querySelector('video').playbackRate = 0.9;

const Logo = document.querySelector(".backlogo");

window.addEventListener("scroll", () => 
{
    if (window.pageYOffset > 200)
    {
        Logo.classList.add("active");
    }
    else 
    {
        Logo.classList.remove("active");
    }
})  


