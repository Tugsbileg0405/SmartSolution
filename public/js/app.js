var searchVisible = 0;
var transparent = true;

var transparentDemo = true;
var fixedTop = false;

var toggle_initialized = false;

var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = 0;

$(document).ready(function () {
    window_width = $(window).width();

    pk.checkScrollForTransparentNavbar();
    //  Activate the tooltips
    $('[data-toggle="tooltip"]').tooltip();

    //      Activate the switches with icons
    if ($('.switch').length != 0) {
        $('.switch')['bootstrapSwitch']();
    }
    //      Activate regular switches
    if ($("[data-toggle='switch']").length != 0) {
        $("[data-toggle='switch']").bootstrapSwitch();
    }

    //    Activate bootstrap-select
    if ($(".selectpicker").length != 0) {
        $(".selectpicker").selectpicker();
    }

    $('.modal').appendTo('body');

    if ($(".tagsinput").length != 0) {
        $(".tagsinput").tagsInput();
    }

    // Limit number of characters in limited textarea
    $('.textarea-limited').keyup(function () {
        var max = $(this).attr('maxlength');
        var len = $(this).val().length;
        if (len >= max) {
            $('#textarea-limited-message').text(' you have reached the limit');
        } else {
            var char = max - len;
            $('#textarea-limited-message').text(char + ' characters left');
        }
    });

    if (window_width >= 768) {
        big_image = $('.page-header[data-parallax="true"]');

        if (big_image.length != 0) {
            $(window).on('scroll', pk.checkScrollForPresentationPage);
        }
    }


    if ($("#datetimepicker").length != 0) {
        $('#datetimepicker').datetimepicker({
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove'
            }

        });
    };

    // Change the collor of navbar collapse
    $('#navbarToggler').on('show.bs.collapse', function () {
        if ($('nav').hasClass('navbar-transparent') && $(document).scrollTop() < 50) {
            $('.navbar').addClass('no-transition');
            $('nav').removeClass('navbar-transparent');
        }
    }).on('hidden.bs.collapse', function () {
        if ($(document).scrollTop() < 50) {
            $('.navbar').removeClass('no-transition');
            $('nav:first-of-type').addClass('navbar-transparent');
        }
    });

    // Navbar color change on scroll
    if ($('.navbar[color-on-scroll]').length != 0) {
        $(window).on('scroll', pk.checkScrollForTransparentNavbar)
    }

    $('.btn-tooltip').tooltip();
    $('.label-tooltip').tooltip();

    // Carousel
    $('.carousel').carousel({
        interval: 20000
    });

    $('.form-control').on("focus", function () {
        $(this).parent('.input-group').addClass("input-group-focus");
    }).on("blur", function () {
        $(this).parent(".input-group").removeClass("input-group-focus");
    });

    // Init popovers
    pk.initPopovers();

    // Init Sliders
    pk.initSliders();

    // Init video header
    pk.initVideoBackground();

    // Share buttons
    if ($('.twitter-sharrre').length != 0) {
        $('.twitter-sharrre').sharrre({
            share: {
                twitter: true
            },
            enableHover: false,
            enableTracking: true,
            enableCounter: false,
            buttons: {
                twitter: {
                    via: 'CreativeTim'
                }
            },
            click: function (api, options) {
                api.simulateClick();
                api.openPopup('twitter');
            },
            template: '<i class="fa fa-twitter"></i>',
            url: 'http://demos.creative-tim.com/paper-kit-2-pro/presentation.html'
        });
    }

    if ($('.twitter-sharrre-nav').length != 0) {
        $('.twitter-sharrre-nav').sharrre({
            share: {
                twitter: true
            },
            enableHover: false,
            enableTracking: true,
            enableCounter: false,
            buttons: {
                twitter: {
                    via: 'CreativeTim'
                }
            },
            click: function (api, options) {
                api.simulateClick();
                api.openPopup('twitter');
            },
            template: '<i class="fa fa-twitter"></i><p class="hidden-lg-up">Twitter</p>',
            url: 'http://demos.creative-tim.com/paper-kit/index.html'
        });
    }

    if ($('.facebook-sharrre').length != 0) {
        $('.facebook-sharrre').sharrre({
            share: {
                facebook: true
            },
            enableHover: false,
            enableTracking: true,
            enableCounter: false,
            click: function (api, options) {
                api.simulateClick();
                api.openPopup('facebook');
            },
            template: '<i class="fa fa-facebook-square"></i>',
            url: 'http://demos.creative-tim.com/paper-kit-2-pro/presentation.html'
        });
    }

    if ($('.facebook-sharrre-nav').length != 0) {
        $('.facebook-sharrre-nav').sharrre({
            share: {
                facebook: true
            },
            enableHover: false,
            enableTracking: true,
            enableCounter: false,
            click: function (api, options) {
                api.simulateClick();
                api.openPopup('facebook');
            },
            template: '<i class="fa fa-facebook-square"></i><p class="hidden-lg-up">Facebook</p>',
            url: 'http://demos.creative-tim.com/paper-kit/index.html'
        });
    }

    if ($('.linkedin-sharrre').length != 0) {
        $('.linkedin-sharrre').sharrre({
            share: {
                linkedin: true
            },
            enableCounter: false,
            enableHover: false,
            enableTracking: true,
            click: function (api, options) {
                api.simulateClick();
                api.openPopup('linkedin');
            },
            template: '<i class="fa fa-linkedin"></i>',
            url: 'http://demos.creative-tim.com/paper-kit-2-pro/presentation.html'
        });
    }

    if ($('.linkedin-sharrre-nav').length != 0) {
        $('.linkedin-sharrre-nav').sharrre({
            share: {
                linkedin: true
            },
            enableCounter: false,
            enableHover: false,
            enableTracking: true,
            click: function (api, options) {
                api.simulateClick();
                api.openPopup('linkedin');
            },
            template: '<i class="fa fa-linkedin"></i><p class="hidden-lg-up">LinkedIn</p>',
            url: 'http://demos.creative-tim.com/paper-kit/index.html'
        });
    }

    // Activate Navbar
    if ($('.nav-down').length != 0) {
        pk.checkScrollForMovingNavbar();
    };


    if (window_width > 768) {
        $('#element1left').css('opacity', 0);

        $('#element1left').waypoint(function () {
            $('#element1left').addClass('fadeInLeft');
        }, {
            offset: '80%'
        });

        $('#element1right').css('opacity', 0);

        $('#element1right').waypoint(function () {
            $('#element1right').addClass('fadeInRight');
        }, {
            offset: '80%'
        });

        $('#element2left').css('opacity', 0);

        $('#element2left').waypoint(function () {
            $('#element2left').addClass('fadeInLeft');
        }, {
            offset: '80%'
        });

        $('#element2right').css('opacity', 0);

        $('#element2right').waypoint(function () {
            $('#element2right').addClass('fadeInRight');
        }, {
            offset: '80%'
        });

        $('#element3left').css('opacity', 0);

        $('#element3left').waypoint(function () {
            $('#element3left').addClass('fadeInLeft');
        }, {
            offset: '80%'
        });

        $('#element3right').css('opacity', 0);

        $('#element3right').waypoint(function () {
            $('#element3right').addClass('fadeInRight');
        }, {
            offset: '80%'
        });

        $('#element4left').css('opacity', 0);

        $('#element4left').waypoint(function () {
            $('#element4left').addClass('fadeInLeft');
        }, {
            offset: '80%'
        });

        $('#element4right').css('opacity', 0);

        $('#element4right').waypoint(function () {
            $('#element4right').addClass('fadeInRight');
        }, {
            offset: '80%'
        });
    }

    $('#imageGallery').lightSlider({
        gallery: true,
        item: 1,
        loop: true,
        thumbItem: 4,
        slideMargin: 0,
        thumbMargin: 10,
        enableDrag: false,
        currentPagerPosition: 'left',
        onSliderLoad: function (el) {
            el.lightGallery({
                selector: '#imageGallery .lslide'
            });
        },
    });

    var options = {
        useEasing: true,
        useGrouping: true,
        separator: ',',
        decimal: '.',
        suffix: '+'
    };
    var projects = new CountUp("projects", 0, 56, 0, 2, options);
    var users = new CountUp("users", 0, 5000, 0, 2, options);
    var distrobutors = new CountUp("distrobutors", 0, 20, 0, 2, options);

    var waypoint = new Waypoint({
        element: document.getElementById('statistics'),
        handler: function (direction) {
            projects.start();
            users.start();
            distrobutors.start();
        }
    })
});

