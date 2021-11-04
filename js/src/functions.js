// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the

// const slick = require("./slick");

// leading edge, instead of the trailing.
function debounce(func, wait, immediate) {
    var timeout;
    return function() {
        var context = this,
            args = arguments;
        var later = function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
};

/* Enhance Mouse Focus */
var enhanceMouseFocusActive = false;
var enhanceMouseFocusEnabled = false;
var enhanceMouseFocusElements = $();
var enhanceMouseFocusNewElements = $();

function enhanceMouseFocusUpdate() {
    if (enhanceMouseFocusEnabled) {
        // add any new focusable elements
        enhanceMouseFocusNewElements = $('button, input[type="submit"], input[type="button"], [tabindex]:not(input, textarea), a').not(enhanceMouseFocusElements);
        enhanceMouseFocusElements = enhanceMouseFocusElements.add(enhanceMouseFocusNewElements);

        // if an element gets focus due to a mouse click, prevent it from keeping focus
        enhanceMouseFocusNewElements.mousedown(function() {
            enhanceMouseFocusActive = true;
            setTimeout(function() {
                enhanceMouseFocusActive = false;
            }, 50);
        }).on('focus', function() {
            if (enhanceMouseFocusActive) {
                $(this).blur();
            }
        });
    }
}

function initEnhanceMouseFocus() {
    enhanceMouseFocusElements = $();
    enhanceMouseFocusEnabled = true;
    enhanceMouseFocusUpdate();
    // update focusable elements on Gravity Forms render
    $(document).on('gform_post_render', function() {
        enhanceMouseFocusUpdate();
    });
}

/* FitVids */
function initFitVids() {
    $('.site-content').fitVids();
}


/* Autoplay Video Check */
function initAutoplayCheck() {
    function isAutoplaySupported(callback) {
        var video = document.createElement('video');
        video.autoplay = true;
        video.setAttribute('playsinline', '');
        video.muted = true;
        video.src = 'data:video/mp4;base64,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';
        video.load();
        video.style.display = 'none';
        video.playing = false;
        video.testDone = false;
        try {
            video.play();
        } catch (e) {
            callback(false);
            video.testDone = true;
        }
        video.onplay = function() {
            this.playing = true;
        };
        video.oncanplay = function() {
            if (!video.testDone) {
                if (video.playing) {
                    callback(true);
                } else {
                    callback(false);
                }
                video.testDone = true;
            }
        };
        setTimeout(function() {
            if (!video.testDone) {
                if (video.playing) {
                    callback(true);
                } else {
                    callback(false);
                }
                video.testDone = true;
            }
        }, 500);
    }
    isAutoplaySupported(function(supported) {
        if (!supported) {
            $('.page-background_video').addClass('page-background_video_disabled');
        }
    });
}







/* Init NavSub Drop */
function initNavDrop() {
    let m = window.matchMedia('(max-width: 1050px)');
    var target = jQuery('.subheader-nav .subheader-nav__item a');


    if (!m.matches) {
        // This helps with tab activation features.
        target.focusin(function() {
            jQuery(this).closest('.subheader-nav').addClass('subheader-nav_active');
            jQuery(this).addClass('subheader-nav_active');
        });
        target.focusout(function() {
            jQuery(this).closest('.subheader-nav').removeClass('subheader-nav_active');
            jQuery(this).removeClass('subheader-nav_active');
        });
    } else if (m.matches) {
        var mobTarget = jQuery('.mobile-nav .mobile-nav__item_has-child');

        // This will protect against repeated items.
        if(mobTarget.find('.subheader-nav').children('.mobile-nav__link').length == 0){
            mobTarget.each(function( index ) {            
                $( "<a href='"+$( this ).children('.mobile-nav__link').attr('href')+"' class='mobile-nav__link'>"+$( this ).children('.mobile-nav__link').text()+"</a>" ).prependTo( $( this ).find('.subheader-nav') );
            });
        }

        mobTarget.on('click tap', function(e) {
            // This disables href until later on.
            firstElementA = jQuery(this).children();
            firstElementA.attr('data-temp', jQuery(this).find('a').attr('href'));
            firstElementA.removeAttr('href'); //The link is not clickable anymore
            if (!jQuery(this).hasClass('active')) {
                jQuery(this).addClass('active');
                var subMenu = jQuery(this).find('.subheader-nav');
                var subMenuActive = subMenu.hasClass('subheader-nav_active');
                subMenu.addClass('subheader-nav_active');
                if (subMenuActive) {
                    subMenu.removeClass('subheader-nav_active');
                }
            } else {
                // Re-establish href link.
                firstElementA.attr('href', jQuery(this).find('a').attr('data-temp'));
            }

            jQuery('.mobile-nav__item-back_hidden').removeClass('mobile-nav__item-back_hidden');
            jQuery('.mobile-nav__item').addClass('mobile-nav__item_deactive');
            jQuery(this).removeClass('mobile-nav__item_deactive');
            jQuery(this).addClass('mobile-nav__item_active');
        });

        // This resets the mobile nav orignal settings. 
        jQuery('.mobile-nav__item-back').on('click tap', function () {
            jQuery('.mobile-nav__item').removeClass('mobile-nav__item_active');
            jQuery('.mobile-nav__item').removeClass('mobile-nav__item_deactive');
            jQuery('.mobile-nav__item_has-child').removeClass('active');
            jQuery('.subheader-nav_active').removeClass('subheader-nav_active');
            jQuery('.mobile-nav__item-back').addClass('mobile-nav__item-back_hidden');
        });

    }
}
initNavDrop();
var efficentNavDrop = debounce(initNavDrop, 250);
jQuery(window).on('resize', efficentNavDrop);







/* Mobile Menu */
function mobNavTrigger($) {
    var mobNavToggle = $(".full-menu__trigger");
    var topBar = $('.full-menu');
    var body = $('body');
    var bodyOverlay = $('.background_overlay_content');
    // This sets full menu header to the header height.
    function headerResize() {
        var navHeight = $('header').innerHeight();
        // $('.full-menu__top').css('height', navHeight + 'px');
    }
    // open Function.
    function openMenu() {
        topBar.addClass('full-menu_active');
        body.addClass('disable');
        bodyOverlay.addClass('background_overlay_content_active');
        setTimeout(function() {
            body.addClass('disable_fixed');
        }, 400);
        body.data('lastScroll', $(window).scrollTop());
    }
    // Close Function.
    function closeMenu() {
        topBar.removeClass('full-menu_active');
        body.removeClass('disable');
        body.removeClass('disable_fixed');
        bodyOverlay.removeClass('background_overlay_content_active');
        $(window).scrollTop(body.data('lastScroll'));
    }
    // Close Menu on Key Press Escape.
    $(document).keydown(function(e) {
        var isOpen = $('.full-menu').hasClass('full-menu_active');
        if (isOpen) {
            if (e.which === 27) {
                closeMenu();
            }
        }
    });
    // Trigger the Mobile Takeover
    mobNavToggle.click(function() {
        var isOpen = topBar.hasClass('full-menu_active');
        if (isOpen) {
            closeMenu();
        } else {
            headerResize();
            openMenu();
        }
    });
    $(window).resize(function() {
        headerResize();
        if (window.innerWidth > 850) {
            closeMenu();
        }
    });
}
jQuery(document).ready(function($) {
    mobNavTrigger($);
});







/* Parallax Animation */
function parallaxAnimation() {
    gsap.utils.toArray(".parallax-section .parallax-section__pattern").forEach((section, i) => {
        const heightDiff = section.offsetHeight - section.parentElement.offsetHeight;
    gsap.fromTo(section,{ 
      y: -heightDiff
    }, {
      scrollTrigger: {
        trigger: section.parentElement,
        scrub: true
      },
      y: 0,
      ease: "none"
    });
      });
}



function navigationFixedAnimation(){
    // Exit Function if class doesnt exist.
    if(!$('.site-header').hasClass('site-header_is-fixed')){
        return;
    }
    // Get the static information
    let siteHeader = $('.site-header'),
        siteLogo = $('.site-header__main-logo'),
        dropDown = $('.subheader-nav'),
        paddingT = siteHeader.css('padding-top'),
        paddingB = siteHeader.css('padding-bottom');


        if (window.innerWidth > 1050) {
            // Simple on scroll animation.
            $(window).scroll(function(){
                var scroll = $(window).scrollTop();
                if (scroll >= 100){
                    siteLogo.css('transform', 'scale(.5)');
                    dropDown.css('background-color', '#fff');

                    siteHeader.css('padding-top', '5px');
                    siteHeader.css('padding-bottom', '5px');
                    siteHeader.addClass('site-header_fixed');
                } else {
                    // restore styling
                    siteLogo.css('transform', '');
                    dropDown.css('background-color', '');

                    siteHeader.css('padding-top', paddingT);
                    siteHeader.css('padding-bottom', paddingB);
                    siteHeader.removeClass('site-header_fixed');
                }
            });
        }

        function mobileFixSwitcher(siteHeader){
            if (window.innerWidth < 1050) {
                siteHeader.removeClass('site-header_is-fixed');
            } else{
                siteHeader.addClass('site-header_is-fixed');
            }
        }
        mobileFixSwitcher(siteHeader);
        $(window).resize(function() {
            mobileFixSwitcher(siteHeader);
        });
        


        // Adds spacing to the section.
        function sectionAdjustment(siteHeader){
            siteHeaderHeight = siteHeader.outerHeight();
            nextSection = $('.intro__header .section');
            nextSection.css('padding-top', siteHeaderHeight+'px');
        }
        // sectionAdjustment(siteHeader);
        // $(window).resize(function(){
        //     sectionAdjustment(siteHeader);
        // });
}






   


function jsMap(){
    // Exit Function if node doesnt exist.
    if ($("#map_leaflet").length == 0) {
        return;
    }

    // set long and lat of the map center x lat,y long,z is zoom
    // set the initial zoom level, values 0-18, 0 is the most zoomed out
    var coordinates = {
        zoom : $('#map_leaflet').attr( "data-zoom" ),
        lat  : $('#map_leaflet').attr( "data-lat" ),
        long : $('#map_leaflet').attr( "data-long" )
    };
    var mymap = L.map('map_leaflet', {
        zoomControl: false
    });
    var mapTiles = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });
    mapTiles.addTo(mymap);
    mymap.setView([coordinates.lat,coordinates.long], coordinates.zoom);
    //Create multiple markers
    //Do so by declaring another variable. You can call the variable whatever you want 
    var marker = L.marker ([coordinates.lat,coordinates.long], 
        {
            title:'101 Cadbury Way Holley​, Murray, NY, 14470',
            draggable: false, 
            opacity:1
        });
    //Add markers to map
    marker.addTo(mymap).bindPopup('<p>101 Cadbury Way Holley​, Murray, NY, 14470</p>').openPopup();
    // Register the marker to the map.
    marker.addTo(mymap);

    function onMapClick(e) {
        window.open('https://www.google.com/maps/dir/?api=1&destination=101+Cadbury+Way+Holley%E2%80%8B%2C+Murray%2C+NY%2C+14470', '_blank');
    }
    marker.on('click', onMapClick);
}



