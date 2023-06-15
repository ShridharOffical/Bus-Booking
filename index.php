<?php
    include 'db_scripts/unique_views.php';
?> 
<html>
    <head>
        <title>BusX</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css">
        <meta name="viewport" content="width =device-width, intial-scale =1">
        <script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    </head>
        <body>
            <section id="banner">
                <img src="img/logo.png" class="logo">
                <div class="bannertext">
                    <h1>BusX</h1>
                    <p>Welcome to BusX.
                    Like family we Care.</p>
                    <div class="bannerbtn">
                        <a href="#fd"><span></span>Book Now!</a>
                        <a href="GetOtp.html"><span></span>Check Bookings</a>
                        <a href="#service"><span></span> More</a>

                    </div>
                </div>
            </section>
            <div id="sidenav">
                <nav>
                    <ul>
                        <li><a href="#banner">HOME</a></li>
                        <li><a href="GetOtp.html">Check Bookings</a></li>
                        <li><a href="#feature">FEATURES</a></li>
                        <li><a href="#fd">FEATURED DESTINATIONS</a></li>
                        <li><a href="#service">SERVICES</a></li>
                        <li><a href="#testimonials">TESTIMONIALS</a></li>
                        <li><a href="#footer">CONTACT US</a></li>
                    </ul>
                </nav>
            </div>
            <div id="menubtn">
                <img src="img/menu.png" id="menu">
            </div>

            <!--features-->
            
            <section id="feature">
                <div class="titletext">
                    <p>FEATURES</p>
                    <H1>Why Choose Us</H1>
                </div>

                <div class="featurebox">
                    <div class="features">
                        <h1>Experienced staff</h1>
                        <div class="featuresdesc">
                            <div class="featureicon">
                                <i class="fa fa-shield"></i>
                            </div>
                            <div class="featuretext">
                                <p>It is what it is even tho it is whhat it is, just like we said it is what it is...</p>
                            </div>
                        </div>
                        <h1>pre booking avalable</h1>
                        <div class="featuresdesc">
                            <div class="featureicon">
                                <i class="fa fa-check-square-o"></i>
                            </div>
                            <div class="featuretext">
                                <p>It is what it is even tho it is whhat it is, just like we said it is what it is...</p>
                            </div>
                        </div>
                        <h1>Afordable Cost</h1>
                        <div class="featuresdesc">
                            <div class="featureicon">
                                <i class="fa fa-inr"></i>
                            </div>
                            <div class="featuretext">
                                <p>It is what it is even tho it is whhat it is, just like we said it is what it is...</p>
                            </div>
                        </div>
                    </div>
                    <div class="featuresimg">
                        <img src="img/driver-mobile.jpg">
                    </div>
                </div>
            </section>

            <!--featured destinations---->
            <section id="fd">
            <div class="titletext">
                <p>FEATURED DESTINATIONS</p>
                <H1>What Are You Waiting For?</H1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="feature-box">
                            <div class="fature-img">
                                 <!--add booking page link in a tag---->
                                 <a href="Form.php">
                                <img src="img/Gateway-of-India-1-ImResizer-ImResizer.jpg" alt="">
                                 </a>
                                <div class="Price">
                                    <p>399₹</p>
                                </div>
                                <div class="Rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </div>
                            <div class="feature-details">
                                <h4>Mumbai</h4>
                                <p>Mumbai, the city where dreams are made and fulfilled! From jam-packed railway platforms to the famous Dabbawalas, multi-millionaires to suburban slums, the dazzling Bollywood to the quintessential vada pav, bhel puri, and sev puri, the uniqueness of Mumbai is beyond words.</p>

                            </div>
                            <span><i class="fa fa-map-marker"></i>Mumbai</span>
                            <span><i class="fa fa-sun-o"></i>6 hours</span>
                            <span><i class="fa fa-moon-o"></i>0 nights</span>
        
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-box">
                            <div class="fature-img">
                                <!--add booking page link in a tag---->
                                <a href="Form.php">
                                <img src="img/banglore.jpg" alt="">
                                </a>
                                <div class="Price">
                                    <p>450₹</p>
                                </div>
                                <div class="Rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    
                                </div>
                            </div>
                            <div class="feature-details">
                                <h4>Bangalore</h4>
                                <p>Bengaluru is a city of contrasts, going by several other aliases: India's Silicon Valley, Pub City, Shopper's Paradise, Garden City, Air-conditioned City, Gourmet's Delight, Pub Hopper's Paradise, Pensioners Paradise, IT and BT City and Shopper's Hot Spot. Surrounded by weekend getaways, Bengaluru makes an ideal hub for visitors who want to travel to the many hill stations and coastal towns of South India.</p>

                            </div>
                            <span><i class="fa fa-map-marker"></i>Bangalore</span>
                            <span><i class="fa fa-sun-o"></i>10 hours</span>
                            <span><i class="fa fa-moon-o"></i>0 nights</span>
        
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-box">
                            <div class="fature-img">
                                 <!--add booking page link in a tag---->
                                <a href="Form.php">
                                <img src="img/Lotus-Tmple-Photo-by-Arpan-Das-980x614-ImResizer-ImResizer.jpg" alt="">
                                </a>
                                <div class="Price">
                                    <p>1400₹</p>
                                </div>
                                <div class="Rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </div>
                            <div class="feature-details">
                                <h4>Delhi</h4>
                                <p>Delhi is a destination of every traveller’s dream. Its mystical presence makes it a favourite destination for both domestic as well as international tourists.Dotted with many mesmerising architectures, Delhi is a dream destination of history and architecture lovers. Its historical splendour is accompanied by modern facilities and comfort of latest facilities, transportation and commutation facilities. This makes Delhi a destination worth visiting by all, irrespective of age and interest.</p>

                            </div>
                            <span><i class="fa fa-map-marker"></i>Delhi</span>
                            <span><i class="fa fa-sun-o"></i>1 Day</span>
                            <span><i class="fa fa-moon-o"></i>1 night</span>
        
                        </div>
                    </div>

                </div>

            </div>
        </section>
           
            <!--service---->
            <section id="service">
                <div class="titletext">
                    <p>SERVICES</p>
                    <H1>We Provide Better</H1>
                </div>
                <div class="service-box">
                    <div class="single-service">
                        <img src="img/doorstep-mobile-ImResizer.jpg">
                        <div class="overlay"></div>
                        <div class="servicedesc">
                            <h3>Doorstep to Destination</h3>
                            <hr>
                            <p>Best-in-class buses every 15 min, that 
                                get you to work as fast as your car.
                                
                                3 min
                                Walk to
                                stop
                                95%
                                On time
                                arrival</p>
                        </div>
                    </div>
                    <div class="single-service">
                        <img src="img/delhi-mumbai-second-fold-ImResizer.jpg">
                        <div class="overlay"></div>
                        <div class="servicedesc">
                            <h3>Let us do the driving</h3>
                            <hr>
                            <p>Let us do the driving
                                Listen to music, catch-up on your Netflix, or 
                                simply relax in your comfortable seat in an air 
                                conditioned bus. </p>
                        </div>
                    </div>
                    <div class="single-service">
                        <img src="img/appview-mobile-ImResizer.jpg">
                        <div class="overlay"></div>
                        <div class="servicedesc">
                            <h3>Always in control</h3>
                            <hr>
                            <p>Track your bus with accurate ETA, 
                                reschedule rides to fit your flexible 
                                schedule in our easy-to-use app.</p>
                        </div>
                    </div>
                    <div class="single-service">
                        <img src="img/delhi-mumbai-hero-desktop-ImResizer.jpg">
                        <div class="overlay"></div>
                        <div class="servicedesc">
                            <h3>Sail Above Traffic</h3>
                            <hr>
                            <p>Premium buses to office for 
                                corporate professionals. An 
                                experience so stress-free, 8000+ 
                                have switched from their cars.</p>
                        </div>
                    </div>
                </div>
            </section>
            <!--testimonial---->
            <section id="testimonials">
                <div class="titletext">
                    <p>TESTIMONIALS</p>
                    <H1>What Client Says</H1>
                </div>
                <div class="testimonialrow">
                    <div class="testimonialcol">
                        <div class="user">
                            <img src="img/img-1.jpg">
                            <div class="userinfo">
                                <h4>Monkey D. luffy   <i class="fa fa-twitter"></i></h4>
                                <small>@senchou</small>
                            </div>
                        </div>
                        <p>Appreciate the service and the driver for his smooth , timely driving and courteous manners . Seriously .. your rides are ridiculously or time ! Keep it up !</p>
                    </div>
                    <div class="testimonialcol">
                        <div class="user">
                            <img src="img/img-2.jpg">
                            <div class="userinfo">
                                <h4>Nami Chwan   <i class="fa fa-twitter"></i></h4>
                                <small>@catBurgler</small>
                            </div>
                        </div>
                        <p>As a woman , I feel safe and secure in a BusX. The drivers are courteous and very well trained . My co - passergers are so nice . The entire atmosphere is nice and enjoyable </p>
                    </div>
                    <div class="testimonialcol">
                        <div class="user">
                            <img src="img/img-3.jpg">
                            <div class="userinfo">
                                <h4>Roronoa Zoro   <i class="fa fa-twitter"></i></h4>
                                <small>@zorosenpai</small>
                            </div>
                        </div>
                        <p>I've stopped using my car for the first time in 7 years for long routes.BusX You've made life for commuters very , very easy .</p>
                    </div>
                </div>
            </section> 
         
            <!--footer---->
            <section id="footer">
                <img src="img/logo.png" class="footerimg">
                <div class="titletext">
                    <p>CONTACT</p>
                    <H1>Visit Us Today</H1>
                </div>
                <div class="footerrow">
                    <div class="footerleft">
                        <h1>Working Hours</h1>
                        <i class="fa fa-comments"></i><a href="https://wa.me/918208147136">Contact on WhatsApp</a>

                        <p><i class="fa fa-clock-o"></i>Monday to Friday - 9am to 9pm </p>
                        <p><i class="fa fa-clock-o"></i>Saturday to Sunday - 8am to 11pm </p>
                    </div>
                    <div class="footerrit">
                        <h1>Get in Touch</h1>
                        <p>201, 2th floor , Centrum IT Park,</p>
                          <p>SG Barve Rd, opp. Raila Devi Lake,</p>   
                           <p> Near Industrial Estate, </p>
                            <p>Kolhapur, Maharashtra 400604<i class="fa fa-map-marker"></i></p>
                            <p>BusX@gmail.com<i class="fa fa-paper-plane"></i></p>
                            <p>02312626226<i class="fa fa-phone"></i></p>
                    </div>
                </div>
                <div class="Sociallinks">
                    <i class="fa fa-facebook"></i>
                    <i class="fa fa-instagram"></i>
                    <i class="fa fa-twitter"></i>
                    <i class="fa fa-youtube-play"></i>
                    <p>Social Media</p>
                    <p>Project Build By</p>
                    <p>|| SHRIDHAR PATIL || SHREYAS KUNNURE || MAYURI AMBEWADKAR ||</p>
                    

                </div>

            </section>


            <script>
                var menubtn = document.getElementById("menubtn")
                var sidenav = document.getElementById("sidenav")
                var menu = document.getElementById("menu")

                sidenav.style.right = "-250px";

                menubtn.onclick = function(){
                    if (sidenav.style.right == "-250px") {
                        sidenav.style.right = "0";
                        menu.src = "img/close.png";
                    }
                    else
                    sidenav.style.right = "-250px";
                    menu.src = "img/menu.png";
                
                }
                var scroll = new SmoothScroll('a[href*="#"]', {
	            speed: 3500,
	            speedAsDuration: true
               });

               

          </script>
    </body>
    
</html>