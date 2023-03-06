    <x-layout>

    @if(session('success'))
    <div class="text-gray-500 bg-green-300/50 px-2 py-2 shadow-lg rounded-md">
    {{ session('success') }}
    </div>
    @endif

    @include('partials.hero')

    @include('partials.services')

    <div class="container-fluid pt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
        <div class="row px-xl-5 pb-3">

    @unless(count($categories2) ==0)
    @forelse($categories2 as $category)

    <x-index_category :category="$category" />

    @empty
    <h2>There are no Categories</h2>
    @endforelse
    @endunless

    </div>
    </div>


    <div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured Products</span></h2>
    <div class="row px-xl-5">
    @unless(count($products) ==0)
    @forelse($products as $product)
    <x-index_featured :product="$product" />
    @empty
    <h2>There are no products available</h2>
    @endforelse
    @endunless
    
    </div>
    </div>
    @include('partials.hero_snd')

    <x-index_recent />

    </x-layout>

   