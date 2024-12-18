function confirmAction(event, message) {
    // Prevent form submission
    event.preventDefault();

    // Check if a confirmation box already exists and remove it
    const existingBox = document.querySelector('.confirmation-box');
    if (existingBox) {
        document.body.removeChild(existingBox);
    }

    // Create the confirmation box
    const confirmationBox = document.createElement('div');
    confirmationBox.classList.add('confirmation-box');

    confirmationBox.innerHTML = `
        <p>${message}</p>
        <div class="confirmation-actions">
            <button class="confirm-yes">Yes</button>
            <button class="confirm-no">No</button>
        </div>
    `;

    // Append the box to the body
    document.body.appendChild(confirmationBox);

    // Add event listener to remove the confirmation box when clicking outside it
    function handleOutsideClick(event) {
        if (!confirmationBox.contains(event.target)) {
            document.body.removeChild(confirmationBox);
            document.removeEventListener('click', handleOutsideClick);
        }
    }
    document.addEventListener('click', handleOutsideClick);

    // Handle "Yes" click
    confirmationBox.querySelector('.confirm-yes').addEventListener('click', () => {
        document.body.removeChild(confirmationBox);
        document.removeEventListener('click', handleOutsideClick);
        event.target.closest('form').submit(); // Submit the form
    });

    // Handle "No" click
    confirmationBox.querySelector('.confirm-no').addEventListener('click', () => {
        document.body.removeChild(confirmationBox);
        document.removeEventListener('click', handleOutsideClick);
    });

    return false; // Prevent default form submission
}
