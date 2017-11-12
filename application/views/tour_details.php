

<!-- start Main Wrapper -->
<div class="main-wrapper scrollspy-container">
    <div class="filter-full-width-wrapper" style="padding-top:8px;padding-bottom:0px;border-bottom: 1px solid #E6E6E6;background-color:#ddd;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-md-12">
                        <div class="filter-item bb-sm no-bb-xss">
                            <?php if(count($search) > 1) { ?>
                                <h2><?php echo strtoupper($search[1]); ?> TOURS - <?php echo strtoupper($search[0]); ?></h2>
                            <?php } else { ?>
                                <h2><?php echo strtoupper($search[0]); ?></h2>
                            <?php } ?>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb -->
   
</div>
<div class="pt-30 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="content-wrapper">
                    <h4 class="section-title"> <?php echo strtoupper($tour->description.' - '.$tour->name); ?> </h4>
                    <div class="item">
                        <div class="clearfix">
                            <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                <li>
                                    <img src="<?php echo base_url('assets/img/cS-1.jpg');?>" />
                                </li>
                                <li>
                                    <img src="<?php echo base_url('assets/img/cS-2.jpg');?>" />
                                </li>
                                <li>
                                    <img src="<?php echo base_url('assets/img/cS-5.jpg');?>" />
                                </li>
                                <li>
                                    <img src="<?php echo base_url('assets/img/cS-3.jpg');?>" />
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-40"></div>
                    <div id="detail-content-sticky-nav-01">
                        <h4 class="section-title">Overview</h4>
                        <p class="font-md">This Rajasthan holiday will give you the very best of Rajasthan, with its glittering palaces, shining silks and mighty forts. You'll visit the most famous cities from fairy-tale Jaisalmer to the Pink City of Jaipur with with its imposing Palace of the Winds, Amber Fort and Tiger Fort.You'll also watch camels plod through Pushkar, see the elegant lake palace in Udaipur, admire the blue houses in Jodhpur and visit the humbling Taj Mahal.</p>
                        <div class="mt-30 mb-30"></div>
                    </div>
                    <div id="detail-content-sticky-nav-03">
                        <h4 class="section-title">Itinerary</h4>
                        <div class="itinerary-toggle-wrapper mb-40">
                            <div class="panel-group bootstrap-toggle">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <a data-toggle="collapse" data-parent="#" href="#bootstarp-toggle-one-2">
                                                <div class="itinerary-day">
                                                    Day
                                                    <span class="number">01</span>
                                                </div>
                                                <div class="itinerary-header">
                                                    <h4>Arrival - Delhi</h4>
                                                    <p class="font-md">Behind sooner dining so window excuse he summer.</p>
                                                    <div class="image"><img src="<?php echo base_url('assets/images/itinerary-sq/01.jpg');?>" alt="images" /></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div id="bootstarp-toggle-one-2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p class="font-md">When you arrive in Delhi at the beginning of your India holiday package, you’ll be collected by private car. Your driver will take you directly to your hotel. You stay in a comfortable hotel, with modern facilities, in Central Delhi, an ideal base to explore both the spice markets of Chandi Chowk and the modern bars of Connaught Place. Street stalls, shops and restaurants are nearby. Here, you can catch your breath and rest after your flight. All our Delhi hotels have comfortable rooms with private en-suite bathrooms and breakfast included.</p>
                                            <p class="font-md">Although there's nothing planned for you today, if you have time you might want to visit the impressive Qutab Minar complex and Humayun's Tomb, both World Heritage Sites. The Qutab Minar has a 5-storey, 72-metre victory tower of red sandstone. Humayun's Tomb is a grand sandstone mausoleum in proper Mughal style. The Taj Mahal, built much later, follows a similar style of architecture.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of panel -->
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <a data-toggle="collapse" data-parent="#" href="#bootstarp-toggle-two-2" class="clearfix">
                                                <div class="itinerary-day">
                                                    Day
                                                    <span class="number">02</span>
                                                </div>
                                                <div class="itinerary-header">
                                                    <h4>Delhi - Jaipur</h4>
                                                    <p class="font-md">Behind sooner dining so window excuse he summer.</p>
                                                    <div class="image"><img src="<?php echo base_url('assets/images/itinerary-sq/02.jpg');?>" alt="images" /></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div id="bootstarp-toggle-two-2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p class="font-md">On day two of your Rajasthan holiday you'll be transferred to Jaipur by air-conditioned car, a trip which takes around 5 hours. The Pink City is a fantastic place to kick off a trip in India and during your two nights here you can relax, acclimatize, and explore. There is so much to see on this Rajasthan holiday in this elegant and astonishing city that you could spend weeks here without getting bored. Jaipur centre is a colourful mix of saris, saddhus, holy cows, spice markets, street vendors, camel carts, elephants, beggars, traffic, temples, forts and palaces.</p>
                                            <p class="font-md">In Jaipur, you’ll stay in a friendly family hotel for a firsthand experience of typical Indian hospitality. Breakfast is served in the peaceful courtyard/garden and the family will go out of their way to make your stay as enjoyable as possible. The rooms here are tastefully furnished in traditional Indian-style and some have four-poster beds.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of panel -->
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <a data-toggle="collapse" data-parent="#" href="#bootstarp-toggle-three-2" class="clearfix">
                                                <div class="itinerary-day">
                                                    Day
                                                    <span class="number">03</span>
                                                </div>
                                                <div class="itinerary-header">
                                                    <h4>Jaipur - City tour</h4>
                                                    <p class="font-md">Peculiar trifling absolute and wandered vicinity property yet. </p>
                                                    <div class="image"><img src="<?php echo base_url('assets/images/itinerary-sq/03.jpg');?>" alt="images" /></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div id="bootstarp-toggle-three-2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p class="font-md">On day three of your Rajasthan holiday, you’ll take a guided tour of Jaipur, visiting the City Palace, the Observatory and the fairy-tale Palace of the Winds (Hawa Mahal). In the afternoon, you’ll visit the imposing Amber Fort that lies just outside the city limits. From the battlements of the Amber Fort, you’ll have a wonderful view of the rocky hills and the forts constructed by the Rajputs and the Mughals in the area.</p>
                                            <p class="font-md">The City Palace and the Palace of the Winds both stand in the ancient quarter of the city. If you see the flag flying, it means that the Maharaja is in residence. The Palace of the Winds is a world-famous, pyramid-shaped building with dozens of windows. This is where the women of the royal harem could watch the processions in the street below, unseen by the masses. You'll have plenty of time to explore at your own pace during your Rajasthan holiday.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of panel -->
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <a data-toggle="collapse" data-parent="#" href="#bootstarp-toggle-four-2" class="clearfix">
                                                <div class="itinerary-day">
                                                    Day
                                                    <span class="number">04</span>
                                                </div>
                                                <div class="itinerary-header">
                                                    <h4>Jaipur - Pushkar</h4>
                                                    <p class="font-md">Warmly little before cousin sussex entire men set.</p>
                                                    <div class="image"><img src="<?php echo base_url('assets/images/itinerary-sq/04.jpg');?>" alt="images" /></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div id="bootstarp-toggle-four-2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p class="font-md">Today, you’ll leave Jaipur as you continue travelling on your Rajasthan holiday to the attractive town of Pushkar. You’ll spend tonight in a palace where almost all of the rooms have lake views. The palace has a completely unique atmosphere. On the opposite bank of the lake, you’ll see pilgrims bathing and, if you listen carefully, you’ll hear them singing.</p>
                                            <p class="font-md">Pushkar is a picturesque holy town in the desert, with pastel-coloured buildings lining narrow streets. There are dozens of rooftop cafes looking out over the city towards the lake - perfect places to linger over coffee or lunch on your Rajasthan holiday. Your comfortable hotel in Pushkar has an exotic indoor garden and a terrace with stunning views which helps to create a special atmosphere.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of panel -->
                            </div>
                        </div>
                        <div class="mb-25"></div>
                        <div class="bb"></div>
                        <div class="mb-25"></div>
                    </div>
                </div>
            </div>
            <div id="sidebar-sticky" class="col-xs-12 col-sm-12 col-md-4 sticky-mt-70 sticky-mb-0">
                <aside class="sidebar-wrapper with-box-shadow">
                    <ul class="featured-list-with-h mb-40 list-yes-no-box">
                        <li>
                            <div class="row">
                                <div class="col-xs-12 col-sm-5">
                                    <h5> &nbsp;&nbsp;&nbsp;Activity</h5>
                                </div>
                                <div class="col-xs-12 col-sm-1">
                                    <h5>:</h5>
                                </div>
                                <div class="col-xs-12 col-sm-6 mt-xs">
                                    <span class="pl-xs">Nature</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-xs-12 col-sm-5">
                                    <h5> &nbsp;&nbsp;&nbsp;Inclusion</h5>
                                </div>
                                <div class="col-xs-12 col-sm-1">
                                    <h5>:</h5>
                                </div>
                                <div class="col-xs-12 col-sm-6 mt-xs">
                                    <span class="pl-xs">Flight, Meal</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-xs-12 col-sm-5">
                                    <h5> &nbsp;&nbsp;&nbsp;Budget</h5>
                                </div>
                                <div class="col-xs-12 col-sm-1">
                                    <h5>:</h5>
                                </div>
                                <div class="col-xs-12 col-sm-6 mt-xs">
                                    <span class="pl-xs">2200$</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-xs-12 col-sm-5">
                                    <h5> &nbsp;&nbsp;&nbsp;No of days </h5>
                                </div>
                                <div class="col-xs-12 col-sm-1">
                                    <h5>:</h5>
                                </div>
                                <div class="col-xs-12 col-sm-6 mt-xs">
                                    <span class="pl-xs">4N 5D</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-xs-12 col-sm-5">
                                    <h5> &nbsp;&nbsp;&nbsp;Star Rating </h5>
                                </div>
                                <div class="col-xs-12 col-sm-1">
                                    <h5>:</h5>
                                </div>
                                <div class="col-xs-12 col-sm-6 mt-xs">
                                    <span class="pl-xs">*****</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <h4 class="section-title">CITIES TO VISIT</h4>
                    <ul id="content-slider" class="content-slider">
                        <li>
                            <img src="<?php echo base_url('assets/img/thumb/05.jpg');?>" />
                            <p>Delhi</p>
                        </li>
                        <!--      <li>
