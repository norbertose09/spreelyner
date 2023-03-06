 <!-- Navbar Start -->
 <div class="container-fluid bg-dark mb-30">
    <div class="relative py-6 mx-auto flex justify-between">
         <!-- Logo-->
         <div class="pb-1 block lg:hidden">
            <h1 class="text-lg md:text-2xl font-bold"><span class="text-yellow-300">Spree</span><span class="text-white">Lyner</span></h1>
        </div>
    {{-- <div class="text-2xl font-bold text-gray-500 bg-yellow-400 px-3 ml-10 py-3">Category</div> --}}
   <div class="hidden d-lg-block flex space-x-12 text-white ml-12">
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

   <!--Mobile menu-->
    <div class="md:hidden">
        <div id="menu" class="hidden absolute flex-col items-center self-end py-8 mt-10 space-y-6 font-bold bg-white sm:w-auto sm:self-center left-6 right-6 drop-shadow-md">
            <a href="">Home</a>
    <a href="">Category</a>
    <a href="">Shop</a>
    <a href="">Checkout</a>
    <a href="">Contact Us</a>
        </div>
    </div>
   </div>
</div>
<!-- Navbar End -->