$(document).on('click', '.navbar-toggler', function () {
    $toggle = $(this);
    if (pk.misc.navbar_menu_visible == 1) {
        $('html').removeClass('nav-open');
        pk.misc.navbar_menu_visible = 0;
        setTimeout(function () {
            $toggle.removeClass('toggled');
            $('#bodyClick').remove();
        }, 550);
    } else {
        setTimeout(function () {
            $toggle.addClass('toggled');
        }, 580);

        div = '<div id="bodyClick"></div>';
        $(div).appendTo("body").click(function () {
            $('html').removeClass('nav-open');
            pk.misc.navbar_menu_visible = 0;
            $('#bodyClick').remove();
            setTimeout(function () {
                $toggle.removeClass('toggled');
            }, 550);
        });
        $('html').addClass('nav-open');
        pk.misc.navbar_menu_visible = 1;
    }
});


pk = {
    misc: {
        navbar_menu_visible: 0
    },
    checkScrollForTransparentNavbar: debounce(function () {
        if ($(document).scrollTop() > $(".navbar").attr("color-on-scroll")) {
            if (transparent) {
                transparent = false;
                // $('.navbar-brand img').attr('src', 'assets/img/logo-black.png')
                $('.navbar[color-on-scroll]').removeClass('navbar-transparent');
            }
        } else {
            if (!transparent) {
                transparent = true;
                // $('.navbar-brand img').attr('src', 'assets/img/logo.png')
                $('.navbar[color-on-scroll]').addClass('navbar-transparent');
            }
        }
    }, 17),

    checkScrollForMovingNavbar: function () {

        // Hide Header on on scroll down
        navbarHeight = $('.navbar').outerHeight();

        $(window).scroll(function (event) {
            didScroll = true;
        });

        setInterval(function () {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }, 250);


    },

    checkScrollForPresentationPage: debounce(function () {
        oVal = ($(window).scrollTop() / 3);
        big_image.css({
            'transform': 'translate3d(0,' + oVal + 'px,0)',
            '-webkit-transform': 'translate3d(0,' + oVal + 'px,0)',
            '-ms-transform': 'translate3d(0,' + oVal + 'px,0)',
            '-o-transform': 'translate3d(0,' + oVal + 'px,0)'
        });
    }, 4),

    initVideoBackground: function () {
        $('[data-toggle="video"]').click(function () {
            id_video = $(this).data('video');
            video = $('#' + id_video).get(0);

            parent = $(this).parent('div').parent('div');

            if (video.paused) {
                video.play();
                $(this).html('<i class="fa fa-pause"></i> Зогсоох');
                parent.addClass('state-play');
            } else {
                video.pause();
                $(this).html('<i class="fa fa-play"></i> Тоглуулах');
                parent.removeClass('state-play');
            }
        });
    },

    initPopovers: function () {
        if ($('[data-toggle="popover"]').length != 0) {
            $('body').append('<div class="popover-filter"></div>');

            //    Activate Popovers
            $('[data-toggle="popover"]').popover().on('show.bs.popover', function () {
                $('.popover-filter').click(function () {
                    $(this).removeClass('in');
                    $('[data-toggle="popover"]').popover('hide');
                });
                $('.popover-filter').addClass('in');
            }).on('hide.bs.popover', function () {
                $('.popover-filter').removeClass('in');
            });

        }
    },

    initSliders: function () {
        // Sliders for demo purpose in refine cards section
        if ($('#sliderRegular').length != 0) {
            var rangeSlider = document.getElementById('sliderRegular');
            noUiSlider.create(rangeSlider, {
                start: [5000],
                range: {
                    'min': [2000],
                    'max': [10000]
                }
            });
        }
        if ($('#sliderDouble').length != 0) {
            var slider = document.getElementById('sliderDouble');
            noUiSlider.create(slider, {
                start: [20, 80],
                connect: true,
                range: {
                    'min': 0,
                    'max': 100
                }
            });
        }

    },
    initContactUsMap: function () {

        var myLatlng = new google.maps.LatLng(44.445248, 26.099672);
        var mapOptions = {
            zoom: 14,
            center: myLatlng,
            styles: [{
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#e9e9e9"
                }, {
                    "lightness": 17
                }]
            }, {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#f5f5f5"
                }, {
                    "lightness": 20
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "lightness": 17
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "lightness": 29
                }, {
                    "weight": 0.2
                }]
            }, {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "lightness": 18
                }]
            }, {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "lightness": 16
                }]
            }, {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#f5f5f5"
                }, {
                    "lightness": 21
                }]
            }, {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#dedede"
                }, {
                    "lightness": 21
                }]
            }, {
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "color": "#ffffff"
                }, {
                    "lightness": 16
                }]
            }, {
                "elementType": "labels.text.fill",
                "stylers": [{
                    "saturation": 36
                }, {
                    "color": "#333333"
                }, {
                    "lightness": 40
                }]
            }, {
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#f2f2f2"
                }, {
                    "lightness": 19
                }]
            }, {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#fefefe"
                }, {
                    "lightness": 20
                }]
            }, {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#fefefe"
                }, {
                    "lightness": 17
                }, {
                    "weight": 1.2
                }]
            }],
            scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
        }

        var map = new google.maps.Map(document.getElementById("contactUsMap"), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            title: "Test"
        });

        // To add the marker to the map, call setMap();
        marker.setMap(map);

    },

    initContactUsMap2: function () {

        var myLatlng = new google.maps.LatLng(47.897327, 106.878874);
        var mapOptions = {
            zoom: 14,
            center: myLatlng,
            styles: [{
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#e9e9e9"
                }, {
                    "lightness": 17
                }]
            }, {
                "featureType": "landscape",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#f5f5f5"
                }, {
                    "lightness": 20
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "lightness": 17
                }]
            }, {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "lightness": 29
                }, {
                    "weight": 0.2
                }]
            }, {
                "featureType": "road.arterial",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "lightness": 18
                }]
            }, {
                "featureType": "road.local",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#ffffff"
                }, {
                    "lightness": 16
                }]
            }, {
                "featureType": "poi",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#f5f5f5"
                }, {
                    "lightness": 21
                }]
            }, {
                "featureType": "poi.park",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#dedede"
                }, {
                    "lightness": 21
                }]
            }, {
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "color": "#ffffff"
                }, {
                    "lightness": 16
                }]
            }, {
                "elementType": "labels.text.fill",
                "stylers": [{
                    "saturation": 36
                }, {
                    "color": "#333333"
                }, {
                    "lightness": 40
                }]
            }, {
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "transit",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#f2f2f2"
                }, {
                    "lightness": 19
                }]
            }, {
                "featureType": "administrative",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#fefefe"
                }, {
                    "lightness": 20
                }]
            }, {
                "featureType": "administrative",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#fefefe"
                }, {
                    "lightness": 17
                }, {
                    "weight": 1.2
                }]
            }],
            scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
        }

        var map = new google.maps.Map(document.getElementById("contactUsMap2"), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            title: "Test"
        });

        // To add the marker to the map, call setMap();
        marker.setMap(map);

    },

}

