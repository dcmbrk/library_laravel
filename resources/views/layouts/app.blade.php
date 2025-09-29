<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Libraby</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="grid justify-center font-serif">
    @include('partials.header')
    <main class="border border-gray-200 border-t-0 p-5 border-b-0">
        @yield('content')
    </main>
    @include('partials.footer')
</body>

</html>