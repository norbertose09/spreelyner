<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage</title>
    <link rel="stylesheet" href="../../css/app.css">

</head>
<body>
    <div class="container mx-auto-py-10">
         <!-- Navbar-->
     <nav class="relative container mx-auto p-6 pl-32">
        <!-- Flex container-->
        <div class="flex items-center justify-between">

            <!-- Logo-->
            <div class="pb-1">
                <h1 class="text-3xl font-bold"><span class="text-yellow-300">Spree</span><span class="text-gray-600">Lyner</span></h1>
            </div>


            <!-- Menu -->
            <div class="hidden md:flex space-x-12">
                <!-- <a href="" class="hover:text-darkGrayishBlue font-bold">Pricing</a> -->
                <a href="/admin/allproducts/create" class="hover:text-darkGrayishBlue font-bold">Create</a>
              
                

            </div>

           

            <!--Hamburger Icon-->
            <button id="menu-btn" class="block hamburger md:hidden focus:outline-none">
                <span class="hamburger-top"></span>
                <span class="hamburger-middle"></span>
                <span class="hamburger-bottom"></span>
            </button>
        </div>

        <!--Mobile menu-->
         <div class="md:hidden">
            <div id="menu" class="hidden absolute flex-col items-center self-end py-8 mt-10 space-y-6 font-bold bg-white sm:w-auto sm:self-center left-6 right-6 drop-shadow-md">
                <!-- <a href="">Pricing</a> -->
                <a href="/admin/allproducts/create" class="hover:text-darkGrayishBlue font-bold">Create</a>
               

                
            </div>
        </div>
    </nav>
<div class="container mx-auto flex flex-col md:flex-row gap-5 justify-center items-center">
    <div class="w-full md:w-1/2 py-16 px-12">
    <div class="bg-white rounded text-gray-500 shadow-lg shadow-sky-100 py-8">
        <h1 class="text-2xl text-gray-500 text-center">{{$noofprod}}</h1>
        <h1 class="text-2xl text-gray-500 uppercase text-center">Products</h1>
        </div>
        </div>
    </div>

<div class="overflow-auto rounded-lg shadow-lg md:ml-24 shadow-sky-100 mb-24 mx-8">
    <table class="table-auto w-full mx-auto">
        <thead class="bg-gray-100 border-b-2 border-gray-200">
            <tr>
        <th class="p-3 text-sm font-semibold tracking-wide text-left">Category</th>
        <th class="p-3 text-sm font-semibold tracking-wide text-left">Name</th>
        <th class="p-3 text-sm font-semibold tracking-wide text-left">Description</th>
        <th class="p-3 text-sm font-semibold tracking-wide text-left">Price</th>
        <th class="p-3 text-sm font-semibold tracking-wide text-left">Size</th>
        <th class="p-3 text-sm font-semibold tracking-wide text-left">Color</th>
        <th class="p-3 text-sm font-semibold tracking-wide text-left">Quantity</th>
        <th class="p-3 text-sm font-semibold tracking-wide text-left">Image</th>

        </tr>
        </thead>

        <tbody class="divide-y divide-gray-100">
            @unless(count($allproducts) ==0)
            @foreach($allproducts as $allproduct)
<tr class="hover:bg-gray-200">
    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{$allproduct->category}}</td>
    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{$allproduct->name}}</td>
    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{$allproduct->description}}</td>
    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{$allproduct->price}}</td>
    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{$allproduct->size}}</td>
    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{$allproduct->color}}</td>
    <td class="p-3 text-sm text-gray-700 whitespace-nowrap">{{$allproduct->quantity}}</td>

    <td class="p-3 text-sm text-gray-700" ><img src="{{ asset('storage/' . $allproduct->image) }}" alt="" class="w-full h-24 object-cover"></td>
    <td class="p-3 text-sm text-gray-700">
      
            <a href="/admin/allproducts/edit/{{$allproduct->id}}" class="bg-sky-500 text-white rounded py-1 px-6">Edit</button></td>
    <td class="p-3 text-sm text-gray-700">
        <form action="/admin/allproducts/delete/{{$allproduct->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="bg-red-500 text-white rounded py-1 px-6">Delete</button>
        </form>
        </td>
</tr>

</tbody>
@endforeach
@else 
<p>No category available <a href="/admin/allproducts/create" class="underline text-blue-200">New</a></p>
    
@endunless
    </table>
</div>

    </div> 

    </div>
    <script src="../../js/script.js"></script>
    
</body>
</html> 
