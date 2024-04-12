// JavaScript for the popup form
const updateBtn = document.querySelector('.update-btn');
const modal = document.getElementById('updateForm');
const closeBtn = document.querySelector('.close');

updateBtn.addEventListener('click', () => {
  modal.style.display = 'block';
});

closeBtn.addEventListener('click', () => {
  modal.style.display = 'none';
});

window.addEventListener('click', (event) => {
  if (event.target === modal) {
    modal.style.display = 'none';
  }
});
