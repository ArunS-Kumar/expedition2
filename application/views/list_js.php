<script>
$(document).ready(function() {

	$(".close").attr("href", "javascript:;")

	$( '.close' ).click(function() {
		
		let tour_ids = "<?php echo $tour_ids; ?>";
		let destination = $(this).parent().find('.token-label').text();
		$(this).parent().remove();
		
		$.post( "<?php echo base_url('tourism/destination_fliter'); ?>",{ tour_ids:tour_ids, destination:destination }).done(function( data ) {
			let result = data.split(',');
			for(val of result) {
				$('#list-'+val).remove();
			}
		});
	});
	
	$('.style_select').on('change', function(){
		
		let style = $(this).val();
		$('.style_hide').hide();
		
		if(style == null) {
			$('.style_hide').show();
		}

		for(val of style) {
			$('.style-'+val).show();
		}
	});

	$('.type_select').on('change', function(){
		let type = $(this).val(); 
		let value = $('.type-'+type);
		$( '#toure_list' ).prepend(value);
	});

});

</script>