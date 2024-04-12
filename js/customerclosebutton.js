document.addEventListener("DOMContentLoaded", function() {
    var closeModalButton = document.querySelector('.close-modal-button');
    var modal = document.getElementById('updateBookingForm');

    closeModalButton.addEventListener('click', function() {
        closeModal();
    });

    function closeModal() {
        modal.style.display = 'none';
    }
});