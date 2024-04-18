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
        <div class="button flex justify-between">
            <a href="{{ url('/') }}" class="bg-pink-100 py-2 px-4 rounded text-primary hover:bg-pink-500 hover:text-white transition duration-300 ease-in-out">Back</a>
            @if (session('status'))
                <div id="alert" class="bg-pink-500 text-white px-4 py-1 rounded-full flex items-center justify-between">
                    <div class="flex items-center">
                        <span class="text-sm font-semibold">{{ session('status') }}</span>
                    </div>
                    <button id="closeBtn" class="ml-8 font-normal">&times;</button>
                </div>
            @endif
        </div>

        <div class="content flex flex-row mt-4 gap-4">
            <div class="image w-[20%] flex justify-center">
                <div class="cover">
                    <img src="{{ url('img/default-avatar.png') }}" alt="">
                </div>
            </div>
            <div class="text w-[80%] flex flex-col p-4 rounded-xl bg-abu-abu">
                <div class="title flex justify-between mb-2">
                    <h1 class="font-bold">My Profile</h1>
                    <a href="{{ url('profile/edit') }}" class="bg-primary py-1 px-4 rounded text-center text-white hover:bg-pink-600 transition duration-300 ease-in-out">Edit</a>
                </div>
                
                <label class="font-light">Username</label>
                <h5 class="font-medium mb-4">{{ $user->username }}</h5>

                <label class="font-light">Email</label>
                <h5 class="font-medium mb-4">{{ $user->email }}</h5>

                <label class="font-light">Phone Number</label>
                <h5 class="font-medium mb-4">{{ $user->phone ?? 'empty' }}</h5>

                <label class="font-light">Address</label>
                <h5 class="font-medium mb-4">{{ $user->address ?? 'empty' }}</h5>

                <label class="font-light">Password</label>
                <h5 class="font-medium mb-4">*******</h5>
            </div>
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
    
</body>
</html>