function formAsteriskColor(){
    // Exit Function if class doesnt exist.
    if(!$('form').hasClass('wpcf7-form')){
        return;
    }
    // Get the static information
    let form = $('.wpcf7-form'),
        fieldRequired = $('.required'),
        fieldLabel = fieldRequired.find('label');
        fieldLabel.each(function () {
            $(this).html($(this).html().replace("*", "<span class='red'>*</span>"));
    });
}


function contactButton() {
    var originalButton = $(".wpcf7-submit");
    originalButton.each(function() {
        var targetElement = $(this)
            , newButton = (targetElement = $('<button class="button" type="submit" value="Send"></button>'),
        $('<span class="button-text">Submit</span>'));
        originalButton.after(targetElement),
        newButton.appendTo(targetElement)
    })
}



function slick(){
    $(".regular").slick({
      dots: true,
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3,
      nextArrow: '<button class="slide-next"><img src="/wp-content/themes/kraken/images/icons/arrow-white.svg" alt="Slider Next"></button>',
      prevArrow: '<button class="slide-prev"><img src="/wp-content/themes/kraken/images/icons/arrow-white.svg" alt="Slider Previous"></button>'
    });
    $(".center").slick({
      dots: true,
      infinite: true,
      centerMode: true,
      slidesToShow: 5,
      slidesToScroll: 3,
      nextArrow: '<button class="slide-next"><img src="/wp-content/themes/kraken/images/icons/arrow-white.svg" alt="Slider Next"></button>',
      prevArrow: '<button class="slide-prev"><img src="/wp-content/themes/kraken/images/icons/arrow-white.svg" alt="Slider Previous"></button>'
    });
    $(".lazy").slick({
      lazyLoad: 'ondemand', // ondemand progressive anticipated
      infinite: true,
      nextArrow: '<button class="slide-next"><img src="/wp-content/themes/kraken/images/icons/arrow-white.svg" alt="Slider Next"></button>',
      prevArrow: '<button class="slide-prev"><img src="/wp-content/themes/kraken/images/icons/arrow-white.svg" alt="Slider Previous"></button>'
    });
}



