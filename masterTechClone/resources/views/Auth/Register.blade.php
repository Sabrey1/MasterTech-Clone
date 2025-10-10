<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Register</title>
</head>
<body class="bg-gray-200 flex justify-center items-center h-screen">

    <div class="w-[300px] bg-white shadow-lg p-6 rounded-lg">
        <h1 class="text-center text-3xl mb-4 font-bold text-gray-800">Register</h1>

        <form action="">
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <input type="text" name="username" id="username" placeholder="Enter Username"
                class="w-full mb-3 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">

            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter Email"
                class="w-full mb-3 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">

            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter Password"
                class="w-full mb-4 border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">

            <div class="flex items-center mb-4">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-sm text-gray-700">Remember Me</label>
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 transition duration-200">
                Register
            </button>

            <a href="{{ route('login') }}"
               class="block text-center text-sm text-blue-600 hover:text-blue-800 hover:underline mt-4 transition duration-200">
               I have an account
            </a>
        </form>
    </div>

</body>
</html>
