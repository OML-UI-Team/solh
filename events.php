<?php include('includes/header.php'); ?>

<!-- Main content Start -->
<div class="main-content">    
    <div class="rs-breadcrumbs bg-4">
        <img src="images/events-banner.jpg" alt="">
    </div>     

    <?php

// <!--------- Current Events --------------------->
        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "$_api_base_url/api/events?filter=current&limit=5");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $events = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        $current_events = json_decode($events, true);

// <!--------- Upcoming Events --------------------->

        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "$_api_base_url/api/events?filter=upcoming&limit=5");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $events = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        $upcoming_events = json_decode($events, true);

// <!--------- Past Events --------------------->

        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, "$_api_base_url/api/events?filter=past&limit=5");

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $events = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        $past_events = json_decode($events, true);
    ?>


<?php if(!empty($current_events['data'])): ?>
    <!-- Current Events Section Start  for 1 event -->
        <div id="rs-services" class="event rs-services style2 pt-100 pb-70 md-pt-80 md-pb-50 sm-pt-72">
            <div class="container">
                <div class="sec-title style2 mb-60 md-mb-50 sm-mb-42">
                    <div class="first-half text-right">
                        <div class="sub-title primary">Lorem ipsum dolor sit amet</div>
                        <h2 class="title mb-0">Current Events</h2>
                    </div>
                    <div class="last-half">
                        <p class="desc mb-0 pr-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at dictum risus, non suscip it arcu. Quisque aliquam posuere tortor aliquam posuere tortor develop
                            database.</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <?php if($current_events['to'] == 1) { $event =  $current_events['data'][0]; ?>
                    <div class="col-lg-9">
                        <div class="row gutter-20">
                            <div class="col-lg-12 mb-30">
                                <div class="service-wrap">
                                    <div class="image-part">
                                        <img src="<?= $_api_base_url.'/'.$event['image'] ?>" alt="">
                                    </div>
                                    <div class="content-part">
                                        <h3 class="title"><a href="<?= $_base_url.'/event/'.$event['slug'] ?>"><?= $event['name'] ?></a></h3>
                                        <div class="event-date">
                                            <span class="sol-cat">Art</span>
                                            <span><i class="fa fa-calendar-o"></i> <?= date('M d, Y h:i A', strtotime($event['event_date']." ".$event['event_time'])) ?></span>
                                            <span><i class="fa fa-map-marker"></i> <?= $event['location'] ?></span>
                                        </div>
                                        <div class="desc"><?= $event['content'] ?></div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <?php } else if($current_events['to'] == 2) { ?>
                        <?php $event =  $current_events['data'][0]; ?>
                        <div class="col-lg-6">
                            <div class="row gutter-20">
                                <div class="col-lg-12 mb-30">
                                    <div class="service-wrap">
                                        <div class="image-part">
                                            <img src="<?= $_api_base_url.'/'.$event['image'] ?>" alt="">
                                        </div>
                                        <div class="content-part">
                                            <h3 class="title"><a href="<?= $_base_url.'/event/'.$event['slug'] ?>"><?= $event['name'] ?></a></h3>
                                            <div class="event-date">
                                                <span class="sol-cat">Art</span>
                                                <span><i class="fa fa-calendar-o"></i> <?= date('M d, Y h:i A', strtotime($event['event_date']." ".$event['event_time'])) ?></span>
                                                <span><i class="fa fa-map-marker"></i> <?= $event['location'] ?></span>
                                            </div>
                                            <div class="desc"><?= $event['content'] ?></div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                        <?php $event =  $current_events['data'][1]; ?>
                        <div class="col-lg-6">
                            <div class="row gutter-20">
                                <div class="col-lg-12 mb-30">
                                    <div class="service-wrap">
                                        <div class="image-part">
                                            <img src="<?= $_api_base_url.'/'.$event['image'] ?>" alt="">
                                        </div>
                                        <div class="content-part">
                                            <h3 class="title"><a href="<?= $_base_url.'/event/'.$event['slug'] ?>"><?= $event['name'] ?></a></h3>
                                            <div class="event-date">
                                                <span class="sol-cat">Art</span>
                                                <span><i class="fa fa-calendar-o"></i> <?= date('M d, Y h:i A', strtotime($event['event_date']." ".$event['event_time'])) ?></span>
                                                <span><i class="fa fa-map-marker"></i> <?= $event['location'] ?></span>
                                            </div>
                                            <div class="desc"><?= $event['content'] ?></div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    <?php } else { ?>

                        <?php if(isset($current_events['data'][0])) { $event =  $current_events['data'][0]; ?>
                            <div class="col-lg-8">
                                <div class="row gutter-20">
                                    <div class="col-lg-12 mb-30">
                                        <div class="service-wrap">
                                            <div class="image-part">
                                                <img src="<?= $_api_base_url.'/'.$event['image'] ?>" alt="">
                                            </div>
                                            <div class="content-part">
                                                <h3 class="title"><a href="<?= $_base_url.'/event/'.$event['slug'] ?>"><?= $event['name'] ?></a></h3>
                                                <div class="event-date">
                                                    <span class="sol-cat">Art</span>
                                                    <span><i class="fa fa-calendar-o"></i> <?= date('M d, Y h:i A', strtotime($event['event_date']." ".$event['event_time'])) ?></span>
                                                    <span><i class="fa fa-map-marker"></i> <?= $event['location'] ?></span>
                                                </div>
                                                <div class="desc"><?= $event['content'] ?></div>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="row">
                                <?php if(isset($current_events['data'][1])) { foreach(array_slice($current_events['data'], 1) as $event) { ?>
                                <div class="col-sm-6 mb-4">
                                    <div class="recent_post">
                                        <a href="<?= $_base_url.'/event/'.$event['slug'] ?>">
                                            <div class="post-img"><img src="<?= $_api_base_url.'/'.$event['image'] ?>"></div>
                                            <div class="p-title"><?= $event['name'] ?></div>
                                        </a>
                                    </div>
                                </div>
                                <?php } } ?>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    <!-- Upcoming Events Section End -->
    <?php endif; ?>


    <?php if(!empty($upcoming_events['data'])): ?>
    <!-- Upcoming Events Section Start  for 1 event -->
        <div id="rs-services" class="event rs-services style2 pt-100 pb-70 md-pt-80 md-pb-50 sm-pt-72">
            <div class="container">
                <div class="sec-title style2 mb-60 md-mb-50 sm-mb-42">
                    <div class="first-half text-right">
                        <div class="sub-title primary">Lorem ipsum dolor sit amet</div>
                        <h2 class="title mb-0">Upcoming Events</h2>
                    </div>
                    <div class="last-half">
                        <p class="desc mb-0 pr-50">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at dictum risus, non suscip it arcu. Quisque aliquam posuere tortor aliquam posuere tortor develop
                            database.</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <?php if($upcoming_events['to'] == 1) { $event =  $upcoming_events['data'][0]; ?>
                    <div class="col-lg-9">
                        <div class="row gutter-20">
                            <div class="col-lg-12 mb-30">
                                <div class="service-wrap">
                                    <div class="image-part">
                                        <img src="<?= $_api_base_url.'/'.$event['image'] ?>" alt="">
                                    </div>
                                    <div class="content-part">
                                        <h3 class="title"><a href="<?= $_base_url.'/event/'.$event['slug'] ?>"><?= $event['name'] ?></a></h3>
                                        <div class="event-date">
                                            <span class="sol-cat">Art</span>
                                            <span><i class="fa fa-calendar-o"></i> <?= date('M d, Y h:i A', strtotime($event['event_date']." ".$event['event_time'])) ?></span>
                                            <span><i class="fa fa-map-marker"></i> <?= $event['location'] ?></span>
                                        </div>
                                        <div class="desc"><?= $event['content'] ?></div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <?php } else if($upcoming_events['to'] == 2) { ?>
                        <?php $event =  $upcoming_events['data'][0]; ?>
                        <div class="col-lg-6">
                            <div class="row gutter-20">
                                <div class="col-lg-12 mb-30">
                                    <div class="service-wrap">
                                        <div class="image-part">
                                            <img src="<?= $_api_base_url.'/'.$event['image'] ?>" alt="">
                                        </div>
                                        <div class="content-part">
                                            <h3 class="title"><a href="<?= $_base_url.'/event/'.$event['slug'] ?>"><?= $event['name'] ?></a></h3>
                                            <div class="event-date">
                                                <span class="sol-cat">Art</span>
                                                <span><i class="fa fa-calendar-o"></i> <?= date('M d, Y h:i A', strtotime($event['event_date']." ".$event['event_time'])) ?></span>
                                                <span><i class="fa fa-map-marker"></i> <?= $event['location'] ?></span>
                                            </div>
                                            <div class="desc"><?= $event['content'] ?></div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                        <?php $event =  $upcoming_events['data'][1]; ?>
                        <div class="col-lg-6">
                            <div class="row gutter-20">
                                <div class="col-lg-12 mb-30">
                                    <div class="service-wrap">
                                        <div class="image-part">
                                            <img src="<?= $_api_base_url.'/'.$event['image'] ?>" alt="">
                                        </div>
                                        <div class="content-part">
                                            <h3 class="title"><a href="<?= $_base_url.'/event/'.$event['slug'] ?>"><?= $event['name'] ?></a></h3>
                                            <div class="event-date">
                                                <span class="sol-cat">Art</span>
                                                <span><i class="fa fa-calendar-o"></i> <?= date('M d, Y h:i A', strtotime($event['event_date']." ".$event['event_time'])) ?></span>
                                                <span><i class="fa fa-map-marker"></i> <?= $event['location'] ?></span>
                                            </div>
                                            <div class="desc"><?= $event['content'] ?></div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    <?php } else { ?>

                        <?php if(isset($upcoming_events['data'][0])) { $event =  $upcoming_events['data'][0]; ?>
                            <div class="col-lg-8">
                                <div class="row gutter-20">
                                    <div class="col-lg-12 mb-30">
                                        <div class="service-wrap">
                                            <div class="image-part">
                                                <img src="<?= $_api_base_url.'/'.$event['image'] ?>" alt="">
                                            </div>
                                            <div class="content-part">
                                                <h3 class="title"><a href="<?= $_base_url.'/event/'.$event['slug'] ?>"><?= $event['name'] ?></a></h3>
                                                <div class="event-date">
                                                    <span class="sol-cat">Art</span>
                                                    <span><i class="fa fa-calendar-o"></i> <?= date('M d, Y h:i A', strtotime($event['event_date']." ".$event['event_time'])) ?></span>
                                                    <span><i class="fa fa-map-marker"></i> <?= $event['location'] ?></span>
                                                </div>
                                                <div class="desc"><?= $event['content'] ?></div>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        <?php } ?>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="row">
                                <?php if(isset($upcoming_events['data'][1])) { foreach(array_slice($upcoming_events['data'], 1) as $event) { ?>
                                <div class="col-sm-6 mb-4">
                                    <div class="recent_post">
                                        <a href="<?= $_base_url.'/event/'.$event['slug'] ?>">
                                            <div class="post-img"><img src="<?= $_api_base_url.'/'.$event['image'] ?>"></div>
                                            <div class="p-title"><?= $event['name'] ?></div>
                                        </a>
                                    </div>
                                </div>
                                <?php } } ?>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    <!-- Upcoming Events Section End -->
    <?php endif; ?>
    

<?php if($past_events['data']): ?>
    <!-- Blog Section Start -->
    <div class="rs-blog style1 modify4 gray-bg2 bg41 pt-100 pb-100 md-pb-70 past-events-bg">
        <div class="container">
            <div class="sec-title5 text-center mb-50">
                <h2 class="title pb-20">Past Events</h2>
                <p class="description">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, eius to mod
                    tempor incidi dunt ut dolore.
                </p>
            </div>
            <div class="rs-carousel owl-carousel dot-style1" data-loop="true" data-items="3" data-margin="30"
                data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
                data-dots="true" data-nav="true" data-nav-speed="false" data-center-mode="false" data-mobile-device="1"
                data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2"
                data-ipad-device-nav="true" data-ipad-device-dots="true" data-ipad-device2="1"
                data-ipad-device-nav2="true" data-ipad-device-dots2="true" data-md-device="3" data-lg-device="3"
                data-md-device-nav="true" data-md-device-dots="true">

                <?php foreach ($past_events['data'] as $key => $event): ?>
                <div class="blog-wrap past-events">
                    <div class="img-part">
                        <img src="<?= $_api_base_url.'/'.$event['image'] ?>" alt="<?= $event['image'] ?>">
                        <div class="fly-btn">
                            <a href="<?= $_base_url.'/event/'.$event['slug'] ?>"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="content-part">
                        <h3 class="title">
                            <a href="<?= $_base_url.'/event/'.$event['slug'] ?>"><?= $event['name'] ?></a>
                        </h3>
                        <div class="blog-meta">
                            <!-- <div class="user-data">
                                <i class="fa fa-user-o"></i> <span>admin</span>
                            </div> -->
                            <div class="date">
                                <i class="fa fa-clock-o"></i> <?= date('M d, Y h:i A', strtotime($event['event_date']." ".$event['event_time'])) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>
    <!-- Blog Section End -->
<?php endif; ?>


    <?php include('includes/footer.php'); ?>