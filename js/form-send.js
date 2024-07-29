let form = document.querySelector(".request__form");
console.log(form);
let xhr = new XMLHttpRequest();

form.addEventListener("submit", (e) => {
  e.preventDefault();

  xhr.open("POST", "../php/php-request.php", true);
  
  xhr.setRequestHeader("Content-Type", "application/json");
  
  var formData = JSON.stringify({
    name: document.querySelector("#name").value,
    email: document.querySelector("#email").value,
    number: document.querySelector("#number").value,
  });
  console.log(formData);
  xhr.send(formData);
  xhr.onload = () => {
    if (xhr.status == 200) {
      document.querySelector("#name").value = "";
      document.querySelector("#email").value = "";
      document.querySelector("#number").value = "";
      alert(
        "Контактная информация была отправлена, Мы обязательно с вами свяжемся!"
      );
    } else {
      alert(
        'Произошла ошибка при отправке контактной информации, попробуйте снова, или свяжитесь с нами через указанный номер телефона или почту в блоке "Контакты"'
      );
    }
  };
});

