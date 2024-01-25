window.addEventListener('scroll', function() {
    // Calculate scroll percentage
    const scrollPercentage = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;

    // Example: Adjust z-index based on scroll percentage
    const stickNav = document.getElementById('nav');
    
    if (scrollPercentage < 0.5) {
        stickNav.style.zIndex = 1;
        stickNav.style.position = 'relative'; // Change to relative position
    } else {
        stickNav.style.zIndex = 3;
        stickNav.style.position = 'fixed'; // Change to fixed position
        stickNav.style.top = '0';
        stickNav.style.right = '0';
        stickNav.style.width = '100%';
    }
});