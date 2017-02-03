//Iniciar metodos
initCustom = function(){
	previewGallery();
	removeCategoryBread();
};

removeCategoryBread = function()
{
	var ah = jQuery('.breadcrumbs a');
	jQuery.each(ah, function(x,y){
		var n = jQuery(y).attr('href').replace('/category', '');
		jQuery(y).attr('href', n);
	});
	
	jQuery('.page-template-blog .breadcrumbs').append('/ <span property="itemListElement" typeof="ListItem"><span property="name">Blog</span><meta property="position" content="2"></span>');
}

previewGallery = function()
{
	//Entradas
	jQuery('body').append('<div class="modal-gallery-overlay"></div><div class="modal-gallery"><div class="next"></div> <div class="prev"></div></div>');
	var blog = jQuery('.post-template-default.blog');
	var carousel = blog.find('.owl-carousel.awe_theme_courousel');
	var item = carousel.find('.item img');
	
	//Items
	jQuery.each(item, function(x,y){
		jQuery(y).click(function(){
			item.removeClass('active');
			jQuery(this).addClass('active');
			var url = 'url(' + jQuery(this).attr('src').split('-e')[0] + '.jpg)';
			blog.find('.modal-gallery-overlay').show();
			blog.find('.modal-gallery').hide().css({'backgroundImage': url}).fadeIn(1000);
		});
	});
	
	//Overlay y cerrar
	blog.find('.modal-gallery-overlay').click(function(){
		jQuery(this).fadeOut();
		blog.find('.modal-gallery').fadeOut();
	});
	
	//Next
	blog.find('.modal-gallery .next').click(function(){
		carousel.find('.active').parents('.owl-item').next().find('img').click();
	});
	
	//Prev
	blog.find('.modal-gallery .prev').click(function(){
		carousel.find('.active').parents('.owl-item').prev().find('img').click();
	});
};

//Load
jQuery(window).load(initCustom);