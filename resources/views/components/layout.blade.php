<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>LaraGigs | Find Laravel Jobs & Projects</title>
</head>

<body class="mb-48">
    <nav class="flex justify-between items-center mb-4">
        @auth
        <a href="{{ url('/') }}">  <h2 class="text-2xl font-bold uppercase mb-1 text-red-500">
            Tailwebs
        </h2></a>
        @endauth
        <ul class="flex space-x-6 mr-6 justify-between text-lg">
           
            @auth
            <li class="mr-auto">
                <span class="font-bold uppercase ">
                    Welcome {{auth()->user()->name}}
                </span>
            </li>
            <li>
                <a href="{{ url('/') }}" class="hover:text-laravel font-bold"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Home</a>
            </li>
            <li>
                <form  method="POST" class="inline" action="{{url('/logout')}}">
                 @csrf
                    <button type="submit">
                   <i class="fa-solid fa-door-closed"></i>Logout
                    </button>
                </form>
            </li>
            @endauth
        </ul>
    </nav>


    <main>
        {{ $slot }}
    </main>

    @auth
    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-20 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2024, All Rights reserved</p>

        <a href="{{ url('/listings/create') }}" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Add New</a>
    </footer>
    @endauth

    <x-flash-message />
</body>

</html>
