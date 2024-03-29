<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Login</title>
</head>
<body class="bg-white">
    <nav class="w-full h-14 flex flex-row justify-between px-14 max-[768px]:px-4 mb-4">
        <div class="logo flex justify-between items-center">
            <h1 class="text-2xl text-center font-bold text-pink-500">Gadget<span class="text-slate-700">pedia</span></h1>
        </div>
    </nav>

    <section class="w-full h-20 flex justify-center items-center">
        @if ($errors->has('error'))
            <div id="alert" class="bg-pink-500 text-white px-4 py-1 rounded-full flex items-center justify-between">
                <div class="flex items-center">
                    <span class="text-sm font-semibold">{{ $errors->first('error') }}</span>
                </div>
            </div>
        @endif
    </section>

    <form action="{{ url('autentikasi') }}" method="post">
        @csrf
        <section class=" w-full h-fit flex justify-center items-center py-10 px-14 max-[768px]:px-4 max-[768px]:gap-2 gap-4">
            <div class="kartu bg-gray-100 w-1/4 h-1/4 rounded-lg flex flex-col justify-center px-4">
                <h1 class="text-2xl text-pink-500 font-bold text-center py-4">Login</h1>
                <div class="field-email flex flex-col">
                    <label class="mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="px-3 py-1 focus:outline-none border-2 border-pink-300 focus:border-2 focus:border-pink-500 rounded-full mt-1" autofocus autocomplete="off">
                </div>
                <div class="field-password flex flex-col">
                    <label class="mb-2">Password</label>
                    <input type="password" id="password" name="password" class="px-3 py-1 focus:outline-none border-2 border-pink-300 focus:border-2 focus:border-pink-500 rounded-full mt-1">
                </div>

                <button type="submit" class="bg-pink-500 hover:bg-pink-600 w-full py-2 my-8 text-white rounded-full">Masuk</button>

                <div class="register mb-8">
                    <h5 class="text-sm text-center">Belum memiliki akun? <a href="{{ url('register') }}" class="text-pink-500 text-underline">Registrasi</a></h5>
                </div>
            </div>
        </section>
    </form>
</body>
</html>