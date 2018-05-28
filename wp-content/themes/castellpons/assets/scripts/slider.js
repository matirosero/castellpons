jQuery(document).ready(function($) {

    var slideIndex = 0;
    
    

    var count = $(".slider-progress > .bar").length;
    var bar =  new Array();

    console.log(count);

    for (i = 0; i < $(".slider-progress > .bar").length; i++) {
        bar[i] = new ProgressBar.Line('#bar-'+i, {
          strokeWidth: 1,
          easing: 'easeInOut',
          duration: 3000,
          color: '#fff',
          trailColor: '#9b9b9b',
          trailWidth: 1,
          svgStyle: {width: '100%', height: '100%'}
        });

        // bar[i].animate(1.0);  // Number from 0.0 to 1.0
    }


    showSlides(bar);


    function showSlides(bar) {
        var i;
        var slides = document.getElementsByClassName("slides");
        var bars = document.getElementsByClassName("bar");
        for (i = 0; i < slides.length; i++) {
           slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}



        for (i = 0; i < bars.length; i++) {
            bars[i].className = bars[i].className.replace(" active", "");
            bar[i].animate(1.0);
        }
        slides[slideIndex-1].style.display = "block";
        bars[slideIndex-1].className += " active";
        setTimeout(showSlides, 3000); // Change image every 2 seconds
    }

// progressbar.js@1.0.0 version is used
// Docs: http://progressbarjs.readthedocs.org/en/1.0.0/

// var bar = new ProgressBar.Line('#bar-1', {
//   strokeWidth: 1,
//   easing: 'easeInOut',
//   duration: 3000,
//   color: '#fff',
//   trailColor: '#9b9b9b',
//   trailWidth: 1,
//   svgStyle: {width: '100%', height: '100%'}
// });

// bar.animate(1.0);  // Number from 0.0 to 1.0

});