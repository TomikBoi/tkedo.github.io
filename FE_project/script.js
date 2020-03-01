document.getElementById('btn-toggle-close').addEventListener('click', close);
document.getElementById('btn-toggle-open').addEventListener('click',open);

function open() {
  document.getElementById("sidebar").style.display = "block";
}

function close() {
  document.getElementById("sidebar").style.display = "none";
}

// function changeClass() {
//   var toggleBtn = document.getElementById("btn-toggle-open");
//   toggleBtn.classList.toggle("btn-toggle-close");
// }


//Papildus iespejas, pec checkbox = true
function checkbox() {
  var checkBox = document.getElementById("offer");
  var text = document.getElementById("dropdown");
  if (checkBox.checked == true) {
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}



//formas validacija
function validateForm() {
  if (username === "") {
    var username = document.forms["form"]["username"].value;
    alert("Username vai password nevar būt tukšs");
    return false;
  }
  if (password === "") {
    var password = document.forms["form"]["password"].value;
    alert("Username vai password nevar būt tukšs");
    return false;
  }

}

//popups
var modal = document.querySelector(".modal");
var trigger = document.getElementById("trigger");
var closeButton = document.querySelector(".close-button");
var username = document.forms["form"]["username"].value;

function toggleModal() {
  modal.classList.toggle("show-modal");
  document.getElementById("heading").innerHTML = "Thank you for joining out subscribers list" + username;
}

function windowOnClick(event) {
  if (event.target === modal) {
    toggleModal();
  }
}

trigger.addEventListener("click", toggleModal);
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);

// localstorage
let subscribeList = [];

const addSubscribe = event => {
  event.preventDefault();
  let subscribe = {
    name: document.getElementById("username").value,
    password: document.getElementById("password").value,
  };
  subscribeList.push(subscribe);

  localStorage.setItem("SubscriberList", JSON.stringify(subscribeList));
};

