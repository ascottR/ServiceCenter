const loginPopup = document.getElementById('loginPopup');
const popupTrigger = document.getElementById('popupTrigger');
const popupTrigger2 = document.getElementById('popupTrigger2');
const popupTrigger3 = document.getElementById('popupTrigger3');
const popupTrigger4 = document.getElementById('popupTrigger4');
const closeBtn = document.getElementById('closePopup');

function showPopup() {
    loginPopup.style.display = 'block';
}

function hidePopup() {
    loginPopup.style.display = 'none';
}

popupTrigger.addEventListener('click', function(event) {
    showPopup();
    event.stopPropagation(); // Prevent click event from closing the form immediately
});

popupTrigger2.addEventListener('click', function(event) {
    showPopup();
    event.stopPropagation(); // Prevent click event from closing the form immediately
});

popupTrigger3.addEventListener('click', function(event) {
    showPopup();
    event.stopPropagation(); // Prevent click event from closing the form immediately
});

popupTrigger4.addEventListener('click', function(event) {
    showPopup();
    event.stopPropagation(); // Prevent click event from closing the form immediately
});

closeBtn.addEventListener('click', function() {
    hidePopup();
});

window.addEventListener('click', function(event) {
    if (event.target === loginPopup) {
        hidePopup();
    }
});
