<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Lupa Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-[url('/assets/images/bglogin1.png')] bg-cover bg-center bg-no-repeat">

    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-black bg-opacity-50 text-white p-8 rounded-lg shadow-lg w-full max-w-sm">
            <div class="flex flex-col items-center mb-6">
                <h2 class="text-2xl font-bold text-yellow-500">LUPA PASSWORD</h2>
            </div>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-400">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.password.email') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-yellow-500 text-sm font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-200">
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                        Kirim Link Reset Password
                    </button>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('admin.login') }}" class="text-sm text-yellow-500 hover:underline">Kembali ke
                        Login</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
