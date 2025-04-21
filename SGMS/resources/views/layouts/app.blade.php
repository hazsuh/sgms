<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Grade Management System')</title>
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
                <li><a href="{{ route('attendances.index') }}" class="block py-3 px-5 hover:bg-gray-700">Record Attendance</a></li>
                <a href="{{ route('subjects.index') }}" class="block py-3 px-5 hover:bg-gray-700">Subjects</a>
                <li><a href="{{ route('exams.index') }}" class="block py-3 px-5 hover:bg-gray-700">Exams</a></li> <!-- Pautan Senarai Peperiksaan -->
                <li><a href="{{ route('marks') }}" class="block py-3 px-5 hover:bg-gray-700">Marks</a></li>
                <!-- Form untuk logout -->
                <form action="{{ route('logout') }}" method="POST" class="inline-block">
                    @csrf
                    <button type="submit" class="block py-3 px-5 hover:bg-gray-700">Logout</button>
                </form>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            @yield('content') <!-- Content from child views -->
        </div>
    </div>

    <!-- Popup untuk success message (selepas logout) -->
    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
</body>
</html>
