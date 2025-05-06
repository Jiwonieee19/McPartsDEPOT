document.addEventListener('DOMContentLoaded', function() {
    const offset = 70; 
    const signinContainer = document.querySelector('.signin-container');

    function scrollToElement(elementId, callback) {
        const element = document.getElementById(elementId);
        if (!element) {
            console.error(`Element with id ${elementId} not found.`);
            return;
        }
        const elementPosition = element.getBoundingClientRect().top + window.pageYOffset;
        const offsetPosition = elementPosition - offset;

        if (Math.abs(window.pageYOffset - offsetPosition) > 1) {
            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }

        if (callback) {
            callback();
        }
    }

    function addScrollListener(linkId, targetId, callback) {
        document.getElementById(linkId).addEventListener('click', function(event) {
            event.preventDefault();
            scrollToElement(targetId, callback);
        });
    }

    addScrollListener('nav-home', 'home', function() {
        signinContainer.style.display = 'none';
    });

    addScrollListener('nav-about', 'about');

    addScrollListener('nav-signin', 'home', function() {
        signinContainer.style.display = 'block';
    });

    addScrollListener('nav-contact', 'contact');

    addScrollListener('footer-home', 'home', function() {
        signinContainer.style.display = 'none';
    });

    addScrollListener('footer-about', 'about');

    addScrollListener('footer-signin', 'home', function() {
        signinContainer.style.display = 'block';
    });

    addScrollListener('footer-contact', 'contact');

    document.getElementById('about-btn').addEventListener('click', function(event) {
        event.preventDefault();
        scrollToElement('about');
    });
});