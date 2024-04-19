@include('dashboard.template-header')

<body class="flex py-14 px-60 max-[768px]:py-4 max-[768px]:px-2 h-full max-[768px]:h-max">

    <div class="content w-full h-full flex bg-gray-100 rounded-lg p-8 max-[768px]:h-max max-[768px]:p-4 max-[768px]:flex-col">
        <section class="left w-full flex flex-col">
            <a href="{{ url('order') }}" class="bg-pink-100 text-pink-500 px-6 py-2 w-max rounded-lg hover:bg-pink-500 hover:text-white">Back</a>
            <div class="image h-full mr-4 mt-8">
                <img src="{{ asset('img/'.$order->orderdetails->phone->image[0]->image) }}" class="mix-blend-multiply">
            </div>
        </section>

        <section class="right w-full h-full flex flex-col">
            <h1 class="font-semibold text-lg mb-8 mt-4 text-pink-500 max-[768px]:mb-2">Detail Order</h1>
            <label for="" class="font-semibold uppercase text-sm">Username</label>
            <h5>{{ $order->user->username }}</h5>
            {{-- <h5>{{ $order->user->username }}</h5> --}}

            <label for="" class="font-semibold mt-2 uppercase text-sm">Email</label>
            <h5>{{ $order->user->email }}</h5>

            <label for="" class="font-semibold mt-2 uppercase text-sm">Address</label>
            <h5>{{ $order->user->address }}</h5>

            <label for="" class="font-semibold mt-2 font-medium uppercase text-sm">Phone Model</label>
            <h5>{{ $order->orderdetails->phone->brand }} {{ $order->orderdetails->phone->model }}</h5>
            {{-- <h5>{{ $orderdetail->phone->brand }} {{ $orderdetail->phone->model }}</h5> --}}

            <label for="" class="font-semibold mt-2 font-medium uppercase text-sm">Quantity</label>
            <h5>{{ $order->orderdetails->quantity }} Pcs</h5>
            {{-- <h5>{{ $orderdetail->quantity }} Pcs</h5> --}}

            <label for="" class="font-semibold mt-2 font-medium uppercase text-sm">Price</label>
            <h5>Rp. {{ number_format($order->orderdetails->price, 0, ',','.')  }}</h5>
            {{-- <h5>Rp. {{ number_format($orderdetail->price, 0, ',', '.') }}</h5> --}}

            <label for="" class="font-semibold mt-2 font-medium uppercase text-sm">Status</label>
            @if ($order->status == 0)
                <h5 class="text-xs text-center rounded text-gray-500 font-bold bg-gray-100 px-2 py-1 mt-1 w-fit">Pending</h5>
            @elseif($order->status == 1)
                <h5 class="text-xs text-center rounded text-yellow-500 font-bold bg-yellow-100 px-2 py-1 mt-1 w-fit">Process</h5>
            @elseif($order->status == 2)
                <h5 class="text-xs text-center rounded text-blue-500 font-bold bg-blue-100 px-2 py-1 mt-1 w-fit">Delivery</h5>
            @else
                <h5 class="text-xs text-center rounded text-green-500 font-bold bg-green-100 px-4 py-1 mt-1 w-fit">Success</h5>
            @endif

            {{-- @php
                $total =$order->totalamount*$orderdetail->quantity
            @endphp --}}

            <label for="" class="font-semibold mt-8 font-medium uppercase text-sm text-pink-500 max-[768px]:mt-4">Total Amount</label>
            <h5 class="font-semibold text-xl">Rp. {{ number_format($order->totalamount, 0, ',', '.')  }}</h5>
        </section>
    </div>

</body>