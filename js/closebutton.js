document.addEventListener("DOMContentLoaded", function() {
    var closeModalButton = document.querySelector('.close-modal-button');
    var modal = document.getElementById('update-status-modal');

    closeModalButton.addEventListener('click', function() {
        closeModal();
    });

    function closeModal() {
        modal.style.display = 'none';
    }
});


