<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Gadgetpedia</title>
</head>
<body class="bg-white">
    <nav class="w-full h-14 flex flex-row justify-between px-14 max-[768px]:px-4 mb-4">
        <div class="logo flex justify-between items-center">
            <h1 class="text-2xl text-center font-bold text-pink-500">Gadget<span class="text-slate-700">pedia</span></h1>
        </div>
        <div class="menu flex justify-between items-center">

            @if (Auth::check())
                <a href="{{ url('logout') }}" class="bg-pink-500 px-4 pt-1 pb-2 text-white rounded-full hover:bg-pink-600">Logout</a>
            @else
                <a href="{{ url('login') }}" class="bg-pink-500 px-4 pt-1 pb-2 text-white rounded-full hover:bg-pink-600">Login</a>
            @endif

            
        </div>
    </nav>

    <section class=" w-full h-fit flex flex-wrap justify-between px-14 max-[768px]:px-4 max-[768px]:gap-2 gap-4">
        
        @foreach ($phone as $item)
            <a href="{{ url('detail/'. $item->id) }}">
            <div class="card bg-gray-100 hover:bg-gray-200 w-[250px] max-[768px]:w-[185px] h-max p-2 rounded-lg">
                <div class="image rounded-lg">
                    <img src="{{ asset('img/'. $item->image[0]['image']) }}" alt="">
                </div>
                <h1 class="title font-semibold truncate ... mt-2">{{ $item->brand }} {{ $item->model }}</h1>
                <h5 class="brand font-light">{{ $item->brand }}</h5>
                <h3 class="price font-semibold mt-2">Rp. {{ number_format($item->price, 0, ',','.') }}</h3>
            </div>
        </a>
        @endforeach
        

        

    </section>
</body>
</html>