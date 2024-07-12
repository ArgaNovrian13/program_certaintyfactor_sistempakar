let namaPasien = document.getElementById("namaPasien");

// Membuat Inputan Huruf Besar

namaPasien.addEventListener("keyup", validasiRegex);
namaPasien.addEventListener("keydown", textUpperCase);
function validasiRegex() {
  let regex = /^[a-zA-Z\s]+$/;
  let input = namaPasien.value;
  if (!regex.test(input)) {
    Swal.fire({
      title: "Error!",
      text: "Hanya boleh terdiri dari huruf dan spasi",
      confirmButtonText: "Ok",
    });
  }
}
function textUpperCase() {
  this.value = this.value.toUpperCase();
}
