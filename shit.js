document.addEventListener("DOMContentLoaded", function() {
    function adjustBossHeight() {
        const boss = document.querySelector('.boss');
        const footer = document.querySelector('.footer');

        if (boss && footer) {
            const footerHeight = footer.offsetHeight;
            const windowHeight = window.innerHeight;
            boss.style.minHeight = `${windowHeight - footerHeight}px`;
        }
    }

    // Initial adjustment
    adjustBossHeight();

    // Re-adjust height on window resize
    window.addEventListener('resize', adjustBossHeight);
});