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
            <a href="{{ url('/profile') }}" class="bg-pink-100 py-2 px-4 rounded text-primary hover:bg-pink-500 hover:text-white transition duration-300 ease-in-out">Back</a>
        </div>

        <div class="content flex flex-row mt-4 gap-4">
            <div class="image w-[20%] flex justify-center">
                <div class="cover">
                    <img src="{{ url('img/default-avatar.png') }}" alt="">
                </div>
            </div>
            <div class="text w-[80%] flex flex-col rounded-xl bg-abu-abu">

                <form action="{{ url('profile/update') }}" method="POST" class="flex flex-col p-4 rounded-xl bg-abu-abu">
                    @method('put')
                    @csrf
                    <div class="title flex justify-between mb-2">
                        <h1 class="font-bold">Edit Profile</h1>
                        <button type="submit" class="bg-primary py-1 px-4 rounded text-center text-white hover:bg-pink-600 transition duration-300 ease-in-out">Save</button>
                    </div>
                    
                    <label class="font-light">Username</label>
                    <input type="text" name="username" id="username" class="@error('username') border-red-500 @enderror px-2 py-1 rounded border-2 border-abu-abu focus:border-2 focus:border-pink-500 focus:outline-none font-medium" value="{{ $user->username }}">
                    <div class="h-5">
                        @error('username')
                            <div class="px-2 text-xs font-bold text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <label class="font-light">Email</label>
                    <input type="text" name="email" class="@error('email') border-red-500 @enderror px-2 py-1 rounded border-2 border-abu-abu focus:border-2 focus:border-pink-500 focus:outline-none font-medium" value="{{ $user->email }}">
                    <div class="h-5">
                        @error('email')
                            <div class="px-2 text-xs font-bold text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <label class="font-light">Phone Number</label>
                    <input type="text" name="phone" class="@error('phone') border-red-500 @enderror px-2 py-1 rounded border-2 border-abu-abu focus:border-2 focus:border-pink-500 focus:outline-none font-medium" value="{{ $user->phone }}">
                    <div class="h-5">
                        @error('phone')
                            <div class="px-2 text-xs font-bold text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <label class="font-light">Address</label>
                    <input type="text" name="address" class="px-2 py-1 rounded border-2 border-abu-abu focus:border-2 focus:border-pink-500 focus:outline-none font-medium mb-4" value="{{ $user->address }}">
                </form>

            </div>
        </div>
    </section>
    
</body>
</html>