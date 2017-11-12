<script src="<?php echo base_url('assets/js/lightslider.js');?>"></script>
<script>
$(document).ready(function() {
    console.log('details js');
    $("#content-slider").lightSlider({
        loop: true,
        item: 3,

        pager: false,
        keyPress: true
    });
    $('#image-gallery').lightSlider({
        gallery: true,
        item: 1,
        thumbItem: 13,
        slideMargin: 0,
        speed: 500,
        auto: true,
        loop: true,
        onSliderLoad: function() {
            $('#image-gallery').removeClass('cS-hidden');
        }
    }); 
});
</script>