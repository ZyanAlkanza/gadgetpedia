<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Flaticon --}}
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <title>@yield('title')</title>
</head>
<body class="flex overflow-y-hidden">
    <section class="sidebar h-screen w-[180px] max-[768px]:w-[60px] shadow-2xl">
        <div class="logo">
            <h1 class="text-xl max-[768px]:text-4xl font-bold text-pink-500 text-center lg:mt-2">G<span class="max-[768px]:hidden">adget<span class="text-gray-700">pedia</span></span></h1>
        </div>

        <div class="menu h-full">
            <ul class="flex flex-col h-full lg:pl-4">
                <a href="/dashboard"><li class="max-[768px]:text-2xl max-[768px]:text-center py-4 mt-8 hover:text-pink-500"><i class="fi fi-rr-dashboard "></i><span class="max-[768px]:hidden ml-3">Dashboard</span></li></a>
                <a href="/user"><li class="max-[768px]:text-2xl max-[768px]:text-center py-4 hover:text-pink-500"><i class="fi fi-rr-users "></i><span class="max-[768px]:hidden ml-3">User</span></li></a>
                <a href=""><li class="max-[768px]:text-2xl max-[768px]:text-center py-4 hover:text-pink-500"><i class="fi fi-rr-boxes "></i><span class="max-[768px]:hidden ml-3">Product</span></li></a>
                <a href=""><li class="max-[768px]:text-2xl max-[768px]:text-center py-4 hover:text-pink-500"><i class="fi fi-rr-cart-shopping-fast "></i><span class="max-[768px]:hidden ml-3">Order</span></li></a>
                
                <div class="flex-grow"></div>
                
                <a href=""><li class="max-[768px]:text-2xl max-[768px]:text-center py-4 mb-16 hover:text-red-500"><i class="fi fi-rr-sign-out-alt "></i><span class="max-[768px]:hidden ml-3">Logout</span></li></a>
            </ul>
        </div>
    </section>

    @yield('content')

</body>
</html>