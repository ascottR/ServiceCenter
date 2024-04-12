const btn = document.getElementById('booknow');
const formDiv = document.getElementById('bookingForm');

let isOpen = false;

btn.addEventListener('click', function(event) {
    isOpen = !isOpen;
    formDiv.style.display = isOpen ? 'block' : 'none';
    event.stopPropagation(); // Prevent button click from triggering window click event
});

window.addEventListener('click', function(event) {
    if (isOpen && !formDiv.contains(event.target) && event.target !== btn) {
        formDiv.style.display = 'none';
        isOpen = false;
    }
});
