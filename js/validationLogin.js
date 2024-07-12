let showPassword = document.getElementById("showPassword");
let password = document.getElementById("password");
let button = document.getElementById("button");
showPassword.addEventListener("click", tampilSandi);
button.onclick = function () {
  document.body.classList.toggle("dark-mode");
};
function tampilSandi() {
  if (password.type === "text") {
    password.type = "password";
  } else {
    password.type = "text";
  }
}
