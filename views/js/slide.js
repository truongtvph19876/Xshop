let slides = document.querySelectorAll('.slide');
let dots = document.querySelector('.dots');


class Slide {
    constructor(slides,dots, index = 0,) {
        this.slides = slides;
        this.dots = dots;
        this.index = index;

        let previndex = this.slides.length - 1;
        let newindex = this.index + 1;
        this.slides[this.index].classList.add("show-slide");
        this.slides[previndex].classList.add("prev-slide");
        this.slides[newindex].classList.add("next-slide");

        let dothtml ='';
        for (let index = 0; index < this.slides.length; index++) {
            dothtml += '<div class="dot-slide dot"></div>';
        }
        this.dots.innerHTML = dothtml;
        
    }

    nextSlide() {
        let currentIndex = this.index + 1;
        if (currentIndex >= this.slides.length) {
            currentIndex = 0;
        }
        this.index = currentIndex;
        this.changeSlides();
    }
    
    prevSlide() {
        let currentIndex = this.index - 1;
        if (currentIndex < 0) {
            currentIndex = this.slides.length - 1;
        }
        this.index = currentIndex;
        this.changeSlides();
    }
    
    changeSlides() {
        let slides = this.slides;
        let currentIndex = this.index;
        let prevIndex = currentIndex - 1;
        let nextIndex = currentIndex + 1;
        let slideLength = this.slides.length;
        let dot = document.querySelectorAll(".dot");
        
        for (let i = 0; i < slideLength; i++) {
            slides[i].classList.remove("show-slide");
            slides[i].classList.remove("prev-slide");
            slides[i].classList.remove("next-slide");
            dot[i].classList.remove("dot-current");
        }
        
        prevIndex = prevIndex < 0 ? slideLength - 1 : prevIndex;
        nextIndex = nextIndex >= slideLength ? 0 : nextIndex; 
        
        slides[currentIndex].classList.add("show-slide");
        slides[prevIndex].classList.add("prev-slide");
        slides[nextIndex].classList.add("next-slide");
        dot[currentIndex].classList.add("dot-current");
    }

    
}

let mySlides = new Slide(slides,dots, 0,);

let slideInterval;
let autoSlides = function() {
    slideInterval = setInterval( e => {
        mySlides.nextSlide();
    }, 4000);
}
autoSlides();

let prevBtn = document.querySelectorAll(".slide_prev");
let nextBtn = document.querySelectorAll(".slide_next");

prevBtn.forEach(e => {
    e.addEventListener("mouseover", e => {
        clearInterval(slideInterval);
    });

    e.addEventListener("mouseout", e => {
        autoSlides();
    });

    e.addEventListener("click", e => {
        clearInterval(slideInterval);
        mySlides.prevSlide();
    })
})
nextBtn.forEach(e => {
    e.addEventListener("mouseover", e => {
        clearInterval(slideInterval);
    });
    
    e.addEventListener("mouseout", e => {
        autoSlides();
    });

    e.addEventListener("click", e => {
        clearInterval(slideInterval);
        mySlides.nextSlide();
    })
})
