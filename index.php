<!DOCTYPE html>
<?php
session_start();
?>

<html lang="en">

<head>
  <title>THE BEST AGORA FRANCIA ECOM</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">
</head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<link rel="stylesheet" type="text/css" href="icomoon/icomoon.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="css/vendor.css">
<link rel="stylesheet" type="text/css" href="style.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
  href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;600;700&family=Jost:wght@400;600;700&display=swap"
  rel="stylesheet">

</head>

<body>

  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <defs>
      <symbol xmlns="http://www.w3.org/2000/svg" id="link" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M12 19a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0-4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm-5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm7-12h-1V2a1 1 0 0 0-2 0v1H8V2a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3Zm1 17a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9h16Zm0-11H4V6a1 1 0 0 1 1-1h1v1a1 1 0 0 0 2 0V5h8v1a1 1 0 0 0 2 0V5h1a1 1 0 0 1 1 1ZM7 15a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0 4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-right" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="category" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M19 5.5h-6.28l-.32-1a3 3 0 0 0-2.84-2H5a3 3 0 0 0-3 3v13a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-10a3 3 0 0 0-3-3Zm1 13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-13a1 1 0 0 1 1-1h4.56a1 1 0 0 1 .95.68l.54 1.64a1 1 0 0 0 .95.68h7a1 1 0 0 1 1 1Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="calendar" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M19 4h-2V3a1 1 0 0 0-2 0v1H9V3a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3Zm1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16Zm0-9H4V7a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V6h6v1a1 1 0 0 0 2 0V6h2a1 1 0 0 1 1 1Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="heart" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="plus" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="minus" viewBox="0 0 24 24">
        <path fill="currentColor" d="M19 11H5a1 1 0 0 0 0 2h14a1 1 0 0 0 0-2Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="cart" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74a3.007 3.007 0 0 0-2.82-2H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="check" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M18.71 7.21a1 1 0 0 0-1.42 0l-7.45 7.46l-3.13-3.14A1 1 0 1 0 5.29 13l3.84 3.84a1 1 0 0 0 1.42 0l8.16-8.16a1 1 0 0 0 0-1.47Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="trash" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M10 18a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1ZM20 6h-4V5a3 3 0 0 0-3-3h-2a3 3 0 0 0-3 3v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8h1a1 1 0 0 0 0-2ZM10 5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v1h-4Zm7 14a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8h10Zm-3-1a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="star-outline" viewBox="0 0 15 15">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
          d="M7.5 9.804L5.337 11l.413-2.533L4 6.674l2.418-.37L7.5 4l1.082 2.304l2.418.37l-1.75 1.793L9.663 11L7.5 9.804Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="star-solid" viewBox="0 0 15 15">
        <path fill="currentColor"
          d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="search" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="user" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19ZM12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="close" viewBox="0 0 15 15">
        <path fill="currentColor"
          d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z" />
      </symbol>

    </defs>
  </svg>

  <div class="preloader-wrapper">
    <div class="preloader">
    </div>
  </div>

  <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
    <div class="offcanvas-header justify-content-center">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
  <div class="order-md-last">
    <h4 class="d-flex justify-content-between align-items-center mb-4">
      <span class="text-primary">
        <a href="cart.php" class="text-decoration-none text-primary">Your Cart</a>
      </span>
      <span class="badge bg-primary rounded-circle pt-2">
        <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
      </span>
    </h4>

    <ul class="list-group mb-4">
      <?php
     
      if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0):
        $total = 0;
        foreach ($_SESSION['cart'] as $id => $item):
          $title = isset($item['title']) ? htmlspecialchars($item['title']) : 'Unknown Product';
          $price = isset($item['price']) ? $item['price'] : 0;
          $quantity = isset($item['quantity']) ? $item['quantity'] : 1;
          $subtotal = $price * $quantity;
          $total += $subtotal;
      ?>
        <li class="list-group-item d-flex justify-content-between lh-sm">
          <div>
            <h6 class="my-0"><?php echo $title; ?></h6>
            <small class="text-body-secondary">Quantity: <?php echo $quantity; ?></small>
          </div>
          <span class="text-body-secondary">€<?php echo number_format($subtotal, 2); ?></span>
        </li>
      <?php endforeach; ?>
        <li class="list-group-item d-flex justify-content-between">
          <span class="fw-bold">Total (EUR)</span>
          <strong>€<?php echo number_format($total, 2); ?></strong>
        </li>
      <?php else: ?>
        <li class="list-group-item d-flex justify-content-between">
          <span class="text-body-secondary">Your cart is empty.</span>
        </li>
      <?php endif; ?>
    </ul>

    <a href="payment.html" class="w-100 btn btn-dark">Continue to checkout</a>
  </div>
