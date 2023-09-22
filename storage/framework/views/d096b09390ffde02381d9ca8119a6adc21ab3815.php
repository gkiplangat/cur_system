<script src="<?php echo e(URL::to('resources/views/theme/assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/theme/assets/js/jquery.dropotron.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/theme/assets/js/jquery.scrolly.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/theme/assets/js/jquery.scrollex.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/theme/assets/js/browser.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/theme/assets/js/breakpoints.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/theme/assets/js/util.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/theme/assets/js/main.js')); ?>"></script>

<script src="<?php echo e(URL::to('resources/views/theme/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/theme/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/theme/js/dropdown.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/theme/validate/jquery.bvalidator.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/theme/validate/themes/presenters/default.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/theme/validate/themes/red/red.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/theme/animate/aos.js')); ?>"></script>
<script>
      AOS.init({
        easing: 'ease-in-out-sine'
      });
	  
	  
</script>
<script type="text/javascript">
    $(document).ready(function () {
        
		var options = {
		
		offset:              {x:5, y:-2},
		position:            {x:'left', y:'center'},
        themes: {
            'red': {
                 showClose: true
            },
		
        }
    };

    $('#login_form').bValidator(options);
	$('#contact_form').bValidator(options);
	$('#subscribe_form').bValidator(options);
	$('#footer_form').bValidator(options);
	$('#booking_form').bValidator(options);
	$('#comment_form').bValidator(options);
	$('#product_form').bValidator(options);
	$('#checkout_form').bValidator(options);
	
    });
	
	(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};
		
		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			
			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			// initialize the element with the starting value
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	
	$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
	formatter: function (value, options) {
	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
	}
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
  }
});

$(document).ready(function() {

	$('.link-gallery').click(function(){
		var descripcion = $(this).attr('title');
		$('#caption').html(descripcion);
	  	var img = $(this).find('img');
	  	var src = img.attr('src')
	  	$('#img01').attr('src', src);
		$('#Gallery-Modal').css('display','block');
		$('.modal-backdrop').remove();
	});

	$('.close').click(function(){
		$('#Gallery-Modal').css('display','none');
	});
	
});
</script>

<script type="text/javascript" src="<?php echo e(URL::to('resources/views/theme/countdown/jquery.countdown.js?v=1.0.0.0')); ?>"></script>
<?php if(!empty($event_start_time)): ?>
<script type="text/javascript">
		$('#example').countdown({
			date: '<?php echo e(date("m/d/Y H:i:s", strtotime($event_start_time))); ?>',
			offset: -8,
			day: 'Day',
			days: 'Days'
		}, function () {
			
		});
</script>
<?php endif; ?>
<script type="text/javascript" src="<?php echo e(URL::to('resources/views/theme/video/video.js')); ?>"></script>
<script type="text/javascript">
		jQuery(function(){
			jQuery("a.popupvideo").YouTubePopUp( { autoplay: 0 } ); // Disable autoplay
		});
</script>
<script src="<?php echo e(url('vendor/tinymce/jquery.tinymce.min.js')); ?>"></script>
<script src="<?php echo e(url('vendor/tinymce/tinymce.min.js')); ?>"></script>
<script>
  tinymce.init({
    
	selector: '#summary-ckeditor', 
    
		plugins : 'advlist anchor autolinkcharmap code colorpicker contextmenu fullscreen hr image insertdatetime link lists media pagebreak preview print searchreplace tabfocus table textcolor',
	toolbar: [
		'newdocument | print preview | searchreplace | undo redo | link unlink anchor image media | alignleft aligncenter alignright alignjustify | code',
		'formatselect fontselect fontsizeselect | bold italic underline strikethrough | forecolor backcolor',
		'removeformat | hr pagebreak | charmap subscript superscript insertdatetime | bullist numlist | outdent indent blockquote | table'
	],
	menubar : false,
	browser_spellcheck : true,
	branding: false,
	width: '100%',
	height : "480"
    
 
  
  });

</script>
<?php if($allsettings->site_loader_display == 1): ?>
<script type='text/javascript' src="<?php echo e(URL::to('resources/views/theme/loader/jquery.LoadingBox.js')); ?>"></script>
<script>
    $(function(){
        var lb = new $.LoadingBox({loadingImageSrc: "<?php echo e(url('/')); ?>/public/storage/settings/<?php echo e($allsettings->site_loader_image); ?>",});

        setTimeout(function(){
            lb.close();
        }, 1000);
    });
</script>
<?php endif; ?>
<!--- back to top --->
<script src="<?php echo e(asset('resources/views/theme/backtop/jquery.backTop.min.js')); ?>"></script>
<script>
            $(document).ready( function() {
                $('#backTop').backTop({
                    'position' : 300,
                    'speed' : 500,
                    'color' : 'red',
                });
            });
</script>
<!--- back to top --->   

<!--- audio --->
<script src="<?php echo e(asset('resources/views/theme/audio/audioplayer.js')); ?>"></script>
<script>
	$(function() {
				$('audio').audioPlayer();
	});
</script>

<!--- audio ---->

<!-- testimonial --->
<script src="<?php echo e(URL::to('resources/views/theme/testimonial/testimonial.js')); ?>"></script>
<!-- testimonial --->
     
