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

        <h1 class="font-bold text-lg mt-3">Payment</h1>

        <div class="content flex flex-row gap-4 mt-3">
            <div class="text w-1/3 h-fit p-4 flex flex-col rounded-xl">
                
                <div class="info p-4 mb-4 bg-gray-100 rounded-xl">
                    <h1 class="text-4xl text-center font-bold text-primary mb-6">Gadget<span class="text-secondary">pedia</span></h1>
    
                    <label class="font-light">Bank</label>
                    <h5 class="font-medium mb-4">Bank BCA</h5>
                    
                    <label class="font-light">Name</label>
                    <h5 class="font-medium mb-4">Gadgetpedia</h5>
    
                    <label class="font-light">Account Number</label>
                    <h5 class="font-medium mb-4">1801990017</h5>
                </div>

                <a href="/" class="bg-primary py-2 px-8 rounded text-center text-white hover:bg-pink-600 transition duration-300 ease-in-out">Done</a>
            </div>

            <div class="image w-2/3 flex justify-center">
                <img src="{{ url('img/default-illustration.svg') }}" class="w-3/4">
            </div>
        </div>
    </section>
    
</body>
</html>