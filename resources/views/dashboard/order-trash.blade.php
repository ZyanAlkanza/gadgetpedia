@include('dashboard.template-header')

<body>
    <section class="content w-full overflow-hidden">
        <div class="title text-xl font-bold mt-2 ml-8 flex justify-between h-[35px]">
            <div class="left-contain flex items-center gap-2">
                <div class="button">
                    <a href="{{ url('order') }}" class="bg-pink-500 px-4 py-2 text-sm rounded-full font-semibold text-white">Back</a>
                </div>
                <div class="title">
                    Temporary Order Data
                </div>
            </div>

            <div class="status mr-8">
                @if (session('status'))
                <div id="alert" class="bg-pink-500 text-white px-4 py-1 rounded-full flex items-center justify-between">
                    <div class="flex items-center">
                        <span class="text-sm font-semibold">{{ session('status') }}</span>
                    </div>
                    <button id="closeBtn" class="ml-8 font-normal">&times;</button>
                </div>
                @endif
            </div>
        </div>

        <div class="accessibility max-[768px]:h-24 mt-8 flex max-[768px]:flex-col px-8">
            <div class="searchbar max-[768px]:w-full w-1/2">
                <input type="text" placeholder="Search..." class="max-[768px]:w-full rounded-full px-4 py-2 focus:outline-none border-2 focus:border-pink-500">
            </div>
            <div class="buttongroup max-[768px]:w-full w-1/2 flex justify-end max-[768px]:mt-2">
                <a href="{{ url('order/restore') }}" class="add border-2 bg-pink-500 px-4  py-2 text-sm rounded-full text-white hover:bg-pink-600 text-lg">Restore All</a>
                {{-- <a href="" class="recycle border-2 border-pink-500 px-4  py-2 text-sm rounded-full text-pink-500 hover:bg-pink-600 hover:text-white text-lg ml-2">Delete All</a> --}}

                <div x-data="{ showModal: false, itemId: null }">
                    <!-- Tombol Hapus -->
                    <button @click="showModal = true" class="border-2 border-pink-500 px-4 py-2 text-pink-500 rounded-full hover:bg-pink-600 hover:text-white">Delete</button>
                
                    <!-- Modal Konfirmasi Hapus -->
                    <div x-show="showModal" class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="bg-white p-8 w-[500px] mx-auto rounded shadow-lg">
                            <p class="text-xl font-semibold mb-4 text-center text-pink-500">DELETE DATA PERMANENTLY</p>
                            <p class="text-center">Are you sure delete this user data permanently?</p>
                
                            <!-- Tombol Konfirmasi Hapus -->
                            <div class="mt-6 flex justify-center gap-4">

                                <form action="{{ url('order/deletepermanently') }}" method="get">
                                    @csrf
                                    <button type="submit" class="border-2 border-pink-500 px-4 py-2 text-pink-500 rounded-full hover:bg-pink-600 hover:text-white">Delete</button>
                                </form>
                                <div class="cancel">
                                    <button @click="showModal = false" class="border-2 border-pink-500 bg-pink-500 px-4 py-2 text-white hover:bg-pink-600 rounded-full">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
        <div class="relative overflow-x-auto mt-4 mx-4">
            <table class="w-full text-sm text-left rtl:text-right text-black-500">
                <thead class="text-xs text-black uppercase bg-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-[5%] text-center">No</th>
                        <th scope="col" class="px-6 py-3 w-[25%]">Username</th>
                        <th scope="col" class="px-6 py-3 w-[25%]">Phone Model</th>
                        <th scope="col" class="px-6 py-3 w-[5%]">Quantity</th>
                        <th scope="col" class="px-6 py-3 w-[20%] whitespace-nowrap">Total Amount</th>
                        <th scope="col" class="px-6 py-3 w-[20%] text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($order as $key => $item)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-2 font-medium text-black whitespace-nowrap text-center">{{ $loop->iteration }}</th>
                            <th scope="row" class="px-6 py-2 font-medium text-black whitespace-nowrap">{{ $item->username }}</th>
                            <th scope="row" class="px-6 py-2 font-medium text-black whitespace-nowrap">{{ $item->brand }} {{ $item->model }}</th>
                            <th scope="row" class="px-6 py-2 font-medium text-black whitespace-nowrap text-right">{{ $item->quantity }} Pcs</th>
                            <th scope="row" class="px-6 py-2 font-medium text-black whitespace-nowrap">Rp. {{number_format($item->totalamount, 0, ',', '.')}}</th>
                            <th scope="row" class="px-6 py-2 font-medium text-black whitespace-nowrap flex justify-center gap-2">
                                <a href="{{ url('order/restore/'.$item->order_id) }}"  class="border-2 border-pink-500 bg-pink-500 px-4 py-2 text-white hover:bg-pink-600 rounded-full">Restore</a>
                                
                                {{-- <form action="{{ url('user/'. $item->id) }}" method="post" onsubmit="return confirm('Are you sure delete this data..?')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="border-2 border-pink-500 px-4 py-2 text-pink-500 rounded-full hover:bg-pink-600 hover:text-white">Delete</button>
                                </form> --}}
                                
                                <div x-data="{ showModal: false, itemId: null }">
                                    <!-- Tombol Hapus -->
                                    <button @click="showModal = true" class="border-2 border-pink-500 px-4 py-2 text-pink-500 rounded-full hover:bg-pink-600 hover:text-white">Delete</button>
                                
                                    <!-- Modal Konfirmasi Hapus -->
                                    <div x-show="showModal" class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center">
                                        <div class="bg-white p-8 w-[500px] mx-auto rounded shadow-lg">
                                            <p class="text-xl font-semibold mb-4 text-center text-pink-500">DELETE DATA PERMANENTLY</p>
                                            <p class="text-center">Are you sure delete this user data permanently?</p>
                                
                                            <!-- Tombol Konfirmasi Hapus -->
                                            <div class="mt-6 flex justify-center gap-4">

                                                <form action="{{ url('order/deletepermanently/'. $item->order_id) }}" method="get">
                                                    @csrf
                                                    <button type="submit" class="border-2 border-pink-500 px-4 py-2 text-pink-500 rounded-full hover:bg-pink-600 hover:text-white">Delete</button>
                                                </form>
                                                <div class="cancel">
                                                    <button @click="showModal = false" class="border-2 border-pink-500 bg-pink-500 px-4 py-2 text-white hover:bg-pink-600 rounded-full">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                            </th>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>

        <div class="pagination px-8 mt-8">
            {{ $order->links() }}
        </div>

    </section>


    <script>
        function closeAlert() {
        document.getElementById('alert').style.display = 'none';
        }

        document.getElementById('closeBtn').addEventListener('click', function () {
            closeAlert();
        });

        setTimeout(function () {
            closeAlert();
        }, 5000);
    </script>

    <script>
        window.showDeleteModal = function(itemId) {
            window.itemId = itemId;
            window.showModal = true;
        }

        window.deleteItem = function() {
            // Tambahkan logika penghapusan di sini, misalnya menggunakan AJAX atau form submission
            // console.log('Item ID yang akan dihapus:', window.itemId);

            // Tutup modal setelah penghapusan
            window.showModal = false;
        }
    </script>
</body>