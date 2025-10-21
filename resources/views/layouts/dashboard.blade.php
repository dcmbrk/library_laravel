<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/js/app.js'])
</head>

<body class="flex bg-gray-100 text-gray-900 flex-col">
    @include('partials.dashboard.header')
    @include('partials.dashboard.aside')
    <main class="ml-[220px] pt-[85px] border">
        @yield('content')
    </main>
</body>

<script>
    document.querySelectorAll("li.group > button").forEach(btn => {
        btn.addEventListener("click", () => {
            btn.parentElement.classList.toggle("open");
        });
    });
</script>

</html>