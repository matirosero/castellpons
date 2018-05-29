jQuery(document).ready(function($) {

    var slideIndex = 0;
    
    

    var count = $(".slider-progress > .progress-indicator").length;
    var bar =  new Array();

    console.log(count);




    showSlides(bar);


    function showSlides(bar) {
        var i;
        var slides = document.getElementsByClassName("slides");
        var bars = document.getElementsByClassName("progress-indicator");
        for (i = 0; i < slides.length; i++) {
           slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}



        for (i = 0; i < bars.length; i++) {
            bars[i].className = bars[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        bars[slideIndex-1].className += " active";
        setTimeout(showSlides, 4000); // Change image every 2 seconds
    }


});