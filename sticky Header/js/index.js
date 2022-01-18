window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var pic = document.getElementsByClassName("contenturl");


function myFunction() {
  if (window.pageYOffset >= 100) {
    header.classList.add("sticky");
    header.style.height = "70px";
    header.style.backgroundColor = "#555";
    pic[0].src = "Assets/logo2.png";
    
  } else {
    header.classList.remove("sticky");
    header.style.height = header.style.height = "auto";
    header.style.backgroundColor = "transparent";
    pic[0].src = "Assets/logo.png";
  }
}