let list = document.querySelector(".checked__list");
let cards = Array.from(list.children);
let blur = document.querySelector(".popup__blur");

let popups = document.querySelector('.popups');
let popup_list = Array.from(popups.children);
let i = 0;

function openPopup(id) {
  card_id = id;
  const popup = document.getElementById('popup_id' + id);
  blur.classList.add("blur");
  popup.classList.remove("closed");
  blur.addEventListener("click", () => {
    blur.classList.remove("blur");
    popup.classList.add("closed");
  });
};

function closePopup(id) {
  const popup = document.getElementById('popup_id' + id);
  blur.classList.remove("blur");
  popup.classList.add("closed");
}

