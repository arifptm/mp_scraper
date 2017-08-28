jQuery(function($) {

	"use strict";
		
		
	/**
	 * introLoader - Preloader
	 */
	$("#introLoader").introLoader({
		animation: {
			name: 'gifLoader',
			options: {
				ease: "easeInOutCirc",
				style: 'dark bubble',
				delayBefore: 0,
				delayAfter: 0,
				exitTime: 150
			}
		}
	});	
	

	/**
	* Sticky Header
	*/
	$(".container-wrapper").waypoint(function() {
		$(".navbar").toggleClass("navbar-sticky");
		return false;
	}, { offset: "-20px" });
	
	
	/**
	 * Main Menu Slide Down Effect
	 */
	 
	// Mouse-enter dropdown
	$('#navbar li').on("mouseenter", function() {
			$(this).find('ul').first().stop(true, true).delay(350).slideDown(500, 'easeInOutQuad');
	});

	// Mouse-leave dropdown
	$('#navbar li').on("mouseleave", function() {
			$(this).find('ul').first().stop(true, true).delay(100).slideUp(150, 'easeInOutQuad');
	});
	
	
	/**
	 * Icon Change on Collapse
	 */
	$('.collapse.in').prev('.panel-heading').addClass('active');
	$('.bootstarp-accordion, .bootstarp-accordion')
	.on('show.bs.collapse', function(a) {
		$(a.target).prev('.panel-heading').addClass('active');
	})
	.on('hide.bs.collapse', function(a) {
		$(a.target).prev('.panel-heading').removeClass('active');
	});
		
		
	/**
	 * Slicknav - a Mobile Menu
	 */
	var $slicknav_label;
	$('#responsive-menu').slicknav({
		duration: 500,
		easingOpen: 'easeInExpo',
		easingClose: 'easeOutExpo',
		closedSymbol: '<i class="fa fa-plus"></i>',
		openedSymbol: '<i class="fa fa-minus"></i>',
		prependTo: '#slicknav-mobile',
		allowParentLinks: true,
		label:"" ,
	});
	
	
	/**
	 * Effect to Bootstrap Dropdown
	 */
	$('.bt-dropdown-click').on('show.bs.dropdown', function(e) {   
		$(this).find('.dropdown-menu').first().stop(true, true).slideDown(500, 'easeInOutQuad'); 
	}); 
	$('.bt-dropdown-click').on('hide.bs.dropdown', function(e) { 
		$(this).find('.dropdown-menu').first().stop(true, true).slideUp(250, 'easeInOutQuad'); 
	});
	 
	 
	/**
	* Background changes on focusing div by .addclass method
	*/
	$(".bg-change-focus-addclass").on("focusin", function() {
		$(this).addClass("focus");
	}).on("focusout", function() {
		$(this).removeClass("focus");
	});

	
	/**
	 * Another Bootstrap Toggle
	 */
	$('.another-toggle').each(function(){
		if( $('h4',this).hasClass('active') ){
			$(this).find('.another-toggle-content').show();
		}
	});
	$('.another-toggle h4').on("click",function() {
		if( $(this).hasClass('active') ){
			$(this).removeClass('active');
			$(this).next('.another-toggle-content').slideUp();
		} else {
			$(this).addClass('active');
			$(this).next('.another-toggle-content').slideDown();
		}
	});
	

	/**
	 *  Arrow for Menu has sub-menu
	 */
	/* if ($(window).width() > 992) {
		$(".navbar-arrow > ul > li").has("ul").children("a").append("<i class='arrow-indicator fa fa-angle-down'></i>");
	} */
	
	if ($(window).width() > 992) {
		$(".navbar-arrow ul ul > li").has("ul").children("a").append("<i class='arrow-indicator fa fa-angle-right'></i>");
	}


	/**
	 * Back To Top
	 */
	$(window).scroll(function(){
		if($(window).scrollTop() > 500){
			$("#back-to-top").fadeIn(200);
		} else{
			$("#back-to-top").fadeOut(200);
		}
	});
	$('#back-to-top').on("click",function() {
			$('html, body').animate({ scrollTop:0 }, '800');
			return false;
	});
	
	
	/**
	 * Button More-Less
	 */
	$('.btn-more-less').on("click",function() {
		$(this).text(function(i,old){
			return old=='Show more' ?  'Show less' : 'Show more';
		});
	});
	

	/**
	 *  Placeholder
	 */
	$("input, textarea").placeholder();


	/**
	 * Bootstrap tooltips
	 */
	 $('[data-toggle="tooltip"]').tooltip();
	
	
	/**
	 * Instagram
	 */
	function createPhotoElement(photo) {
		var innerHtml = $('<img>')
		.addClass('instagram-image')
		.attr('src', photo.images.thumbnail.url);

		innerHtml = $('<a>')
		.attr('target', '_blank')
		.attr('href', photo.link)
		.append(innerHtml);

		return $('<div>')
		.addClass('instagram-placeholder')
		.attr('id', photo.id)
		.append(innerHtml);
	}

	function didLoadInstagram(event, response) {
		var that = this;
		$.each(response.data, function(i, photo) {
		$(that).append(createPhotoElement(photo));
		});
	}

	$('#instagram').on('didLoadInstagram', didLoadInstagram);
	$('#instagram_long').on('didLoadInstagram', didLoadInstagram);

	/**
	* Easy AutoComplete
	*/
	var EasyAutocompleteCategoriesOptions = {
		url: "/qs/autocomplete.json",
		getValue: "name",
		list: {
			match: {
				enabled: true
			},
			maxNumberOfElements: 10
		}
	};
	$("#EasyAutocompleteCategories").easyAutocomplete(EasyAutocompleteCategoriesOptions);
	
	
	
	
	// JS init calling
	initSlider();
	initResponsiveGrid();
	
	
});

