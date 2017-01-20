/*
 * jQuery One Page Nav Plugin
 * http://github.com/davist11/jQuery-One-Page-Nav
 *
 * Copyright (c) 2010 Trevor Davis (http://trevordavis.net)
 * Dual licensed under the MIT and GPL licenses.
 * Uses the same license as jQuery, see:
 * http://jquery.org/license
 *
 * @version 3.0.0
 *
 * Example usage:
 * $('#nav').onePageNav({
 *   currentClass: 'current',
 *   changeHash: false,
 *   scrollSpeed: 750
 * });
 */

;(function($, window, document, undefined){

	// our plugin constructor
	var OnePageNav = function(elem, options){
		this.elem = elem;
		this.$elem = $(elem);
		this.options = options;
		this.metadata = this.$elem.data('plugin-options');
		this.$win = $(window);
		this.sections = {};
		this.didScroll = false;
		this.$doc = $(document);
		this.docHeight = this.$doc.height();
	};

	// the plugin prototype
	OnePageNav.prototype = {
		defaults: {
			navItems: 'a',
			currentClass: 'current',
			changeHash: false,
			easing: 'swing',
			filter: '',
			scrollSpeed: 750,
			scrollThreshold: 0.5,
			begin: false,
			end: false,
			scrollChange: false
		},

		init: function() {
			// Introduce defaults that can be extended either
			// globally or using an object literal.
			this.config = $.extend({}, this.defaults, this.options, this.metadata);

			this.$nav = this.$elem.find(this.config.navItems);

			//Filter any links out of the nav
			if(this.config.filter !== '') {
				this.$nav = this.$nav.filter(this.config.filter);
			}

			//Handle clicks on the nav
			this.$nav.on('click.onePageNav', $.proxy(this.handleClick, this));

			//Get the section positions
			this.getPositions();

			//Handle scroll changes
			this.bindInterval();

			//Update the positions on resize too
			this.$win.on('resize.onePageNav', $.proxy(this.getPositions, this));
			
			return this;
		},

		adjustNav: function(self, $parent) {
			self.$elem.find('.' + self.config.currentClass).removeClass(self.config.currentClass);
			$parent.addClass(self.config.currentClass);
		},

		bindInterval: function() {
			var self = this;
			var docHeight;

			self.$win.on('scroll.onePageNav', function() {
				self.didScroll = true;
				//Establecer animaciones de elementos
				setAnimatedElement();
			});

			self.t = setInterval(function() {
				docHeight = self.$doc.height();

				//If it was scrolled
				if(self.didScroll) {
					self.didScroll = false;
					self.scrollChange();
				}

				//If the document height changes
				if(docHeight !== self.docHeight) {
					self.docHeight = docHeight;
					self.getPositions();
				}
			}, 250);
		},

		getHash: function($link) {
			return $link.attr('href').split('#')[1];
		},

		getPositions: function() {
			var self = this;
			var linkHref;
			var topPos;
			var $target;

			self.$nav.each(function() {
				linkHref = getValueInglish(self.getHash($(this)), false);
				$target = $('#' + linkHref);
				if($target.length) {
					topPos = $target.offset().top;
					self.sections[linkHref] = Math.round(topPos);
				}
			});
		},

		getSection: function(windowPos) {
			var returnValue = null;
			var windowHeight = Math.round(this.$win.height() * this.config.scrollThreshold);

			for(var section in this.sections) {
				if((this.sections[section] - windowHeight) < windowPos) {
					returnValue = section;
				}
			}

			return returnValue;
		},

		handleClick: function(e) {
			var self = this;
			var $link = $(e.currentTarget);
			var $parent = $link.parent();
			var newLocIng = self.getHash($link);
			var newLoc = '#' + getValueInglish(newLocIng, false);			
			
			if(!$parent.hasClass(self.config.currentClass)) {
				//Start callback
				if(self.config.begin) {
					self.config.begin();
				}

				//Change the highlighted nav item
				self.adjustNav(self, $parent);

				//Removing the auto-adjust on scroll
				self.unbindInterval();

				//Scroll to the correct position
				self.scrollTo(newLoc, function() {
					//Do we need to change the hash?
					if(self.config.changeHash) {
						window.location.hash = newLocIng;
					}

					//Add the auto-adjust on scroll back in
					self.bindInterval();

					//End callback
					if(self.config.end) {
						self.config.end();
					}
				});
			}

			e.preventDefault();
		},

		scrollChange: function() {
			var windowTop = this.$win.scrollTop();
			var position = getValueInglish(this.getSection(windowTop), true);
			var $parent;
			//If the position is set
			if(position !== null) {
				$parent = this.$elem.find('a[href$="#' + position + '"]').parent();				
				//If it's not already the current section
				if(!$parent.hasClass(this.config.currentClass)) {
					//Change the highlighted nav item
					this.adjustNav(this, $parent);

					//If there is a scrollChange callback
					if(this.config.scrollChange) {
						this.config.scrollChange($parent);
					}
				}
			}
		},

		scrollTo: function(target, callback) {
			var offset = $(target).offset().top-50;
console.log('emtra');
			$('html, body').animate({
				scrollTop: offset
			}, this.config.scrollSpeed, this.config.easing, callback);
		},

		unbindInterval: function() {
			clearInterval(this.t);
			this.$win.unbind('scroll.onePageNav');
		},
	};

	OnePageNav.defaults = OnePageNav.prototype.defaults;

	$.fn.onePageNav = function(options) {
		return this.each(function() {
			new OnePageNav(this, options).init();
		});
	};

	getValueInglish = function(value, espanol)
	{
		//Codigo de rod para el menu en espanol
		var newLoc = value;
		if(!espanol)
		{
			switch(value) {
				case 'inicio': newLoc = 'home'; break;
				case 'lo-que-somos': newLoc = 'about'; break;
				case 'lo-que-hacemos': newLoc = 'services'; break;
				case 'equipo-creativo': newLoc = 'team'; break;
				case 'estadisticas': newLoc = 'skill'; break;
				case 'como-lo-hacemos': newLoc = 'process'; break;
				case 'nuestras-marcas': newLoc = 'client'; break;
				case 'contacto': newLoc = 'contact'; break;
			}
		}
		else
		{
			switch(value) {
				case 'home': newLoc = 'inicio'; break;
				case 'about': newLoc = 'lo-que-somos'; break;
				case 'services': newLoc = 'lo-que-hacemos'; break;
				case 'team': newLoc = 'equipo-creativo'; break;
				case 'skill': newLoc = 'estadisticas'; break;
				case 'process': newLoc = 'como-lo-hacemos'; break;
				case 'client': newLoc = 'nuestras-marcas'; break;
				case 'contact': newLoc = 'contacto'; break;
			}
		}
		return newLoc;
	};
	
	setAnimatedElement = function()
	{
		if(jQuery('#menu-item-222').is('.current-page-item'))
		{
			setTimeout(
				function(){
					var b = jQuery('#about .before');
					if(!b.is('.ok'))
					{
					    var l = jQuery('#about h2').offset().left - 300;
						b.css({'left':'-45em', 'opacity': '1'}).animate({'left':l}, 1000).addClass('ok');
					}
			}, 500);
		}
		
		if(jQuery('#menu-item-230').is('.current-page-item'))
		{
			setTimeout(function(){
				var b = jQuery('#services .before');
				if(!b.is('.ok'))
					var l = jQuery('#services .owl-item').first().offset().left - 190;
					b.css({'opacity': '1'}).animate({'left':l}, 1000).addClass('ok'); 
			}, 1800);
		}
		
		if(jQuery('#menu-item-226').is('.current-page-item'))
		{
			setTimeout(function(){
				var b = jQuery('#process .before');
				if(!b.is('.ok'))
					b.animate({'width':'43em'}, 1000).addClass('ok'); 
			}, 500);
		}
	}
	
	jQuery.each(jQuery('#menu-left-menu a'), function(x,y){ 
		jQuery(y).attr('title', jQuery(y).html());
	});
	
})( jQuery, window , document );
