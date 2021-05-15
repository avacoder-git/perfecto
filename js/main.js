$(window).on('load', function(){
    // alert("Hello");
    $('.girl').addClass('girl-anim');
    $('.yellow-round').addClass('round-anim');
    $('.rectangle').addClass('rectangle-anim');
    // alert("hello");
    $(".loader").toggle();
    $('.navbar1').css("display","flex");
    $('.margin1').addClass('margin');
});
// $(window).on("load",function(){
//     alert("Hello");
// });

$("#owl-demo").owlCarousel({
    items : 4, //10 items above 1000px browser width
    itemsDesktop : [1000,4], //5 items between 1000px and 901px
    itemsDesktopSmall : [900,3], // betweem 900px and 601px
    itemsTablet: [600,1], //2 items between 600 and 0;
    itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
    autoPlay : true,
    autoplayTimeout:100,
    stagePadding: 112,
    // Navigation
    responsive: true,
    responsiveRefreshRate: 0,
    navigation : true,
    navigationText : ["<img src=\"image/owl-prev.png\" alt=\"\">\n","<img src=\"image/owl-next.png\" alt=\"\">\n"],
    pagination : true,
    paginationNumbers: true,
});

$("#owl-demo1").owlCarousel({
    items : 4, //10 items above 1000px browser width
    itemsDesktop : [1000,4], //5 items between 1000px and 901px
    itemsDesktopSmall : [900,3], // betweem 900px and 601px
    itemsTablet: [600,1], //2 items between 600 and 0;
    itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
    autoPlay : true,
    autoplayTimeout:100,
    stagePadding: 112,
    // Navigation
    responsive: true,
    responsiveRefreshRate: 0,
    navigation : true,
    navigationText : ["<img src=\"image/owl-prev.png\" alt=\"\">\n","<img src=\"image/owl-next.png\" alt=\"\">\n"],
    pagination : true,
    paginationNumbers: true,
});

$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 4300) {
        $(".motiv").addClass("motiv-anim");
        $(".community").addClass("community-anim");
    }
});

$(function() {
    var elements;
    var windowHeight;

    function init() {
        elements = $('.road-map');
        windowHeight = window.innerHeight;

    }

    // alert("come");
    function checkPosition() {
        for (var i = 0; i < elements.length; i++) {
            var element = elements[i];
            var positionFromTop = elements[i].getBoundingClientRect().top;

            if (positionFromTop - windowHeight <= -300) {
                element.classList.add('roadmap-anim');
            }
        }
    }

    window.addEventListener('scroll', checkPosition);
    window.addEventListener('resize', init);    init();
    checkPosition();

});


$(function() {
    var elements;
    var windowHeight;

    function init() {
        elements = $('.anim');
        windowHeight = window.innerHeight;

    }

    // alert("come");
    function checkPosition() {
        for (var i = 0; i < elements.length; i++) {
            var element = elements[i];
            var positionFromTop = elements[i].getBoundingClientRect().top;

            if (positionFromTop - windowHeight <= -300) {
                element.classList.add('card-anim');
                // element.classList.remove('anim');
                // alert("come");
            }
        }
    }

    window.addEventListener('scroll', checkPosition);
    window.addEventListener('resize', init);    init();
    checkPosition();

});
