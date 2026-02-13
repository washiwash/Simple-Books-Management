
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
    <nav class="navbar bg-base-100  z-999 ">
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


    
        
    <nav class="fixed left-0 top-0 h-screen w-64 bg-white shadow-md text-100">
        <ul class= "mt-30">
            <li class="flex justify-center p-5 text-black w-full transition ease-in-out gap-2 hover:bg-slate-300 font-semibold ">
            <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd"/>
</svg>              
<span><a href="{{ route('books') }}">Add Books</a></span>
            </li>
     <li class="flex justify-center p-5 text-black w-full transition ease-in-out gap-2 hover:bg-slate-300 font-semibold ">
           <svg class="w-6 h-6 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
  <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
</svg>
       
<span><a href="{{ route('assignStudent') }}">Assign Students</a></span>
            </li>
            
        </ul>

    </nav>

    <main class="pt-24 ml-64 px-6 py-6 min-h-screen">
    {{-- <div class="flex flex-col items-center justify-center w-full"> --}}
        {{ $slot }}
    {{-- </div> --}}
     </main>

    <footer class="footer footer-center p-5 bg-base-300 text-base-content text-xs">
        <div>
            <p>© 2026 Diwa - Admin</p>
        </div>
    </footer>
</body>

</html>