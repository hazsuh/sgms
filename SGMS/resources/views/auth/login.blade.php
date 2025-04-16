<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Student Grade Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96">
            <h2 class="text-3xl font-bold text-center text-gray-800">Student Grade Management System</h2>
            <div class="mt-4 flex justify-center">
                <a href="{{ route('login') }}" class="text-xl text-blue-500">Login</a>
                <span class="mx-2">|</span>
                <a href="{{ route('register') }}" class="text-xl text-blue-500">Register</a>
            </div>
            <form action="{{ route('login') }}" method="POST" class="mt-6">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
                    <input type="email" name="email" id="email" class="mt-1 p-2 w-full border border-gray-300 rounded-md" placeholder="Enter your email" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                    <input type="password" name="password" id="password" class="mt-1 p-2 w-full border border-gray-300 rounded-md" placeholder="Enter your password" required>
                </div>
                <div class="flex items-center justify-between">
                    <label for="remember" class="inline-flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="form-checkbox">
                        <span class="ml-2 text-sm">Remember Me</span>
                    </label>
                    <a href="#" class="text-sm text-blue-500">Forgot Your Password?</a>
                </div>
                <button type="submit" class="w-full mt-4 py-2 px-4 bg-black text-white rounded-md hover:bg-gray-800">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
