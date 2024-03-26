<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Gadgetpedia</title>
</head>
<body class="h-full">
    <nav class="h-14 px-14 flex items-center">
        <h1 class="text-2xl font-bold text-pink-500">Gadget<span class="text-slate-700">pedia</span></h1>
    </nav>

    <section class="h-[700px] flex px-14">
        <div class="left w-1/2 pt-4">
            <div class="mainPicture h-[75%] flex justify-center">
                {{-- <img src="{{ asset('img/galaxy.webp') }}" class="h-full"> --}}
                <img src="{{ asset('img/' . $images[0]['image']) }}" class="h-full" id="mainImage">
            </div>
            <div class="thumbPicture h-[25%] flex justify-center gap-2">
                @foreach($images as $image)
                    <div class="thumb w-24 h-24 mt-4 flex justify-center">
                        <img src="{{ asset('img/' . $image['image']) }}" class="thumbnail">
                    </div>
                @endforeach
            </div>
        </div>
        <div class="right w-1/2 pt-4">
            <h1 class="font-semibold text-lg text-pink-500">Detail Product</h1>

            <h1 class="font-bold text-2xl mt-4">{{ $phone->brand }} {{ $phone->model }}</h1>
            <h5 class="mt-2">Stock: {{ $phone->stock }} Pcs</h5>

            <h5 class="font-semibold mt-4">Spesification</h5>
            <textarea class="resize-none focus:outline-none" name="desc" id="" cols="40" rows="13" readonly>{{ $phone->desc }}</textarea>

            <h5 class="mt-4">Price</h5>
            <h1 class="font-bold text-3xl">Rp. 23.999.000</h1>

            <button class="bg-pink-500 text-white px-28 py-2 rounded mt-8 hover:bg-pink-600">Buy Now</button>
        </div>
    </section>

    <script>
        // Dapatkan elemen-elemen HTML yang dibutuhkan
        const mainImage = document.getElementById('mainImage');
        const thumbnails = document.querySelectorAll('.thumbnail');
      
        // Tambahkan event listener untuk setiap thumbnail
        thumbnails.forEach(thumbnail => {
          thumbnail.addEventListener('click', function() {
            // Ganti sumber gambar pada kolom image utama dengan sumber gambar thumbnail yang diklik
            mainImage.src = thumbnail.src;

            thumbnails.forEach(otherThumbnail => {
                otherThumbnail.classList.remove('border-2', 'border-pink-500', 'rounded');
            });

            thumbnail.classList.add('border-2', 'border-pink-500', 'rounded');
          });
        });
      </script>
</body>
</html>