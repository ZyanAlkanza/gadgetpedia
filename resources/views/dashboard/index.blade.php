@extends('dashboard.template')

@section('content')
    <section class="content w-full">
        <div class="title text-xl font-bold mt-2 ml-8">Dashboard</div>
        
        <div class="maincontent flex flex-wrap px-8 mt-4 gap-2">
            <a href="{{ url('phone') }}">
                <div class="card bg-gray-200 hover:bg-gray-300 max-[768px]:w-[143px] w-[321px] rounded-xl p-2">
                    <h3 class="text-center">Product</h3>
                    <h1 class="text-5xl font-bold text-center text-pink-500 my-2">{{ $product[0]->total_product }}</h1>
                    <h5 class="text-sm text-center font-light mt-4">More Detail</h5>
                </div>
            </a>

            <a href="{{ url('outofstock') }}">
                <div class="card bg-gray-200 hover:bg-gray-300 max-[768px]:w-[143px] w-[321px] rounded-xl p-2">
                    <h3 class="text-center">Out of Stock</h3>
                    <h1 class="text-5xl font-bold text-center text-pink-500 my-2">{{ $outofstock[0]->total_outofstock }}</h1>
                    <h5 class="text-sm text-center font-light mt-4">More Detail</h5>
                </div>
            </a>
            
            <a href="{{ url('order') }}">
                <div class="card bg-gray-200 hover:bg-gray-300 max-[768px]:w-[143px] w-[321px] rounded-xl p-2">
                    <h3 class="text-center">Order</h3>
                    <h1 class="text-5xl font-bold text-center text-pink-500 my-2">{{ $order[0]->total_order }}</h1>
                    <h5 class="text-sm text-center font-light mt-4">More Detail</h5>
                </div>
            </a>
            
            <a href="{{ url('user') }}">
                <div class="card bg-gray-200 hover:bg-gray-300 max-[768px]:w-[143px] w-[321px] rounded-xl p-2">
                    <h3 class="text-center">User</h3>
                    <h1 class="text-5xl font-bold text-center text-pink-500 my-2">{{ $user[0]->total_user }}</h1>
                    <h5 class="text-sm text-center font-light mt-4">More Detail</h5>
                </div>
            </a>
            
        </div>

    </section>

    
@endsection
    