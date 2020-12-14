<?php
require_once "classes/asante.php";
$asante = new Asante();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/logoだけ.png" rel="icon">
  <link href="../assets/img/logoだけ.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Tempo - v2.1.0
  * Template URL: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <nav class="nav-menu bg-block">
        <ul>
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#portfolio">Products</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h1>Welcome to ASANTE</h1>
      <h2>We are providing African Clothes / Accsessaries / Goods which make you happy!</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>
          <h3>Learn more <span>About Us</span></h3>
          <p>We are attracted by african cloth and it gives us happiness and courage.</p>
        </div>

        <div class="row content offset-1">
          <div class="col-lg-4">
            <img src="../assets/img/logo.png" alt="" class="img-fluid mx-auto">
          </div>
          <div class="col-lg-6">
            <p>
              We provide African Clothes / Accsessaries / Goods which have good quality by the following ways.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> We choose cloth which is 100-percent-cotton. </li>
              <li><i class="ri-check-double-line"></i> We create our proguct with unique design you can wear anytime and practical shape you can use easly. </li>
              <li><i class="ri-check-double-line"></i> We corporate with tailors who have good skills.</li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Products</h2>
          <h3>Check our <span>Products</span></h3>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Woman</li>
              <li data-filter=".filter-card">Man</li>
              <li data-filter=".filter-web">Goods</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-web" id="Smallbag">
            <img src="../assets/img/products/背景なしバック.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Small bag</h4>
              <p>Goods</p>
              <a href="portfolio-details.html" class="details-link btn btn-outline-light" title="More Details">More Details</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="../assets/img/products/服３背景なし.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Red tunic</h4>
              <p>Woman</p>
              <a href="portfolio-details.html" class="details-link btn btn-outline-light" title="More Details">More Details</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="../assets/img/products/背景なしピアス.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Earring blue</h4>
              <p>Goods</p>
              <a href="portfolio-details.html" class="details-link btn btn-outline-light" title="More Details">More Details</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="../assets/img/products/服４背景なし.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Skirt violet</h4>
              <p>Woman</p>
              <a href="portfolio-details.html" class="details-link btn btn-outline-light" title="More Details">More Details</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="../assets/img/products/背景なしピアス２.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Earring maple</h4>
              <p>Goods</p>
              <a href="portfolio-details.html" class="details-link btn btn-outline-light" title="More Details">More Details</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="../assets/img/products/背景なし服３.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Dress long-red-flower</h4>
              <p>Woman</p>
              <a href="portfolio-details.html" class="details-link btn btn-outline-light" title="More Details">More Details</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="../assets/img/products/服２背景なし.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Dress short-blue</h4>
              <p>Woman</p>
              <a href="portfolio-details.html" class="details-link btn btn-outline-light" title="More Details">More Details</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="../assets/img/products/男性用ズボン.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Panth pencil</h4>
              <p>Man</p>
              <a href="portfolio-details.html" class="details-link btn btn-outline-light" title="More Details">More Details</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="../assets/img/products/男性服.png" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>T shirt</h4>
              <p>Man</p>
              <a href="portfolio-details.html" class="details-link btn btn-outline-light" title="More Details">More Details</a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

  
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <h3>Contact <span>Us</span></h3>
          <p>Get touch with us if you have any requests.</p>
        </div>

        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validate"></div>
            </div>
            <div class="col-md-6 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
            <div class="validate"></div>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
            <div class="validate"></div>
          </div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit" name="btnSend">Send Message</button></div>
        </form>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 footer-contact">
            <h3>ASANTE</h3>
            <p>
              <strong>Address:</strong> Kigali, Rwanda<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
            <div class="social-links pt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>We inform you about the arrival of new products and new cloth information.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>ASANTE</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/ -->
        </div>
      </div>
      <div class="social-links social-links2 text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>