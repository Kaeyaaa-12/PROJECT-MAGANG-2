<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('{{ asset('assets/images/bglogin1.png') }}');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="bg-black text-white">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-sm p-8 space-y-6 bg-black bg-opacity-70 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-center text-yellow-500">ADMIN LOGIN</h1>
            <form method="POST" action="{{ route('admin.login') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="username" class="block text-sm font-medium text-yellow-500">USERNAME</label>
                    <input id="username" name="email" type="email" autocomplete="email" required
                        class="block w-full px-3 py-2 mt-1 text-white bg-gray-800 border border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm"
                        value="{{ old('email') }}">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-yellow-500">PASSWORD</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="block w-full px-3 py-2 mt-1 text-white bg-gray-800 border border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                </div>
                <div class="text-right">
                    <a href="{{ route('admin.password.request') }}" class="text-sm text-yellow-500 hover:underline">Lupa
                        Password?</a>
                </div>
                @if ($errors->any())
                    <div class="text-red-500 text-sm">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div>
                    <button type="submit"
                        class="w-full px-4 py-2 text-sm font-bold text-black bg-yellow-500 border border-transparent rounded-md shadow-sm hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                        LOGIN
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
