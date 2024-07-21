import './bootstrap';

//onload parallax
// document.addEventListener("DOMContentLoaded", function() {
window.addEventListener("load", function() {
    const hero = document.querySelector('.hero-bg');
    const heroContent = document.querySelector('.hero-content');
    const frontL = document.querySelector('.lion');
    // Exit if any elements are missing
    if (!hero || !frontL || !heroContent) {
        return;
    }
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
    if(!stars) return;
    const ratingInput = document.getElementById('rating');
    if(!ratingInput) return;
    const testimonialForm = document.getElementById('testimonialForm');
    if(!testimonialForm) return;
    const messageTextarea = document.getElementById('comment');
    if(!messageTextarea) return;
    const charCount = document.getElementById('charCount');
    if(!charCount) return;

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

        fetch(reviewsStoreUrl, {
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

// Contact form
document.addEventListener('DOMContentLoaded', function() {
    const submitButton = document.getElementById('submit-contact');
    if (!submitButton) {
        return;
    }
    submitButton.addEventListener('click', function() {

        const firstName = document.getElementById('name-contact').value.trim();
        const lastName = document.getElementById('nameL-contact').value.trim();
        const telephone = document.getElementById('tel-contact').value.trim();
        const email = document.getElementById('mail-contact').value.trim();
        const message = document.getElementById('mess-contact').value.trim();

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!firstName || !lastName || !telephone || !email || !message) {
            alert('All fields are required.');
            return;
        }

        if (!emailRegex.test(email)) {
            alert('Please enter a valid email address.');
            return;
        }

        const formData = {
            firstName: firstName,
            lastName: lastName,
            telephone: telephone,
            email: email,
            message: message
        };

        console.log('Form Data:', JSON.stringify(formData));

        fetch(sendMessageUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            console.log('Success:', data);
            alert('Your message has been sent successfully!');

            document.getElementById('contactForm').reset();
        })
        .catch((error) => {
            console.error('Error:', error);
            alert('There was an error sending your message. Please try again later.');
        });
    });
});


// current time button
document.addEventListener('DOMContentLoaded', function() {
    // Select all 'Set to Now' buttons and attach event listeners
    document.querySelectorAll('.set-now-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            setCurrentDatetime(this);
        });
    });
});

function setCurrentDatetime(button) {
    var inputId = button.getAttribute('data-target'); // Gets the data attribute value
    var inputElement = document.getElementById(inputId);
    if (!inputElement) {
        console.error("Input element not found for ID: ", inputId);
        return;
    }
    var now = new Date();
    var localDatetime = formatLocalDateTime(now);
    inputElement.value = localDatetime;
}

function formatLocalDateTime(date) {
    var year = date.getFullYear();
    var month = ('0' + (date.getMonth() + 1)).slice(-2); // months are zero-indexed
    var day = ('0' + date.getDate()).slice(-2);
    var hour = ('0' + date.getHours()).slice(-2);
    var minute = ('0' + date.getMinutes()).slice(-2);

    return year + '-' + month + '-' + day + 'T' + hour + ':' + minute;
}
