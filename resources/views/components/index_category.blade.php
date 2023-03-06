@props(['category'])

<!-- Categories Start -->

        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <a class="text-decoration-none" href="/category/{{ $category->id }}">
                <div class="cat-item d-flex align-items-center mb-4">
                    <div class="overflow-hidden">
                        <img src="{{ asset('storage/' . $category->image) }}" alt="" class="w-full h-28 object-cover">
                    </div>
                    <div class="flex-fill pl-3">
                        <h6>{{ $category->name }}</h6>
                        <small class="text-body">100 Products</small>
                    </div>
                </div>
            </a>
        </div>
   
<!-- Categories End -->