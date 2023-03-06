<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/app.css">
    <title>Edit Products</title>
</head>
<body class="font-body min-h-screen">
    <div class="container mx-auto py-10 px-6">
        
        <nav class="relative container mx-auto p-6 pl-2 pb-8">
                <!-- Logo-->
                <div class="pb-1 mx-start">
                    <h1 class="text-3xl font-bold"><span class="text-yellow-300">Spree</span><span class="text-gray-600">Lyner</span></h1>
                </div>    
        </nav>




        <div class="md:w-8/12 mx-auto bg-white shadow-xl rounded-lg mx-auto shadow-sky-200/50">
            <div class="w-full md:w-1/2 py-16 px-12 mx-auto">
                <h2 class="text-2xl mb-4 text-black uppercase font-semibold">Edit Product</h2>
               <form action="/admin/allproductsconfig" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="text" name="category" id="" placeholder="Category" class="border-b-2 border-gray-300 py-1 px-2 mb-4" value="{{ $allproductedit->category }}">
                @error('category')
                <p>{{$message}}</p>
                @enderror

                {{-- <select name="category" id="" class="border-b-2 border-gray-300 py-1 px-2 mb-4">
                    <option value="" disabled selected>Category</option>

                    @unless(count($categories) ==0)
                    @foreach($categories as $category)
                    <option value="">{{ $category->name }}</option>

                    @endforeach
                    @endunless
                </select>
                @error('category')
                <p>{{$message}}</p>
                @enderror
                <br><br> --}}

                <input type="text" name="name" id="" placeholder="Name" class="border-b-2 border-gray-300 py-1 px-2 mb-4" value="{{ $allproductedit->name }}">
                @error('name')
                <p>{{$message}}</p>
                @enderror

                <textarea name="description" id="" cols="22" rows="3" class="border-b-2 border-gray-300 py-1 px-2 mb-4" placeholder="Description">{{ $allproductedit->description }}</textarea>
                @error('description')
                <p>{{$message}}</p>
                @enderror

                <input type="text" name="price" id="" placeholder="Price" class="border-b-2 border-gray-300 py-1 px-2 mb-4" value="{{ $allproductedit->price }}">
                @error('price')
                <p>{{$message}}</p>
                @enderror
                
                <input type="text" name="size" id="" placeholder="Size" class="border-b-2 border-gray-300 py-1 px-2 mb-4" value="{{ $allproductedit->size }}">
                @error('size')
                <p>{{$message}}</p>
                @enderror
                
                <input type="text" name="color" id="" placeholder="Color" class="border-b-2 border-gray-300 py-1 px-2 mb-4" value="{{ $allproductedit->color }}">
                @error('color')
                <p>{{$message}}</p>
                @enderror
                
                <input type="text" name="quantity" id="" placeholder="Quantity" class="border-b-2 border-gray-300 py-1 px-2 mb-4" value="{{ $allproductedit->quantity }}">
                @error('quantity')
                <p>{{$message}}</p>
                @enderror

                <input type="file" name="image" id="" class="mb-4" value="{{asset('storage/' . $allproductedit->image)}}">
                <img
                class="w-32 mr-6 mb-6"
                src="{{asset('storage/' . $allproductedit->image)}}"
                alt=""
            />
                @error('image')
                <p>{{ $message }}</p>
                @enderror
                <button class="rounded bg-sky-500 px-3 py-2 text-white w-full mt-2">Save</button>
               </form>

               <a href="/admin/allproducts/manage" class="underline text-sm flex justify-center mt-4 text-gray-500">Go Back</a>
            </div>


        </div>
    </div>
</body>
</html>