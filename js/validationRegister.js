let showPassword = document.getElementById("showPassword");
let password = document.querySelector("input[type='password']");
let confirmPassword = document.getElementById("confirmPassword");
let username = document.getElementsByName("username")[0];
let pesanPassword = document.querySelector("#pesan");
let pesanConfirmPassword = document.querySelector("p#confirmPassword");

// Validasi username tidak boleh menggunakan uppercase
username.addEventListener("input", inputanUsername);
function inputanUsername() {
  let userInput = username.value;
  username.value = userInput.toLowerCase();
}

// Untuk Menampilkan Sandi
showPassword.addEventListener("click", tampilSandi);
function tampilSandi() {
  if (password.type === "text" && confirmPassword.type === "text") {
    password.type = "password";
    confirmPassword.type = "password";
  } else {
    password.type = "text";
    confirmPassword.type = "text";
  }
}
// Untuk Minimal Password lebih dari 6 Karakter
password.addEventListener("keyup", inputPassword);
function inputPassword() {
  if (password.value.length > 9) {
    pesanPassword.innerHTML = "";
  } else if (password.value.length > 8) {
    pesanPassword.innerHTML = `<p style="color: green;">"Password Baik"</p>`;
  } else if (password.value.length > 6) {
    pesanPassword.innerHTML = `<p style="color: yellow;">"Password Lemah"</p>`;
  } else if (password.value.length > 4) {
    pesanPassword.innerHTML = `<p style="color: red;">"Password Buruk"</p>`;
  }
}
// Untuk Konfirmasi Password
confirmPassword.addEventListener("keyup", confirmInputPassword);
function confirmInputPassword() {
  if (confirmPassword.value !== password.value) {
    pesanConfirmPassword.innerHTML = `<p style="color: red;">Password Tidak Sama</p>`;
  } else {
    pesanConfirmPassword.innerHTML = "";
  }
}
