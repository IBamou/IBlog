<x-layout title="Login">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-md w-full">
            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="text-4xl font-bold inline-flex">
                    <span class="text-neutral">I</span><span class="text-primary">Blog</span>
                </a>
                <p class="text-base-content/60 mt-2">Welcome back! Login to continue.</p>
            </div>

            <div class="card bg-base-100 shadow-xl">
                <div class="card-body p-8">
                    <h2 class="text-2xl font-bold text-center mb-6">Sign In</h2>

                    <form method="POST" action="{{ route('login') }}" onsubmit="this.querySelector('button[type=submit]').disabled = true; this.querySelector('button[type=submit]').innerHTML = '<span class=&quot;loading loading-spinner&quot;></span> Logging in...';" >
                        @csrf

                        <div class="form-control mb-5">
                            <label class="label" for="email">
                                <span class="label-text font-medium">Email</span>
                            </label>
                            <input type="email" name="email" id="email" class="input input-bordered w-full @error('email') input-error @enderror" 
                                placeholder="your@email.com" required autofocus />
                            <x-toasts.error name="email" />
                        </div>


                        <div class="form-control mb-6">
                            <label class="label" for="password">
                                <span class="label-text font-medium">Password</span>
                            </label>
                            <input type="password" name="password" id="password" class="input input-bordered w-full @error('password') input-error @enderror"
                                placeholder="••••••••" required />
                            <x-toasts.error name="password" />
                        </div>

                        <button type="submit" class="btn btn-primary w-full btn-lg">Login</button>
                    </form>

                    <p class="text-center text-sm text-base-content/50 mt-6">
                        Welcome to our community of writers and readers.
                    </p>

                    
                </div>
            </div>
        </div>
    </div>
</x-layout>