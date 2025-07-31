<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen bg-gray-200">
        <div class="w-64 bg-gray-800">
            <div class="px-4 py-6">
                <h1 class="text-2xl font-bold text-white">Admin Panel</h1>
            </div>
            <nav class="mt-10">
                <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-700">Dashboard</a>
            </nav>
        </div>

        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="flex justify-between items-center p-6 bg-white border-b-2 border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800">Dashboard</h2>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-gray-600 hover:text-gray-900">Logout</button>
                </form>
            </header>
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container mx-auto px-6 py-8">
                    <h3 class="text-3xl font-medium text-gray-700">Selamat datang, Admin!</h3>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
