<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/style.css">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="/dist/tailwind.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" />
    @vite('resources/css/app.css')
</head>
<body class="text-gray-800 font-inter">
    <!-- start: Sidebar -->
    <div class="fixed left-0 top-0 w-64 h-full bg-sky-950 p-4 z-50 sidebar-menu transition-transform">
        <a href="#" class="flex items-center pb-4 border-b border-b-slate-50 mt-3">
            <i class="fa-solid fa-circle-user fa-2xl" style="color: #ffffff;"></i>
            <span class="text-lg font-bold text-white ml-3">Admin</span>
        </a>
        <ul class="mt-4">
            <li class="mb-1 group">
                <a href="{{ route('index') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="fa-solid fa-house fa-sm" style="color: #ffffff;"></i>
                    <span class="text-sm ml-3">Dashboard</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="#" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class="fa-solid fa-server fa-sm" style="color: #ffffff;"></i>
                    <span class="text-sm ml-3">Data Master</span>
                    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                </a>
                <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                    <li class="mb-4">
                        <a href="{{ route('rombel.index') }}" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Data Rombel</a>
                    </li> 
                    <li class="mb-4">
                        <a href="{{ route('rayon.index') }}" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Data Rayon</a>
                    </li> 
                    <li class="mb-4">
                        <a href="{{ route('student.index') }}" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Data Siswa</a>
                    </li> 
                    <li class="mb-4">
                        <a href="{{ route('user.index') }}" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Data User</a>
                    </li> 
                </ul>
            </li>
            <li class="mb-1 group">
                <a href="{{ route('late.index')}}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="ri-settings-2-line mr-3 text-lg"></i>
                    <span class="text-sm">Data Keterlambatan</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="{{ route('logout') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100">
                    <i class="fa-solid fa-arrow-right-from-bracket fa-flip-horizontal fa-sm" style="color: #ffffff;"></i>
                    <span class="text-sm ml-3">Logout</span>
                </a>
            </li>
        </ul>
    </div>
     <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
        <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30 " style="margin-top: -2rem">
            <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>
            <ul class="flex items-center text-sm ml-4">
                <li class="mr-2">
                    <a href="{{ route('index') }}" class="text-gray-400 hover:text-gray-600 font-medium">Dashboard</a>
                </li>
            </ul>
        </div>
        <div class="p-6">
        <div class="Content">
            @yield('Content')
        </div>
        </div>
    </main>
    {{-- end: Main --}}
   

    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>