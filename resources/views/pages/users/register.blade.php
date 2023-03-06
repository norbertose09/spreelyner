<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/app.css">

    <title>Register</title>
</head>
<body class="font-body min-h-screen">
    <div class="container mx-auto py-32 px-6">
        <div class="md:w-8/12 mx-auto bg-white shadow-xl rounded-lg mx-auto shadow-sky-200/50">
            <div class="w-full md:w-1/2 py-16 px-12 mx-auto">
                <h2 class="text-2xl mb-4 text-gray-500 font-semibold">Create New User Account</h2>
               <form action="/register" method="POST">
                @csrf
                <input type="text" name="name" id="" placeholder="Username" class="border-b-2 border-gray-300 py-1 px-2 mb-4" value="{{ old('name') }}">
                @error('name')
                <p class="text-red-500 font-bold">{{$message}}</p>
                @enderror

                <input type="text" name="email" id="" placeholder="Email Address" class="border-b-2 border-gray-300 py-1 px-2 mb-4" value="{{ old('email') }}">
                @error('email')
                <p class="text-red-500 font-bold">{{$message}}</p>
                @enderror

                <input type="password" name="password" id="" placeholder="Password" class="border-b-2 border-gray-300 py-1 px-2 mb-4" value="{{ old('password') }}">
                @error('password')
                <p class="text-red-500 font-bold">{{$message}}</p>
                @enderror

                <input type="password" name="password_confirmation" id="" placeholder="Confirm Password" class="border-b-2 border-gray-300 py-1 px-2 mb-4" value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                <p class="text-red-500 font-bold">{{$message}}</p>
                @enderror

                <button class="rounded bg-sky-500 px-3 py-2 text-white w-full mt-2 mb-3">Create</button>
               </form>
                <a href="" class="underline semibold text-sm text-gray-500 pt-4 text-center flex justify-center">Go Back</a>

            </div>


        </div>
    </div>
</body>
</html>