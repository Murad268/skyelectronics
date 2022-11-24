try {
    const optionMenu = document.querySelector(".select-menu"),
  selectBtn = optionMenu.querySelector(".select-btn"),
  options = optionMenu.querySelectorAll(".option"),
  sBtn_text = optionMenu.querySelector(".sBtn-text");

selectBtn.addEventListener("click", () =>
  optionMenu.classList.toggle("active")
);






options.forEach((option) => {
  option.addEventListener("click", () => {
    let selectedOption = option.querySelector(".option-text").innerText;
    sBtn_text.innerText = selectedOption;

    optionMenu.classList.remove("active");
  });
});





function alertindchange(selectSeelector) {
    const select = document.querySelector(selectSeelector);
    select.addEventListener('change', () => {
        alert('!!!Diqqət!!! Üst kateqoriya dəyişilın zaman bütün alt kateqoriyalar silinəcək!!!');
    })
}

alertindchange('.category__select')




}catch{}
