document.getElementById('btn-toggle-open').addEventListener('click',open)
document.getElementById('btn-toggle-close').addEventListener('click',close)


function open() {
  // var element = document.getElementById("btn-toggle-open");
  // element.classList.toggle("btn-toggle-close");
  document.getElementById("sidebar").style.display = "block";
}

function close() {
  document.getElementById("sidebar").style.display = "none";
}

//Papildus iespejas, pec checkbox = true
function checkbox() {
  var checkBox = document.getElementById("offer");
  var text = document.getElementById("dropdown");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}

//formas validacija
function validateForm() {
  var username = document.forms["form"]["username"].value;
  if (username == "") {
    alert("Username vai password nevar būt tukšs");
    return false;
  }
  var password = document.forms["form"]["password"].value;
  if (password == "") {
    alert("Username vai password nevar būt tukšs");
    return false;
  }

}

//popups
var modal = document.querySelector(".modal");
var trigger = document.getElementById("trigger");
var closeButton = document.querySelector(".close-button");

function toggleModal() {
    modal.classList.toggle("show-modal");
}

function windowOnClick(event) {
    if (event.target === modal) {
        toggleModal();
    }
}

trigger.addEventListener("click", toggleModal);
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);