<img src="<?php //echo base_url('assets/img/thumb/04.jpg');?>"/>
<p>Agra</p>-->
                        <!-- </li> -->
                        <li>
                            <img src="<?php echo base_url('assets/img/thumb/03.jpg');?>" />
                            <p>Jaipur</p>
                        </li>
                        <!--              <li>
<img src="<?php //echo base_url('assets/img/thumb/02.jpg');?>"/>
<p>Jodhpur</p>
</li>-->
                        <li>
                            <img src="<?php echo base_url('assets/img/thumb/01.jpg');?>" />
                            <p>Pushkar</p>
                        </li>
                    </ul>
                    <div class="mt-40"></div>
                    <div class="trip-guide-sm-item-wrapper">
                        <h4 class="section-title mb-20">Pricing</h4>
                        <div class="trip-guide-sm-item clearfix list-yes-no-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-7">
                                    <h6>First Class </h6>
                                </div>
                                <div class="col-xs-12 col-sm-5 mt-xs">
                                    <div class="rating-item">
                                        <span class="fa fa-star rating-rated"></span>&nbsp;&nbsp;<span class="fa fa-star rating-rated"></span>&nbsp;&nbsp;<span class="fa fa-star rating-rated"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="content" style="margin-left:0px;">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-7">
                                        <span class="pl-xs">Double Occupancy</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-1">
                                        <h5>:</h5>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 mt-xs">
                                        <span class="pl-xs">USD 1747</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-7">
                                        <span class="pl-xs">single Occupancy</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-1">
                                        <h5>:</h5>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 mt-xs">
                                        <span class="pl-xs">USD 2247</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-7">
                                    <h6>DELUXE </h6>
                                </div>
                                <div class="col-xs-12 col-sm-5 mt-xs">
                                    <div class="rating-item">
                                        <span class="fa fa-star rating-rated"></span>&nbsp;&nbsp;<span class="fa fa-star rating-rated"></span>&nbsp;&nbsp;<span class="fa fa-star rating-rated"></span>&nbsp;&nbsp;<span class="fa fa-star rating-rated"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="content" style="margin-left:0px;">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-7">
                                        <span class="pl-xs">Double Occupancy</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-1">
                                        <h5>:</h5>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 mt-xs">
                                        <span class="pl-xs">USD 1747</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-7">
                                        <span class="pl-xs">single Occupancy</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-1">
                                        <h5>:</h5>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 mt-xs">
                                        <span class="pl-xs">USD 2247</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-7">
                                    <h6>OPPULENT </h6>
                                </div>
                                <div class="col-xs-12 col-sm-5 mt-xs">
                                    <div class="rating-item">
                                        <span class="fa fa-star rating-rated"></span>&nbsp;&nbsp;<span class="fa fa-star rating-rated"></span>&nbsp;&nbsp;<span class="fa fa-star rating-rated"></span>&nbsp;&nbsp;<span class="fa fa-star rating-rated"></span>&nbsp;&nbsp;<span class="fa fa-star rating-rated"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="content" style="margin-left:0px;">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-7">
                                        <span class="pl-xs">Double Occupancy</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-1">
                                        <h5>:</h5>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 mt-xs">
                                        <span class="pl-xs">USD 1747</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-7">
                                        <span class="pl-xs">single Occupancy</span>
                                    </div>
                                    <div class="col-xs-12 col-sm-1">
                                        <h5>:</h5>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 mt-xs">
                                        <span class="pl-xs">USD 2247</span>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary btn-block btn-sm">REQUEST A QUOTE</a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end Main Wrapper -->
