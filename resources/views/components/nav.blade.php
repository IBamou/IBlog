<div class="navbar bg-base-100 shadow-sm px-4 md:px-8 sticky top-0 z-50">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul tabindex="-1" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('articles.index') }}">Articles</a></li>
                @auth
                    <li>
                        <details>
                            <summary>My Articles</summary>
                            <ul class="p-2">
                                <li><a href="{{ route('my.articles', 'published') }}">Published</a></li>
                                <li><a href="{{ route('my.articles', 'draft') }}">Draft</a></li>
                            </ul>
                        </details>
                    </li>
                    <li><a href="{{ route('articles.create') }}">Write Article</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-start">Logout</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                @endguest
            </ul>
        </div>
        <a class="flex items-center gap-2" href="{{ route('home') }}">
                    <svg class="w-9 h-9 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="text-2xl font-black tracking-widest"><span class="text-base-content">I</span><span class="text-primary">Blog</span></span>
                </a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li><a href="{{ route('home') }}" class="hover:text-primary transition">Home</a></li>
            <li><a href="{{ route('articles.index') }}" class="hover:text-primary transition">Articles</a></li>
            @auth
                <li>
                    <details>
                        <summary class="hover:text-primary transition">My Articles</summary>
                        <ul class="p-2 bg-base-100 shadow-lg rounded-box mt-2">
                            <li><a href="{{ route('my.articles', 'published') }}">Published</a></li>
                            <li><a href="{{ route('my.articles', 'draft') }}">Draft</a></li>
                            <li><a href="{{ route('profile.show') }}">Profile</a></li>
                        <li><a href="{{ route('articles.create') }}">Write One</a></li>
                        </ul>
                    </details>
                </li>
            @endauth
        </ul>
    </div>
    <div class="navbar-end flex items-center gap-3">
        <button type="button" class="theme-toggle btn btn-ghost btn-circle" onclick="toggleTheme()">
            <svg class="sun h-8 w-8 fill-current hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
            </svg>
            <svg class="moon h-8 w-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
            </svg>
        </button>
        <script>
            function toggleTheme() {
                const html = document.documentElement;
                const isDark = html.getAttribute("data-theme") !== "light";
                const newTheme = isDark ? "light" : "dark";
                html.setAttribute("data-theme", newTheme);
                localStorage.setItem("theme", newTheme);
                updateIcons();
            }
            function updateIcons() {
                const isLight = document.documentElement.getAttribute("data-theme") === "light";
                document.querySelector(".sun").classList.toggle("hidden", !isLight);
                document.querySelector(".moon").classList.toggle("hidden", isLight);
            }
            updateIcons();
        </script>
        @guest
            <a href="{{ route('login') }}" class="btn btn-ghost btn-sm">Login</a>
        @endguest
        @auth
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <ul tabindex="-1" class="mt-3 z-1 p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                    <li class="menu-title px-2 py-1">
                        <span class="text-sm font-medium">{{ Auth::user()->name }}</span>
                    </li>
                    <li><a href="{{ route('profile.show') }}">Profile</a></li>
                    <li><a href="{{ route('articles.create') }}">Write Article</a></li>
                    <li><a href="{{ route('my.articles', 'published') }}">My Published</a></li>
                    <li><a href="{{ route('my.articles', 'draft') }}">My Drafts</a></li>
                    <li class="mt-2 border-t border-base-300 pt-2">
                        <form action="{{ route('logout') }}" method="POST" class="flex">
                            @csrf
                            <button type="submit"
                                class="flex-1 text-start text-error hover:bg-base-200 p-2 rounded">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
            @endauth
        </div>
</div>
