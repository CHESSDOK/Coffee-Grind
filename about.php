<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>COFFEE GRIND - About</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.min.css" rel="stylesheet">

    <style>
        .justified-text {
            text-align: justify;
            text-justify: inter-word; /* Added property for improved justification */
        }
        .bg{
            position: absolute;
            width: 100%;
            height: 100%;
        }
        .centered{
            position: absolute;
            margin: auto;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }
        .pour{
            width: 10px;
            height: 180px;
            background: #3d2517;
            border-top-right-radius: 60px;
            overflow: hidden;
        }
        .stripes{
            position: relative;
            width: 10px;
            height: 5px;
            background: #4d3113;
            transform: rotate(45deg);
            animation: strip 0.8s infinite linear;
        }
        .stripes:nth-child(2){
            animation: strip 0.8s 0.3s infinite linear;
        }
        .stripes:nth-child(3){
            animation: strip 0.8s 0.6s infinite linear; 
        }
        .splash{
            width: 10px;
            height: 10px;
            background: #4d3113;
            border-radius: 50%;
            animation: splash-right 0.4s infinite linear;
        }
        .splash:nth-child(2){
            animation: splash-left 0.4s 0.2s infinite linear;
        }
        .splash:nth-child(3){
            transform: rotate(-45deg);
            animation: splash-height 0.6s 0.1s infinite linear;
        }
        .pot{
            width: 200px;
            height: 200px;
            left: -280px;
            top: -192px;
            background: rgba(0,0,0,.2);
            border-top-left-radius: 120px;
            border-top-right-radius: 120px;
            border-bottom-right-radius: 45%;
            border-bottom-left-radius: 45%;
            transform: rotate(60deg);
            overflow: hidden;
            mask-image: radial-gradient(circle, white 100%, black 100%);
        }
        .pot-handle{
            width: 40px;
            height: 60px;
            top: -400px;
            left: -405px;
            border: black solid 13px;
            border-bottom-left-radius: 50px;
            border-top-left-radius: 50%;
            transform: rotate(63deg);
        }
        .pot-lip{
            width: 40px;
            height: 40px;
            left: -50px;
            top: -190px;
            background: #000;
            border-top-right-radius: 50%;
            border-bottom-left-radius: 50%;
        }
        .pot-bar{
            width: 30px;
            height: 120px;
            left: -120px;
            top: -290px;
            background: #000;
            border-top-right-radius: 5px;
            transform: rotate(-30deg);
        }
        .pot-lines{
            position: absolute;
            margin: auto;
            top: 0;
            bottom: 0;
            left: 30px;
            width: 1px;
            height: 100px;
            background: #000;
        }
        .tick{
            position: relative;
            display: block;
            left: -10px;
            width: 10px;
            height: 1px;
            margin: 10px;
            background: #000;
        }
        .fill{
            position: absolute;
            margin: auto;
            bottom: -50px;
            width: 300px;
            height: 150px;
            background: #3d2517;
            transform: rotate(-60deg);
            animation: fill 0.4s infinite ease-in-out;
        }
        .coffee{
            width: 140px;
            height: 10px;
            top: 180px;
            background: #3d2517;
            border: 5px solid #f2b879;
            border-radius: 50%;
        }
        .ripple{
            position: relative;
            opacity: 0;
            height: 3px;
            margin: auto;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            background: #4d3113;
            animation: ripple 0.55s 0.4s infinite linear;
        }
        .ripple:nth-child(2){
            animation: ripple 0.55s 0.6s linear;
        }
        .cup{
            width: 150px;
            height: 80px;
            top: 260px;
            background: linear-gradient(#f2b879 30%, #a37d53);
            border-bottom-left-radius: 100px;
            border-bottom-right-radius: 100px;
            border-bottom: #edcead solid 1px;
        }
        .cup-bottom{
            width: 50px;
            height: 4px;
            background: #edcead;
            border-bottom-left-radius: 50%;
            border-top-left-radius: 50%;
        }
        .cup-handle{
            width: 30px;
            height: 20px;
            top: 250px;
            left: -160px;
            border: #e6ae73 solid 10px;
            border-bottom-left-radius: 50px;
            border-top-left-radius: 50%;
        }
        .plate{
            position: absolute;
            width: 150px;
            height: 20px;
            top: 340px;
            background: #f2bb79;
            border-radius: 50%;
        }
        .plate#inner{
            width: 120px;
            height: 15px;
            background: radial-gradient(#a37d53, #f2bb79 70%);
        }
        @keyframes strip{
            0%{
                top: 0;
            }
            100%{
                top: 100%;
            }
        }
        @keyframes ripple{
            0%{
                opacity: 1;
                width: 0px;
            }
            100%{
                opacity: 0;
                width: 160px;
            }
        }
        @keyframes splash-right{
            0%{
                width: 0px;
                height: 0px;
                top: 180px;
            }
            60%{
                width: 5px;
                height: 4px;
                top: 150px;
                left: 30px;
            }
            100%{
                width: 6px;
                height: 6px;
                top: 180px;
                left: 50px;
            }
        }
        @keyframes splash-left{
            0%{
                width: 0px;
                height: 0px;
                top: 180px;
            }
            60%{
                width: 5px;
                height: 4px;
                top: 150px;
                left: -30px;
            }
            100%{
                width: 6px;
                height: 6px;
                top: 180px;
                left: -50px;
            }
        }
        @keyframes splash-height{
            0%{
                width: 3px;
                height: 5px;
                top: 180px;
            }
            50%{
                 width: 3px;
                height: 5px;
                top: 120px;
            }
            60%{
                 width: 2px;
                height: 2px;
                top: 115px;
                left: -20px;
            }
            100%{
                 width: 3px;
                height: 5px;
                top: 180px;
                left: -30px;
            }
        }
        @keyframes fill{
            0%{
                transform: rotate(-62deg);
            }
            50%{
                transform: rotate(-58deg);
            }
            100%{
                transform: rotate(-62deg);
            }
        }
            </style>
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="index.html" class="navbar-brand px-lg-4 m-0">
                <h1 class="m-0 display-4 text-uppercase text-white">COFFEE GRIND</h1>
            </a> 
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse"> 
                <span class="navbar-toggler-icon"></span> 
            </button> 
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse"> 
                <div class="navbar-nav ml-auto p-4"> 
                    <a href="index.html" class="nav-item nav-link">Home</a> 
                    <a href="about.php" class="nav-item nav-link active">About</a>
                    <a href="menu.html" class="nav-item nav-link">Menu</a>
                    <a href="reservation.php" class="nav-item nav-link">Reservation</a>
                    <a href="contact.php" class="nav-item nav-link">Order</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">About Us</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">About Us</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">ABOUT US</h4>
                <h1 class="display-4">COFFEE SHOP IN A CART</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 py-0 py-lg-5">
                    <h1 class="mb-3">OUR HISTORY</h1>
                    <p class="justified-text">Experiencing the pandemic, a delivery service was launched in Santa Cruz, Laguna on the year 2020 by Ian Kakilala and his partner. After success in delivery, they ventured into a business seamlessly fitting into daily lives, creating "COFFEE GRIND" on March 6, 2021, with Jhoan Escudero and Ian Kakilala as proprietors. Personally overseeing construction, ideas, locations, market strategy, and coffee production, they aimed to meet community needs. The business name, "COFFEE GRIND," reflects the idea that coffee helps grind through each day.</p>
                </div>
                <div class="col-lg-6 py-5 py-lg-3" style="min-height: 500px;">
                            <div class="bg">
                                <div class="centered pot">
                                <div class="fill"></div>
                                    <div class="pot-lines">
                                    <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                        <div class="tick"></div>
                                    </div>
                                </div>
                                <div class="centered pot-lip"></div>
                                <div class="centered pot-bar"></div>
                                <div class="centered pot-handle"></div>
                                
                                <div class="centered plate"></div>
                                <div class="centered plate" id="inner"></div>
                                <div class="centered cup-handle"></div>
                                <div class="centered cup"></div>
                                <div class="centered cup-bottom"></div>
                                
                                <div class="centered coffee">
                                <div class="ripple"></div>
                                </div>
                                <div class="centered pour">
                                <div class="stripes"></div>
                                    <div class="stripes"></div>
                                    <div class="stripes"></div>
                                </div>
                                <div>
                                <div class="centered splash"></div>
                                    <div class="centered splash"></div>
                                    <div class="centered splash"></div>
                                </div>
                                </div>
                </div>
                <div class="col-lg-3 py-0 py-lg-5">
                    <h1 class="mb-3">OUR <br> VISION</h1>
                    <p class="justified-text">We believe in coffee's versatile and comforting role, a steadfast companion that sustains us. Coffee, a survival elixir, fuels our endurance and engagement in life. With conviction, we aim to inspire coffee enthusiasts to realize their dream coffee shop, starting modestly and potentially growing into a thriving enterprise. Savor your coffee moments, persevere through challenges - always with coffee and unwavering determination to grind through each day.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Footer Start -->
<div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative overlay-top">
        <div class="row mx-0 pt-5 px-sm-3 px-lg-5 mt-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Get In Touch</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>Los Baños, Philippines</p>
                <p><i class="fa fa-phone-alt mr-2"></i>0995 285 7996</p>
                <p class="m-0"><i class="fa fa-envelope mr-2"></i>coffeegrindlosbanos@gmail.com</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Follow Us</h4>
                <p>Coffe Grind - Los Baños Social</p>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="https://www.facebook.com/profile.php?id=100086514142061"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Open Hours</h4>
                <div>
                    <h6 class="text-white text-uppercase">Monday - Friday</h6>
                    <p>9:00 AM - 11:00 PM</p>
                    <h6 class="text-white text-uppercase">Saturday - Sunday</h6>
                    <p>9:00 AM - 11:00 PM</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Newsletter</h4>
                <p>Receive news and updates from us!</p>
                <div class="w-100">
                    <div class="input-group">
                        <form id="emailForm">
                            <div class="input-group" style="width: 300px;">
                                <input type="text" id="emailInput" class="form-control border-light" style="padding: 25px;" placeholder="Your Email">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary font-weight-bold px-3" onclick="submitForm()">Submit</button>
                                </div>
                            </div>
                        </form>

                        <script>
                            function submitForm() {
                                var email = document.getElementById("emailInput").value;

                                fetch('process_form.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded',
                                    },
                                    body: 'email=' + encodeURIComponent(email),
                                })
                                .then(response => response.text())
                                .then(data => {
                                    alert(data);
                                    emailInput.value = '';
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                });
                            }
                        </script>
                    </div>
                </div>
            </div>
        <div class="container-fluid text-center text-white border-top mt-4 py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
            <p class="mb-2 text-white">Copyright &copy; <a class="font-weight-bold">LSPU Los Baños</a>. All Rights Reserved.</a></p>
            <p class="m-0 text-white">Designed by <a class="font-weight-bold">Law and Friends</a></p>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>