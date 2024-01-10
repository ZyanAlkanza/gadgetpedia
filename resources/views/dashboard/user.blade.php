@extends('dashboard.template')

@section('content')
    <section class="content w-full overflow-hidden">
        <div class="title text-xl font-bold mt-2 ml-8 flex justify-between h-[35px]">
            <div class="title">
                User
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
                <a href="/user/create" class="add border-2 bg-pink-500 px-4  py-2 text-sm rounded-full text-white hover:bg-pink-600 text-lg">Add</a>
                <a href="" class="recycle border-2 border-pink-500 px-4  py-2 text-sm rounded-full text-pink-500 hover:bg-pink-600 hover:text-white text-lg ml-2">Recycle</a>
            </div>
        </div>
        
        <div class="relative overflow-x-auto mt-4 mx-4">
            <table class="w-full text-sm text-left rtl:text-right text-black-500">
                <thead class="text-xs text-black uppercase bg-white">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-[5%] text-center">No</th>
                        <th scope="col" class="px-6 py-3 w-[30%]">Username</th>
                        <th scope="col" class="px-6 py-3 w-[30%]">Email</th>
                        <th scope="col" class="px-6 py-3 w-[35%] text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($user as $key => $item)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-2 font-medium text-black whitespace-nowrap text-center">{{ $user->firstItem()+$key }}</th>
                            <th scope="row" class="px-6 py-2 font-medium text-black whitespace-nowrap">{{ $item->username }}</th>
                            <th scope="row" class="px-6 py-2 font-medium text-black whitespace-nowrap">{{ $item->email }}</th>
                            <th scope="row" class="px-6 py-2 font-medium text-black whitespace-nowrap flex justify-center gap-2">
                                <a href="{{ url('user/'.$item->id.'/edit') }}"  class="border-2 border-pink-500 bg-pink-500 px-4 py-2 text-white hover:bg-pink-600 rounded-full">Edit</a>
                                {{-- <a href="" class="border-2 border-pink-500 px-4 py-2 text-pink-500 rounded-full hover:bg-pink-600 hover:text-white">Delete</a> --}}
                                <button id="openModalBtn" class="border-2 border-pink-500 px-4 py-2 text-pink-500 rounded-full hover:bg-pink-600 hover:text-white">
                                    Delete
                                </button>
                                
                                <div id="myModal" class="fixed inset-0 z-50 hidden overflow-auto bg-black bg-opacity-50 flex items-center justify-center">
                                    <div class="bg-white p-8 max-w-md mx-auto rounded shadow-lg">
                                        <p class="text-xl font-semibold mb-4">Are you sure to delete this data?</p>
                                
                                        <div class="button flex justify-end gap-2">
                                            <button id="" class="mt-6 bg-pink-500 hover:bg-pink-700 text-white py-2 px-4 rounded-full">
                                                Delete
                                            </button>
                                            <button id="closeModalBtn" class="mt-6 border-2 border-pink-500 hover:bg-pink-700 hover:text-white text-pink-500 py-2 px-4 rounded-full">
                                                Cancel
                                            </button>
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
            {{ $user->links() }}
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
        function openModal() {
            document.getElementById('myModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('myModal').classList.add('hidden');
        }

        document.getElementById('openModalBtn').addEventListener('click', openModal);

        document.getElementById('closeModalBtn').addEventListener('click', closeModal);
    </script>
@endsection