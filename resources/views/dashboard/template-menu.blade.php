<section class="sidebar h-screen w-[180px] max-[768px]:w-[60px] shadow-2xl">
    <div class="logo">
        <h1 class="text-xl max-[768px]:text-4xl font-bold text-pink-500 text-center lg:mt-2">G<span class="max-[768px]:hidden">adget<span class="text-gray-700">pedia</span></span></h1>
    </div>

    <div class="menu h-full">
        <ul class="flex flex-col h-full lg:pl-4">
            <a href="{{ url('dashboard') }}"><li class="{{ request()->is('dashboard') ? 'text-pink-500' : '' }} max-[768px]:text-2xl max-[768px]:text-center py-4 mt-8 hover:text-pink-500"><i class="fi fi-rr-dashboard "></i><span class="max-[768px]:hidden ml-3">Dashboard</span></li></a>
            <a href="{{ url('user') }}"><li class="{{ request()->is('user') ? 'text-pink-500' : '' }} max-[768px]:text-2xl max-[768px]:text-center py-4 hover:text-pink-500"><i class="fi fi-rr-users "></i><span class="max-[768px]:hidden ml-3">User</span></li></a>
            <a href="{{ url('phone') }}"><li class="{{ request()->is('phone') ? 'text-pink-500' : '' }} max-[768px]:text-2xl max-[768px]:text-center py-4 hover:text-pink-500"><i class="fi fi-rr-mobile-button"></i><span class="max-[768px]:hidden ml-3">Phone</span></li></a>
            <a href="{{ url('order') }}"><li class="{{ request()->is('order') ? 'text-pink-500' : '' }} max-[768px]:text-2xl max-[768px]:text-center py-4 hover:text-pink-500"><i class="fi fi-rr-cart-shopping-fast "></i><span class="max-[768px]:hidden ml-3">Order</span></li></a>
            
            <div class="flex-grow"></div>
            
            <a href=""><li class="max-[768px]:text-2xl max-[768px]:text-center py-4 mb-16 hover:text-red-500"><i class="fi fi-rr-sign-out-alt "></i><span class="max-[768px]:hidden ml-3">Logout</span></li></a>
        </ul>
    </div>
</section>