$( document ).ready(function() {

    let $iconOpen = $('#iconOpen');
    let $iconClose = $('#iconClose');
    let $navMobile = $('#navMobile');
    let $body = $('body');

    let tl = gsap.timeline();
    tl.pause();
    tl.from("#navMobile", {x: 2000, duration: 0.5});
    tl.from("#menuMobile1", {x: 2000, fontSize: 500, duration: 0.5}, ">-0.4");
    tl.from("#menuMobile2", {x: 2000, fontSize: 500, duration: 0.5}, ">-0.4");
    tl.from("#menuMobile3", {x: 2000, fontSize: 500, duration: 0.5}, ">-0.4");

    $iconClose.hide();
    $navMobile.hide();

    $iconClose.click(function() {
        $iconClose.hide();
        $iconOpen.show();
        $navMobile.hide();
        $body.removeClass('overflow-hidden');
    });

    $iconOpen.click(function(){
        $iconOpen.hide();
        $iconClose.show();
        $navMobile.show();
        tl.restart();
        $body.addClass('overflow-hidden');
    });

});