</div>

  </div>

  <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch"
    aria-labelledby="Search">
    <div class="offcanvas-header justify-content-center">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

      <div class="order-md-last">
        <h4 class="text-primary text-uppercase mb-3">
          Search
        </h4>
        <div class="search-bar border rounded-2 border-dark-subtle">
          <form id="search-form" class="text-center d-flex align-items-center" action="" method="">
            <input type="text" class="form-control border-0 bg-transparent" placeholder="Search Here" />
            <iconify-icon icon="tabler:search" class="fs-4 me-3"></iconify-icon>
          </form>
        </div>
      </div>
    </div>
  </div>


  <nav class="main-menu d-flex navbar fixed-top navbar-expand-lg py-4 ">
    <div class="container">
      <div class="main-logo">
        <a href="index.php">
          <img src="images/logo.png" alt="logo" class="img-fluid" style="width: 70px; height: auto;">
        </a>
      </div>

      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

        <div class="offcanvas-header justify-content-center">
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body justify-content-between">

          <ul class="navbar-nav menu-list list-unstyled d-flex gap-md-3 ps-lg-5 mb-0">
            <li class="nav-item">
              <a href="index.php" class="nav-link mx-2 active">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link mx-2 dropdown-toggle" role="button" id="pages" data-bs-toggle="dropdown"
                aria-expanded="false">Pages</a>
              <ul class="dropdown-menu" aria-labelledby="pages">
                <li><a href="about.html" class="dropdown-item">About Us</a></li>
                
                <li><a href="cart.php" class="dropdown-item">Checkout</a></li>
               
               
                <li><a href="contact.html" class="dropdown-item">Contact</a></li>
                <li><a href="faqs.html" class="dropdown-item">FAQs</a></li>
                
              </ul>
            </li>
            <li class="nav-item">
              <a href="chat.php" class="nav-link mx-2">Notifications</a>
            </li>
            

          <div class="d-none d-lg-flex align-items-end">
            <ul class="d-flex justify-content-end list-unstyled m-0"> 
<li>
    <?php if (isset($_SESSION['user'])): ?>
        <!-- Redirect to the user profile page if logged in -->
        <a href="profile.php" class="mx-3" title="Your Profile">
            <iconify-icon icon="healthicons:person" class="fs-4"></iconify-icon>
        </a>
    <?php else: ?>
        <!-- Redirect to the login page if not logged in -->
        <a href="account.html" class="mx-3">
            <iconify-icon icon="healthicons:person" class="fs-4"></iconify-icon>
        </a>
    <?php endif; ?>
</li>

            
              <li>
                <a href="wishlist.php" class="mx-3">
                  <iconify-icon icon="mdi:heart" class="fs-4"></iconify-icon>
                </a>
              </li>

              <li class="">
                <a href="#" class="mx-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"
                  aria-controls="offcanvasCart">
                  <iconify-icon icon="mdi:cart" class="fs-4 position-relative"></iconify-icon>
                  <span class="position-absolute translate-middle badge rounded-circle bg-primary">
    <?php 
    // Ensure the session is started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Count the total quantity of products in the cart
    $productCount = 0;
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        foreach ($_SESSION['cart'] as $item) {
            $productCount += isset($item['quantity']) ? $item['quantity'] : 1; // Default quantity is 1
        }
    }
    echo str_pad($productCount, 2, '0', STR_PAD_LEFT); // Format to 2 digits (e.g., 03)
    ?>
</span>

                </a>
              </li>

              <li>
                <a href="#" class="mx-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch"
                  aria-controls="offcanvasSearch">
                  <iconify-icon icon="tabler:search" class="fs-4"></iconify-icon>
                </a>
              </li>

            </ul>

          </div>

        </div>
      </div>

    </div>
    <div class="container d-lg-none">
      <div class="d-flex  align-items-end mt-3">
        <ul class="d-flex justify-content-end list-unstyled m-0">
          <li>
            <?php if (isset($_SESSION['user'])): ?>
                        <!-- Redirect to the user profile page if logged in -->
        <a href="profile.php" class="mx-3" title="Your Profile">
            <iconify-icon icon="healthicons:person" class="fs-4"></iconify-icon>
        </a>
            <?php else: ?>
                <a href="account.html" class="mx-3">
                    <iconify-icon icon="healthicons:person" class="fs-4"></iconify-icon>
                </a>
            <?php endif; ?>
        </li>
        
          <li>
            <a href="wishlist.php" class="me-4">
              <iconify-icon icon="mdi:heart" class="fs-4 me-2"></iconify-icon>
            </a>
          </li>

          <li>
            <a href="#" class="me-4" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"
              aria-controls="offcanvasCart">
              <iconify-icon icon="mdi:cart" class="fs-4 me-2 position-relative"></iconify-icon>
              <span class="position-absolute translate-middle badge rounded-circle bg-primary">
    <?php 
    // Ensure the session is started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Count the total quantity of products in the cart
    $productCount = 0;
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        foreach ($_SESSION['cart'] as $item) {
            $productCount += isset($item['quantity']) ? $item['quantity'] : 1; // Default quantity is 1
        }
    }
    echo str_pad($productCount, 2, '0', STR_PAD_LEFT); // Format to 2 digits (e.g., 03)
    ?>
