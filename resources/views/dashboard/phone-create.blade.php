@include('dashboard.template-header')

<body class="flex justify-center items-center h-full">
    <div class="card bg-gray-200 w-max max-[768px]:w-full max-[768px]:mx-2 h-max rounded-xl flex flex-col p-4">
        <h1 class="text-center text-xl font-semibold text-pink-500 mt-2">Add Phone</h1>
        
        <div class="input flex flex-row max-[768px]:flex-col gap-x-4 mt-4">
            <section class="left flex flex-col">
                <label for="brand" class="mt-1">Brand</label>
                <input type="text" id="brand" placeholder="Brand" class="px-3 py-1 focus:outline-none border-2 border-pink-300 focus:border-2 focus:border-pink-500 rounded-full mt-1" autofocus autocomplete="off">
                <div class="error bg-red-30 h-6 mt-1">
                @error('brand')
                    <div class="error-msg text-xs mt-1 text-red-700 font-semibold">{{ $message }}</div>
                @enderror
                </div>
        
                <label for="price" class="mt-1">Price</label>
                <input type="number" id="price" placeholder="Rp." class="px-3 py-1 focus:outline-none border-2 border-pink-300 focus:border-2 focus:border-pink-500 rounded-full mt-1" autocomplete="off">
                <div class="error bg-red-30 h-6 mt-1">
                @error('price')
                    <div class="error-msg text-xs mt-1 text-red-700 font-semibold">{{ $message }}</div>
                @enderror
                </div>
            </section>

            <section class="right flex flex-col">
                <label for="model" class="mt-1">Model</label>
                <input type="text" id="model" placeholder="Model" class="px-3 py-1 focus:outline-none border-2 border-pink-300 focus:border-2 focus:border-pink-500 rounded-full mt-1" autocomplete="off">
                <div class="error bg-red-30 h-6 mt-1">
                @error('model')
                    <div class="error-msg text-xs mt-1 text-red-700 font-semibold">{{ $message }}</div>
                @enderror
                </div>

                <label for="stock" class="mt-1">Stock</label>
                <input type="number" id="stock" placeholder="Pcs" class="px-3 py-1 focus:outline-none border-2 border-pink-300 focus:border-2 focus:border-pink-500 rounded-full mt-1" autocomplete="off">
                <div class="error bg-red-30 h-6 mt-1">
                @error('stock')
                    <div class="error-msg text-xs mt-1 text-red-700 font-semibold">{{ $message }}</div>
                @enderror
                </div>
            </section>
        </div>

        <label for="desc" class="mt-1">Description</label>
        <textarea name="desc" id="desc" cols="30" rows="5" placeholder="Product's Description" class="resize-none text-sm focus:outline-none focus:border-2 border-2 focus:border-pink-500 p-2" maxlength="25   0"></textarea>
        
        <button class="px-2 py-2 rounded-full bg-pink-500 text-white mt-8 mb-4">Submit</button>
    </div>
</body>