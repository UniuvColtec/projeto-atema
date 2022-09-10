window.onscroll = function() {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        shrinkMenu();
    }
    else {
        expandMenu();
    }
}

function shrinkMenu() {
    document.getElementById('header-navbar').classList.replace('py-4', 'py-2')
}

function expandMenu() {
    document.getElementById('header-navbar').classList.replace('py-2', 'py-4')
}

const multipleItemCarousel = document.querySelector('#carouselExampleControls')

  if(window.matchMedia("(min-width:576px)").matches) {
      const carousel = new bootstrap.Carousel(myCarouselElement, {
          interval: false
      })

      var carouselWidth = $('.carousel-inner') [0].scrollWidth;
      var cardWidht = $('.carousel-inner')[0].width();

      var scrollPosition = 0;
      $('.carousel-control-next').on('click', function () {
          if (scrollPosition < (carouselWidth - (cardWidht * 4))) {
              console.log('next');
              scrollPosition = scrollPosition + cardWidth;
              $('.carousel-inner').animate({scrollLeft: scrollPosition}, 600)
          }
      });
      $('.carousel-control-prev').on('click', function () {
          if (scrollPosition > 0) {
              console.log('prev');
              scrollPosition = scrollPosition - cardWidth;
              $('.carousel-inner').animate({scrollLeft: scrollPosition}, 600)
          }
      });
  }else{
      $(multipleItemCarousel).addClass('slide');
  }


