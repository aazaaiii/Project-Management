<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'JOELL PROJECT') - Renovasi Rumah Profesional</title>

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 + Bootstrap Icons (compiled via Vite) -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

    @include('components.public.navbar')

    <main>
        @yield('content')
    </main>

   @include('components.public.footer')

    @stack('scripts')

</body>
</html>