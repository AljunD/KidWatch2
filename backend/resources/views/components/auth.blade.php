<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        /* Custom Scrollbar for the form area */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e5e7eb;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #d1d5db;
        }
    </style>
</head>
<body class="h-full w-full flex items-center justify-center bg-black font-[Inter] antialiased">

    {{-- Background --}}
    <div class="absolute inset-0 bg-[url('{{ asset('images/background.png') }}')] bg-cover bg-center blur-md scale-110"></div>

    {{-- Auth Container --}}
    <div class="relative z-10 bg-white w-full max-w-6xl h-full md:h-[min(800px,95vh)] md:max-h-[800px] md:rounded-3xl shadow-2xl flex flex-col md:flex-row border border-gray-200 overflow-hidden">

        {{-- Left: Form --}}
        <div class="w-full md:w-1/2 overflow-y-auto custom-scrollbar bg-white">
            <div class="min-h-full flex flex-col justify-center p-8 md:p-12 lg:p-16">
                @yield('content')
            </div>
        </div>

        {{-- Right: Illustration --}}
        <div class="hidden md:block w-1/2 relative">
            <img src="{{ asset('images/form.png') }}"
                class="absolute inset-0 w-full h-full object-cover" alt="Background">

            {{-- Logo overlay --}}
            <div class="absolute inset-0 flex justify-center items-start z-20">
                <img src="{{ asset('images/logo.png') }}" class="w-48 h-48 mt-16 object-contain drop-shadow-xl">
            </div>

            {{-- Visual Polish: Soft gradient overlay to blend the image toward the form --}}
            <div class="absolute inset-0 bg-gradient-to-l from-transparent via-transparent to-white/10"></div>
        </div>
    </div>

</body>
</html>