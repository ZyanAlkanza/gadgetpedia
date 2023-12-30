@extends('dashboard.template')

@section('title')
    Dashboard
@endsection

@section('content')
    <section class="content w-full">
        <div class="title text-xl font-bold mt-2 ml-2">Dashboard</div>
        
        <div class="maincontent flex flex-wrap px-2 mt-4 gap-2">
            <a href="">
                <div class="card bg-gray-200 hover:bg-gray-300 max-[768px]:w-[160px] w-[330px] rounded-xl p-2">
                    <h3 class="text-center">Product</h3>
                    <h1 class="text-5xl font-bold text-center text-pink-500 my-2">50</h1>
                    <h5 class="text-sm text-center font-light">More Detail</h5>
                </div>
            </a>

            <a href="">
                <div class="card bg-gray-200 hover:bg-gray-300 max-[768px]:w-[160px] w-[330px] rounded-xl p-2">
                    <h3 class="text-center">Out of Stock</h3>
                    <h1 class="text-5xl font-bold text-center text-pink-500 my-2">5</h1>
                    <h5 class="text-sm text-center font-light">More Detail</h5>
                </div>
            </a>
            
            <a href="">
                <div class="card bg-gray-200 hover:bg-gray-300 max-[768px]:w-[160px] w-[330px] rounded-xl p-2">
                    <h3 class="text-center">Order</h3>
                    <h1 class="text-5xl font-bold text-center text-pink-500 my-2">15</h1>
                    <h5 class="text-sm text-center font-light">More Detail</h5>
                </div>
            </a>
            
            <a href="">
                <div class="card bg-gray-200 hover:bg-gray-300 max-[768px]:w-[160px] w-[330px] rounded-xl p-2">
                    <h3 class="text-center">User</h3>
                    <h1 class="text-5xl font-bold text-center text-pink-500 my-2">25</h1>
                    <h5 class="text-sm text-center font-light">More Detail</h5>
                </div>
            </a>
            
        </div>

    </section>
@endsection
    