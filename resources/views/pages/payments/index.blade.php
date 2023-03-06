<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SpreeLyner</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/app.css">

</head>

<body>
    <!-- Topbar Start -->
  
        <div class="row align-items-center bg-light py-3 px-xl-5 d-lg-flex">
            <div class="col-lg-4">
                <!-- Logo-->
            <div class="pb-1 hidden d-lg-block">
                <h1 class="text-3xl font-bold"><span class="text-yellow-300">Spree</span><span class="text-gray-600">Lyner</span></h1>
            </div>
            </div>
            <div class="col-lg-4 col-6 text-left pl-12">
                <form action="">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right space-x-3 pr-12">
                @auth
               <span class="font-bold uppercase">
                Hello,  {{ auth()->user()->name }}
               </span>
               <form action="/logout" method="POST">
                @csrf
                <button class="text-sm rounded shadow-md px-2 py-2 hover:text-white hover:bg-gray-800 transition duration-500 ease-in-out">Logout</button>
               </form>
                @else
                <a href="/users/signin" class="text-sm rounded shadow-md px-2 py-2 hover:text-white hover:bg-gray-800 transition duration-500 ease-in-out">Sign In</a>
                <a href="/users/register" class="text-sm rounded shadow-md px-2 py-2 hover:text-white hover:bg-gray-800 transition duration-500 ease-in-out">Sign Up</a>
                @endauth
                <a href="/users/cart" class="text-sm rounded bg-yellow-300 shadow-md px-1 py-2 hover:text-white hover:bg-gray-800 transition duration-500 ease-in-out">Cart (0)</a>

            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <nav class="relative container-fluid mx-auto p-6 bg-dark mb-30">
        <!-- Flex container-->
        <div class="flex items-center justify-between">

             <!-- Logo-->
         <div class="pb-1 block lg:hidden">
            <h1 class="text-lg md:text-2xl font-bold"><span class="text-yellow-300">Spree</span><span class="text-white">Lyner</span></h1>
        </div>


            <!-- Menu -->
            <div class="hidden lg:flex space-x-12 text-white ml-12">
                <a href="">Home</a>
                <a href="">Category</a>
                <a href="">Shop</a>
                <a href="">Checkout</a>
                <a href="">Contact Us</a>

            </div>

            <!--Hamburger Icon-->
            <button id="menu-btn" class="block hamburger lg:hidden focus:outline-none">
                <span class="hamburger-top"></span>
                <span class="hamburger-middle"></span>
                <span class="hamburger-bottom"></span>
            </button>
        </div>

        <!--Mobile menu-->
         <div class="lg:hidden">
            <div id="menu" class="hidden absolute flex-col items-center self-end py-8 mt-10 space-y-6 font-bold bg-white sm:w-auto sm:self-center left-6 right-6 drop-shadow-md">
                <a href="">Home</a>
                <a href="">Category</a>
                <a href="">Shop</a>
                <a href="">Checkout</a>
                <a href="">Contact Us</a>
            </div>

            {{-- <div class="d-inline-flex align-items-center d-block">
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-heart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                </a>
                <a href="" class="btn px-0 ml-2">
                    <i class="fas fa-shopping-cart text-dark"></i>
                    <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                </a>
            </div> --}}
        </div>
    </nav>
    <main>
    <div class="container mx-auto py-12">
        <div class="md:flex md:justify-between">
            <a href="/users/pod/">
            <div class="bg-yellow-300 px-5 py-5 rounded-lg shadow-md mb-8">
                <p class="font-bold">Pay on delivery</p>
            </div>
            </a>
            @php
            $totalprice = 0;     
        @endphp
            @foreach($cart as $cart)
            @php
            $totalprice = $totalprice + $cart->total_price;
            $charges = 0;
                                if($totalprice <= '250'){
                                    $charges = 15;
                                }
                                elseif($totalprice <= '500'){
                                    $charges = 30;

                                }
                                else{
                                    $charges = 45;
                                    
                                }
            $totalprice = $totalprice + $charges;

            @endphp 
            @endforeach
            <a href="/users/stripe/{{ $totalprice }}">
            <div class="bg-yellow-300 px-5 py-5 rounded-lg shadow-md mb-8">
                <p class="font-bold">Pay with Stripe</p>
            </div>
        </a>
            <a href="">
            <div class="bg-yellow-300 px-5 py-5 rounded-lg shadow-md">
                <p class="font-bold">Pay with Crypto</p>
            </div>
        </a>
        </div>
    </div>
</main>
<!-- Footer Start -->
<div class="container-fluid bg-dark text-secondary mt-5 pt-5">
   <div class="row px-xl-5 pt-5">
       <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
           <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
           <p class="mb-4">No dolore ipsum accusam no lorem. Invidunt sed clita kasd clita et et dolor sed dolor. Rebum tempor no vero est magna amet no</p>
           <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
           <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
           <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
       </div>
       <div class="col-lg-8 col-md-12">
           <div class="row">
               <div class="col-md-4 mb-5">
                   <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                   <div class="d-flex flex-column justify-content-start">
                       <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                       <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                       <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                       <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                       <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                       <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                   </div>
               </div>
               <div class="col-md-4 mb-5">
                   <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                   <div class="d-flex flex-column justify-content-start">
                       <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                       <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                       <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                       <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                       <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                       <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                   </div>
               </div>
               <div class="col-md-4 mb-5">
                   <h5 class="text-secondary text-uppercase mb-4">Newsletter</h5>
                   <p>Duo stet tempor ipsum sit amet magna ipsum tempor est</p>
                   <form action="">
                       <div class="input-group">
                           <input type="text" class="form-control" placeholder="Your Email Address">
                           <div class="input-group-append">
                               <button class="btn btn-primary">Sign Up</button>
                           </div>
                       </div>
                   </form>
                   <h6 class="text-secondary text-uppercase mt-4 mb-3">Follow Us</h6>
                   <div class="d-flex">
                       <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                       <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                       <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                       <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
       <div class="col-md-6 px-xl-0">
           <p class="mb-md-0 text-center text-md-left text-secondary">
               &copy; <a class="text-primary" href="#">Domain</a>. All Rights Reserved. Designed
               by
               <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
           </p>
       </div>
       <div class="col-md-6 px-xl-0 text-center text-md-right">
           <img class="img-fluid" src="img/payments.png" alt="">
       </div>
   </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
<script src="../js/script.js"></script>
<script src="//code.tidio.co/wlxqiuaafuq3bh31mxmxryinckjqyfkq.js" async></script>
</body>

</html>