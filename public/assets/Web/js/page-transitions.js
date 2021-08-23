$(function () {
    'use strict';

    // Wrap every letter in a span
    var textWrapper = document.querySelector('.loading-text');
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

    var ptText = anime.timeline({

            loop: false,
            autoplay: false
        })
        .add({
            targets: '.loading-text .letter',
            translateY: [100, 0],
            translateZ: 0,
            opacity: [0, 1],
            easing: "easeOutExpo",
            duration: 1000,
            delay: (el, i) => 400 + 30 * i,
            complete: function (anim) {
                ptText.pause();
            }
        }).add({
            targets: '.loading-text .letter',
            translateY: [0, -100],
            opacity: [1, 0],
            easing: "easeInExpo",
            duration: 1000,
            delay: (el, i) => 30 * i,
            complete: function (anim) {
                $('.loading-text').removeClass('.page-change')
            }

        });


    ////////// Page Transitions Start //////////

    var options = {
            blacklist: '.has-children a, .menu-widget-wrapper a',
            prefetch: true,
            cacheLength: 0,
            onStart: {
                duration: 2000, // Duration of our animation
                render: function ($container) {
                    // Add your CSS animation reversing class

                    $('.line').removeClass('line-arange');

                    $('.loading-text').addClass('page-change')

                    if ($('.menu-toggle').hasClass('is-active')) {
                        ptText.restart();


                    } else {
                        $('.overlay').addClass('page-change');

                        ptText.restart();

                        var ptOv = anime.timeline({
                            easing: 'easeInOutCubic',
                            duration: 600,
                            autoplay: true,
                            loop: false,
                            targets: '.overlay.page-change',
                            delay: function (el, i) {
                                return i * 50;
                            },

                        }).add({
                            translateY: ['100%', '0'],
                            complete: function (anim) {
                                ptOv.pause();
                            }

                        }).add({
                            translateY: ['0', '-100%'],

                        });

                        window.ptOv = ptOv

                    }



                    // Restart your animation
                    smoothState.restartCSSAnimations();
                }
            },
            onReady: {
                duration: 0,
                render: function ($container, $newContent) {


                    // Inject the new content
                    $container.html($newContent);

                    $(document).ready(function () {



                        if ($('.fullscreen-footer').length < 1) {

                            $('.site-footer').prepend('<span class="footer-ov"></span><span class="footer-ov"></span><span class="footer-ov"></span><span class="footer-ov"></span>')

                        }

                        if ($('.projects-nav').length > 0) {

                            $('.projects-nav').prepend('<span class="np-ov"></span><span class="np-ov"></span><span class="np-ov"></span><span class="np-ov"></span>')
                        }


                        // Page Settings //
                        var body = $('body');
                        var pageSettings = $('.page-settings');

                        pageSettings.addClass('cako')

                        var dataLayout = pageSettings.data('layout');

                        if (dataLayout != null) {
                            var siteLayout = 'layout-' + dataLayout;

                            body.addClass(siteLayout)
                        }

                        var dataHeaderStyle = pageSettings.data('header-style');

                        if (dataHeaderStyle != null) {
                            var headerStyle = 'header-style-' + dataLayout;

                            $('.site-header').addClass(dataHeaderStyle)
                        }

                        var dataMenuStyle = pageSettings.data('menu-style');

                        if (dataMenuStyle != null) {
                            var menuStyle = 'menu-style-' + dataMenuStyle;

                            $('.site-navigation').addClass(dataMenuStyle)

                        }

                        var dataMenuLayout = pageSettings.data('menu-layout');

                        if (dataMenuLayout != null) {
                            var menuLayout = dataMenuLayout;

                            $('.site-navigation').addClass(dataMenuLayout)

                        }

                        var dataBackground = pageSettings.data('background');

                        if (dataBackground != null) {
                            var bodyBg = dataBackground

                            body.css('background', dataBackground);
                            $('.np-ov').css('background', dataBackground);


                        } else if (dataLayout === "light") {
                            body.css('background', '#ededed');

                        } else if (dataLayout === "dark") {
                            body.css('background', '#121212');

                        }

                        ///////////////////////////////////////////// Scroll Animations /////////////////////////////////////////////
                        if ($('.has-animation').length > 0) {
                            $('.has-animation').each(function () {
                                $(this).attr('data-scroll', 'true');

                                var haDelay = $(this).data('delay') + 's'
                                var haDuration = $(this).data('duration') + 's'

                                $(this).css({
                                    transitionDelay: haDelay,
                                    transitionDuration: haDuration

                                })
                            });


                            $('.lines-up, .lines-down, .lines-fade-up, .lines-fade-down').each(function () {

                                $(this).splitLines({
                                    tag: '<div><span class="split-line"></div>',
                                    keepHtml: true,
                                });

                                var splitLines = $(this).find('.split-line');

                                splitLines.each(function (i) {

                                    var delay = i / 7.5;

                                    var splitParent = $(this).parents('.has-animation');
                                    var baseDelay = splitParent.data('delay');

                                    if (baseDelay == null) {

                                        var finalDelay = delay + 's'

                                    } else {

                                        var finalDelay = baseDelay + delay + 's'
                                    };


                                    $(this).css({
                                        transitionDelay: finalDelay

                                    })


                                })

                            });

                        };
                        ///////////////////////////////////////////// Scroll Animations /////////////////////////////////////////////

                        ///////////////////////////////////////////// Site Scripts /////////////////////////////////////////////

                        ///////////// Showcase Layouts /////////////

                        /* List */
                        if ($('.list-titles').length > 0) {
                            $('.line').addClass('line-arange');

                            $('.list-image').each(function (i) {

                                var index = i + 1
                                var slide = $(this).attr('data-index', 'slide-' + index);
                                var slideIna = $(this).attr('data-slide', index);

                                var totIndex = $('.list-image').length;

                                $('.lt-total').text('0' + totIndex)

                                var slideClass = $(this).data('index');

                                $(this).addClass(slideClass)

                                window.slide = slide;

                                var title = $(this).find('.list-p-title').text();

                                window.title = title;

                            });

                            var interleaveOffset = 0.5;

                            var listImages = new Swiper('.list-images', {
                                slidesPerView: 'auto',
                                speed: 750,
                                spaceBetween: 250,
                                watchSlidesProgress: true,
                                parallax: true,
                                navigation: {
                                    nextEl: '.lc-next',
                                    prevEl: '.lc-prev',
                                },
                                pagination: {
                                    el: '.list-titles',
                                    type: 'bullets',
                                    bulletClass: 'list-title',
                                    clickable: false,
                                    renderBullet: function (index, className) {
                                        var realIndex = index + 1;
                                        var slideSelector = '.slide-' + realIndex;

                                        return '<a href="" data-push="' + index + '"data-select="' + slideSelector + '" class="list-title"></a>';
                                    }
                                },
                                containerClass: 'list-images',
                                centeredSlides: true,
                                on: {
                                    transitionStart: function () {

                                        var currIndex = $('.swiper-slide-active').data('slide')

                                        $('.lt-current').text('0' + currIndex)

                                        if ($('.swiper-slide-active').hasClass('dark')) {

                                            $('.list-carousel').addClass('dark-slide-init')

                                        } else {
                                            $('.list-carousel').removeClass('dark-slide-init')
                                        }

                                    }
                                },
                                breakpoints: {
                                    850: {
                                        centeredSlides: false
                                    }
                                }

                            });

                            $('.list-title').each(function () {
                                var slideSelect = $(this).data('select');
                                var title = $(slideSelect).find('.list-p-title').text();

                                var listURL = $(slideSelect).find('a').attr('href');

                                $(this).attr('href', listURL)

                                $(this).text(title);
                                $(this).attr('data-hover', title);


                            });

                            $('.list-title').on('mouseenter', function () {

                                var slidePush = $(this).data('push');

                                listImages.slideTo(slidePush)

                            });

                            $('.list-titles').on('mouseenter', function () {
                                $('.list-scroll').removeClass('hidden');
                            });

                            $('.list-titles').on('mouseleave', function () {
                                $('.list-scroll').addClass('hidden');
                            });

                            $('.list-titles').prepend('<span class="scroll-rat"></span>')
                            $('.list-titles').append('<span class="scroll-rat"></span>')

                            Scrollbar.init(document.querySelector('.list-titles'));
                        };
                        /* List */

                        /* Vertical */
                        if ($('.vertical-projects').length > 0) {


                            $('.vertical-image-wrapper').each(function () {

                                if ($(this).find('video').length > 0) {

                                    var vVid = $(this).find('video')

                                    var vVidHeight = vVid.outerHeight();

                                    $(this).wrapInner('<div class="vertical-anim-holder"></div>');

                                    $(this).css('height', vVidHeight + 'px');

                                    vVid.css({
                                        width: 'auto',
                                        position: 'absolute'
                                    })

                                } else {

                                    var vImg = $(this).find('img')

                                    var vImgHeight = vImg.outerHeight();

                                    $(this).wrapInner('<div class="vertical-anim-holder"></div>');



                                    $(this).css('height', vImgHeight + 'px');

                                    vImg.css({
                                        width: 'auto',
                                        position: 'absolute'
                                    })

                                }

                            })

                            $('.vertical-item-title').each(function (i) {

                                $(this).splitLines({
                                    tag: '<div><span class="title-line"></div>',
                                    keepHtml: true,
                                });

                                var viLines = $(this).find('div');

                                /*    viLines.each(function (i) {

                                        var viLine = $(this).find('span')

                                        var viDelay = i / 5 + 0.55;

                                        viLine.css({
                                            transitionDelay: viDelay + 's'

                                        })


                                    }) */

                            });



                            $('a').on('click', function () {
                                verticalScroll.destroy();

                            });

                        };
                        /* Vertical */

                        /* Big Slider */
                        if ($('.big-slider').length > 0) {

                            $('body').css('overflow', 'hidden');

                            $('.line').addClass('line-arange');

                            $('.portfolio-showcase').addClass('loading')

                            $('.big-slider-item .title, .big-slider-item .summary').each(function () {

                                $(this).splitLines({
                                    tag: '<div><span class="span-line"></div>',
                                    keepHtml: true,
                                });

                            })

                            $('.big-slider-item .year, .big-slider-item .category, .big-slider-item .meta div').each(function () {
                                $(this).wrapInner('<span></span>')

                            })

                            $('.big-slider-overlays').prepend('<span class="bs-ov bs-ov-1"></span><span class="bs-ov bs-ov-2"></span><span class="bs-ov bs-ov-3"></span><span class="bs-ov bs-ov-4"></span>')

                            $('.bs-splitted').append('<div class="big-images swiper-container"><div class="swiper-wrapper"></div></div>')

                            $('.big-slider-item').each(function () {

                                var bsi = $(this);

                                if (bsi.find('video').length > 0) {

                                    var bigVid = bsi.find('source');
                                    var bigVidUrl = bigVid.attr('src');
                                    $('.bs-splitted .swiper-wrapper').append('<div class="swiper-slide"><div class="big-image"><video playsinline autoplay muted loop class="big-video-split"><source type="video/mp4" src="' + bigVidUrl + '"></video></div></div>');


                                    var bigVidSplit = $('.big-video-split');



                                } else {
                                    var bigImg = $(this).find('img');
                                    var bigImgUrl = bigImg.attr('src');

                                    $('.bs-splitted .swiper-wrapper').append('<div class="swiper-slide"><div class="big-image"><img src="' + bigImgUrl + '"></div></div>')

                                }


                            });


                            $('.big-slide-button').wrapInner('<a href="#" class="project-url"><p class="bsb-link"><p></a>')
                            $('.big-slide-button .project-url').prepend('<span></span><span></span><span></span><span></span>')

                            $('.bsb-link').wrapInner('<wrap></wrap>');

                            var bsURLFirst = $('.big-slider-item a:first-child').attr('href');

                            $('.big-slide-button .project-url').attr('href', bsURLFirst);


                            var bigSlider = new Swiper('.big-slider', {
                                mousewheel: {
                                    invert: false,
                                },
                                slidesPerView: 1,

                                navigation: {
                                    nextEl: '.big-slide-next',
                                    prevEl: '.big-slide-prev',
                                },
                                pagination: {
                                    el: '.bs-bullets',
                                    type: 'bullets',
                                    clickable: true,
                                    renderBullet: function (index, className) {
                                        return '<span class="' + className + '">0' + (index + 1) + '</span>';
                                    }
                                },
                                loop: false,
                                direction: 'vertical',
                                virtualTranslate: true,
                                watchSlidesProgress: true,
                                containerModifierClass: 'big-slider-',
                                slideClass: 'big-slider-item',
                                containerClass: 'big-slider',
                                wrapperClass: 'big-slider-wrapper',
                                slideActiveClass: 'big-item-active',
                                slideNextClass: 'big-item-next',
                                slidePrevClass: 'big-item-prev',


                            });



                            var titleAnimNext = anime.timeline({
                                    autoplay: false,
                                    loop: false,
                                    targets: '.title .span-line',

                                }).add({
                                    translateY: ['0', '-110%'],
                                    easing: "easeInExpo",
                                    ////       delay: function (el, i) {
                                    ////           return 150 + i * 50;
                                    ////       },

                                    duration: 650,
                                    complete: function (anim) {
                                        titleAnimNext.pause();
                                    }
                                })
                                .add({
                                    translateY: ['110%', '0'],
                                    easing: "easeOutExpo",
                                    //    delay: function (el, i) {
                                    //        return i * 50;
                                    //    },

                                    duration: 650,
                                })


                            var titleAnimPrev = anime.timeline({
                                    //   delay: function (el, i, l) {
                                    //       return (l - i) * 50;
                                    //  },
                                    duration: 700,
                                    autoplay: false,
                                    loop: false,
                                    targets: '.title .span-line',
                                }).add({
                                    translateY: ['0', '110%'],
                                    easing: "easeInExpo",
                                    complete: function (anim) {
                                        titleAnimPrev.pause();
                                    }
                                })
                                .add({
                                    translateY: ['-110%', '0'],
                                    easing: "easeOutExpo",
                                })


                            window.titleAnimNext = titleAnimNext
                            window.titleAnimPrev = titleAnimPrev



                            $('.big-slider-item').addClass('bs-inactive');
                            $('.big-slider-item.big-item-active').addClass('bs-active');

                            $('.big-image').addClass('big-image-anim');



                            var interleaveOffset = 0.45;
                            var bigImages = new Swiper('.big-images', {
                                navigation: {
                                    nextEl: '.big-slide-next',
                                    prevEl: '.big-slide-prev',
                                },
                                slidesPerView: 1,
                                mousewheel: {
                                    invert: false,
                                },
                                pagination: {
                                    el: '.bs-bullets',
                                    type: 'bullets',
                                    clickable: true,
                                    renderBullet: function (index, className) {
                                        return '<span class="' + className + '">0' + (index + 1) + '</span>';
                                    }
                                },
                                loop: false,
                                autoplay: {
                                    delay: 10000,
                                    waitForTransition: false,
                                    disableOnInteraction: false
                                },
                                speed: 1300,
                                direction: 'vertical',
                                parallax: true,
                                watchSlidesProgress: true,
                                on: {
                                    progress: function () {
                                        let swiper = this;
                                        for (let i = 0; i < swiper.slides.length; i++) {
                                            let slideProgress = swiper.slides[i].progress,
                                                innerOffset = swiper.width * interleaveOffset,
                                                innerTranslate = slideProgress * innerOffset;
                                        }
                                    },
                                    setTransition: function (speed) {
                                        let swiper = this;
                                        for (let i = 0; i < swiper.slides.length; i++) {
                                            swiper.slides[i].style.transition = speed + "ms";
                                            swiper.slides[i].querySelector(".big-image").style.transition =
                                                speed + "ms";
                                        }
                                    },

                                    transitionStart: function () {
                                        $('.big-slider .title .span-line').css({
                                            transition: 'auto'
                                        });

                                        $('.bs-ov').addClass('trans-start');

                                    },
                                    transitionEnd: function () {
                                        $('.big-slider-item').removeClass('bs-active');
                                        $('.big-slider-item.big-item-active').addClass('bs-active');


                                        $('.swiper-pagination-bullet-active').removeClass('progress-init')

                                        setTimeout(function () {
                                            $('.swiper-pagination-bullet-active').addClass('progress-init')


                                        }, 1);


                                        var bsURL = $('.big-slider-item.big-item-active a').attr('href');

                                        $('.big-slide-button .project-url').attr('href', bsURL);

                                    },
                                    slideNextTransitionStart: function () {


                                        var overlayAnimNext = anime.timeline({
                                            easing: 'easeInOutCubic',
                                            duration: 600,
                                            autoplay: false,
                                            loop: false,
                                            targets: '.bs-ov',
                                            delay: function (el, i) {
                                                return i * 50;
                                            },

                                        }).add({
                                            translateY: ['100%', '0'],
                                            complete: function (anim) {
                                                overlayAnimNext.pause();
                                            }

                                        }).add({
                                            translateY: ['0', '-100%'],
                                        });
                                        window.overlayAnimNext = overlayAnimNext

                                        overlayAnimNext.restart();
                                        titleAnimNext.restart();
                                    },

                                    slideNextTransitionEnd: function () {
                                        setTimeout(function () {
                                            titleAnimNext.play();
                                            overlayAnimNext.play();
                                        }, 1);
                                    },

                                    slidePrevTransitionStart: function () {


                                        var overlayAnimPrev = anime.timeline({
                                            easing: 'easeInOutCubic',
                                            duration: 600,
                                            autoplay: false,
                                            loop: false,
                                            targets: '.bs-ov',
                                            delay: function (el, i) {
                                                return i * 30;
                                            },

                                        }).add({
                                            translateY: ['-100%', '0'],
                                            complete: function (anim) {
                                                overlayAnimPrev.pause();
                                            }

                                        }).add({
                                            translateY: ['0', '100%'],
                                        });


                                        window.overlayAnimPrev = overlayAnimPrev


                                        titleAnimPrev.restart();
                                        overlayAnimPrev.restart();
                                    },

                                    slidePrevTransitionEnd: function () {
                                        setTimeout(function () {
                                            titleAnimPrev.play();
                                            overlayAnimPrev.play();
                                        }, 1);


                                    },

                                }


                            });

                            $('.swiper-pagination-bullet-active').addClass('progress-init')
                            bigImages.controller.control = bigSlider




                        }
                        /* Big Slider */

                        /* All Projects */
                        if ($('.all-projects').length > 0) {

                            $('.all-projects .project').each(function (i) {

                                $(this).addClass('anim-ready')

                                var imageIndex = 'image-' + i;
                                var imageAttr = '.image-' + i;
                                $(this).attr('data-image', imageAttr);

                                var ftImage = $(this).find('.featured-image');
                                var imageUrl = ftImage.attr('src');

                                var apSummary = $(this).find('.summary').text();
                                var apCategory = $(this).find('.category').text();

                                var apMeta = $(this).find('.meta').html();




                                $('.all-projects-metas').append('<div class="all-project-meta ' + imageIndex + '"><div class="category"><span>' + apCategory + '</span></div><div class="meta-summ"><div class="meta">' + apMeta + '</div><div class="summary">' + apSummary + '</div></div></div>');



                                $('.projects-images').append('<div class="pe-project-image ' + imageIndex + '"><img src="' + imageUrl + '"></div>');

                                var dataCat = $(this).attr('data-category');
                                $(this).addClass('category-' + dataCat);

                                $(this).addClass('category-all');

                            });


                            $('.all-projects-cats li').each(function () {

                                $(this).wrapInner('<span class="anim-ready"><span>')

                                var dataHov = $(this).text();
                                $(this).attr('data-hover', dataHov);

                            });

                            $('.all-projects-cats li').on('click', function () {


                                if (!$(this).hasClass('cat-active')) {
                                    var filteredC = $(this).attr('class');
                                    var filteredCat = '.' + filteredC;

                                    $('.all-projects-cats li').removeClass('cat-active');
                                    $(this).addClass('cat-active');

                                    var allProjects = $('.all-projects').find('.project');

                                    var allPvisible = $('.all-projects').find('.project:visible');

                                    var apDelay = (allPvisible.length * 50 + 300);


                                    allProjects.each(function (i, element) {

                                        var $this = $(this);

                                        $(element).delay(i * 50).queue(function (next) {
                                            $this.addClass('up');
                                            next();
                                        });

                                        setTimeout(function () {

                                            if ($this.hasClass(filteredC)) {

                                                $this.css('display', 'block')
                                                $this.addClass('ready')

                                            } else {

                                                $this.css('display', 'none')

                                            }

                                        }, apDelay)


                                    });


                                    setTimeout(function () {

                                        $('.ready').each(function (i, element) {
                                            $(element).delay(i * 50).queue(function (next) {
                                                $(this).removeClass('up ready')
                                                next();
                                            });


                                        })

                                    }, apDelay + 20)

                                }

                            });


                            $('.project').on('mouseenter', function () {

                                if ($(this).hasClass('light')) {
                                    $('.portfolio-showcase').addClass('light-init')
                                }

                                var showImage = $(this).data('image');
                                $(showImage).addClass('image-show');

                                $('.project').addClass('project-hidden');
                                $(this).removeClass('project-hidden');



                            });

                            $('.project').on('mouseleave', function () {

                                $('.project').removeClass('project-hidden');


                                $('.pe-project-image').removeClass('image-show');
                                $('.all-project-meta').removeClass('image-show');

                                $('.portfolio-showcase').removeClass('light-init')


                            });


                        }
                        /*All Projects */

                        /* Horizontal */
                        if ($('.cygni-horizontal').length > 0) {

                            $('.cygni-horizontal').prepend('<span class="hor-ov"></span><span class="hor-ov"></span><span class="hor-ov"></span>')

                            $('.line').addClass('line-arange');


                            var horTitle = $('.cygni-horizontal .title');
                            horTitle.each(function () {
                                $(this).wrapInner('<span></span>')

                            })


                            $('.cygni-horizontal-images').addClass('swiper-container');
                            $('.cygni-horizontal-images').append('<div class="swiper-wrapper"></div>');

                            $('.horizontal-item').each(function (i) {

                                var horIndex = i + 1;

                                $(this).attr('data-index', horIndex)

                                var horTitle = $(this).find('.title').text();
                                $(this).find('.title').attr('data-hover', horTitle)


                                if ($(this).find('video').length > 0) {

                                    var vidSt = $(this).find('.horizontal-image').html();

                                    var horWrapper = $('.cygni-horizontal-images .swiper-wrapper');

                                    horWrapper.append('<div class="swiper-slide"><div class="horizontal-image-wrapper"><div class="slide-bgimg">' + vidSt + '</div></div></div>')

                                } else {

                                    var imgUrl = $(this).find('.horizontal-image img').attr('src');

                                    var horWrapper = $('.cygni-horizontal-images .swiper-wrapper');

                                    horWrapper.append('<div class="swiper-slide"><div class="horizontal-image-wrapper"><div class="slide-bgimg"><img src="' + imgUrl + '"></div></div></div>')

                                }


                            })

                            var interleaveOffset = 0.5;

                            var horImages = new Swiper('.cygni-horizontal-images', {
                                mousewheel: {
                                    invert: false,
                                },
                                slidesPerView: 1,

                                speed: 800,
                                parallax: true,
                                watchSlidesProgress: true,
                                on: {


                                    progress: function () {
                                        let swiper = this;
                                        for (let i = 0; i < swiper.slides.length; i++) {
                                            let slideProgress = swiper.slides[i].progress,
                                                innerOffset = swiper.width * interleaveOffset,
                                                innerTranslate = slideProgress * innerOffset;

                                            swiper.slides[i].querySelector(".slide-bgimg").style.transform =
                                                "translateX(" + innerTranslate + "px)";


                                        }
                                    },
                                    setTransition: function (speed) {
                                        let swiper = this;
                                        for (let i = 0; i < swiper.slides.length; i++) {
                                            swiper.slides[i].style.transition = speed + "ms";
                                            swiper.slides[i].querySelector(".slide-bgimg").style.transition =
                                                speed + "ms";
                                        }
                                    },




                                }


                            });

                            $('.cygni-horizontal-titles .swiper-slide').each(function () {

                                var chTitle = $(this).find('.title').outerWidth();

                                $(this).css('width', chTitle)

                            });


                            var horTitles = new Swiper('.cygni-horizontal-titles', {
                                mousewheel: {
                                    invert: false,
                                },
                                slidesPerView: 'auto',
                                spaceBetween: 200,
                                speed: 800,
                                navigation: {
                                    nextEl: '.horizontal-next',
                                    prevEl: '.horizontal-prev',
                                },
                                touchRatio: 4,
                                centeredSlides: true,
                                slideClass: 'horizontal-item',
                                wrapperClass: 'horizontal-wrapper',
                                containerClass: 'cygni-horizontal-titles',
                                pagination: {
                                    el: '.horizontal-progress',
                                    type: 'progressbar',

                                    renderProgressbar: function (progressbarFillClass) {
                                        return '<span class="hor-current">1</span>' +
                                            '<span class="' + progressbarFillClass + '"></span>' +
                                            '<span class="hor-total"></span>';
                                    }
                                }

                            });



                            var totIndex = $('.horizontal-item').length;

                            $('.hor-total').text(totIndex);
                            $('.hor-total').prepend('0');


                            var projectURL = $('.horizontal-item.swiper-slide-active').find('.project-url').attr('href');

                            $('.horizontal-project-link a').attr('href', projectURL);

                            horTitles.on('slideChangeTransitionEnd', function () {
                                var projectURL = $('.horizontal-item.swiper-slide-active').find('.project-url').attr('href');

                                $('.horizontal-project-link a').attr('href', projectURL);

                            })

                            $('.hor-current').prepend('0')

                            horTitles.on('slideChangeTransitionEnd', function () {

                                var currentIndex = $('.swiper-slide-active').data('index');


                                $('.hor-current').text(currentIndex)
                                $('.hor-current').prepend('0')


                            });


                            horTitles.controller.control = horImages
                            horImages.controller.control = horTitles




                            loadingAn.finished.then(function () {

                                /* Horizontal Opening */

                                setTimeout(function () {

                                    $('.cygni-horizontal-titles .title span').each(function (i, element) {
                                        $(element).delay(i * 175).queue(function (next) {
                                            $(this).addClass('anim-in');
                                            next();
                                        });
                                    });

                                    $('.cygni-horizontal-images').addClass('init')


                                }, 250)

                                setTimeout(function () {

                                    $('.site-branding img ').addClass('logo-in');

                                    $('.toggle-line').addClass('toggle-line-in');

                                    $('.hor-ov').addClass('anim-in')


                                }, 1250);


                                setTimeout(function () {

                                    $('.cygni-horizontal-titles').addClass('hor-init');
                                    $('.horizontal-progress, .horizontal-project-link, .horizontal-pagination').addClass('anim-in')

                                }, 1650);

                                /* Horizontal Opening */

                            });

                        }
                        /* Horizontal */

                        /* Wall Start */
                        if ($('.wall-wrapper').length > 0) {


                            $('.title, .category').each(function () {
                                var ptText = $(this).wrapInner('<span></span>')

                            })

                            $('.wall-project a').on('mouseenter', function () {
                                $('.wall-project').addClass('pw-op');
                                $(this).parent('.wall-project').removeClass('pw-op')


                            });

                            $('.wall-project a').on('mouseleave', function () {
                                $('.wall-project').removeClass('pw-op');


                            });


                        };
                        /* Wall End */

                        /* Grid */
                        if ($('.portfolio-grid').length) {

                            $('.grid-project').each(function (i) {
                                i++

                                while (i >= 6) {
                                    i = i - 5
                                }

                                $(this).addClass('width-' + i)


                            })

                            $('.grid-project-cat, .grid-project-title, .grid-project-index').each(function () {

                                $(this).wrapInner('<span></span>')

                            })


                            var $pgrid = $('.portfolio-grid').masonry({
                                itemSelector: '.grid-project',
                                columnWidth: '.pg-sizer',
                                gutter: 0,
                                percentPosition: true
                            });

                            // layout Masonry after each image loads
                            $pgrid.imagesLoaded().progress(function () {
                                $pgrid.masonry('layout');


                                $('.width-1').each(function () {

                                    var w1 = $(this);
                                    var next3 = w1.nextAll('.width-3').first();
                                    var mb = next3.outerHeight();

                                    w1.css({
                                        marginBottom: mb / 2
                                    })

                                })

                                $('.width-3').each(function () {

                                    var w3 = $(this);
                                    var next5 = w3.nextAll('.width-5').first();
                                    var w3h = w3.outerHeight();
                                    var mb = next5.outerHeight();

                                    w3.css({
                                        marginBottom: mb
                                    })
                                })

                                $(".width-3").last().addClass("no-mar");

                                $('.width-5').each(function () {
                                    var w5 = $(this);
                                    var prev3 = w5.prevAll('.width-3').first();

                                    var mt = prev3.outerHeight();

                                    w5.css({
                                        marginTop: mt / 2
                                    })

                                })

                                $('.width-2').each(function () {

                                    var w2 = $(this);
                                    var prev1 = w2.prevAll('.width-1').first();
                                    var mt = prev1.outerHeight();

                                    w2.css({
                                        marginTop: mt / 2
                                    })
                                })



                            });

                        }
                        /* Grid */

                        /* Detailed */
                        if ($('.detailed').length) {

                            $('.plus-button a').prepend('<span class="line-s"></span><span class="line-s"></span>')

                            var projectURL = $('.detailed-project:nth-child(1)').find('a').attr('href');

                            $('.detailed-button').wrapInner('<a href="' + projectURL + '"><p></p></a>');
                            $('.detailed-button').prepend('<span></span><span></span><span></span><span></span>')


                            $('.plus-button a').on('mouseenter', function () {

                                $(this).parent('.plus-button').addClass('pb-active');

                            });

                            $('.plus-button').on('mouseleave', function () {
                                $(this).removeClass('pb-active')
                            });

                            $('.detailed-images').prepend('<div class="swiper-wrapper"></div>')

                            $('.detailed-project').each(function (i) {

                                i++
                                $(this).addClass('project-' + i);

                                var projectImage = $(this).find('.project-image').html();

                                $('.detailed-images .swiper-wrapper').append('<div class="swiper-slide" data-slide="' + i + '"><div class="detailed-image"><div class="slide-bgimg">' + projectImage + '</div></div></div>')

                            });

                            $('.big-slide-button').wrapInner('<a href="#" class="project-url"><p class="bsb-link"><p></a>')
                            $('.big-slide-button .project-url').prepend('<span></span><span></span><span></span><span></span>')



                            var interleaveOffset = 0.7;

                            var detailedImages = new Swiper('.detailed-images', {
                                mousewheel: {
                                    invert: false,
                                    eventsTarged: '.detailed-portfolios'
                                },
                                navigation: {
                                    nextEl: '.detailed-next',
                                    prevEl: '.detailed-prev',
                                },
                                pagination: {
                                    el: '.detailed-dots',
                                    type: 'bullets',
                                    clickable: true,
                                    bulletClass: 'detailed-dot',
                                    bulletActiveClass: 'dot-index-active',
                                    renderBullet: function (index, className) {
                                        return ' <span class="' + className + '"><span class="dot-index">0' + (index + 1) + '</span></span>'
                                    },
                                },
                                slidesPerView: 1,
                                direction: 'vertical',
                                speed: 1200,
                                parallax: true,
                                watchSlidesProgress: true,
                                on: {
                                    init: function () {

                                        var dtPSelect = $('.swiper-slide-active').data('slide');
                                        var dtPvis = '.project-' + dtPSelect;

                                        $(dtPvis).addClass('dp-active');

                                        $('.project-year, .project-category, .project-excerpt').wrapInner('<span></span>')

                                        $('.project-title').each(function () {

                                            $(this).splitLines({
                                                tag: '<div><span class="dpt-line"></div>',
                                                keepHtml: true,
                                            });

                                        });

                                    },

                                    progress: function () {
                                        let swiper = this;
                                        for (let i = 0; i < swiper.slides.length; i++) {
                                            let slideProgress = swiper.slides[i].progress,
                                                innerOffset = swiper.width * interleaveOffset,
                                                innerTranslate = slideProgress * innerOffset;

                                            swiper.slides[i].querySelector(".slide-bgimg").style.transform =
                                                "translateY(" + innerTranslate + "px)";


                                        }
                                    },
                                    setTransition: function (speed) {
                                        let swiper = this;
                                        for (let i = 0; i < swiper.slides.length; i++) {
                                            swiper.slides[i].style.transition = speed + "ms";
                                            swiper.slides[i].querySelector(".slide-bgimg").style.transition =
                                                speed + "ms";
                                        }
                                    },


                                    slideNextTransitionStart: function () {

                                        var dtNextOut = anime({
                                            autoplay: false,
                                            loop: false,
                                            translateX: [0, 25],
                                            opacity: [1, 0],
                                            easing: "easeInCubic",
                                            duration: 600,
                                            targets: '.dp-active .project-title > div, .dp-active .project-year span, .dp-active .project-excerpt span, .dp-active .project-meta, .dp-active .project-category span',
                                            delay: anime.stagger(50, {
                                                from: 'last'
                                            })

                                        });



                                        dtNextOut.restart();



                                    },

                                    slideNextTransitionEnd: function () {
                                        var dtNextIn = anime({
                                            autoplay: false,
                                            loop: false,
                                            translateX: [-25, 0],
                                            opacity: [0, 1],
                                            easing: "easeOutCubic",
                                            duration: 600,
                                            targets: '.dp-active .project-title > div, .dp-active .project-year span, .dp-active .project-excerpt span, .dp-active .project-meta, .dp-active .project-category span',
                                            delay: anime.stagger(50)

                                        });
                                        dtNextIn.restart();

                                    },

                                    slidePrevTransitionStart: function () {

                                        var dtPrevOut = anime({
                                            autoplay: false,
                                            loop: false,
                                            translateX: [0, -25],
                                            opacity: [1, 0],
                                            easing: "easeInCubic",
                                            duration: 600,
                                            targets: '.dp-active .project-title > div, .dp-active .project-year span, .dp-active .project-excerpt span, .dp-active .project-meta, .dp-active .project-category span',
                                            delay: anime.stagger(50, {
                                                from: 'last'
                                            })
                                        });
                                        dtPrevOut.restart()


                                    },
                                    slidePrevTransitionEnd: function () {

                                        var dtPrevIn = anime({
                                            autoplay: false,
                                            loop: false,
                                            translateX: [25, 0],
                                            opacity: [0, 1],
                                            easing: "easeOutCubic",
                                            duration: 600,
                                            targets: '.dp-active .project-title > div, .dp-active .project-year span, .dp-active .project-excerpt span, .dp-active .project-meta, .dp-active .project-category span',
                                            delay: anime.stagger(50)

                                        });

                                        dtPrevIn.restart();
                                    },

                                    transitionEnd: function () {

                                        $('.detailed-project').removeClass('dp-active');
                                        var activeIndex = $('.swiper-slide-active').data('slide');
                                        var dptAcive = '.project-' + activeIndex;

                                        $(dptAcive).addClass('dp-active');

                                        $('.detailed-fraction .current').html('0' + activeIndex);

                                        var projectURL = $(dptAcive).find('a').attr('href')

                                        $('.detailed-button a').attr('href', projectURL)


                                    }

                                }

                            });

                            var totIndex = $('.detailed-dot').length;

                            $('.detailed-fraction .total').html('0' + totIndex);


                        }
                        /* Detailed */

                        ///////////// Showcase Layouts /////////////

                        ///////////// Single Project Page /////////////
                        if ($('.single-project').length > 0) {

                            $('.site-footer').addClass('project-footer');

                            var psp = $('.single-project');

                            var pspImage = psp.find('.project-image');

                            pspImage.prepend('<span class="pi-ov pi-ov-1"></span><span class="pi-ov pi-ov-2"></span><span class="pi-ov pi-ov-3"></span> <span class="pi-ov pi-ov-4"></span>');


                            if (dataBackground != null) {

                                $('.pi-ov').css('background', dataBackground);

                            };


                            loadingAn.finished.then(function () {

                                /* Project Page Opening */


                                var psp = $('.single-project');

                                var pspImage = psp.find('.project-image');


                                $('.pi-ov').addClass('pi-ov-in')

                                /* Project Page Opening */


                            });



                        } else {
                            $('.site-footer').removeClass('project-footer');
                        }
                        ///////////// Single Project Page /////////////


                        ///////////// Blog Posts Page /////////////
                        if ($('.pe-blog-posts').length > 0) {

                            $('.pe-blog-posts').masonry({
                                itemSelector: '.pe-post',
                                columnWidth: '.pe-blog-sizer',
                                gutter: '.pe-blog-gutter',
                                stamp: '.pe-blog-stamp',
                                percentPosition: true
                            });

                            $(window).on('scroll', function () {

                                var cako = $(window).scrollTop() / 10;

                                $('.j-back').css({
                                    transform: 'translatex(-' + cako + 'px)',
                                })

                            });


                            loadingAn.finished.then(function () {


                                /* Journal Opening */

                                $('.j-back').addClass('anim-in')

                                setTimeout(function () {

                                    $('.pe-post').each(function (i, element) {
                                        $(element).delay(i * 200).queue(function (next) {
                                            $(this).addClass('anim-in');
                                            next();
                                        });
                                    });
                                }, 500)



                                setTimeout(function () {
                                    $('.site-branding img ').addClass('logo-in');

                                }, 800)

                                setTimeout(function () {
                                    $('.toggle-line').addClass('toggle-line-in');

                                }, 1300)


                                /* Journal Opening */

                            });



                        };

                        if ($('.pe-single-post').length) {
                            $('.site-footer').addClass('blog-footer');

                        } else {
                            $('.site-footer').removeClass('blog-footer');
                        };
                        ///////////// Blog Posts Page /////////////

                        ///////////// Page Build Elements /////////////
                        /* Embed Video*/
                        if ($('.pe-embed-video').length > 0) {

                            $('.pe-embed-video').append('<span class="pe-video-play"><i class="icon-play"></i></span><span class="pe-video-overlay"></span>')

                            const cVideo = new Plyr('.pe-video', {
                                controls: ["play-large",
                            "play",
                            "progress",
                            "duration",
                            "mute",
                            "volume",
                            "fullscreen"
                        ],
                                autoplay: true,
                                muted: true,
                                volume: 0,
                                quality: {
                                    default: 1080
                                },
                                loop: {
                                    active: true
                                },

                            });

                            $('.pe-video-play').on('click', function () {
                                $(this).fadeOut(500);
                                $('.pe-video-overlay').fadeOut(500);
                                cVideo.restart();
                                cVideo.increaseVolume(1);

                            });

                            window.cVideo = cVideo;
                        };
                        if ($('.pe-video-style-2').length > 0) {

                            const cVideo2 = new Plyr('.pe-video-2', {
                                controls: ["play-large",
                            "play",
                            "progress",
                            "duration",
                            "mute",
                            "volume",
                            "fullscreen"
                        ],

                            });

                            $('.icon-play').on('click', function () {

                                var videoPlay = $(this).parent('.video-control');
                                videoPlay.addClass('controls-gone');
                                cVideo2.play();
                                cVideo2.increaseVolume(1);
                            });

                            window.cVideo2 = cVideo2;

                        };
                        /* Embed Video*/

                        /* Image Wrapper */
                        if ($('.image-wrapper').length > 0) {


                            $('.image-wrapper').each(function () {


                                var imImg = $(this).find('img');

                                /*    if ($(this).hasClass('parallax-image')) {
                                        var piOffset = $(this).offset();


                                        var screenHeight = $(window).outerHeight();
                                        var parallaxHeight = $(this).outerHeight();
                                        var paStart = piOffset.top - screenHeight;
                                        var paEnd = piOffset.top + parallaxHeight;

                                        var maxTrans = 'calc(100% + ' + ((paEnd - paStart) / 5) + 'px)'

                                        imImg.css('height', maxTrans)


                                        $(window).on('scroll', function () {

                                            var scrollPos = $(window).scrollTop();

                                            var pralalxVal = (scrollPos - paStart) / 5;

                                            if ((scrollPos > paStart) && (scrollPos < paEnd)) {

                                                imImg.css('-moz-transform', 'translatey(-' + pralalxVal + 'px)')
                                                imImg.css('-webkit-transform', 'translatey(-' + pralalxVal + 'px)')

                                            }
                                        })

                                    } */


                                var imwDelay = $(this).data('delay');


                                if ($(this).hasClass('has-animation')) {


                                    var imwHeight = $(this).outerHeight();



                                    $(this).css({
                                        transitionDelay: '0s',
                                        height: imwHeight + 'px'
                                    })


                                    imImg.css('position', 'absolute');

                                    if (($(this).hasClass('slide-left')) || ($(this).hasClass('slide-right'))) {

                                        imImg.css('width', 'unset')

                                    }

                                    $(this).wrapInner('<div class="slide-anim-holder"></div>');


                                    if (imwDelay !== null) {

                                        $('.slide-anim-holder').css({
                                            transitionDelay: imwDelay + 's'
                                        })

                                    }


                                    var saHolder = $(this).find('.slide-anim-holder');
                                    saHolder.addClass('sa-ready')

                                }

                                if ($(this).hasClass('image-lightbox')) {

                                    ////////// Image Lightbox Start //////////

                                    var dataMfpSrc = imImg.attr('src');

                                    imImg.attr('data-mfp-src', dataMfpSrc);

                                    $('.image-lightbox').magnificPopup({
                                        delegate: 'img', // child items selector, by clicking on it popup will open
                                        type: 'image',
                                        closeOnContentClick: true,
                                        closeBtnInside: false,
                                        mainClass: 'image-lightbox', // class to remove default margin from left and right side
                                        image: {
                                            verticalFit: true
                                        },
                                        zoom: {
                                            enabled: true,
                                            duration: 300 // don't foget to change the duration also in CSS
                                        },

                                        // other options
                                    });

                                    ////////// Image Lightbox End //////////


                                }



                            });





                        }
                        /* Image Wrapper */

                        /* Image Carousel */
                        if ($('.pe-carousel').length > 0) {
                            var peCarousel = new Swiper('.pe-carousel', {
                                centeredSlides: true,
                                slidesPerView: 2,
                                spaceBetween: 50,
                                speed: 1500,
                                grabCursor: true

                            });
                        }
                        /* Image Carousel */

                        /* Accordion */
                        if ($('.c-accordion').length > 0) {

                            $('.accordion-title').each(function (i) {


                                var acTitle = $(this);

                                acTitle.attr('data-scroll', true)

                                $('.accordion-content').hide();


                                if (i < 10) {
                                    var dataIn = '0' + (i + 1);
                                };

                                if (i > 9) {
                                    var dataIn = i + 1;
                                };

                                acTitle.attr('data-index', dataIn);

                                acTitle.on('click', function () {


                                    var acContent = acTitle.find('.accordion-content');

                                    if (acContent.hasClass('ac-active')) {
                                        acContent.slideUp(500);
                                        acContent.removeClass('ac-active');
                                    } else {
                                        $('.accordion-content').slideUp(500);
                                        $('.accordion-content').removeClass('ac-active');

                                        acContent.slideDown(500);
                                        acContent.addClass('ac-active');


                                    }



                                });


                            })

                        };
                        /* Accordion */

                        /* Page Nav */
                        if ($('.page-nav').length > 0) {

                            $('.page-nav').each(function () {
                                var lp = $(this).find('.lp-title');
                                var lpT = lp.text();
                                lp.attr('data-hover', lpT)

                            });


                        };
                        /* Page Nav */

                        /* Team Member */
                        if ($('.team-member').length > 0) {
                            $('.team-member').each(function () {
                                var tmName = $(this).find('.team-member-name');
                                var tmPos = $(this).find('.team-member-pos')

                                tmName.wrapInner('<span></span>');
                                tmPos.wrapInner('<span></span>');

                            })

                        }
                        /* Team Member */

                        /* Form */
                        if ($('.c-form').length > 0) {

                            $('.c-form').each(function () {

                                var input = $(this).find('input, textarea');
                                var field = $(this).find('.field-wrap, .message-wrap');

                                input.on('focus', function () {

                                    var inputActive = $(this);

                                    var activeField = inputActive.parent('div');


                                    activeField.addClass('field-active')

                                });

                                input.on('focusout', function () {
                                    field.removeClass('field-active')
                                })


                            });

                        }
                        /* Form */

                        /* Sectıon */
                        $('.section').each(function () {

                            var section = $(this);

                            var secBg = section.data('background');

                            if (secBg != null) {

                                section.addClass('has-bg');

                                section.prepend('<div class="section-bg-ovs"><span class="sec-bg-ov"></span><span class="sec-bg-ov"></span><span class="sec-bg-ov"></span><span class="sec-bg-ov"></span></div>');

                                var secBgOvs = section.find('.section-bg-ovs');

                                var secBgOv = section.find('.sec-bg-ov');

                                secBgOv.css('backgroundColor', secBg);

                            }

                        });
                        /* Sectıon */

                        ///////////// Page Build Elements /////////////


                        ///////////////////////////////////////////// Site Scripts /////////////////////////////////////////////


                    });
                }
            },

            onAfter: function ($container, $newContent) {


                if ($('.menu-toggle').hasClass('is-active')) {

                    $('.menu-ov').removeClass('menu-ov-in');
                    $('.menu-toggle').removeClass('is-active');


                    setTimeout(function () {
                        $('.site-header').removeClass('dark-nav-active light-nav-active')

                    }, 380);

                    ptText.play();

                } else {

                    ptOv.play();

                    ptText.play();

                }



                setTimeout(function () {

                    var peScroll = new LocomotiveScroll({
                        el: document.querySelector('#main'),
                        smooth: false,

                    });

                    window.peScroll = peScroll;

                }, 1100);

                if ($('.portfolio-showcase').length < 1) {

                    $('body').css('overflow', 'auto')

                    setTimeout(function () {

                        $('.toggle-line').addClass('toggle-line-in');
                    }, 1500)

                    setTimeout(function () {

                        $('.site-branding img ').addClass('logo-in');
                    }, 1900)

                }


                setTimeout(function () {

                    $('.menu-item-active').addClass('menu-item-hover');

                }, 1000);

                /* Big Slider Opening */
                if ($('.big-slider').length > 0) {

                    $('.portfolio-showcase').removeClass('loading')

                    setTimeout(function () {


                    }, 800)


                    setTimeout(function () {
                        $('.big-slide-pag i').addClass('anim-in')

                    }, 1500);

                    setTimeout(function () {

                        $('.bs-bullets .swiper-pagination-bullet').each(function (i, element) {
                            $(element).delay(i * 200).queue(function (next) {
                                $(this).addClass('anim-in');
                                next();
                            });
                        });


                    }, 1250);

                    setTimeout(function () {
                        $('.site-branding img ').addClass('logo-in');
                    }, 1500);

                    setTimeout(function () {
                        $('.toggle-line').addClass('toggle-line-in');
                    }, 2000);


                };
                /* Big Slider Opening */

                /* Horizontal Opening */
                if ($('.cygni-horizontal').length > 0) {

                    setTimeout(function () {

                        $('.cygni-horizontal-titles .title span').each(function (i, element) {
                            $(element).delay(i * 175).queue(function (next) {
                                $(this).addClass('anim-in');
                                next();
                            });
                        });

                        $('.cygni-horizontal-images').addClass('init')


                    }, 250)

                    setTimeout(function () {

                        $('.site-branding img ').addClass('logo-in');

                        $('.toggle-line').addClass('toggle-line-in');

                        $('.hor-ov').addClass('anim-in')


                    }, 1250);


                    setTimeout(function () {

                        $('.cygni-horizontal-titles').addClass('hor-init');
                        $('.horizontal-progress, .horizontal-project-link, .horizontal-pagination').addClass('anim-in')

                    }, 1650);


                }
                /* Horizontal Opening */

                /* Detailed Opening */
                if ($('.detailed').length > 0) {


                    var dtLoaded = anime({
                        autoplay: false,
                        loop: false,
                        translateX: [-25, 0],
                        opacity: [0, 1],
                        easing: "easeOutCubic",
                        duration: 1000,
                        targets: '.project-year span, .project-excerpt span, .project-meta, .project-category span',
                        delay: anime.stagger(50)

                    });

                    var dtTitleLoaded = anime({
                        autoplay: false,
                        loop: false,
                        translateX: [-50, 0],
                        opacity: [0, 1],
                        easing: "easeOutCubic",
                        duration: 1000,
                        targets: '.project-title > div',
                        delay: anime.stagger(100)

                    });

                    dtTitleLoaded.play();

                    setTimeout(function () {


                        $('.detailed').addClass('dt-loaded');
                    }, 500);




                    setTimeout(function () {
                        dtLoaded.play();

                        $('.detailed-dot').each(function (i, element) {
                            $(element).delay(i * 175).queue(function (next) {
                                $(this).addClass('dot-in');
                                next();
                            });
                        });

                    }, 1500);

                    setTimeout(function () {

                        $('.detailed-button').addClass('db-loaded');
                        $('.plus-button').addClass('pb-in');

                    }, 2500)

                    setTimeout(function () {

                        $('.site-branding img ').addClass('logo-in');
                        $('.toggle-line').addClass('toggle-line-in');

                    }, 2000);

                }
                /* Detailed Opening */



                /* Wall Opening */
                if ($('.wall').length > 0) {
                    $('.overlay').addClass('overlay-ch-out');

                    setTimeout(function () {

                        $('.wall-project').each(function (i, element) {
                            $(element).delay(i * 100).queue(function (next) {
                                $(this).addClass('project-in');
                                next();
                            });
                        });

                    }, 200);

                    setTimeout(function () {
                        $('.site-branding img ').addClass('logo-in');
                    }, 1500);

                    setTimeout(function () {
                        $('.toggle-line').addClass('toggle-line-in');


                    }, 2000);

                    setTimeout(function () {

                        $('.fullscreen-footer a').each(function (i, element) {
                            $(element).delay(i * 75).queue(function (next) {
                                $(this).addClass('span-in');
                                next();
                            });
                        });


                    }, 1650);

                }
                /* Wall Opening */

                /* List Carousel Opening */
                if ($('.list-carousel').length > 0) {

                    setTimeout(function () {

                        $('.list-image').each(function (i, element) {
                            $(element).delay(i * 250).queue(function (next) {
                                $(this).addClass('ino');
                                next();
                            });
                        });


                        $('.line').removeClass('line-arange')

                    }, 200);

                    setTimeout(function () {

                        $('.list-title').each(function (i, element) {
                            $(element).delay(i * 100).queue(function (next) {
                                $(this).addClass('ino');
                                next();
                            });
                        });


                    }, 1000);


                    setTimeout(function () {

                        $('.lc-prev i, .lc-next i').addClass('ino')
                        $('.lt-current, .lt-total').addClass('ino')
                    }, 1250);


                    setTimeout(function () {
                        $('.site-branding img ').addClass('logo-in');
                    }, 1500);

                    setTimeout(function () {
                        $('.toggle-line').addClass('toggle-line-in');

                        $('.list-carousel').addClass('list-init')

                    }, 2000);



                }
                /* List Carousel Opening */

                /* Filterable List Opening */
                if ($('.all-projects').length > 0) {
                    setTimeout(function () {

                        $('.all-projects .project').each(function (i, element) {
                            $(element).delay(i * 100).queue(function (next) {
                                $(this).removeClass('anim-ready');
                                next();
                            });
                        });

                    }, 300);

                    setTimeout(function () {

                        $('.all-projects-cats li span').each(function (i, element) {
                            $(element).delay(i * 100).queue(function (next) {
                                $(this).removeClass('anim-ready');
                                next();
                            });
                        });

                    }, 800);

                    setTimeout(function () {
                        $('.site-branding img ').addClass('logo-in');



                    }, 1200);

                    setTimeout(function () {
                        $('.toggle-line').addClass('toggle-line-in');

                        $('.fullscreen-footer a').each(function (i, element) {
                            $(element).delay(i * 15).queue(function (next) {
                                $(this).addClass('span-in');
                                next();
                            });
                        });
                        $('.all-projects-cats').addClass('all-init');


                    }, 1600);



                }
                /* Filterable List Opening */

                /* Vertical Opening */
                if ($('.vertical-projects').length > 0) {

                    setTimeout(function () {
                        var verticalScroll = new LocomotiveScroll({
                            el: document.querySelector('.vertical-projects'),
                            smooth: true,
                            offset: ['10%', 0],
                        });

                        window.verticalScroll = verticalScroll;

                    }, 250);

                    setTimeout(function () {
                        $('.site-branding img ').addClass('logo-in');
                    }, 1000);

                    setTimeout(function () {
                        $('.toggle-line').addClass('toggle-line-in');

                        $('.vertical-projects').addClass('vertical-init')
                    }, 1500);


                }
                /* Vertical Opening */

                /* Journal Opening */
                if ($('.pe-blog-posts').length > 0) {



                    $('.j-back').addClass('anim-in')

                    setTimeout(function () {

                        $('.pe-post').each(function (i, element) {
                            $(element).delay(i * 200).queue(function (next) {
                                $(this).addClass('anim-in');
                                next();
                            });
                        });
                    }, 500)



                    setTimeout(function () {
                        $('.site-branding img ').addClass('logo-in');

                    }, 800)

                    setTimeout(function () {
                        $('.toggle-line').addClass('toggle-line-in');

                    }, 1300)



                }
                /* Journal Opening */

                /* Project Page Opening */
                if ($('.single-project').length > 0) {

                    var psp = $('.single-project');

                    var pspImage = psp.find('.project-image');


                    $('.pi-ov').addClass('pi-ov-in')





                }
                /* Project Page Opening */

            }


        },
        smoothState = $('#main').smoothState(options).data('smoothState');


    $('.menu a').not('.no-trans').click(function (e) {
        e.preventDefault();
        var content = $('#main').smoothState().data('smoothState');
        var href = $(this).attr('href');
        content.load(href);
    });


});
