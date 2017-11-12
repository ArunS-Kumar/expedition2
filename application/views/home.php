
		
		<!-- end Header -->

		<!-- start Main Wrapper -->
		
		<div class="main-wrapper scrollspy-container">
		
			<!-- start hero-header -->
			<div class="hero img-bg-01">
				<div class="container">
					<!-- <form action="search.html"> -->
					<?php echo form_open('/tourism/search'); ?>

						<div class="form-group">
							<input type="text" placeholder="Location + Tour Style" class="form-control" data-data="data/countries.json" data-search-in='["name","capital"]' data-visible-properties='["capital","name","continent"]' data-group-by="continent" data-selection-required="true" data-focus-first-result="true" data-min-length="1" data-value-property="iso2" data-text-property="{capital}, {name}" data-search-contain="false" name="countries" autocomplete="off">
							
							<button class="btn" id="sub_button" type="submit"><i class="icon-magnifier"></i></button>
						</div>
					</form>
					
					<div class="top-search">
						<span class="font300" id="input_error" style="display: none;">Please Enter the Destination or Tour Style !<br/></span>
					<span class="font300">Unlock your dream holiday. Type in your Destination or Destination + Tour Style here.</span><br/>
						<span class="font300">Example : India + Leisure</span>
						
					</div>

				</div>
				
			</div>

			<!-- end hero-header -->
			
	<!--		<div class="hero clearfix">
			
				<div class="container">

					<form action="search.html">
						<div class="form-group">
							<input type="text" placeholder="Location + Interest" class="form-control">
							<button class="btn"><i class="icon-magnifier"></i></button>
						</div>
					</form>
					
					<div class="top-search">
						<span class="font700">Example : </span>
						<a href="#">India + Leisure</a>
					</div>

				</div>
			
			</div>
-->
			
			
			<div class="clearfix"></div>
				
		</div>
		
		<!-- end Main Wrapper -->

		