
const languageBtn = document.querySelector('.mobile-item__language')
const languageOptions = document.querySelector('.mobile__language')
var user = document.querySelector('.header__user')
var userMenu = document.querySelector('.user__info')

function showMenu() {
  userMenu.classList.toggle('show-user');
}
user.addEventListener('click', showMenu);

function showMobileLanguages() {
  languageOptions.classList.toggle('show-language');
}
languageBtn.addEventListener('click', showMobileLanguages);
