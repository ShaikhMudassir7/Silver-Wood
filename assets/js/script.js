function n(n){
    return n > 9 ? "" + n: "0" + n;
}

// a and b are javascript Date objects
function dateDiffInDays(a, b) {
    const utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
    const utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());
    return Math.floor((utc2 - utc1) / (1000 * 60 * 60 * 24));
}

$(document).ready(function() {
    //Preloader
    preloaderFadeOutTime = 500;
    function hidePreloader() {
        var preloader = $('.spinner-wrapper');
        preloader.fadeOut(preloaderFadeOutTime);
    }
    hidePreloader();

    $('.datepicker').datepicker({ dateFormat: 'dd-mm-yy', minDate: 0, maxDate: "+2Y" });
    $('.datepicker').val(n(new Date().getDate()) + "-" + n(new Date().getMonth()+1) + "-" + new Date().getFullYear())

    $('#checkin').change(function() {
        var fromStr = $("#checkin").val().split("-");
        from = new Date(fromStr[2],fromStr[1],fromStr[0]);
        var toStr = $("#checkout").val().split("-");
        to = new Date(toStr[2],toStr[1],toStr[0]);

        if(from > to){
            $("#checkout").val("");
        }
        if(!isNaN(from.getTime()))
        {
            from.setMonth(from.getMonth()-1);
            $('#checkout').datepicker('option', 'minDate', from);
        }
        else {
            $('#checkout').datepicker('option', 'minDate', new Date());
        }
    })
    
    $('#checkout').change(function() {
        var from = $("#checkin").val().split("-");
        from = new Date(from[2],from[1],from[0]);
        var to = $("#checkout").val().split("-");
        to = new Date(to[2],to[1],to[0]);

        if(from > to){
            alert("ERROR: Check-out date cannot be before the check-in date.");
            $("#checkout").val("");
        }
        if(!isNaN(from.getTime()))
        {
            from.setMonth(from.getMonth()-1);
            $('#checkout').datepicker('option', 'minDate', from);
        }
        else {
            $('#checkout').datepicker('option', 'minDate', new Date());
        }
    })

    $(".numberOnly").keyup(function() { 
        $(this).val($(this).val().replace(/\D/, ''));
    })
});

// window.onscroll = function () {
//     mainNavbar();
//   };
//   var navbar = document.getElementById("navbar");
//   var sticky = 200;

//   function mainNavbar() {
//     if (window.pageYOffset >= sticky) {
//       navbar.classList.add("sticky");
//       $(".shower").text("Riwoo");
//     } else {
//       navbar.classList.remove("sticky");
//       $(".shower").text("");
//     }
//   }


new WOW().init();
window.onscroll = function () { scrollFunction(); };

function scrollFunction() {
    if (document.body.scrollTop >= 100 || document.documentElement.scrollTop >= 100) {
        document.getElementsByClassName("navbar")[0].style.padding = "4px 15px";
        document.getElementsByClassName("navbar")[0].style.borderRadius = "0px 0px 30px 30px";
    } else {
        document.getElementsByClassName("navbar")[0].style.padding = "10px 20px";
        document.getElementsByClassName("navbar")[0].style.borderRadius = "0px 0px 0px 0px";
    }
}
var swiper = new Swiper('.swiper-container', {
    pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
        loop: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

var swiper = new Swiper('.swiper-amenities', {
    pagination: {
        el: '.amenities-pagination',
        dynamicBullets: true,
    },
    navigation: {
        nextEl: '.amenities-button-next',
        prevEl: '.amenities-button-prev',
    },
});

$(function($) {
    let url = window.location.href;
        $('nav ul li a').each(function() {
        if (this.href === url) {
        $(this).parents("li").addClass('active');
        }
    });
});

var maxHeight = 0;
$("div.equilize").each(function(){
    if ($(this).height() > maxHeight) { maxHeight = $(this).height(); }
});

$("div.equilize").height(maxHeight);

$('#animated-thumbnails').lightGallery({
    thumbnail:true
}); 
