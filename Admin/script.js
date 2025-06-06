let profileDropdownList = document.querySelector(".profile-dropdown-list");
let btn = document.querySelector(".profile-dropdown-btn");

let classList = profileDropdownList.classList;

const toggle = () => classList.toggle("active");

window.addEventListener("click", function (e) {
  if (!btn.contains(e.target)) classList.remove("active");
});

const div = document.querySelector('middlenav');

window.addEventListener('scroll', () => {
  div.style.top = `${window.scrollY}px`;
});


//this is for the nav bar in the middle
window.addEventListener('scroll', function() {
  const nav = document.getElementById('nav');
  if (window.scrollY > 0) {
      nav.classList.add('scroll-top');
  } else {
      nav.classList.remove('scroll-top');
  }
});