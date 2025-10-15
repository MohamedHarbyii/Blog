<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-black transition-colors duration-300">

<nav class="flex items-center justify-between px-6 py-3 shadow bg-gray-100 dark:bg-gray-800">
    <div class="flex items-center gap-4">
        <a href="{{ route('posts.index') }}" class="font-bold text-lg dark:text-white">Posts</a>

        <a href="{{ route('posts.create') }}" class="font-bold text-lg dark:text-white">Create Post</a>
    </div>

    <!-- 🔘 زرار الدارك مود -->
    <button id="theme-toggle" class="px-4 py-2 rounded bg-gray-200 dark:bg-gray-700 dark:text-white">
        🌙 Dark Mode
    </button>
</nav>

<div class="p-6">
    @yield('content')
</div>

<script>
    const html = document.documentElement;
    const btn = document.getElementById('theme-toggle');

    // نتحقق من الوضع المحفوظ في localStorage
    if (localStorage.theme === 'dark') {
        html.classList.add('dark');
        document.body.classList.replace('bg-white', 'bg-gray-900');
        document.body.classList.replace('text-black', 'text-white');
        btn.textContent = '☀️ Light Mode';
    }

    btn.addEventListener('click', () => {
        html.classList.toggle('dark');
        const isDark = html.classList.contains('dark');

        if (isDark) {
            localStorage.theme = 'dark';
            document.body.classList.replace('bg-white', 'bg-gray-900');
            document.body.classList.replace('text-black', 'text-white');
            btn.textContent = '☀️ Light Mode';
        } else {
            localStorage.theme = 'light';
            document.body.classList.replace('bg-gray-900', 'bg-white');
            document.body.classList.replace('text-white', 'text-black');
            btn.textContent = '🌙 Dark Mode';
        }
    });
</script>

</body>
</html>