/**
* Slick Carousel and Slider
*/
function initSlider(){

	
	$('.slick-gallery-slideshow').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		speed: 500,
		arrows: true,
		fade: true,
		asNavFor: '.slick-gallery-nav'
	});
	$('.slick-gallery-nav').slick({
		slidesToShow: 7,
		slidesToScroll: 1,
		speed: 500,
		asNavFor: '.slick-gallery-slideshow',
		dots: false,
		centerMode: true,
		focusOnSelect: true,
		infinite: true,
		responsive: [
			{
			breakpoint: 1199,
			settings: {
				slidesToShow: 7,
				}
			}, 
			{
			breakpoint: 991,
			settings: {
				slidesToShow: 5,
				}
			}, 
			{
			breakpoint: 767,
			settings: {
				slidesToShow: 5,
				}
			}, 
			{
			breakpoint: 480,
			settings: {
				slidesToShow: 3,
				}
			}
		]
	});
	
}


/**
* Responsive Grid
*/
function initResponsiveGrid(){
	
	 $('.grid-wrapper').responsivegrid({
			itemSelector : '.grid-item',
			'breakpoints': {
				'desktop' : {
					'range' : '1200-',
					'options' : {
						'column' : 20,
						'gutter' : '20px',
					}
				},
				'tablet-landscape' : {
					'range' : '1000-1200',
					'options' : {
						'column' : 20,
						'gutter' : '20px',
					}
				},
				'tablet-portrate' : {
					'range' : '767-1000',
					'options' : {
						'column' : 20,
						'gutter' : '5px',
					}
				},
				'mobile' : {
					'range' : '-767',
					'options' : {
						'column' : 4,
						'itemHeight' : '50%',
						'gutter' : '15px',
					}
				},
			}
		});
}


/**
* PUNYAKU
*/

//* klik top search */
    $('#submit_top_search').on('click', 'a', function() {
        var popularkey = $(this).text();
        $('#EasyAutocompleteCategories').val(popularkey)   
        $('#searchform').submit()
    });


//* running blazy */
        ;(function() {
            // Initialize
            var bLazy = new Blazy();
        })();

//* redirect to seller */
        $('.on-sale').click(function(){
            $('#gotopage').data();
            
            $(".counter").text('3');

            var timer, num = 3;
            timer = setInterval(function() {
                num--;
                $(".counter").text(num);
                if (num <= 0) {
                    clearInterval(timer)
                    $(".counter").html('<span style="font-size:20px">Menuju'+$('.cats a:first').text()+'...</span>');
                    location.href = '/gotopage/'+$('.on-sale').attr('ref');
                }
            }, 1000);
        
            $('#gotopage').on('hidden.bs.modal', function () {
                clearInterval(timer);
            });
        });


//* redirect outbound */
        $('.detail-content .pane-se a').each(function(){            
            $(this).addClass('outbound')
            var url = $(this).attr('href')
            $(this).attr('href', '/redirect?url='+url);
        
        });

//* clean up lazada image description */
    	$(".detail-content div").each(function(){
    		$(this).removeAttr("style");
    	});
    	$(".detail-content img").each(function(){
    		$(this).removeClass("productlazyimage")
    		.addClass("img-responsive")
    		.removeAttr("style")
    		.attr('src', ($(this).attr('data-original')))
    		.removeAttr("data-original");
    	});
    	$("ul.prd-attributesList li").removeAttr('style');
    	$("span.more-desc-button").remove();
       
//* make tall image shown all */    
        $('.centro img, .leftro img').each(function() {
            if( $(this).prop("src", $(this).attr('data-src')).height() > $(this).prop("src", $(this).attr('data-src')).width()){                
                $(this).addClass('landscape')
            }
        });