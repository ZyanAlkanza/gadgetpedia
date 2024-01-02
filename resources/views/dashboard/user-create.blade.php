@include('dashboard.template-header')

<body class="flex justify-center items-center h-full">
    <div class="card bg-gray-200 w-96 h-max rounded-xl flex flex-col p-4">
        <h1 class="text-center text-xl font-semibold text-pink-500 mt-2">Add User</h1>
        
        <label for="username" class="mt-6">Username</label>
        <input type="text" id="username" placeholder="Username" class="px-3 py-1 focus:outline-none border-2 border-pink-300 focus:border-2 focus:border-pink-500 rounded-full mt-1" autofocus autocomplete="off">
        <div class="error bg-red-30 h-6 mt-1">
        @error('username')
            <div class="error-msg text-xs mt-1 text-red-700 font-semibold">{{ $message }}</div>
        @enderror
        </div>

        <label for="email" class="mt-1">Email</label>
        <input type="text" id="email" placeholder="Email" class="px-3 py-1 focus:outline-none border-2 border-pink-300 focus:border-2 focus:border-pink-500 rounded-full mt-1" autocomplete="off">
        <div class="error bg-red-30 h-6 mt-1">
        @error('email')
            <div class="error-msg text-xs mt-1 text-red-700 font-semibold">{{ $message }}</div>
        @enderror
        </div>

        <button class="px-2 py-2 rounded-full bg-pink-500 text-white mt-8 mb-4">Submit</button>
    </div>
</body>