<script src="<?php echo e(asset('resources/views/theme/share/share.js')); ?>"></script> 
<script type="text/javascript">

	$(document).ready(function(){

		$('.share-button').simpleSocialShare();

	});

</script> 

<!---- gallery --->
<script src="<?php echo e(asset('resources/views/theme/lightbox/jquery.lightbox.js')); ?>"></script>
<script>
  // Initiate Lightbox
  $(function() {
    $('.gallery a').lightbox(); 
  });
</script>

<!---- gallery --->

<!-- pagination --->
<script src="<?php echo e(URL::to('resources/views/theme/pagination/pagination.js')); ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
      
	  $(this).cPager({
            pageSize: <?php echo e($extrasettings->event_per_page); ?>, 
            pageid: "event-pager", 
            itemClass: "li-item",
			pageIndex: 1
 
        });
		
	$(this).cPager({
            pageSize: <?php echo e($extrasettings->gallery_per_page); ?>, 
            pageid: "gallery-pager", 
            itemClass: "li-item",
			pageIndex: 1
 
        });	
		
	$(this).cPager({
            pageSize: <?php echo e($extrasettings->pastor_per_page); ?>, 
            pageid: "pastor-pager", 
            itemClass: "li-item",
			pageIndex: 1
 
        });	
		
	$(this).cPager({
            pageSize: <?php echo e($extrasettings->sermon_per_page); ?>, 
            pageid: "sermon-pager", 
            itemClass: "li-item",
			pageIndex: 1
 
        });	
		
	$(this).cPager({
            pageSize: <?php echo e($extrasettings->testimonial_per_page); ?>, 
            pageid: "testimonial-pager", 
            itemClass: "li-item",
			pageIndex: 1
 
        });	
		
	$(this).cPager({
            pageSize: <?php echo e($extrasettings->blog_per_page); ?>, 
            pageid: "blog-pager", 
            itemClass: "li-item",
			pageIndex: 1
 
        });
		
	$(this).cPager({
            pageSize: <?php echo e($extrasettings->product_per_page); ?>, 
            pageid: "product-pager", 
            itemClass: "li-item",
			pageIndex: 1
 
        });		
			
			
		
   });
</script>
<!--- pagination --->    

<!-- product -->
<script src="<?php echo e(URL::to('resources/views/theme/product/swiper.js')); ?>"></script>
<script src="<?php echo e(asset('resources/views/theme/product/product-tab.js')); ?>"></script>
<!-- product -->

<!-- stripe code -->

<script src="https://js.stripe.com/v3/"></script>
<script>

$(function () {
$("#ifYes").hide();
        $("input[name='payment_method']").click(function () {
		
            if ($("#opt1-stripe").is(":checked")) {
                $("#ifYes").show();
				
				/* stripe code */
				
				var stripe = Stripe('<?php echo e($stripe_publish_key); ?>');
   
				var elements = stripe.elements();
					
				var style = {
				base: {
					color: '#32325d',
					lineHeight: '18px',
					fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
					fontSmoothing: 'antialiased',
					fontSize: '14px',
					'::placeholder': {
					color: '#aab7c4'
					}
				},
				invalid: {
					color: '#fa755a',
					iconColor: '#fa755a'
				}
				};
			 
				
				var card = elements.create('card', {style: style, hidePostalCode: true});
			 
				
				card.mount('#card-element');
			 
			   
				card.addEventListener('change', function(event) {
					var displayError = document.getElementById('card-errors');
					if (event.error) {
						displayError.textContent = event.error.message;
					} else {
						displayError.textContent = '';
					}
				});
			 
				
				var form = document.getElementById('checkout_form');
				form.addEventListener('submit', function(event) {
					/*event.preventDefault();*/
			        if ($("#opt1-stripe").is(":checked")) { event.preventDefault(); }
					stripe.createToken(card).then(function(result) {
					
						if (result.error) {
						
						var errorElement = document.getElementById('card-errors');
						errorElement.textContent = result.error.message;
						
						
						} else {
							
							document.querySelector('.token').value = result.token.id;
							 
							document.getElementById('checkout_form').submit();
						}
						/*document.querySelector('.token').value = result.token.id;
							 
							document.getElementById('checkout_form').submit();*/
						
					});
				});
							
					
					
					
							
			/* stripe code */	
				
				
				
            } else {
                $("#ifYes").hide();
            }
        });
    });
	
	
	
$(function () {
$("#ifstripe").hide();
$("#ifbank").hide();
        $("input[name='withdrawal']").click(function () {
		
            if ($("#withdrawal-paypal").is(":checked")) 
			{
			   $("#ifpaypal").show();
			   $("#ifstripe").hide();
			   $("#ifbank").hide();
			}
			else if ($("#withdrawal-stripe").is(":checked"))
			{
			  $("#ifpaypal").hide();
			  $("#ifstripe").show();
			  $("#ifbank").hide();
			}
			else if ($("#withdrawal-localbank").is(":checked"))
			{
			   $("#ifpaypal").hide();
			  $("#ifstripe").hide();
			  $("#ifbank").show();
			}
			else
			{
			$("#ifpaypal").hide();
			$("#ifstripe").hide();
			$("#ifbank").hide();
			}
		});
    });
	
</script>

<!-- stripe code --><?php /**PATH C:\xampp\htdocs\my-jesus\resources\views/script.blade.php ENDPATH**/ ?>