// update_booking.js
document.addEventListener("DOMContentLoaded", function() {
    var updateButtons = document.querySelectorAll('.update-button');
    var cancelButtons = document.querySelectorAll('.cancel-button');
    var updateForms = document.querySelectorAll('.update-form');
    var updateBookingIdInput = document.getElementById('updateBookingId');
    var updateDateInput = document.getElementById('updateDate');
    var updateTimeInput = document.getElementById('updateTime');
    var submitUpdateButton = document.getElementById('submitUpdate');
    var cancelUpdateButton = document.getElementById('cancelUpdate');

    updateButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var bookingId = this.getAttribute('data-booking-id');
            openUpdateForm(bookingId);
        });
    });

    cancelButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var bookingId = this.getAttribute('data-booking-id');
            cancelBooking(bookingId);
        });
    });

    function openUpdateForm(bookingId) {
        updateBookingIdInput.value = bookingId;
        updateForms.style.display = 'block';
    }

    function cancelBooking(bookingId) {
        if (confirm('Are you sure you want to cancel this booking?')) {
            // Implement the AJAX request to cancel the booking
            fetch('../controller/process_cancel_booking.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'bookingId=' + encodeURIComponent(bookingId),
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
    
                if (data.success) {
                    // Cancellation successful
                    alert('Booking canceled successfully!');
                    
                    // Redirect to the user profile page
                    window.location.href = '../views/userProfile.php';
                    
                    // Alternatively, you can reload the current page
                    // window.location.reload();
                } else {
                    // Cancellation failed
                    alert('Error canceling booking: ' + data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    }
    

    updateForms.forEach(function(updateForm) {
        updateForm.addEventListener('submit', function(event) {
            event.preventDefault();
    
            var formData = new FormData(updateForm);
    
            fetch('../controller/process_update_booking.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update successful
                    alert('Booking updated successfully!');
                    updateForm.style.display = 'none';
                    location.reload();
                } else {
                    // Update failed
                    alert('Error updating booking: ' + data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
});
