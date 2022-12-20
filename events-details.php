<?php include('includes/header.php'); ?>

<?php
if(!isset($_GET['event']) || empty($_GET['event'])) {
    header('location:'.$_base_url);
}
$event_identifier = $_GET['event'];
// create curl resource
$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, "$_api_base_url/api/event/$event_identifier");

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$events = curl_exec($ch);

// close curl resource to free up system resources
curl_close($ch);

$event = json_decode($events, true);

?>
<!-- Main content Start -->
<div class="main-content">
    <?php include('includes/breadcrumbs.php'); ?>


    <!-- Current Events Section Start -->
    <div id="rs-services" class="event rs-services style2 gray-bg2 pt-100 pb-70 md-pt-80 md-pb-50 sm-pt-72">
 

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row gutter-20 d-flex justify-content-center">
                        <div class="col-lg-8 mb-30">
                            <div class="service-wrap">
                                <div class="image-part">
                                    <img src="<?= $_api_base_url.'/'.$event['image'] ?>" alt="">
                                </div>
                                <div class="content-part inner_cont">
                                    <h3 class="title"><a href="services-single.html"><?= $event['name'] ?></a></h3>
                                    <div class="event-date">
                                        <span class="sol-cat">Art</span>
                                        <span><i class="fa fa-calendar-o"></i> <?= date('M d, Y h:i A', strtotime($event['event_date']." ".$event['event_time'])) ?></span>
                                        <span><i class="fa fa-map-marker"></i> <?= $event['location'] ?></span>
                                        <!-- <span><i class="fa fa-user-o"></i> Kapil Gupta</span> -->
                                    </div>
                                    <div class="desc">
                                        <?= $event['content'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="service-wrap rb-lp-post">
                                <h4>Latest Posts</h4>  
                                <div class="footer-post rightsidebar-latest-post">                                    
                                    <div class="post-wrap mb-15">
                                        <div class="spinner-border text-light" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    </div>

                    <div id="rs-portfolio" class="rs-portfolio single pt-50 pb-70 md-pt-80 md-pb-50">
        <div class="container">
        <div class="row gallery-wrap">
            <div class="col-lg-4 col-sm-6 mb-30">
                <div class="gallery-item">
                    <div class="content-part">
                        <img src="images/portfolio/1.jpg" alt="">
                        <a class="image-popup" href="images/portfolio/1.jpg">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-30">
                <div class="gallery-item">
                    <div class="content-part">
                        <img src="images/portfolio/2.jpg" alt="">
                        <a class="image-popup" href="images/portfolio/2.jpg">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-30">
                <div class="gallery-item">
                    <div class="content-part">
                        <img src="images/portfolio/3.jpg" alt="">
                        <a class="image-popup" href="images/portfolio/3.jpg">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-30">
                <div class="gallery-item">
                    <div class="content-part">
                        <img src="images/portfolio/4.jpg" alt="">
                        <a class="image-popup" href="images/portfolio/4.jpg">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-30">
                <div class="gallery-item">
                    <div class="content-part">
                        <img src="images/portfolio/5.jpg" alt="">
                        <a class="image-popup" href="images/portfolio/5.jpg">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-30">
                <div class="gallery-item">
                    <div class="content-part">
                        <img src="images/portfolio/6.jpg" alt="">
                        <a class="image-popup" href="images/portfolio/6.jpg">
                            <i class="fa fa-search"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

                </div>             

            </div>
        </div>
    </div>
    <!-- Current Events Section End -->
<?php include('includes/footer.php'); ?>
<script>
    loadposts();
</script>