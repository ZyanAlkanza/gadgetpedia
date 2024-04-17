<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

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


    <title>Gadgetpedia</title>
</head>
<body class="h-full">
    <nav class="w-full h-[68px] px-[120px] flex items-center">
        <h1 class="text-2xl font-bold text-pink-500 font-inter">Gadget<span class="text-secondary">pedia</span></h1>
    </nav>

    <section class="w-full px-[120px]">
        <div class="button">
            <a href="{{ url('/') }}" class="bg-pink-100 py-2 px-4 rounded text-primary hover:bg-pink-500 hover:text-white transition duration-300 ease-in-out">Back</a>
        </div>

        <h1 class="font-bold text-lg mt-3">My Transaction</h1>

        <div class="content flex flex-wrap justify-between px-2 gap-y-2 mt-2">

            {{-- @foreach ($order as $ord)
                <div class="card px-4 py-2 bg-abu-abu rounded flex justify-between items-center">
                    <h1 class="font-bold">Inv/Gadgetpedia/{{ \Carbon\Carbon::parse($ord->created_at)->format('dmY') }}/{{ $ord->id }}</h1>
                    <h1>{{ \Carbon\Carbon::parse($ord->created_at)->format('d M Y') }}</h1>
                    <h1>{{ $ord->user->username }}</h1>
                    <h1 class="bg-pink-100 text-primary px-4 py-1 rounded">Delivery</h1>
                    <h1>Rp. {{ number_format($ord->totalamount, 0, ',','.') }}</h1>
                    <a href="" class="bg-primary px-4 py-1 text-white hover:bg-pink-600 rounded">Detail</a>
                </div>
            @endforeach --}}

            @foreach ($order as $item)
                <div class="card w-[49.5%] bg-abu-abu rounded-lg px-4 py-4 flex">
                    <div class="img h-24">
                        <img src="{{ url('img/'. $item->orderdetails->phone->image[0]->image) }}" class="h-24 mix-blend-multiply">
                    </div>

                    <div class="detail-product w-[50%] mx-4">
                        <h1 class="font-medium">{{ $item->orderdetails->phone->brand }} {{ $item->orderdetails->phone->model }}</h1>
                        <h1 class="text-xs">Qty: {{ $item->orderdetails->quantity }} Pcs</h1>
                        <h1 class="text-sm mt-3">Total Amount</h1>
                        <h1 class="font-bold">Rp. {{ number_format($item->totalamount, 0, ',','.') }}</h1>
                    </div>

                    <div class="detail-transaction">
                        <h1 class="text-xs">Date</h1>
                        <h1>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</h1>
                        <h1 class="text-xs mt-2 mb-1">Status</h1>
                        <h1 class="bg-pink-100 py-1 text-sm text-center text-primary rounded">Delivery</h1>
                    </div>
                </div>
            @endforeach
            
        </div>

        
    </section>
    
</body>
</html>