<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student - Student Grade Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 h-screen">
            <div class="p-5 text-xl font-bold">Student Grade Management System</div>
            <ul>
                <li><a href="{{ route('dashboard') }}" class="block py-3 px-5 hover:bg-gray-700">Dashboard</a></li>
                <li><a href="{{ route('students') }}" class="block py-3 px-5 hover:bg-gray-700">Students</a></li>
                <li><a href="#" class="block py-3 px-5 hover:bg-gray-700">Attendances</a></li>
                <li><a href="#" class="block py-3 px-5 hover:bg-gray-700">Subjects</a></li>
                <li><a href="#" class="block py-3 px-5 hover:bg-gray-700">Exams</a></li>
                <li><a href="#" class="block py-3 px-5 hover:bg-gray-700">Marks</a></li>
                <li><a href="#" class="block py-3 px-5 hover:bg-gray-700">Logout</a></li>
            </ul>
        </div>

        <!-- Add Student Content -->
        <div class="flex-1 p-8">
            <h2 class="text-3xl font-bold mb-6">Add Student</h2>

            <form action="{{ url('/students') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                    <input type="text" name="name" id="name" class="mt-1 p-2 w-full border border-gray-300 rounded-md" placeholder="Enter student's name" required>
                </div>

                <div class="mb-4">
                    <label for="class" class="block text-sm font-medium text-gray-600">Class</label>
                    <input type="text" name="class" id="class" class="mt-1 p-2 w-full border border-gray-300 rounded-md" placeholder="Enter student's class" required>
                </div>

                <div class="mb-4">
                    <label for="gender" class="block text-sm font-medium text-gray-600">Gender</label>
                    <select name="gender" id="gender" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>

                <!-- No Matric -->
                <div class="mb-4">
                    <label for="no_matric" class="block text-sm font-medium text-gray-600">No Matric</label>
                    <input type="text" name="no_matric" id="no_matric" class="mt-1 p-2 w-full border border-gray-300 rounded-md" placeholder="Enter student's no matric" required>
                </div>

                <button type="submit" class="w-full mt-4 py-2 px-4 bg-black text-white rounded-md hover:bg-gray-800">Add Student</button>
            </form>
        </div>
    </div>
</body>
</html>
