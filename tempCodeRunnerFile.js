function toggleMenu(){
    var menuBox = document.getElementById('navLinks');    
   
    if(menuBox.classList.contains("hidden-sm") == false){ // if is menuBox displayed, hide it
        menuBox.classList.add("hidden-sm");
        document.getElementById('bars').classList.remove("bars-close");
    }
    else{ // if is menuBox hidden, display it
        menuBox.classList.remove("hidden-sm");
        document.getElementById('bars').classList.add("bars-close");
    } 
}