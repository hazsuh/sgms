<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 h-screen">
            <div class="p-5 text-xl font-bold">Student Grade Management System</div>
            <ul>
                <li><a href="{{ route('attendances.index') }}" class="block py-3 px-5 hover:bg-gray-700">Record Attendance</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <h2 class="text-3xl font-bold mb-6">Attendance Details</h2>

            <!-- Display student details and attendance information -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                <input type="text" id="name" name="name" value="{{ $attendance->student->name }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md" readonly>
            </div>

            <div class="mb-4">
                <label for="no_matric" class="block text-sm font-medium text-gray-600">No Matric</label>
                <input type="text" id="no_matric" name="no_matric" value="{{ $attendance->student->no_matric }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md" readonly>
            </div>

            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-600">Date</label>
                <input type="text" id="date" name="date" value="{{ $attendance->date }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md" readonly>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-600">Attendance Status</label>
                <input type="text" id="status" name="status" value="{{ ucfirst($attendance->status) }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md" readonly>
            </div>

        </div>
    </div>
</body>
</html>
