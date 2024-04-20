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

        <div class="content flex flex-row mt-2">
            <div class="image w-[40%] flex flex-col justify-center items-end">
                <div class="cover w-[400px] h-[400px] rounded-xl bg-abu-abu">
                    <img src="{{ asset('img/' . $images[0]['image']) }}" class="mix-blend-multiply" id="mainImage">
                </div>
                <div class="thumb w-[400px] h-[120px] mt-4 flex gap-5">
                    @foreach($images as $image)
                    <div class=" w-[120px] h-[120px] flex justify-center items-center rounded-lg bg-abu-abu">
                        <img src="{{ asset('img/' . $image['image']) }}" class="thumbnail size-[90%] mix-blend-multiply">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="text w-[60%] px-4 py-2 ml-6 rounded-xl bg-abu-abu">
                <h5 class="text-base font-bold">Detail Product</h5>
                <h1 class="text-xl font-medium mt-4">{{ $phone->brand }} {{ $phone->model }}</h1>
                <h1 class="text-2xl font-bold mt-2 text-primary">Rp. {{ number_format($phone->price, 0,',','.') }}</h1>
                <h5 class="text-sm font-light mt-2">
                    @if ($phone->stock == 0)
                        <div class="w-fit bg-gray-200 px-4 py-1 font-bold text-xs text-gray-500 rounded">Out Of Stock</div>
                    @else
                        Stock: {{ $phone->stock }} Pcs
                    @endif
                </h5>
                
                <div class="badge flex gap-2 mt-4">
                    <div class="badge-1 flex p-2 rounded-lg bg-pink-100">
                        <div class="icon flex justify-center items-center">
                            <i class="ri-truck-line ri-xl text-primary"></i>
                        </div>
                        <div class="title flex flex-col align-right justify-center ml-2">
                            <h1 class="text-sm font-bold text-primary">Free Shipping</h1>
                            <h5 class="text-[9px] font-light">Jabodetabek Area</h5>
                        </div>
                    </div>
                    <div class="badge-2 flex p-2 rounded-lg bg-pink-100">
                        <div class="icon flex justify-center items-center">
                            <i class="ri-discount-percent-line ri-xl text-primary"></i>
                        </div>
                        <div class="title flex flex-col align-right justify-center ml-2">
                            <h1 class="text-sm font-bold text-primary">0% Installment</h1>
                            <h5 class="text-[9px] font-light">For Certain Bank</h5>
                        </div>
                    </div>
                </div>
                
                <h5 class="text-base font-bold mt-2">Spesification</h5>
                <textarea class="resize-none focus:outline-none h-56 w-80 mt-2 text-sm bg-abu-abu" readonly>{{ $phone->desc }}</textarea>

                <form action="{{ url('addtocart') }}" method="POST">
                    <div class="button mt-4">
                        @if (!$phone->stock == 0)
                            <a href="{{ url('buynow/'. $phone->id) }}" class="border-2 border-primary bg-primary px-4 py-2 rounded text-white hover:bg-pink-500 transition duration-300 ease-in-out">Buy Now</a>
                        @csrf
                        {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}
                        <input type="hidden" name="phone_id" value="{{ $phone->id }}">
                    
                        <button type="submit" class="bg-pink-100 px-4 py-2 rounded text-primary hover:bg-pink-500 hover:text-white transition duration-300 ease-in-out">Add To Cart</button>
                        {{-- <a href="{{ url('') }}" class="bg-pink-100 px-4 py-2 rounded text-primary hover:bg-pink-500 hover:text-white transition duration-300 ease-in-out">Add To Cart</a> --}}
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        const mainImage = document.getElementById('mainImage');
        const thumbnails = document.querySelectorAll('.thumbnail');
    
        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', function() {
                mainImage.src = thumbnail.src;
    
                thumbnails.forEach(otherThumbnail => {
                    otherThumbnail.parentNode.classList.remove('border-2', 'border-pink-500', 'rounded');
                });
                thumbnail.parentNode.classList.add('border-2', 'border-pink-500', 'rounded');
            });
        });
    </script>
    
</body>
</html>