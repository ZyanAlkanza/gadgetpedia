<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Flowbite --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    'sans': ['inter']
                },
                extend: {
                    colors: {
                        'primary': '#D94496',
                        'secondary': '#1E1E1E', 
                        'abu-abu': '#f5f5f5',
                    },
                }
            }
        }
    </script>

    {{-- Remixicon --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

    <title>Gadgetpedia</title>
</head>
<body class="bg-white">
    <nav class="w-full h-[68px] flex flex-row justify-between items-center px-[120px]">
        <div class="logo">
            <h1 class="text-2xl font-bold text-pink-500 font-inter">Gadget<span class="text-secondary">pedia</span></h1>
        </div>
        <div class="navigation flex flex-row gap-2">
            <div class="searchBar">
                <input type="text" class="bg-abu-abu w-96 h-9 mr-2 rounded-full px-4 border-2 border-gray-100 focus:border-2 focus:border-pink-500 focus:outline-none" placeholder="Search">
            </div>
            <div class="menu flex items-center">
                @if (Auth::check())
                <a href="{{ url('') }}" class="hover:text-primary transition duration-300 ease-in-out mx-2"><i class="ri-box-3-line ri-xl"></i></a>
                <a href="{{ url('') }}" class="hover:text-primary transition duration-300 ease-in-out mx-2"><i class="ri-shopping-cart-line ri-xl"></i></a>
                
                <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="ml-2 flex text-sm bg-secondary rounded-full md:me-0 focus:ring-4 focus:ring-primary" type="button">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="{{ url('/img/default-avatar.png') }}">
                </button>
                
                <div id="dropdownAvatar" class="z-10 hidden bg-abu-abu rounded-lg shadow w-44">
                    <ul class="py-2 text-sm text-secondary" aria-labelledby="dropdownUserAvatarButton">
                        <li>
                            <a href="{{ url('#') }}" class="block px-4 py-2 hover:bg-gray-200 transition duration-300 ease-in-out"><i class="ri-account-circle-line ri-xl mr-2"></i>My Profile</a>
                        </li>
                    </ul>
                    <div class="py-2 text-sm text-secondary">
                        <a href="{{ url('logout') }}" class="block px-4 py-2 hover:bg-gray-200 transition duration-300 ease-in-out"><i class="ri-logout-box-r-line ri-xl mr-2"></i>Sign out</a>
                    </div>
                </div>

                @else
                    <a href="{{ url('login') }}" class="bg-primary py-1 px-4 ml-8 rounded text-white hover:bg-pink-500 transition duration-300 ease-in-out">Login</a>
                @endif
            </div>
        </div>
        
    </nav>

    <section class="slide w-full h-[275px] px-[120px] px-[120px] mb-8">
        <div class="content h-full bg-abu-abu flex flex-row justify-between rounded-xl">
            <div class="text w-[50%] pl-[44px]">
                <h5 class="text-2xl font-secondary font-light mt-[44px]">Find The Best 2024 Flagship</h5>
                <h1 class="text-6xl font-secondary font-bold mt-2 mb-12">On <span class="text-primary">Gadget</span>pedia</h1>
                <a href="#content" class="text-white bg-primary px-4 py-2 rounded hover:bg-pink-500 transition duration-300 ease-in-out">Order Now</a>
            </div>
            <div class="image w-[45%] rounded-tl-full bg-primary flex items-end">
                <img src="{{ url('/img/default-slider.png') }}" class="w-fit">
            </div>
            <div class="image w-[5%] rounded-r-xl bg-primary"></div>
        </div>
    </section>

    <section class=" w-full h-full px-[120px] flex flex-wrap justify-center gap-8" id="content">
        @foreach ($phone as $item)
            <a href="{{ url('detail/'. $item->id) }}" class="border-2 border-abu-abu hover:border-2 hover:border-primary rounded transition duration-300 ease-in-out">
                <div class="w-[225px] h-[295px] bg-abu-abu rounded">
                    <div class="image h-[189px] flex justify-center items-center bg-abu-abu rounded">
                        <img src="{{ asset('img/'. $item->image[0]['image']) }}" class="h-3/4 mix-blend-multiply">
                    </div>
                    <div class="title h-[106px] bg-white rounded p-3 mb-4">
                        <h5 class="text-xs font-semibold font-inter">{{ $item->brand }}</h5>
                        <h1 class="text-base font-inter mt-1 truncate">{{ $item->model }}</h1>
                        <h1 class="text-base font-bold font-inter text-primary mt-2.5">Rp. {{ number_format($item->price, 0, ',','.') }}</h1>
                    </div>
                </div>
            </a>
        @endforeach
        
    </section>

    {{-- Flowbite --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>
</html>