/* General */
$(function() {
    initFitVids();
    initEnhanceMouseFocus();
    initAutoplayCheck();
    navigationFixedAnimation();
    parallaxAnimation();
    // formAsteriskColor();
    // contactButton();
    slick();
    jsMap();
});






// This is a custom lazy loader that uses Intersection Observer, Web worker & Blob image creation resizing. 
// Future updates will have a browser detection for webp support, which takes the image and convert it to a webp file. 

// This observes and adds a custom class.
const loaderElements = document.querySelectorAll('.animate-me');
observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.intersectionRatio > 0) {
            entry.target.classList.add('fancy');
            // lazyWorker(entry.target.getAttribute('data-src'));
            lazyLoad(entry.target);

            // Disconnect after observed.
            observer.unobserve(entry.target);
        } else {
            entry.target.classList.remove('fancy');
        }
    });
}, { rootMargin: "0px 0px -50px 0px" });
loaderElements.forEach(element => {
    observer.observe(element);
});


// We create a web worker to handle the loading of the image.
var workie;

function lazyLoad($target) {
    var $targetSrc = $target.getAttribute('data-src');

    // Does Browser support web worker?
    if (typeof(Worker) !== "undefined") {
        if (typeof(workie) == "undefined") {
            // Assign the web worker.
            workie = new Worker(getWorkerURL());
        }
        // Change value to a encoded string for worst case sceneros.
        var pass_data;
        if ($target.tagName == 'IFRAME') {
            pass_data = {
                'type': 'iframe',
                'url': encodeURI($targetSrc)
            };
        } else if ($target.tagName == 'IMG') {
            pass_data = {
                'type': 'img',
                'url': encodeURI($targetSrc)
            };
        }
        // send data to worker.
        workie.postMessage(pass_data);

        // Once worker is done processing the sent message retreive the worker message.
        workie.onmessage = function(e) {
            // Grab the message data from the event    
            if (e.data.dataType == "img") {
                var targetElements = document.querySelectorAll(`.fancy[data-src="${e.data.dataUrl}"]`)
                targetElements.forEach(element => {
                    // For Images we creat a image blob to take advantage of browser cache
                    const objectURL = URL.createObjectURL(e.data.blob)

                    // Take the data-src and add it to the src attr.
                    element.setAttribute('src', objectURL)
                        // Clean the element by removing the data-src.
                    element.removeAttribute('data-src')
                });
            } else {
                var targetElements = document.querySelectorAll(`.fancy[data-src=${e.data.dataUrl}]`)
                targetElements.forEach(element => {
                    // Take the data-src and add it to the src attr.
                    element.setAttribute('src', element.getAttribute('data-src'))
                        // Clean the element by removing the data-src.
                    element.removeAttribute('data-src')
                });
            }
        }

        // Create a blob file to reduce render blocking issues.
        function getWorkerURL() {
            var content = ['(',
                function() {
                    //Long-running work here
                    self.addEventListener('message', async e => {

                        // Catch errors to prevent crash.
                        try {
                            // This if statement is needed if you have an oembed iframe from vimeo, vimeo has its own post message which would conflict with ours.
                            if (!(/^https?:\/\/player.vimeo.com/).test(e.origin)) {
                                if (e.data != { event: "ready" }) {
                                    // Data that is sent over using postMessage.
                                    var convertData = JSON.parse(JSON.stringify(e.data)); //parse json string into JS object
                                    var dataUrl = convertData.url
                                    var dataType = convertData.type

                                    // We do this due to the cross origin issues, it bypasses cross origin restrictions.
                                    if (convertData.type == "iframe") {
                                        dataUrl = JSON.stringify(convertData.url)
                                            // Send the data to the UI thread!
                                        self.postMessage({
                                            dataType: dataType,
                                            dataUrl: dataUrl,
                                        })

                                        // This creates a blob that is used until
                                    } else if (convertData.type == "img") {
                                        // await until the request is complete.
                                        const response = await fetch(dataUrl)
                                        const blob = await response.blob()
                                            // Send the data to the UI thread!
                                        self.postMessage({
                                            dataType: dataType,
                                            dataUrl: dataUrl,
                                            blob: blob,
                                        })
                                    }
                                }
                            }
                        } catch (e) {
                            console.error(e);
                        }
                    })
                }.toString(),
                ')()'
            ]
            return URL.createObjectURL(new Blob(content, { type: "text/javascript" }));
        }
    } else {
        console.log("Sorry you're using a browser that doesn't support some pretty cool features. You will most likely not get any blob data.");
        // alert('Sorry please use a different browser that supports web workers.')

        var targetElements = document.querySelectorAll(`.fancy[data-src="${$targetSrc}"]`)
        targetElements.forEach(element => {
            // For Images we creat a image blob to take advantage of browser cache
            const realUrl = element.getAttribute('data-Src');
            // Take the data-src and add it to the src attr.
            element.setAttribute('src', realUrl)
                // Clean the element by removing the data-src.
            element.removeAttribute('data-src')
        });

    }
}











// fetch("https://api.spotify.com/v1/audio-analysis/6EJiVf7U0p1BBfs0qqeb1f", {
//   method: "GET",
//   headers: {
//     Authorization: `Bearer ${userAccessToken}`
//   }
// })
// .then(response => response.json())
// .then(({beats}) => {
//   beats.forEach((beat, index) => {
//     console.log(`Beat ${index} starts at ${beat.start}`);
//   })
// })


