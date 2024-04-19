@include('dashboard.template-header')

<body class="flex justify-center items-center h-full">
    <div class="card bg-gray-100 w-96 max-[768px]:w-full max-[768px]:mx-2 h-max rounded-xl flex flex-col p-4">
        <h1 class="text-center text-xl font-semibold text-pink-500 mt-2">Edit Order</h1>
        
        <form action="{{ url('order/'. $order->id) }}" method="post" class="flex flex-col">
            @method('PUT')
            @csrf
            <label for="user_id" class="mt-6">Username</label>
            <select name="user_id" id="user_id" class="px-3 py-1 bg-white border-2 border-pink-300 rounded-full focus:outline-none focus:border-pink-500 mt-1" autofocus>
                    @foreach ($user as $item)
                        <option value="{{ $item->id }}" {{ old('user_id', $order->user_id) == $item->id ? 'selected' : null }}>{{ $item->username }}</option>
                    @endforeach
            </select>
            <div class="error bg-red-30 h-6 mt-1">
            @error('user_id')
                <div class="error-msg text-xs mt-1 text-red-700 font-semibold">{{ $message }}</div>
            @enderror
            </div>

            <label for="phone_id" class="mt-1">Phone Model</label>
            <select name="phone_id" id="phone_id" class="px-3 py-1 bg-white border-2 border-pink-300 rounded-full focus:outline-none focus:border-pink-500 mt-1" autofocus>
                @foreach ($phone as $item)
                    <option value="{{ $item->id }}" {{ old('phone_id', $order->orderdetails->phone_id) == $item->id ? 'selected' : null }}>{{ $item->brand }} {{ $item->model }}</option>
                @endforeach
            </select>
            <div class="error bg-red-30 h-6 mt-1">
            @error('phone_id')
                <div class="error-msg text-xs mt-1 text-red-700 font-semibold">{{ $message }}</div>
            @enderror
            </div>

            <label for="price" class="mt-1">Price</label>
            <select name="price" id="price" class="px-3 py-1 bg-white border-2 border-pink-300 rounded-full focus:outline-none focus:border-pink-500 mt-1" autofocus>
                @foreach ($phone as $item)
                    <option value="{{ $item->price }}" {{ old('price', $order->orderdetails->price) == $item->price ? 'selected' : null }}>{{ $item->brand }} {{ $item->model }} | Rp. {{number_format($item->price, 0, ',','.' )}}</option>
                @endforeach
            </select>
            <div class="error bg-red-30 h-6 mt-1">
            @error('price')
                <div class="error-msg text-xs mt-1 text-red-700 font-semibold">{{ $message }}</div>
            @enderror
            </div>
        
            <div class="content flex gap-2">
                <div class="qty flex flex-col w-1/2">
                    <label for="quantity" class="mt-1">Quantity</label>
                    <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $order->orderdetails->quantity) }}" placeholder="Pcs" class="px-3 py-1 focus:outline-none border-2 border-pink-300 focus:border-2 focus:border-pink-500 rounded-full mt-1" autocomplete="off">
                    <div class="error bg-red-30 h-6 mt-1">
                    @error('quantity')
                        <div class="error-msg text-xs mt-1 text-red-700 font-semibold">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                
                <div class="status flex flex-col w-1/2">
                    <label for="status" class="mt-1">Status</label>
                    <select name="status" id="status" class="px-3 py-1 bg-white border-2 border-pink-300 rounded-full focus:outline-none focus:border-pink-500 mt-1" autofocus>
                        <option value="0" {{ $order->status == 0 ? 'selected' : '' }}>Pending</option>
                        <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Process</option>
                        <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Delivery</option>
                        <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Success</option>
                    </select>
                    <div class="error bg-red-30 h-6 mt-1">
                    @error('status')
                        <div class="error-msg text-xs mt-1 text-red-700 font-semibold">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
            </div>
            
            {{-- <label for="total_amount" class="mt-1">Total Amount</label>
            <input type="number" name="totalamount" id="totalamount" placeholder="Rp." class="px-3 py-1 focus:outline-none border-2 border-pink-300 focus:border-2 focus:border-pink-500 rounded-full mt-1" autocomplete="off">
            <div class="error bg-red-30 h-6 mt-1">
            @error('total_amount')
                <div class="error-msg text-xs mt-1 text-red-700 font-semibold">{{ $message }}</div>
            @enderror
            </div> --}}
            
            <button type="submit" name="submit" id="submit" class="px-2 py-2 rounded-lg bg-pink-500 hover:bg-pink-600 text-white mt-8 mb-4">Submit</button>
        </form>
    </div>
</body>