<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login</title>
</head>
<body class="bg-gray-200 flex justify-center items-center h-screen">

    <div class="w-[320px] bg-white shadow-lg p-6 rounded-lg">
        <h1 class="text-center text-3xl mb-5 font-bold text-gray-800">Login</h1>

        <form action="" method="POST">
            @csrf

            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter your email"
                   class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 mb-4">

            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password"
                   class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 mb-4">

            <div class="flex items-center justify-between mb-4">
                <label class="flex items-center text-sm text-gray-700">
                    <input type="checkbox" name="remember" class="mr-2">
                    Remember me
                </label>
                <a href="#" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
            </div>

            <button type="submit"
                    class="w-full bg-blue-500 text-white font-medium p-2 rounded hover:bg-blue-600 transition duration-200">
                Login
            </button>

            <a href="{{ route('register') }}"
               class="block text-center text-sm text-blue-600 hover:text-blue-800 hover:underline mt-4 transition duration-200">
               I don't have an account
            </a>
        </form>
    </div>

</body>
</html>
