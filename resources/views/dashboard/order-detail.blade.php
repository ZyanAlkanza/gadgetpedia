@include('dashboard.template-header')

<body class="flex py-14 px-60 max-[768px]:py-4 max-[768px]:px-2 h-full max-[768px]:h-max">

    <div class="content w-full h-full flex bg-gray-200 rounded-lg p-8 max-[768px]:h-max max-[768px]:p-4 max-[768px]:flex-col">
        <section class="left w-full flex flex-col">
            <a href="{{ url('order') }}" class="bg-pink-500 text-white px-6 py-2 w-max rounded-full hover:bg-pink-600">Back</a>
            <div class="image h-full mr-4 mt-8">
                <img src="{{ asset('img/galaxy.webp') }}" alt="">
            </div>
        </section>

        <section class="right w-full h-full flex flex-col">
            <h1 class="font-semibold text-lg mb-8 mt-4 text-pink-500 max-[768px]:mb-2">Detail Order</h1>
            <label for="" class="font-semibold mt-2 uppercase text-sm">Username</label>
            <h5>{{ $order->user->username }}</h5>

            <label for="" class="font-semibold mt-2 font-medium uppercase text-sm">Phone Model</label>
            <h5>{{ $orderdetail->phone->brand }} {{ $orderdetail->phone->model }}</h5>

            <label for="" class="font-semibold mt-2 font-medium uppercase text-sm">Quantity</label>
            <h5>{{ $orderdetail->quantity }} Pcs</h5>

            <label for="" class="font-semibold mt-2 font-medium uppercase text-sm">Price</label>
            <h5>Rp. {{ number_format($orderdetail->price, 0, ',', '.') }}</h5>

            @php
                $total =$order->totalamount*$orderdetail->quantity
            @endphp

            <label for="" class="font-semibold mt-12 font-medium uppercase text-sm text-pink-500 max-[768px]:mt-4">Total Amount</label>
            <h5 class="font-semibold text-xl">Rp. {{ number_format($total, 0, ',', '.')  }}</h5>
        </section>
    </div>

</body>