</span>

            </a>
          </li>

          <li>
            <a href="#" class="me-4" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch"
              aria-controls="offcanvasSearch">
              <iconify-icon icon="tabler:search" class="fs-4 me-2"></iconify-icon>
            </a>
          </li>
        </ul>

      </div>
    </div>
  </nav>

  <section id="hero" style="background-image:url(images/banner-img1.jpg);">
    <div class="container padding-large d-flex justify-content-center align-items-center" style="min-height: 100vh;">
      <div class="text-center" 
           style="background-color: rgba(0, 0, 0, 0.7); padding: 40px 30px; border-radius: 30px; width: 90%; max-width: 500px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);">
        <h2 class="display-4 text-uppercase text-white">Agora Francia</h2>
        <p class="text-white mt-3 mb-4">Best selling website</p>
        <a href="allproducts.php" class="btn btn-outline-light" style="padding: 10px 20px; border-width: 2px; border-radius: 20px;">
          Start Shopping <i class="icon icon-arrow-io fs-5 align-text-bottom"></i>
        </a>
      </div>
    </div>
  </section>
  
  
  

  <section id="service" class="padding-medium">
  
  <div >  . </div>        
    <div class="container">
      <div class="row g-md-5 pt-4">
        <div class="col-md-3 my-3">
          <div class="card">
            <div>
              <iconify-icon class="service-icon text-primary fs-2" icon="ci:shopping-cart-02"></iconify-icon>
            </div>
            <h4 class="py-2 m-0">Free Delivery</h3>
              <div class="card-text">
                <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
              </div>
          </div>
        </div>
        <div class="col-md-3 my-3">
          <div class="card">
            <div>
              <iconify-icon class="service-icon text-primary fs-2" icon="tdesign:secured"></iconify-icon>
            </div>
            <h4 class="py-2 m-0">100% secure payment</h3>
              <div class="card-text">
                <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
              </div>
          </div>
        </div>
        <div class="col-md-3 my-3">
          <div class="card">
            <div>
              <iconify-icon class="service-icon text-primary fs-2" icon="la:award"></iconify-icon>
            </div>
            <h4 class="py-2 m-0">Quality guarantee</h3>
              <div class="card-text">
                <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
              </div>
          </div>
        </div>
        <div class="col-md-3 my-3">
          <div class="card">
            <div>
              <iconify-icon class="service-icon text-primary fs-2" icon="solar:dollar-outline"></iconify-icon>
            </div>
            <h4 class="py-2 m-0">Daily Offer</h3>
              <div class="card-text">
                <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
              </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section id="products-section" class="py-12 bg-gray-100">
    <div class="p-6 mx-auto lg:max-w-7xl sm:max-w-full">
      <h2 class="text-4xl font-extrabold text-gray-800 mb-8 text-center">Our Products</h2>
  
      <!-- Include Products -->
      <?php include 'products.php'; ?>
  
      <!-- View All Products Button -->
       <!-- Button -->
       
       <form action="allproducts.php" method="get">
        <div class="d-grid gap-2">
          <button type="submit" class="btn btn-dark btn-lg rounded-3">ALL PRODUCTS</button>
        </div>
      </form>
      
