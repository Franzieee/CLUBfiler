function confirmAction(event, message) {
    // Prevent form submission
    event.preventDefault();

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

    // Handle "Yes" click
    confirmationBox.querySelector('.confirm-yes').addEventListener('click', () => {
        document.body.removeChild(confirmationBox);
        event.target.closest('form').submit(); // Submit the form
    });

    // Handle "No" click
    confirmationBox.querySelector('.confirm-no').addEventListener('click', () => {
        document.body.removeChild(confirmationBox);
    });

    return false; // Prevent default form submission
}