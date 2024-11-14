document.addEventListener('DOMContentLoaded', function () {
    const overlay = document.querySelector('.overlay');
    const errorElement = document.querySelector('.error-holder');

    if (errorElement) {
        
        // Add fade-out class after 3 seconds
        setTimeout(() => {
            errorElement.classList.add('hide'); // Fade out error message
        }, 2000);

        // Completely remove elements after fade-out transition ends
        setTimeout(() => {// Reset overlay
            errorElement.style.display = 'none'; // Hide error message
        }, 3000); // 1 second after fade-out for smooth transition
    }
});
