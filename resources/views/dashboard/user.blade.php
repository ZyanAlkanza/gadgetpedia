@extends('dashboard.template')

@section('title')
    User
@endsection

@section('content')
    <section class="content w-full overflow-hidden">
        <div class="title text-xl font-bold mt-2 ml-2">User</div>

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
                        <th scope="col" class="px-6 py-3  w-10">No</th>
                        <th scope="col" class="px-6 py-3 ">Username</th>
                        <th scope="col" class="px-6 py-3 ">Email</th>
                        <th scope="col" class="px-6 py-3  text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap text-center">1</th>
                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">Zyan Alkanza</th>
                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">zyan.mujaddid@gmail.com</th>
                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap flex justify-center gap-2">
                            <a href="{{ url('user/{id}/edit') }}"  class="border-2 border-pink-500 bg-pink-500 px-4 py-2 text-white hover:bg-pink-600 rounded-full">Edit</a>
                            <a href="" class="border-2 border-pink-500 px-4 py-2 text-pink-500 rounded-full hover:bg-pink-600 hover:text-white">Delete</a>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>

    </section>
@endsection