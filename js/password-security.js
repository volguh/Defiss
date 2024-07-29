let input_email = document.querySelector("#email");
let input_pass = document.querySelector("#password");
let input_security = document.querySelector("#security-btn");

let input_submit = document.querySelector("#submit");
let input_error = document.querySelector(".login__form-error");

function security_status_change() {
  if (input_pass.type === "password") {
    input_pass.type = "text";
    input_security.querySelector(".login__form-security-img").src =
      "../img/icons/security-off.svg";
  } else {
    input_pass.type = "password";
    input_security.querySelector(".login__form-security-img").src =
      "../img/icons/security-on.svg";
  }
}

function security_check_inputs() {
  if (input_email.value.length >= 1 && input_pass.value.length >= 1) {
    input_submit.classList.remove("submit-off");
  } else {
    input_submit.classList.add("submit-off");
  }
}

input_security.addEventListener("click", security_status_change);

input_email.addEventListener("keyup", security_check_inputs);
input_pass.addEventListener("keyup", security_check_inputs);