</div>

      </div>
      
  </section>
  
  <section id="category" class="padding-medium">
  <div class="container-fluid">
    <div class="row px-md-5">

      <!-- Rare Products -->
      <div class="col-md-4 position-relative">
        <div class="z-1 position-absolute bottom-0 start-0 m-3 mg-lg-5 ps-4 text-white">
          <h5 class="text-light text-uppercase">Rare products</h5>
        </div>
        <div class="image-holder zoom-effect">
          <a href="allproducts.php?category=Rare">
            <img src="images/category1.jpg" alt="Category Image" class="post-image img-fluid" style="width: 600px; height: 600px; object-fit: cover; margin: 10px; border-radius: 5px;">
          </a>
        </div>
      </div>

      <!-- Normal Products -->
      <div class="col-md-4 position-relative">
        <div class="z-1 position-absolute bottom-0 start-0 m-3 mg-lg-5 ps-4 text-white">
          <h5 class="text-light text-uppercase">Normal products</h5>
        </div>
        <div class="image-holder zoom-effect">
          <a href="allproducts.php?category=Normal">
            <img src="images/category3.jpg" alt="Category Image" class="post-image img-fluid" style="width: 600px; height: 600px; object-fit: cover; margin: 10px; border-radius: 5px;">
          </a>
        </div>
      </div>

      <!-- Luxury Products -->
      <div class="col-md-4 position-relative">
        <div class="z-1 position-absolute bottom-0 start-0 m-3 mg-lg-5 ps-4 text-white">
          <h5 class="text-light text-uppercase">Luxury products</h5>
        </div>
        <div class="image-holder zoom-effect">
          <a href="allproducts.php?category=Luxury">
            <img src="images/category2.jpg" alt="Category Image" class="post-image img-fluid" style="width: 600px; height: 600px; object-fit: cover; margin: 10px; border-radius: 5px;">
          </a>
        </div>
      </div>

    </div>
  </div>
</section>


  <section id="register" style="background-image:url(images/background-img.jpg);">
    <div class="container padding-medium">
      <div class="row banner-content align-items-center">
        <div class="col-md-4 offset-md-1">
          <h2 class="register-text text-white mt-3">Get <span> <em>20% OFF</em> </span> on your first purchase</h2>
          <p class="mb-4">Sign Up for our newsletter and never miss any offers</p>
        </div>
        <div class="col-md-4 offset-md-1">
          <form>
            <div class="mb-3">
              <input type="email" class="form-control form-control-lg rounded-3" name="email" id="email"
                placeholder="Enter Your Email Address">
            </div>
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-dark btn-lg rounded-3">Register it now</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </section>

  <footer id="footer" class="bg-black">
    <div class="container padding-medium pt-5">
      <div class="row mt-5">
        <div class="col-md-4 offset-md-1">
          <div class="footer-menu">
            <img src="images/logo-dark.png" alt="logo">
            <div class="social-links mt-4">
              <ul class="d-flex list-unstyled gap-3">
                
              <li class="social">
  <a href="https://twitter.com/ECEingenieurs" target="_blank" rel="noopener noreferrer">
    <iconify-icon class="social-icon fs-5 text-white me-4" icon="ri:twitter-fill"></iconify-icon>
  </a>
</li>
<li class="social">
  <a href="https://www.pinterest.com/" target="_blank" rel="noopener noreferrer">
    <iconify-icon class="social-icon fs-5 text-white me-4" icon="ri:pinterest-fill"></iconify-icon>
  </a>
</li>
<li class="social">
  <a href="https://www.instagram.com/ecoleece/?hl=en" target="_blank" rel="noopener noreferrer">
    <iconify-icon class="social-icon fs-5 text-white me-4" icon="ri:instagram-fill"></iconify-icon>
  </a>
</li>
<li class="social">
  <a href="https://www.youtube.com/" target="_blank" rel="noopener noreferrer">
    <iconify-icon class="social-icon fs-5 text-white me-4" icon="ri:youtube-fill"></iconify-icon>
  </a>
</li>


              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="footer-menu">
            <h6 class="text-uppercase fw-bold text-white mb-4">Quick Links</h6>
            <ul class="menu-list list-unstyled">
              <li class="menu-item">
                <a href="index.php" class="footer-link">Home</a>
              </li>
              <li class="menu-item">
                <a href="about.html" class="footer-link">About us</a>
              </li>
              
              
              <li class="menu-item">
                <a href="contact.html" class="footer-link">Conatct Us</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2">
          <div class="footer-menu">
            <h6 class="text-uppercase fw-bold text-white mb-4"></h6>
            <ul class="menu-list list-unstyled">
              <li class="menu-item">
                <a href="#" class="footer-link"></a>
              </li>
              
            </ul>
          </div>
        </div>
        <div class="col-md-2">
          <div class="footer-menu">
            <h6 class="text-uppercase fw-bold text-white mb-4">Help Center</h6>
            <ul class="menu-list list-unstyled">
              
              
              <li class="menu-item">
                
              <li class="menu-item">
                <a href="faqs.html" class="footer-link">FAQs</a>
              </li>
              <li class="menu-item">
                <a href="cart.php" class="footer-link">Checkout</a>
              </li>
             
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div id="footer-bottom" class="bg-black">
    <hr class="m-0">
    <div class="container padding-medium pt-3">
      <div class="row mt-3">
        <div class="col-md-6 copyright">
          <p class="secondary-font">© 2023. All rights reserved to GROUPE 99.</p>
        
    </div>
  </div>


  <script src="js/jquery-1.11.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>