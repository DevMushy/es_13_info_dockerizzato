var log = document.getElementById("login");
var reg = document.getElementById("register");
function x(num) {

  console.log(num);

  if (num == 2) {
    log.classList.remove("hidden");
    reg.classList.add("hidden");
    document.getElementById("y").style.color = "black";
    document.getElementById("z").style.color = "";
  } else if (num == 1) {
    reg.classList.remove("hidden");
    log.classList.add("hidden");
    document.getElementById("z").style.color = "black";
    document.getElementById("y").style.color = "";
  }
}