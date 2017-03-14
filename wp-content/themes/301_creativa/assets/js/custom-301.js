//Iniciar metodos
initCustom = function(){
    addBlogWid();
	previewGallery();
	removeCategoryBread();
	validateComment();
	printGolosina();
	eventSuscription();
    margenTopC();
};

jQuery('.list-category').hide();
jQuery('.btn-category').on('click', function(){
    jQuery('.list-category').slideToggle();
    jQuery(this).toggleClass('active')
})

addBlogWid = function(){
    jQuery('.widget_categories ul').append("<li><a href='/blog/'>Blog</a></li>");
}

margenTopC = function(){
    var topL = jQuery('body.single .blog-title-p').innerHeight();
    var medir = jQuery('body.single .widget_categories').css("marginTop",topL+110);
}

jQuery(window).resize(function(){
    margenTopC();
})

validateEmail = function(email) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

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

validateComment = function(){
    var commentform = jQuery('#commentform');
    commentform.append('<div id="comment-status" ></div>');
    var statusdiv = jQuery('#comment-status');
    
	commentform.submit(function(){
      var formdata = commentform.serialize();
      statusdiv.html('<p class="ajax-placeholder">Procesando...</p>');
      var formurl=commentform.attr('action');
      
	  jQuery.ajax({
        type: 'post',
        url: formurl,
        data: formdata,
        error: function(XMLHttpRequest, textStatus, errorThrown){
          statusdiv.html('<p class="ajax-error" >Se ha presentado un error al enviar la información, por favor intenta nuevamente.</p>');
        },
        success: function(data, textStatus){
          if(textStatus=="success")
		  {	
			if(commentform.find('textarea[name=comment]').val().length == 0 || commentform.find('input[name=author]').val().length == 0 || commentform.find('input[name=email]').val().length == 0 || !validateEmail(commentform.find('input[name=email]').val()))
			{
				statusdiv.html('<p class="ajax-error" >Por favor completa todos los campos para continuar.</p>');
				
				if(commentform.find('input[name=email]').val().length > 0)
					if(!validateEmail(commentform.find('input[name=email]').val()))
					{
						statusdiv.html('<p class="ajax-error" >El correo ingresado no es válido.</p>');
						commentform.find('input[name=email]').val('');
					}				
			}
			else
			{
				statusdiv.html('<p class="ajax-ok" >¡Gracias por tu comentario! Estará visible una vez sea aprobado.</p>');
				commentform.find('textarea[name=comment]').val('');
				commentform.find('input[name=author]').val('');
				commentform.find('input[name=email]').val('');
			}
		  }
          else
		  {
			commentform.find('textarea[name=comment]').val('');
			commentform.find('input[name=author]').val('');
			commentform.find('input[name=email]').val('');
			statusdiv.html('<p class="ajax-error" >Por favor completa todos los campos para continuar.</p>');
		  }
        }
      });
      return false;
    });
};

eventSuscription = function()
{
	jQuery('.301News form').submit(function(e){
		e.preventDefault();
		suscribe_ajax(jQuery(this));
	});
	
	jQuery('.301News form .tnp-email').attr('placeholder', 'Correo electrónico');
	jQuery('.301News form .tnp-firstname').attr('placeholder', 'Nombre');
}

suscribe_ajax = function(suscform){
    jQuery('.301News').after('<div id="susc-status" ></div>');
    var statusdiv = jQuery('#susc-status');
        
    statusdiv.html('<p class="ajax-placeholder">Procesando...</p>');
    var formdata = suscform.serialize();
    var data = {
        action: 'ajax_subscribe',
        data: formdata,
        ne: suscform.find("input[name=ne]").val(),
        nn: suscform.find("input[name=nn]").val()
    }
    jQuery.ajax({
        type: 'post',
        url: '/wp-admin/admin-ajax.php',
        data: data,
        error: function(XMLHttpRequest, textStatus, errorThrown){
            statusdiv.html('<p class="ajax-error" >Se ha presentado un error al enviar la información, por favor intenta nuevamente.</p>');
        },success: function(data, textStatus){
            suscform.find('.tnp-email').val('');
			suscform.find('.tnp-firstname').val('');
            statusdiv.html('<p class="ajax-ok" >¡Suscripción exitosa!<br/>Recibirás un correo electrónico de confirmación en pocos minutos. Si tarda más de 15 minutos en aparecer en tu buzón, por favor comprueba la carpeta de correos no deseados.</p>');
        }
    });      
}

printGolosina = function()
{
    console.log(` _______  _______  ____  
|       ||  _    ||    | 
|___    || | |   | |   | 
 ___|   || | |   | |   | 
|___    || |_|   | |   | 
 ___|   ||       | |   | 
|_______||_______| |___|`);
    
    console.log('¿Te gusta el desarrollo web y te crees teso? Envíanos tu hoja de vida a rod@301creativastudio.com');
};

//Load
jQuery(window).load(initCustom);