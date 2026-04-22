<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'IBlog' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script>
        (function() {
            const saved = localStorage.getItem('theme');
            if (saved) {
                document.documentElement.setAttribute('data-theme', saved);
            }
        })();
    </script>
</head>
<body class="bg-base-200 min-h-screen">
    <x-nav />
    <main class="container mx-auto px-4 py-8 max-w-6xl">
        {{ $slot }}
    </main>
    <footer class="footer footer-center p-6 bg-base-100 text-base-content rounded">
        <aside>
            <p>IBlog &copy; {{ date('Y') }}</p>
        </aside>
    </footer>
</body>

</html>