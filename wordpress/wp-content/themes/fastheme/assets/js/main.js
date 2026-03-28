// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function() {
            const isExpanded = mobileMenuBtn.getAttribute('aria-expanded') === 'true';
            mobileMenuBtn.setAttribute('aria-expanded', !isExpanded);
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Mobile submenu toggle function (used by walker)
    window.toggleMobileSubmenu = function(button) {
        // The submenu-content is a sibling of the parent div
        const parentDiv = button.closest('.menu-item-has-children');
        if (parentDiv) {
            // Look for submenu-content as a sibling or inside the parent
            const submenu = parentDiv.querySelector('.submenu-content') || parentDiv.nextElementSibling;
            if (submenu && submenu.classList.contains('submenu-content')) {
                submenu.classList.toggle('hidden');
                const svg = button.querySelector('svg');
                if (svg) {
                    svg.classList.toggle('rotate-180');
                }
            }
        }
    };

    // Reveal animations
    const revealElements = document.querySelectorAll('.reveal');
    
    if (revealElements.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        revealElements.forEach(el => observer.observe(el));
    }

    // Community cards
    const communityCards = document.querySelectorAll('.community-card');
    communityCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            const img = card.querySelector('.community-img');
            if (img) {
                img.style.transform = 'scale(1.12)';
            }
        });
        card.addEventListener('mouseleave', () => {
            const img = card.querySelector('.community-img');
            if (img) {
                img.style.transform = 'scale(1)';
            }
        });
    });
});
