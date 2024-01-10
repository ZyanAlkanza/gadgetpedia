@extends('dashboard.template')

@section('content')
    <section class="content w-full overflow-hidden">
        <div class="title text-xl font-bold mt-2 ml-8 flex justify-between h-[35px]">
            <div class="title">
                Phone
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
                <form action="{{ url('phone') }}" method="get">
                    <input type="text" id="search" name="search" autocomplete="off" placeholder="Search..." class="max-[768px]:w-full rounded-full px-4 py-2 focus:outline-none border-2 focus:border-pink-500">
                </form>
            </div>
            <div class="buttongroup max-[768px]:w-full w-1/2 flex justify-end max-[768px]:mt-2">
                <a href="{{ url('/phone/create') }}" class="add border-2 bg-pink-500 px-4  py-2 text-sm rounded-full text-white hover:bg-pink-600 text-lg">Add</a>
                <a href="" class="recycle border-2 border-pink-500 px-4  py-2 text-sm rounded-full text-pink-500 hover:bg-pink-600 hover:text-white text-lg ml-2">Recycle</a>
            </div>
        </div>
        
        <div class="relative overflow-x-auto mt-4 mx-4">
            <table class="w-full text-sm text-left rtl:text-right text-black-500">
                <thead class="text-xs text-black uppercase bg-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-[5%] text-center">No</th>
                        <th scope="col" class="px-6 py-3 w-[20%]">Brand</th>
                        <th scope="col" class="px-6 py-3 w-[40%]">Model</th>
                        <th scope="col" class="px-6 py-3 w-[5%] text-center">Stock</th>
                        <th scope="col" class="px-6 py-3 w-[10%] text-center">Price</th>
                        <th scope="col" class="px-6 py-3 w-[20%] text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($phone as $key => $item)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-2 font-medium text-black whitespace-nowrap text-center">{{ $phone->firstItem()+$key }}</th>
                            <th scope="row" class="px-6 py-2 font-medium text-black whitespace-nowrap">{{ $item->brand }}</th>
                            <th scope="row" class="px-6 py-2 font-medium text-black whitespace-nowrap">{{ $item->model }}</th>
                            <th scope="row" class="px-6 py-2 font-medium text-black whitespace-nowrap text-right">{{ $item->stock }} Pcs</th>
                            <th scope="row" class="px-6 py-2 font-medium text-black whitespace-nowrap text-right">Rp. {{ number_format($item->price, 0, ',', '.'); }}</th>
                            <th scope="row" class="px-6 py-2 font-medium text-black whitespace-nowrap flex justify-center gap-2">
                                <a href="{{ url('phone/'.$item->id) }}"  class="border-2 border-pink-500 bg-pink-500 px-4 py-2 text-white hover:bg-pink-600 rounded-full">Detail</a>
                                <a href="{{ url('phone/{id}/edit') }}"  class="border-2 border-pink-500 px-4 py-2 text-pink-500 hover:bg-pink-600 hover:text-white rounded-full">Edit</a>
                                <a href="" class="border-2 border-pink-500 px-4 py-2 text-pink-500 rounded-full hover:bg-pink-600 hover:text-white">Delete</a>
                            </th>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="pagination px-8 mt-4">
            {{ $phone->links() }}
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
@endsection