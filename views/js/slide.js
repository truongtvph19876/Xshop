let slides = document.querySelectorAll('.slide');
let dots = document.querySelector('.dots');


class Slide {
    constructor(slides,dots, index = 0, time,) {
        this.slides = slides;
        this.dots = dots;
        this.index = index;
        this.time = time;
        this.slides[this.index].classList.add("show-slide");
        let dothtml ='';
        for (let index = 0; index < this.slides.length; index++) {
            dothtml += '<div class="dot-slide dot"></div>';
        }
        this.dots.innerHTML = dothtml;


        
    }
    
    
    autoSlide() {
        let slides = this.slides;
        let currentIndex = this.index;
        let prevIndex = currentIndex - 1;
        let nextIndex = currentIndex + 1;
        let slideLength = this.slides.length;
        
        let dot = document.querySelectorAll(".dot");
        
        dot[currentIndex].classList.add("dot-current");

        let autoSlide = setInterval(() => {
            currentIndex = currentIndex >= slideLength ? 0 : currentIndex;
            prevIndex = currentIndex - 1;
            nextIndex = currentIndex + 1;
            prevIndex = prevIndex < 0 ? slideLength - 1 : prevIndex;
            nextIndex = nextIndex >= slideLength ? 0 : nextIndex; 
            console.log(prevIndex, currentIndex, nextIndex);

            
            for (let i = 0; i < slideLength; i++) {
                slides[i].classList.remove("show-slide");
                slides[i].classList.remove("prev-slide");
                slides[i].classList.remove("next-slide");
                dot[i].classList.remove("dot-current");
    
            }

            slides[currentIndex].classList.add("show-slide");
            slides[prevIndex].classList.add("prev-slide");
            slides[nextIndex].classList.add("next-slide");
            dot[currentIndex].classList.add("dot-current");

            currentIndex++;

        }, this.time);

    }

    nextSlide(index) {
        
    }

    
}

let test = new Slide(slides,dots, 0, 4000);
test.autoSlide();


