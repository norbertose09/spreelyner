<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User- Login</title>
    <link rel="stylesheet" href="../../css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="font-body">
   
        <div class="container mx-auto py-40 px-6">
            <div class="flex flex-col md:flex-row w-12/12 bg-white mx-auto rounded-xl md:rounded-tr-none md:rounded-bl-none md:rounded-tl-xl md:rounded-br-xl overflow-hidden shadow-lg">
               <div class="w-full md:w-1/2 flex flex-col items-center justify-center p-12 bg-no-repeat bg-cover bg-center bg-gray-600">
                <h1 class="text-white text-3xl mb-3"><span class="text-yellow-300">Spree</span class="text-white">Lyner</h1>
                <p class="text-white pl-8">Shopping at affordable prices...</p>


               </div>
               <div class="w-full md:w-1/2 py-16 px-12">
                <h2 class="text-2xl mb-4 text-black uppercase text-center">Sign In</h2>
                <!-- <p class="mb-4">Create your account. it's free and only take a minute</p>S -->

                <form action="/authenticate" method="POST">
                    @csrf
                 <div class="flex flex-col justify-center items-center">
                        <input type="text" name="name" id="" placeholder="Username" class="border-b-2 border-gray-300 py-1 px-2 mb-4 w-full">
                        @error('name')
                        <p>{{$message}}</p>
                        @enderror

                        <input type="password" name="password" id="" placeholder="Password" class="border-b-2 border-gray-300 py-1 px-2 mb-4 w-full">
                        @error('name')
                        <p>{{$message}}</p>
                        @enderror
</div>
                        <!--Button-->
                        <div class="mt-5">
                            <button class="rounded w-full bg-gray-900 py-3 text-center text-white">Sign In</button>
                        </div>


                        <div class="text-sm text-gry-400 flex justify-center mt-2">
                        Don't have an account?  <a href="/users/register" class="text-blue-400 underline pl-2">Sign Up</a>
                        </div>
                    </div>
                </form>
               </div>
            </div>
        </div>
     
  
</body>
</html>
