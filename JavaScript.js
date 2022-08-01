var navLinks = document.getElementById("navLinks");
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


