<x-layout title="My Profile">
    <div class="min-h-screen flex items-center justify-center px-4 py-8">
        <div class="max-w-md w-full">
            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="text-4xl font-bold inline-flex">
                    <span class="text-neutral">I</span><span class="text-primary">Blog</span>
                </a>
            </div>

            <div class="card bg-base-100 shadow-xl">
                <div class="card-body p-8">
                    <div class="flex flex-col items-center mb-8">
                        <div class="avatar placeholder online">
                            <div class="bg-primary text-primary-content rounded-full w-24 h-24 flex items-center justify-center text-4xl font-bold">
                                <span>{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                            </div>
                        </div>
                        <h2 class="text-2xl font-bold mt-4">{{ $user->name }}</h2>
                        <p class="text-base-content/60">{{ $user->email }}</p>
                    </div>

                    <div class="stats stats-vertical lg:stats-horizontal shadow-sm mb-6 bg-base-200 w-full">
                        <div class="stat px-6">
                            <div class="stat-title text-xs text-center">Articles</div>
                            <div class="stat-value text-2xl text-center">{{ $user->articles->count() }}</div>
                        </div>
                        <div class="stat px-6">
                            <div class="stat-title text-xs text-center">Published</div>
                            <div class="stat-value text-2xl text-center">{{ $user->articles->where('status', 'published')->count() }}</div>
                        </div>
                        <div class="stat px-6">
                            <div class="stat-title text-xs text-center">Drafts</div>
                            <div class="stat-value text-2xl text-center">{{ $user->articles->where('status', 'draft')->count() }}</div>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="form-control mb-5">
                            <label class="label" for="name">
                                <span class="label-text font-medium">Name</span>
                            </label>
                            <input type="text" name="name" id="name" class="input input-bordered w-full" 
                                value="{{ old('name', $user->name) }}" required />
                            <x-toasts.error name="name" />
                        </div>

                        <div class="form-control mb-6">
                            <label class="label" for="email">
                                <span class="label-text font-medium">Email</span>
                            </label>
                            <input type="email" name="email" id="email" class="input input-bordered w-full"
                                value="{{ old('email', $user->email) }}" required />
                            <x-toasts.error name="email" />
                        </div>

                        <button type="submit" class="btn btn-primary w-full btn-lg">Update Profile</button>
                    </form>

                    <div class="divider my-6">Account Info</div>

                    <div class="flex justify-between text-sm text-base-content/60">
                        <span>Member since</span>
                        <span>{{ $user->created_at->format('M j, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>