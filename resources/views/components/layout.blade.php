<!DOCTYPE html>
<html lang="en" data-theme="lofi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>{{ isset($title) ? $title . ' - Diwa' : 'Diwa' }}</title>    <link rel="preconnect" href="<https://fonts.bunny.net>">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col bg-base-200 font-sans">
    <nav class="navbar bg-base-100">
        <div class="navbar-start">
            <img src="{{ asset('images/logo-removebg-preview.png') }}" alt="log-home" class="w-40 h-20 object-contain">
        </div>
        <div class="navbar-end gap-2">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-primary btn-sm hover:bg-[#ae2012] border-none transition ease-in-out outline-none">Log Out</button>
            </form>
        </div>
      
    </nav>

     <main class="flex flex-col px-6 py-6  justify-start m-20 md:h-screen lg:py-0">
    {{-- <div class="flex flex-col items-center justify-center w-full"> --}}
        {{ $slot }}
    {{-- </div> --}}
     </main>

    <footer class="footer footer-center p-5 bg-base-300 text-base-content text-xs">
        <p>© 2026 Diwa {{ filled($footer) ? '- ' . $footer : '- Student' }}</p>
    </footer>
</body>

</html>