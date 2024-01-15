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
    </nav>

    <section class=" w-full h-fit flex max-[768px]:flex-col px-14 max-[768px]:px-4 max-[768px]:gap-2 pb-8">
        <div class="image w-[40%] h-full max-[768px]:w-full flex max-[768px]:justify-center">
            <img src="{{ asset('img/galaxy.webp') }}" alt="" >
        </div>
        
        <div class="detail w-[60%] h-full max-[768px]:w-full ">
            <h1 class="text-pink-500 font-semibold text-lg max-[768px]:mt-4">Detail Product</h1>

            <h1 class="mt-5 font-semibold text-2xl">{{$phone->brand}} {{ $phone->model }}</h1>
            <h5>Stock: {{ $phone->stock }} Pcs</h5>
            
            <h5 class="mt-5 font-semibold">Specification</h5>
            <h5 class="">{{ $phone->desc }}</h5>

            <h1 class="mt-10 font-semibold text-2xl max-[768px]:mt-28 ">Rp. {{ number_format($phone->price, 0, ',','.') }}</h1>

            <button class="bg-pink-500 text-white px-20 py-2 rounded mt-4 hover:bg-pink-600 max-[768px]:w-full">Buy Now</button>
        </div>
    </section>
</body>
</html>