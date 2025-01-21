// document.getElementById('alertButton').onclick = function () {
//     alert("Thank you for your interest! We're excited to connect with you.");
// };
// document.getElementById('submit').onclick = function() {
//     alert("Thank you for contacting us!");
// };
var toggleOpen = document.getElementById('toggleOpen');
var toggleClose = document.getElementById('toggleClose');
var collapseMenu = document.getElementById('collapseMenu');

function handleClick() {
  if (collapseMenu.style.display === 'block') {
    collapseMenu.style.display = 'none';
  } else {
    collapseMenu.style.display = 'block';
  }
}

toggleOpen.addEventListener('click', handleClick);
toggleClose.addEventListener('click', handleClick);