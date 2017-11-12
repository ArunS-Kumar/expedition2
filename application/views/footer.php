<!-- start Footer Wrapper -->
<div class="footer-wrapper scrollspy-footer">
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="col-xs-12 col-sm-3 col-md-3 mt-25-sm ">
                        <h5 class="footer-title">INFORMATION ON INDIA</h5>
                        <ul class="footer-menu">
                            <li><a href="#">Know India</a></li>
                            <li><a href="#">Discover India</a></li>
                            <li><a href="#">Cities India</a></li>
                            <li><a href="#">Lodging India</a></li>
                            <li><a href="#">Transportation India</a></li>
                            <li><a href="#">Travel India </a></li>
                            <li><a href="#">Monuments of India</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 mt-25-sm">
                        <h5 class="footer-title">GROUP TOURS</h5>
                        <ul class="footer-menu">
                            <li><a href="#">All</a></li>
                            <li><a href="#">North India </a></li>
                            <li><a href="#">South India </a></li>
                            <li><a href="#">North-West India </a></li>
                            <li><a href="#">North-East India</a></li>
                            <li><a href="#">Yoga </a></li>
                            <li><a href="#">Europe </a></li>
                            <li><a href="#">Student Travel Programs </a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 mt-25-sm">
                        <h5 class="footer-title">ADDITIONAL SERVICES</h5>
                        <ul class="footer-menu">
                            <li><a href="#">Air-Tickets </a></li>
                            <li><a href="#">Travel Insurance</a></li>
                            <li><a href="#">Visas </a></li>
                            <li><a href="#">Hotel Bookings </a></li>
                            <li><a href="#">Hotels </a></li>
                            <li><a href="#">Cathay Pacific </a></li>
                            <li><a href="#">Etihad Airways </a></li>
                            <li><a href="#">Qatar Airways </a></li>
                            <li><a href="#">Emirates </a></li>
                            <li><a href="#">Singapore Airlines </a></li>
                            <li><a href="#">Airlines </a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 mt-25-sm">
                        <h5 class="footer-title">ABOUT US</h5>
                        <ul class="footer-menu">
                            <li><a href="#">Our Company </a></li>
                            <li><a href="#">Our Concept </a></li>
                            <li><a href="#">Our Services </a></li>
                            <li><a href="#">Our Team </a></li>
                            <li><a href="#">Employment </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <footer class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <p class="copy-right">© Taarruni Design Solutions 2017 – All Rights Reserved.</p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-8">
                    <ul class="bottom-footer-menu">
                        <li><a href="#">Booking Agreement</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Cancellation Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end Footer Wrapper -->
</div>
<!-- end Container Wrapper -->
<!-- start Back To Top -->
<div id="back-to-top">
    <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>
<!-- end Back To Top -->
<!-- Core JS -->


<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/core-plugins.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/customs.js');?>"></script>
<!-- Only in Home Page -->
<!-- <script type="text/javascript" src="<?php //echo base_url('assets/js/jquery.flexdatalist.js');?>"></script> -->
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-tokenfield.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/typeahead.bundle.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/ion.rangeSlider.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.bootstrap-touchspin.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/customs-result.js');?>"></script>

<?php 
if(isset($js) && !empty($js)) {
    foreach ($js as $key => $js_path) {
        include_once($js_path);
    }
} ?>

<script>
    $(document).ready(function() {
        $( "#sub_button" ).click(function() {
            var vals = $(this).parent().find('input').val();
            if(vals == '') {
                $('#input_error').show();
                return false;
            }
        });
    });
</script>

</body>

</html>