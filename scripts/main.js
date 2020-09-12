const questions__css = document.querySelector("#questions__css");
const select = document.querySelector(".questions__select");
const SelectQuestionTipe = function () {
  select.classList.toggle("is-hidden");
};

questions__css.addEventListener("click", SelectQuestionTipe);
