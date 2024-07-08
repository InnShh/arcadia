import './bootstrap';

//onload parallax
// document.addEventListener("DOMContentLoaded", function() {
window.addEventListener("load", function() {
        const hero = document.querySelector('.hero-bg');
    const heroContent = document.querySelector('.hero-content');
    const frontL = document.querySelector('.lion');
  
    // Ensure initial state is set before applying the animation
    hero.style.transform = 'scale(1.1)';
    hero.style.opacity = '0';
  
    frontL.style.transform = 'translate(-48%, -48%)';
    frontL.style.opacity = '0';
  
    heroContent.style.transform = 'translateY(20px)';
    heroContent.style.opacity = '0';
    
    //Apply the animation in the next frame
    requestAnimationFrame(() => {
      hero.style.transform = 'scale(1)';
      hero.style.opacity = '1';
  
      frontL.style.transform = 'translate(-50%, -50%)';
      frontL.style.opacity = '1';
      
      heroContent.style.transform = 'translateY(0)';
      heroContent.style.opacity = '1';
  
    });
  });

  
//FadeInRight animation on scroll
document.addEventListener('DOMContentLoaded', function() {
    const animElement = document.querySelector('.anim');

    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
        const entry = entries[0];
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
        }
    }, observerOptions);

    if (animElement) {
        observer.observe(animElement);
    }
});

//Stars Ratings
document.addEventListener('DOMContentLoaded', function () {
    const ratingContainers = document.querySelectorAll('.rating-container');
    
    //loop over the i
    ratingContainers.forEach(container => {
        const ratingElement = container.parentElement.querySelector('.rating');
        const ratingValue = parseFloat(ratingElement.textContent);
        const starElements = container.querySelectorAll('i');
        
        //adding the class according its value
        for (let i = 0; i < 5; i++) {
            if (ratingValue >= i + 1) {
                starElements[i].classList.add('star-fill');
            } else if (ratingValue > i) {
                starElements[i].classList.add('star-half');
            } else {
                starElements[i].classList.add('star-outline');
            }
        }
    });
});