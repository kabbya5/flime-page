

// slider 
$('.post-slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText: ["<div class='nav-button owl-prev -ml-4'>"+
        "<i class='fa-solid fa-arrow-left text-lg slider-btn-background  text-[#857F7F] bg-white slider-btn-shadow  px-6 py-2'></i>"+
        "</div>", 
        "<div class='nav-button owl-next -ml-4'>"+
            "<i class='fa-solid fa-arrow-right slider-btn-background  text-lg text-[#857F7F] bg-white slider-btn-shadow px-6 py-2'></i>"+
        "</div>"],  
    responsive:{
        0:{
            items:2
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})
$('.post-book-slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText: ["<div class='nav-button owl-prev'>"+
        "<i class='fa-solid fa-arrow-left text-lg text-[#857F7F] slider-btn-background  px-6 py-2'></i>"+
        "</div>", 
        "<div class='nav-button owl-next'>"+
            "<i class='fa-solid fa-arrow-right text-lg text-[#857F7F]  slider-btn-background  px-6 py-2'></i>"+
        "</div>"], 
    responsive:{
        0:{
            items:2
        },
        1000:{
            items:4
        }
    }
})

// flim slider 
$('.flim-slider').owlCarousel({
    loop:true,
    margin:20,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})

$('.book-editing-slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})



$(document).ready(function(){
    $('#navbar-toggler').click(function(){
        $('#navbar-dropdown').toggleClass('show');
    });
    
    $('#doropdown').click(function(){
        $(this).children('.dropdown-items').toggleClass("hidden");
    });

    //admin layout 

    $("#alert-message").delay(10000).slideUp(400);

    $(window).scroll(function(){
        if($(this).scrollTop() > 120){
            $('.sidebar').addClass('top-0')
        } else{
            $('.sidebar').removeClass('top-0')
        }
    });   
})
$(document).on('click','.youtube',function(){
    let videoId = $(this).attr('video-id');
    $(this).children('img').hide();
    let src = 'https://www.youtube.com/embed/' + videoId + '?&autoplay=1';
    $(this).empty;
    $(this).append("<iframe class='video-image' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share'  allowfullscreen></iframe>");
    $(this).children('iframe').attr('src',src);
})
// page-loader 

$(window).on('load', function() { 
    $(".page-loader").delay(2000).fadeOut("slow");
    $(".loader").delay(2000).fadeOut("slow");
    $("#overlayer").delay(2000).fadeOut("slow");
})




 