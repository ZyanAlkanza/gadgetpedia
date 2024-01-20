@include('dashboard.template-header')

<body class="flex py-14 px-60 max-[768px]:py-4 max-[768px]:px-2 h-full max-[768px]:h-max bg-gray-100">

    <div class="content w-full h-full flex bg-white rounded-lg p-8 max-[768px]:h-max max-[768px]:p-4 max-[768px]:flex-col">
        <section class="left w-full flex flex-col">
            <a href="{{ url('phone') }}"  class="bg-pink-500 text-white px-6 py-2 w-max rounded-full hover:bg-pink-600">Back</a>
            <div class="image h-[64%] flex justify-center mr-4 mt-2">
                <img src="{{ asset('img/' . $images[0]['image']) }}" class="h-full" id="mainImage">
            </div>
            <div class="image-thumb h-[30%] mr-4 mt-4 flex justify-center" id="thumbnailContainer">
                @foreach($images as $image)
                    <div class="thumb">
                        <img src="{{ asset('img/' . $image['image']) }}" class="thumbnail h-40 max-[768px]:h-20">
                    </div>
                @endforeach
            </div>
        </section>

        <section class="right w-full h-full flex flex-col">
            <h1 class="font-semibold text-lg mt-2 text-pink-500 max-[768px]:mb-2">Detail Phone</h1>
            
            <label for="" class="font-semibold mt-2 uppercase text-sm">Brand</label>
            <h5>{{ $phone->brand }}</h5>

            <label for="" class="font-semibold mt-2 font-medium uppercase text-sm">Model</label>
            <h5>{{ $phone->model }}</h5>

            <label for="" class="font-semibold mt-2 font-medium uppercase text-sm">Stock</label>
            <h5>{{ $phone->stock }} Pcs</h5>

            <label for="" class="font-semibold mt-2 font-medium uppercase text-sm">Price</label>
            <h5>Rp. {{ number_format($phone->price, 0, ',','.')  }}</h5>

            <label for="" class="font-semibold mt-2 font-medium uppercase text-sm">Description</label>
            <h5>{{ $phone->desc }}</h5>
        </section>
    </div>

    <script>
        // Dapatkan elemen-elemen HTML yang dibutuhkan
        const mainImage = document.getElementById('mainImage');
        const thumbnails = document.querySelectorAll('.thumbnail');
      
        // Tambahkan event listener untuk setiap thumbnail
        thumbnails.forEach(thumbnail => {
          thumbnail.addEventListener('click', function() {
            // Ganti sumber gambar pada kolom image utama dengan sumber gambar thumbnail yang diklik
            mainImage.src = thumbnail.src;
          });
        });
      </script>
</body>
