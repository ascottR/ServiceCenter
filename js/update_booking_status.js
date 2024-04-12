document.addEventListener("DOMContentLoaded", function() {
    var updateButtons = document.querySelectorAll('.update-status-button');
    var modal = document.getElementById('update-status-modal');
    var modalDropdown = document.getElementById('modal-status-dropdown');
    var modalSubmitButton = document.getElementById('modal-submit-button');

    updateButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var bookingId = this.getAttribute('data-booking-id');

            // Set the booking ID in the modal
            modalDropdown.setAttribute('data-booking-id', bookingId);

            // Show the modal
            modal.style.display = 'block';
        });
    });

    modalSubmitButton.addEventListener('click', function() {
        var bookingId = modalDropdown.getAttribute('data-booking-id');
        var newStatus = modalDropdown.value;

        // Implement the AJAX request to update the booking status
        fetch('../controller/process_update_status_ajax.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'bookingId=' + encodeURIComponent(bookingId) + '&newStatus=' + encodeURIComponent(newStatus),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update successful
                var statusCell = document.querySelector('.status[data-booking-id="' + bookingId + '"]');

                if (statusCell) {
                    statusCell.textContent = newStatus;
                    modal.style.display = 'none';
                }
            } else {
                // Update failed
                console.error('Error updating booking status:', data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