demo = {
    initPickColor: function () {
        $('.pick-class-label').click(function () {
            var new_class = $(this).attr('new-class');
            var old_class = $('#display-buttons').attr('data-class');
            var display_div = $('#display-buttons');
            if (display_div.length) {
                var display_buttons = display_div.find('.btn');
                display_buttons.removeClass(old_class);
                display_buttons.addClass(new_class);
                display_div.attr('data-class', new_class);
            }
        });
    }
}

// Returns a function, that, as long as it continues to be invoked, will not
// be triggered. The function will be called after it stops being called for
// N milliseconds. If `immediate` is passed, trigger the function on the
// leading edge, instead of the trailing.

function debounce(func, wait, immediate) {
    var timeout;
    return function () {
        var context = this,
            args = arguments;
        clearTimeout(timeout);
        timeout = setTimeout(function () {
            timeout = null;
            if (!immediate) func.apply(context, args);
        }, wait);
        if (immediate && !timeout) func.apply(context, args);
    };
};

function hasScrolled() {
    var st = $(this).scrollTop();
    // Make sure they scroll more than delta
    if (Math.abs(lastScrollTop - st) <= delta)
        return;

    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight) {
        // Scroll Down
        $('.navbar.nav-down').removeClass('nav-down').addClass('nav-up');
    } else {
        // Scroll Up
        if (st + $(window).height() < $(document).height()) {
            $('.navbar.nav-up').removeClass('nav-up').addClass('nav-down');
        }
    }

    lastScrollTop = st;
};

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-46172202-1']);
_gaq.push(['_trackPageview']);

(function () {
    var ga = document.createElement('script');
    ga.type = 'text/javascript';
    ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ga, s);
})();