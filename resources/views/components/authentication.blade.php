
<!DOCTYPE html>
<html lang="en" data-theme="lofi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diwa</title>
    <link rel="preconnect" href="<https://fonts.bunny.net>">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col bg-[#003049] font-sans">


    <main class="flex flex-col items-center justify-center px-6 py-6 mx-auto md:h-screen lg:py-0">
    <div class="flex flex-col items-center justify-center w-full">
        <img src="{{ asset('images/logo-removebg-preview.png') }}" alt="Logo" class="w-40 h-40 rounded-full bg-white object-contain animate-float" />
        {{ $slot }}
    </div>




   

  

</body>

</html>