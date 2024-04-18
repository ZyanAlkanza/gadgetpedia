<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    'sans': ['inter']
                },
                extend: {
                    colors: {
                        'primary': '#D94496',
                        'secondary': '#1E1E1E', 
                        'abu-abu': '#f5f5f5',
                    },
                }
            }
        }
    </script>

    {{-- Remixicon --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">


    <title>Gadgetpedia</title>
</head>
<body class="h-full">
    <nav class="w-full h-[68px] px-[120px] flex items-center">
        <h1 class="text-2xl font-bold text-pink-500 font-inter">Gadget<span class="text-secondary">pedia</span></h1>
    </nav>

    <section class="w-full px-[120px]">
        <div class="button">
            <a href="{{ url('/') }}" class="bg-pink-100 py-2 px-4 rounded text-primary hover:bg-pink-500 hover:text-white transition duration-300 ease-in-out">Back</a>
        </div>

        <div class="content flex flex-row gap-4 mt-3">
            <div class="cart w-1/2">

                <form action="{{ url('cartcheckout') }}" method="post">
                    @csrf

                    @foreach ($cart as $item)
                        <div class="card h-40 flex bg-gray-100 rounded-xl mb-6">
                            <div class="image w-1/4 flex justify-center p-4">
                                <img src="{{ url('img/'. $item->phone->image[0]->image) }}" class="h-full mix-blend-multiply">
                            </div>

                            <div class="text w-2/4 p-4">
                                <h3>{{ $item->phone->brand }} {{ $item->phone->model }}</h3>
                                <h1 class="font-bold text-lg">Rp. {{ number_format($item->phone->price, 0, ',','.') }}</h1>
                                <div class="quantity mt-8">
                                    <label for="">Qty :</label>
                                    <select class="w-20 h-10 p-2 rounded border-2 border-gray-200 focus:border-2 focus:border-primary" name="cart[{{ $loop->index }}][quantity]">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="w-1/4 flex justify-end p-4">
                                <a href="{{ url('deletecart/'. $item->id) }}" class="bg-pink-100 h-10 py-2 px-4 rounded text-primary hover:bg-pink-500 hover:text-white transition duration-300 ease-in-out">Delete</a>
                            </div>
                        </div>

                        <input type="hidden" name="cart[{{ $loop->index }}][cart_id]" value="{{ $item->id }}">
                        <input type="hidden" name="cart[{{ $loop->index }}][user_id]" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="cart[{{ $loop->index }}][phone_id]" value="{{ $item->phone->id }}">
                        <input type="hidden" name="cart[{{ $loop->index }}][price]" value="{{ $item->phone->price }}">
                    @endforeach
                    

                    {{-- <a href="" class="bg-primary py-2 px-8 rounded text-white hover:bg-pink-600 transition duration-300 ease-in-out">Checkout</a> --}}
                    <button type="submit" class="bg-primary py-2 px-8 rounded text-white hover:bg-pink-600 transition duration-300 ease-in-out">Checkout</button>
                </form>

            </div>
            <div class="profile w-1/2 p-4 bg-abu-abu rounded-xl">
                <div class="flex justify-between relative">
                    <label class="font-light">Name</label>
                    <a href="" class="bg-pink-100 text-primary px-4 py-2 rounded hover:bg-primary hover:text-white transition duration-300 ease-in-out absolute top-0 right-0">Edit</a>
                </div>
                <h5 class="font-medium mb-4">{{ Auth::user()->username }}</h5>

                <label class="font-light">Email</label>
                <h5 class="font-medium mb-4">{{ Auth::user()->email }}</h5>
                
                <label class="font-light">Phone Number</label>
                <h5 class="font-medium mb-4">{{ Auth::user()->phone ?? 'Empty' }}</h5>
                
                <label class="font-light">Address</label>
                <h5 class="font-medium w-[85%]">{{ Auth::user()->address ?? 'Empty' }}</h5>
            </div>
        </div>
    </section>

</body>
</html>