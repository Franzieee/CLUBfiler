
// Page Transition on Link Click
document.querySelectorAll('.links a').forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault();

        // Add classes for transition effects
        document.querySelector('.box-container').classList.remove('yes-shadow');
        document.querySelector('.box-container').classList.add('no-shadow');
        document.querySelector('.box.left').classList.add('left-after');
        document.querySelector('.box.right').classList.add('right-after');

        // Apply fade-out animation to .inner contents within each box
        document.querySelectorAll('.box .inner').forEach(inner => {
            inner.classList.add('fade-out');
        });

        // Wait for fade-out animation to complete before redirecting
        const lastInner = document.querySelector('.box .inner:last-child');
        lastInner.addEventListener('animationend', () => {
            window.location.href = link.href;
        }, { once: true });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    // Add the fade-in class as soon as the DOM is ready
    document.querySelectorAll('.box .inner').forEach(inner => {
        inner.classList.add('fade-in');
    });

    // If you need the shadow effect as well
    document.querySelector('.box-container').classList.add('yes-shadow');
});