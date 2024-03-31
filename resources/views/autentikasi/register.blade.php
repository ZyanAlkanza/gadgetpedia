<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Registrasi</title>
</head>
<body class="bg-white">
    <nav class="w-full h-14 flex flex-row justify-between px-14 max-[768px]:px-4 mb-4">
        <div class="logo flex justify-between items-center">
            <h1 class="text-2xl text-center font-bold text-pink-500">Gadget<span class="text-slate-700">pedia</span></h1>
        </div>
    </nav>

    <form action="{{ url('registrasi') }}" method="post">
        @csrf
        <section class=" w-full h-fit flex justify-center items-center py-10 px-14 max-[768px]:px-4 max-[768px]:gap-2 gap-4">
            <div class="kartu bg-gray-100 w-1/4 h-1/4 rounded-lg flex flex-col justify-center px-4">
                <h1 class="text-2xl text-pink-500 font-bold text-center py-6">Registrasi</h1>
                <div class="field-username flex flex-col">
                    <label class="mb-2">Username</label>
                    <input type="username" name="username" id="username" value="{{ old('username') }}" class="px-3 py-1 focus:outline-none border-2 border-pink-300 focus:border-2 focus:border-pink-500 rounded-full mt-1" autofocus autocomplete="off">
                    <div class="message h-[25px]">
                        @error('username')
                            <div class="error-msg text-xs mt-1 text-red-700 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="field-email flex flex-col">
                    <label class="mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="px-3 py-1 focus:outline-none border-2 border-pink-300 focus:border-2 focus:border-pink-500 rounded-full mt-1" autocomplete="off">
                    <div class="message h-[25px]">
                        @error('email')
                            <div class="error-msg text-xs mt-1 text-red-700 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="field-password flex flex-col">
                    <label class="mb-2">Password</label>
                    <input type="password" id="password" name="password" class="px-3 py-1 focus:outline-none border-2 border-pink-300 focus:border-2 focus:border-pink-500 rounded-full mt-1">
                    <div class="message h-[25px]">
                        @error('password')
                            <div class="error-msg text-xs mt-1 text-red-700 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="bg-pink-500 hover:bg-pink-600 w-full py-2 my-6 text-white rounded-full">Masuk</button>

                <div class="register mt-4 mb-10">
                    <h5 class="text-sm text-center">Sudah memiliki akun? <a href="{{ url('login') }}" class="text-pink-500 text-underline">Login</a></h5>
                </div>
            </div>
        </section>
    </form>
</body>
</html>