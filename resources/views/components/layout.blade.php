<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Blog Personnel' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-base-200 min-h-screen">
    <x-nav />
    <main class="container mx-auto px-4 py-8 max-w-6xl">
        {{ $slot }}
    </main>
    <footer class="footer footer-center p-6 bg-base-100 text-base-content rounded">
        <aside>
            <p>Blog Personnel &copy; {{ date('Y') }}</p>
        </aside>
    </footer>
</body>

</html>
