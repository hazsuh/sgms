<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Student Grade Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96">
            <h2 class="text-3xl font-bold text-center text-gray-800">Student Grade Management System</h2>
            <form action="{{ route('register') }}" method="POST" class="mt-6">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                    <input type="text" name="name" id="name" class="mt-1 p-2 w-full border border-gray-300 rounded-md" placeholder="Enter your name" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
                    <input type="email" name="email" id="email" class="mt-1 p-2 w-full border border-gray-300 rounded-md" placeholder="Enter your email" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                    <input type="password" name="password" id="password" class="mt-1 p-2 w-full border border-gray-300 rounded-md" placeholder="Enter your password" required>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-600">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 p-2 w-full border border-gray-300 rounded-md" placeholder="Confirm your password" required>
                </div>
                <button type="submit" class="w-full mt-4 py-2 px-4 bg-black text-white rounded-md hover:bg-gray-800">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
