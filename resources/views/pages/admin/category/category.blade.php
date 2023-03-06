<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/app.css">
    <title>Create category</title>
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
                <h2 class="text-2xl mb-4 text-black uppercase font-semibold">create Category</h2>
               <form action="/admin/categoryconfig" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" id="" placeholder="Category name" class="border-b-2 border-gray-300 py-1 px-2 mb-4">
                @error('name')
                <p>{{$message}}</p>
                @enderror

                <input type="file" name="image" id="" class="mb-4">
                <button class="rounded bg-sky-500 px-3 py-2 text-white w-full mt-2">Create</button>
               </form>

               <a href="/admin/category" class="underline text-sm flex justify-center mt-4 text-gray-500">Go Back</a>
            </div>


        </div>
    </div>
</body>
</html>