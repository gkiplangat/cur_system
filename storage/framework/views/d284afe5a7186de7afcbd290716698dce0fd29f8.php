<script src="<?php echo e(URL::to('resources/views/admin/template/vendors/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('resources/views/admin/template/vendors/popper.js/dist/umd/popper.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('resources/views/admin/template/vendors/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('resources/views/admin/template/assets/js/main.js')); ?>"></script>

    <script src="<?php echo e(URL::to('resources/views/admin/template/assets/js/jquery.min.js')); ?>"></script>
    
    <script src="<?php echo e(URL::to('resources/views/admin/template/vendors/chart.js/dist/Chart.bundle.min.js')); ?>"></script>
    <!--<script src="<?php echo e(URL::to('resources/views/admin/template/assets/js/init-scripts/chart-js/chartjs-init.js')); ?>"></script>-->
   
    <script src="<?php echo e(URL::to('resources/views/admin/template/assets/js/dashboard.js')); ?>"></script>
    <script src="<?php echo e(URL::to('resources/views/admin/template/assets/js/widgets.js')); ?>"></script>
    <script src="<?php echo e(URL::to('resources/views/admin/template/vendors/jqvmap/dist/jquery.vmap.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('resources/views/admin/template/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')); ?>"></script>
    <script src="<?php echo e(URL::to('resources/views/admin/template/vendors/jqvmap/dist/maps/jquery.vmap.world.js')); ?>"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
	</script>
    
    <script src="<?php echo e(URL::to('resources/views/admin/template/vendors/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('resources/views/admin/template/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('resources/views/admin/template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('resources/views/admin/template/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('resources/views/admin/template/vendors/jszip/dist/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('resources/views/admin/template/vendors/pdfmake/build/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('resources/views/admin/template/vendors/pdfmake/build/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(URL::to('resources/views/admin/template/vendors/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('resources/views/admin/template/vendors/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('resources/views/admin/template/vendors/datatables.net-buttons/js/buttons.colVis.min.js')); ?>"></script>
    <script src="<?php echo e(URL::to('resources/views/admin/template/assets/js/init-scripts/data-table/datatables-init.js')); ?>"></script>
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
<script src="<?php echo e(URL::to('resources/views/theme/validate/jquery.bvalidator.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/theme/validate/themes/presenters/default.min.js')); ?>"></script>
<script src="<?php echo e(URL::to('resources/views/theme/validate/themes/red/red.js')); ?>"></script>
<link href="<?php echo e(URL::to('resources/views/theme/validate/themes/red/red.css')); ?>" rel="stylesheet" />
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

    $('#item_form').bValidator(options);
	$('#profile_form').bValidator(options);
	$('#comment_form').bValidator(options);
	$('#support_form').bValidator(options);
	$('#order_form').bValidator(options);
	$('#checkout_form').bValidator(options);
	$('#setting_form').bValidator(options);
	$('#category_form').bValidator(options);
    });
</script>

<script type="text/javascript" src="<?php echo e(URL::to('resources/views/admin/template/picker/jquery-ui.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(URL::to('resources/views/admin/template/picker/jquery-ui-timepicker-addon.js')); ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#event_start_date_time").datetimepicker({
    timeFormat: "hh:mm tt", minDate: 0, dateFormat: 'yy-mm-dd',
    onSelect: function (selected) {
      var dt = new Date(selected);
      dt.setDate(dt.getDate() + 1);
 $("#event_end_date_time").datetimepicker("option", "minDate", dt);
}                                 
});
  $("#event_end_date_time").datetimepicker({
    timeFormat: "hh:mm tt", minDate: 0, dateFormat: 'yy-mm-dd',
    onSelect: function (selected) {
      var dt1 = new Date(selected);
      dt1.setDate(dt1.getDate() - 1);
      $("#event_start_date_time").datetimepicker("option", "maxDate", dt1);
    }
  });
});

$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>


<script src="<?php echo e(URL::to('resources/views/admin/template/font-select/jquery.fontselect.js')); ?>"></script>
    <script>
      $(function(){
        $('#h1_font').fontselect().change(function(){
        
          // replace + signs with spaces for css
          var font = $(this).val().replace(/\+/g, ' ');
          
          // split font into family and weight
          font = font.split(':');
          
          // set family on paragraphs 
          $('#paragraph1').css('font-family', font[0]);
        });
		
		$('#h2_font').fontselect().change(function(){
        
          // replace + signs with spaces for css
          var font = $(this).val().replace(/\+/g, ' ');
          
          // split font into family and weight
          font = font.split(':');
          
          // set family on paragraphs 
          $('#paragraph2').css('font-family', font[0]);
        });
		
		
		$('#h3_font').fontselect().change(function(){
        
          // replace + signs with spaces for css
          var font = $(this).val().replace(/\+/g, ' ');
          
          // split font into family and weight
          font = font.split(':');
          
          // set family on paragraphs 
          $('#paragraph3').css('font-family', font[0]);
        });
		
		
		$('#h4_font').fontselect().change(function(){
        
          // replace + signs with spaces for css
          var font = $(this).val().replace(/\+/g, ' ');
          
          // split font into family and weight
          font = font.split(':');
          
          // set family on paragraphs 
          $('#paragraph4').css('font-family', font[0]);
        });
		
		
		$('#h5_font').fontselect().change(function(){
        
          // replace + signs with spaces for css
          var font = $(this).val().replace(/\+/g, ' ');
          
          // split font into family and weight
          font = font.split(':');
          
          // set family on paragraphs 
          $('#paragraph5').css('font-family', font[0]);
        });
		
		
		$('#h6_font').fontselect().change(function(){
        
          // replace + signs with spaces for css
          var font = $(this).val().replace(/\+/g, ' ');
          
          // split font into family and weight
          font = font.split(':');
          
          // set family on paragraphs 
          $('#paragraph6').css('font-family', font[0]);
        });
		
		$('#body_font').fontselect().change(function(){
        
          // replace + signs with spaces for css
          var font = $(this).val().replace(/\+/g, ' ');
          
          // split font into family and weight
          font = font.split(':');
          
          // set family on paragraphs 
          $('#paragraph7').css('font-family', font[0]);
        });
		
		
		$('#button_font').fontselect().change(function(){
        
          // replace + signs with spaces for css
          var font = $(this).val().replace(/\+/g, ' ');
          
          // split font into family and weight
          font = font.split(':');
          
          // set family on paragraphs 
          $('#paragraph8').css('font-family', font[0]);
        });
		
		
		
      });
    </script>
    <script type="text/javascript" src="<?php echo e(URL::to('resources/views/admin/template/color-picker/farbtastic.js')); ?>"></script>
    <script type="text/javascript" charset="utf-8">
	  $(document).ready(function() {
		$('#theme_picker').farbtastic('#site_theme_color');
		$('#button_picker').farbtastic('#site_button_color');
		$('#copyright_picker').farbtastic('#site_copyright_color');
		$('#button_hover_picker').farbtastic('#site_button_hover');
		$('#footer_picker').farbtastic('#site_footer_color');
	  });
	 </script>
    

<?php /**PATH C:\xampp\htdocs\my-jesus\resources\views/admin/javascript.blade.php ENDPATH**/ ?>