// slider 
$('.post-slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    navText: ["<div class='nav-button owl-prev'>"+
        "<i class='fa-solid fa-arrow-left text-lg text-[#857F7F] bg-white box-shadow  px-6 py-2'></i>"+
        "</div>", 
        "<div class='nav-button owl-next'>"+
            "<i class='fa-solid fa-arrow-right text-lg text-[#857F7F] bg-white box-shadow px-6 py-2'></i>"+
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
        "<i class='fa-solid fa-arrow-left text-lg text-[#857F7F] bg-white box-shadow  px-6 py-2'></i>"+
        "</div>", 
        "<div class='nav-button owl-next'>"+
            "<i class='fa-solid fa-arrow-right text-lg text-[#857F7F] bg-white box-shadow px-6 py-2'></i>"+
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
    $('#doropdown').click(function(){
        $(this).children('.dropdown-items').toggleClass("hidden");
    });

    //admin layout 

    $("#alert-message").delay(3000).slideUp(400);

    $(window).scroll(function(){
        if($(this).scrollTop() > 120){
            $('.sidebar').addClass('top-0')
        } else{
            $('.sidebar').removeClass('top-0')
        }
    });

    // create post 
    $('#add_post_button').click(function(){
        var form = $('.form');
        form.toggleClass('show'); 
        $('form').trigger("reset");
    })

    $('#cancle-post-create-btn').click(function(){
        var form = $('.form');
        form.addClass('hidden'); 
        form.toggleClass('show'); 
    }) 

    $('#add_header_button').click(function(){
        var form = $('.header-form');
        form.toggleClass('show'); 
    })

    $('#cancle-header-create-btn').click(function(){
        var form = $('.header-form');
        form.addClass('hidden'); 
        form.toggleClass('show'); 
    }) 

    
})

// page-loader 

$(window).on('load', function() { 
    $(".page-loader").delay(2000).fadeOut("slow");
    $(".loader").delay(2000).fadeOut("slow");
    $("#overlayer").delay(2000).fadeOut("slow");
})




 