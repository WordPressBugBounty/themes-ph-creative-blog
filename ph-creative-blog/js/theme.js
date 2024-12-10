jQuery(document).ready(function(){
	jQuery('.owl-carousel').owlCarousel({
		loop:true,
		margin:10,
		responsiveClass:true,
		autoplay:true,
		responsive:{
			0:{
				items:2,
			},
			600:{
				items:3,
				nav:false
			},
			1000:{
				items:5,
				margin:15,
			}
		}
	});
	
	//SIDR
	jQuery('#sidr-toggle').sidr({
		onOpen: function() { jQuery("#close-menu").focus(); console.log("openend");},
		onClose: function() { jQuery("#masthead-mobile .toggle-menu-hamburger").focus();}
	});  
		
	jQuery( '#close-menu' ).click(function () {
	  jQuery.sidr('close', 'sidr');
	});
	
	jQuery( '.search-toggle' ).click(function () {
		  jQuery.sidr('open', 'sidr');
		  jQuery('#sidr .search-field').focus();
		});
	
	//Keyboard Navigation for Phone
	jQuery('.go-to-top').focus(function(){
		jQuery("#close-menu").focus();
	});
	
	jQuery('.go-to-bottom').focus(function(){
		jQuery("#mobile-menu-sidr.menu li:last-of-type a").focus();
	});
	
	//Ticker
	jQuery('.my-news-ticker').AcmeTicker({
		type:'vertical',/*vertical/horizontal/Marquee/type*/
		direction: 'right',/*up/down/left/right*/
		speed:800,/*true/false/number*/ /*For vertical/horizontal 600*//*For marquee 0.05*//*For typewriter 50*/
		controls: {
			prev: jQuery('.acme-news-ticker-prev'),/*Can be used for vertical/horizontal/typewriter*//*not work for marquee*/
			next: jQuery('.acme-news-ticker-next'),/*Can be used for vertical/horizontal/typewriter*//*not work for marquee*/
			toggle: jQuery('.acme-news-ticker-pause')/*Can be used for vertical/horizontal/marquee/typewriter*/
		}
	});
}); 

jQuery(".search-icon").click(function(){
	jQuery(".search-form").css("visibility", "visible");
	jQuery(".search-icon").css("visibility", "hidden");
	jQuery("#cross-icon").css("visibility", "visible");
  });

jQuery("#cross-icon").click(function(){
	jQuery("#search-icon").css("visibility", "visible");
	jQuery("#cross-icon").css("visibility", "hidden");
	jQuery(".search-form").css("visibility", "hidden");
  });
	
	jQuery(document).ready(function() {
		jQuery(".fa-search").click(function(){  
			jQuery(".search-form-holder").slideToggle("slow");
			jQuery(this).toggleClass('fa-times');  
		});
	});
	
// Function to scroll to the top of the page
 // Function to scroll to the top of the page
 function phcreativeblogScrollToTop() {
	window.scrollTo({
		top: 0,
		behavior: 'smooth'
	});
	return false; // Prevent default anchor behavior
}

// Function to handle scroll event and toggle 'active' class for the back-to-top button
function phcreativeblogToggleBackToTop() {
	var backToTopBtn = document.querySelector('.backToTopBtn');
	if (window.scrollY > 500) {
		backToTopBtn.classList.add('active');
	} else {
		backToTopBtn.classList.remove('active');
	}
}

// When the document is loaded
document.addEventListener('DOMContentLoaded', function() {
	// Initially toggle back-to-top button
	phcreativeblogToggleBackToTop();

	// Add scroll event listener to toggle back-to-top button
	window.addEventListener('scroll', phcreativeblogToggleBackToTop);

	// Add click event listener to back-to-top button to scroll to top
	document.querySelector('.backToTopBtn').addEventListener('click', phcreativeblogScrollToTop);
});

var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    spaceBetween: 20,
    // Add other Swiper options as needed
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});
