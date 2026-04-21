<x-layout title="Login">
    <div class="max-w-md mx-auto">
        <div class="card bg-base-100 shadow-lg">
            <div class="card-body p-6">
                <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-control mb-4">
                        <label class="label" for="email">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email" name="email" id="email" class="input input-bordered w-full" required
                            autofocus />
                        <x-toasts.error name="email" />
                    </div>


                    <div class="form-control mb-6">
                        <label class="label" for="password">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" name="password" id="password" class="input input-bordered w-full"
                            required />
                        <x-toasts.error name="password" />

                    </div>

                    <button type="submit" class="btn btn-primary w-full">Login</button>
                </form>

                <p class="text-center">
                    Hello in Our community
                </p>
            </div>
        </div>
    </div>
</x-layout>
