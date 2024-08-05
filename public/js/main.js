(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();


    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $('.nav-bar').addClass('sticky-top');
        } else {
            $('.nav-bar').removeClass('sticky-top');
        }
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Header carousel
    $(".header-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        items: 1,
        dots: true,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-chevron-left" style="color:white;"></i>',
            '<i class="bi bi-chevron-right" style="color:white;"></i>'
        ]
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 24,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            992:{
                items:2
            }
        }
    });

    $(".voir_plus1").click(function(){
        $("#message1").show();
        setTimeout(function(){
            $("#message1").fadeOut(1500);
        }, 3000);
    });
    $(".voir_plus2").click(function(){
        $("#message2").show();
        setTimeout(function(){
            $("#message2").fadeOut(1500);
        }, 3000);
    });
    $(".voir_plus3").click(function(){
        $("#message3").show();
        setTimeout(function(){
            $("#message3").fadeOut(1500);
        }, 3000);
    });
    $(".voir_plus4").click(function(){
        $("#message4").show();
        setTimeout(function(){
            $("#message4").fadeOut(1500);
        }, 3000);
    });
    $(".voir_plus5").click(function(){
        $("#message5").show();
        setTimeout(function(){
            $("#message5").fadeOut(1500);
        }, 3000);
    });
    $(".voir_plus6").click(function(){
        $("#message6").show();
        setTimeout(function(){
            $("#message6").fadeOut(1500);
        }, 3000);
    });
    $(".voir_plus7").click(function(){
        $("#message7").show();
        setTimeout(function(){
            $("#message7").fadeOut(1500);
        }, 3000);
    });

    $('.offre').click(function(){
        $('#offre').slideToggle('slow');
        $('#chevron-icon').toggleClass('fa-chevron-down fa-chevron-up');
    })

    if (localStorage.getItem('consentGiven') === 'true') {
        $('#consentButton').removeClass('btn-primary').addClass('btn-white');
        $('#consentButton').html('<i class="fas fa-check"></i> Consentement donné');
    }

    $('.consentement').click(function(){
        $(this).removeClass('btn-primary').addClass('btn-white');
            $(this).html('<i class="fas fa-check"></i> Consentement donné');
            localStorage.setItem('consentGiven', 'true');
    })
    $('.openpopup').on('click', function() {
        $('#pricing').show();
    });

    // Fermer le popup
    $('.close').on('click', function() {
        $('#popup-overlay0').modal('hide');
    });

})(jQuery);
// document.getElementById('quantity').addEventListener('change', function() {
//     if (this.value === 'autres') {
//         this.style.display = 'none';
//         document.getElementById('Qte_autre').style.display = 'block';
//         document.getElementById('Qte_autre').focus();
//         document.getElementById('Qte_autre').name = 'Qte';
//     }
// });

document.getElementById('addIcon').addEventListener('click', function() {
    document.getElementById('profilePictureInput').click();
});

document.getElementById('profilePictureInput').addEventListener('change', function() {
    document.getElementById('profilePictureForm').submit();
});

document.getElementById('deletePictureButton').addEventListener('click', function() {
    if (confirm('Êtes-vous sûr de vouloir supprimer votre photo de profil ?')) {
        document.getElementById('deletePictureForm').submit();
    }
});
/*Code pour ouvrir le popup */
function togglePopup(){
    let popup=document.querySelector("#popup-overlay");
    popup.classList.toggle("open");
}
function togglePopup1(){
    let popup=document.querySelector("#popup-overlay1");
    popup.classList.toggle("open");
}




document.addEventListener('DOMContentLoaded', function () {
    const startDate = document.getElementById('start_date');
    const endDate = document.getElementById('end_date');
    const articleStartDate = new Date('{{ $article->start_date }}');
    const articleEndDate = new Date('{{ $article->end_date }}');

    startDate.addEventListener('change', function () {
        const selectedStartDate = new Date(startDate.value);
        if (selectedStartDate < articleStartDate || selectedStartDate > articleEndDate) {
            alert('La date de début doit être comprise entre ' + articleStartDate.toLocaleDateString() + ' et ' + articleEndDate.toLocaleDateString());
            startDate.value = '';
        }
    });

    endDate.addEventListener('change', function () {
        const selectedEndDate = new Date(endDate.value);
        if (selectedEndDate < articleStartDate || selectedEndDate > articleEndDate) {
            alert('La date de fin doit être comprise entre ' + articleStartDate.toLocaleDateString() + ' et ' + articleEndDate.toLocaleDateString());
            endDate.value = '';
        }
    });
});

