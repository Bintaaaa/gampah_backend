<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Gampah adalah aplikasi digititalisasi pelaporan sampah sembarangan berbasis Android. Gampah membuat gerakan untuk mengumpulkan informasi titik-titik penumpakan sampah di daerah yang kurang diperhatikan dan mengadakan penjemputan dengan sistematis.">
    <meta name="author" content="Bijan dan Seiko">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>Gampah - Aplikasi Pelaporan Sampah Sembaranganfa-stack-2x</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap"
        rel="stylesheet">
    <link href="{{ url('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/swiper.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/styles.css') }}" rel="stylesheet">

    <!-- Favicon  -->
    <link rel="icon" href="{{ url('assets/images/logo_gampah_2.png') }}">
</head>

<body data-spy="scroll" data-target=".fixed-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light">
        <div class="container">

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Pavo</a> -->

            <!-- Image Logo -->
            <a class="navbar-brand logo-image" href="index.html"><img src="{{ url('assets/images/logo_2.svg') }}" alt="alternative"></a>

            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#header">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#greeting">Greeting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#developer">Developer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#download">Download</a>
                    </li>
                </ul>
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h1 class="h1-large">Presentasi Aplikasi Gampah</h1>
                        <p class="p-large">Download aplikasinya, jadi kontributor dan terima hadiahnya!</p>
                        <a class="btn-solid-lg" href="https://github.com/seikosantana/gampah"><i
                                class="fab fa-github"></i>Repository</a>
                        <a class="btn-solid-lg secondary" href="#your-link"><i
                                class="fab fa-google-play"></i>Download</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/mKk_htyyVSs"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of header -->
    <!-- end of header -->


    <!-- Details 1 -->
    <div id="greeting" class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="text-container">
                        <h2>Salam hangat dari tim Gampah!</h2>
                        <p>Hai tim Dicoding dan tim Kampus Merdeka terimakasih atas dukungannya!</p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-7">
                    <div class="image-container">
                        <img class="img-fluid" src="{{ url('assets/images/salam.png') }}" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of details 1 -->



    <!-- Testimonials -->
    <div id="developer" class="slider-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">Developer Gampah</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card Slider -->
                    <div class="slider-container">
                        <div class="swiper-container card-slider">
                            <div class="swiper-wrapper">

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image" src="{{ url('assets/images/seiko.png') }}" alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-text">Aplikasi Gampah kami buat dengan sepenuh hati
                                                agar bisa menyelamatkan bumi dan anak cucu kita.</p>
                                            <p class="testimonial-author">Seiko Santana - Developer Gampah</p>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image" src="{{ url('assets/images/bijan.png') }}" alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-text">Gampah akan memunculkan banyak pahlawan bumi
                                                baru!</p>
                                            <p class="testimonial-author">Bijantyum- Developer Gampah</p>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->
                            </div> <!-- end of swiper-wrapper -->

                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <!-- end of add arrows -->

                        </div> <!-- end of swiper-container -->
                    </div> <!-- end of slider-container -->
                    <!-- end of card slider -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of slider-1 -->
    <!-- end of testimonials -->




    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4>Gampah adalah aplikasi pelaporan sampah sembarangan berbasis android</h4>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <p>Salam hangat dari Gampah!</p>
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <p class="p-small statement">Copyright © <a href="https://inovatik.com/pavo/index.html">Pavo</a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright -->
    <!-- end of copyright -->


    <!-- Scripts -->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script> <!-- Bootstrap framework -->
    <script src="{{ url('assets/js/jquery.easing.min.js') }}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{ url('assets/js/swiper.min.js') }}"></script> <!-- Swiper for image and text sliders -->
    <script src="{{ url('assets/js/jquery.magnific-popup.js') }}"></script> <!-- Magnific Popup for lightboxes -->
    <script src="{{ url('assets/js/scripts.js') }}"></script> <!-- Custom scripts -->
</body>

</html>