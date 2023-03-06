<x-layout>
<!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">{{ $categoryspecs->name }}</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
          
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8 mx-auto">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Latest</a>
                                        <a class="dropdown-item" href="#">Popularity</a>
                                        <a class="dropdown-item" href="#">Best Rating</a>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                    @foreach($prods as $prod)
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4 shadow-lg">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100 h-56" src="{{ asset('storage/'. $prod->image) }}" alt="">
                                <div class="product-action">
                                    {{-- <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a> --}}
                                    <a href="/details/{{ $prod->id }}" class="btn btn-outline-dark btn-square" href=""><i class="fa fa-info"></i></a>
                                    {{-- <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a> --}}
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">{{ $prod->color.' ' }}{{ $prod->name }}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>$ {{ $prod->price }}</h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="text-sm text-gray-500 font-bold">Size: </small>
                                    {{-- <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small> --}}
                                    <small>{{ $prod->size }}</small>
                                </div>
                                    <form action="/cart/{{ $prod->id }}" method="POST">
                                        @csrf
                                        <div class="flex ml-4">
                                        <input type="number" name="quantity" placeholder="quantity" class="border-2 border-gray-300 rounded-lg" min="1">
                                    <button class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></button>
                                        </div>
                                </form>
                                </div>
                            
                        </div>
                    </div>
                    @endforeach
                  
                   
                    <div class="col-12">
                        <nav>
                          <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


</x-layout>