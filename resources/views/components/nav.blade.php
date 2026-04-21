<div class="navbar bg-base-100 shadow-sm px-4 md:px-8">
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
        <a class="btn btn-ghost text-xl font-bold" href="{{ route('home') }}">Blog<span
                class="text-primary">Personnel</span></a>
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
                            <li><a href="{{ route('articles.create') }}">Write One</a></li>
                        </ul>
                    </details>
                </li>
            @endauth
        </ul>
    </div>
    @guest
        <div class="navbar-end">
            <a href="{{ route('login') }}" class="btn btn-ghost btn-sm">Login</a>
        </div>
    @endguest
    @auth
        <div class="navbar-end">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar placeholder">
                    <div class="bg-neutral text-neutral-content rounded-full w-10">
                        <span class="text-lg">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                </div>
                <ul tabindex="-1" class="mt-3 z-1 p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                    <li class="menu-title px-2 py-1">
                        <span class="text-sm font-medium">{{ Auth::user()->name }}</span>
                    </li>
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
        </div>
    @endauth
</div>