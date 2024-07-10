import './bootstrap';

//onload parallax
// document.addEventListener("DOMContentLoaded", function() {
window.addEventListener("load", function() {
        const hero = document.querySelector('.hero-bg');
    const heroContent = document.querySelector('.hero-content');
    const frontL = document.querySelector('.lion');
  
    //initial state 
    hero.style.transform = 'scale(1.1)';
    hero.style.opacity = '0';
  
    frontL.style.transform = 'translate(-48%, -48%)';
    frontL.style.opacity = '0';
  
    heroContent.style.transform = 'translateY(20px)';
    heroContent.style.opacity = '0';
    
    //the next frame
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
    
    ratingContainers.forEach(container => {
        const ratingElement = container.parentElement.querySelector('.rating');
        const ratingValue = parseFloat(ratingElement.textContent);
        const starElements = container.querySelectorAll('i');
        
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

//Stars for form ratings
document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.star-list .bi');
    const ratingInput = document.getElementById('rating');

    stars.forEach(star => {
        star.addEventListener('mouseover', function() {
            const ratingValue = parseInt(this.getAttribute('data-value'));
            fillStars(ratingValue);
        });

        star.addEventListener('mouseout', function() {
            const currentRating = parseInt(ratingInput.value);
            fillStars(currentRating);
        });

        star.addEventListener('click', function() {
            const ratingValue = parseInt(this.getAttribute('data-value'));
            ratingInput.value = ratingValue;
            fillStars(ratingValue);
        });
    });

    function fillStars(rating) {
        stars.forEach(star => {
            const starValue = parseInt(star.getAttribute('data-value'));
            if (starValue <= rating) {
                star.classList.add('bi-star-fill');
                star.classList.remove('bi-star');
            } else {
                star.classList.add('bi-star');
                star.classList.remove('bi-star-fill');
            }
        });
    }
});

//testimonial form to send
document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.star-list li i');
    const ratingInput = document.getElementById('rating');
    const testimonialForm = document.getElementById('testimonialForm');
    const messageTextarea = document.getElementById('message');
    const charCount = document.getElementById('charCount');

    stars.forEach(star => {
        star.addEventListener('click', function() {
            const rating = this.getAttribute('data-value');
            ratingInput.value = rating;

            stars.forEach(s => s.classList.remove('filled-star'));
            for (let i = 0; i < rating; i++) {
                stars[i].classList.add('filled-star');
            }
        });
    });

    messageTextarea.addEventListener('input', function() {
        const length = messageTextarea.value.length;
        charCount.textContent = `${length}/320`;
    });

    testimonialForm.addEventListener('submit', function(event) {
        event.preventDefault();

        if (messageTextarea.value.length > 320) {
            alert('Your message is too long. Please keep it under 320 characters.');
            return;
        }

        const formData = new FormData(testimonialForm);

        fetch(reviewsStoreUrl, { // Use the variable here
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                alert('Thank you for your testimonial!');
                testimonialForm.reset();
                stars.forEach(s => s.classList.remove('filled-star'));
                charCount.textContent = '0/320';
            } else {
                alert('There was an error submitting your testimonial. Please try again.');
            }
        })
        .catch(error => console.error('Error:', error));
    });
});


