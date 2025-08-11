<x-guest-layout>
 <div class="theme-app min-h-screen flex items-center justify-center gradient-bg p-4">
    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md overflow-hidden fade-in">

        <!-- Header Section -->
        <div class="bg-primary text-center p-8">
            <img src="{{ asset($company->company_logo ?? 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png') }}"
                 alt="Company Logo"
                 class="w-16 h-16 mx-auto mb-4 rounded-full bg-white/20 p-2">
            <h3 class="text-primary text-2xl font-bold">{{ $company->system_title ?? 'HRMS Portal' }}</h3>
            <p class="text-primary text-sm font-medium">Login to your account</p>
        </div>

        <!-- Form Section -->
        <div class="p-8">
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-4 focus:ring-primary-light outline-none transition-all">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Password -->
                <div class="relative">
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input id="password" type="password" name="password" required
                           class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl focus:ring-4 focus:ring-primary-light outline-none transition-all">
                    <span id="togglePassword" class="absolute right-4 top-11 text-gray-500 cursor-pointer">
                        <i class="bi bi-eye-slash" id="toggleIcon"></i>
                    </span>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center text-sm text-gray-600">
                        <input type="checkbox" name="remember" class="mr-2 rounded border-gray-300">
                        Remember Me
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-primary hover:underline text-sm">
                            Forgot Password?
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <button type="submit"
                        class="w-full py-3 bg-primary hover:bg-hover text-primary rounded-xl font-semibold shadow-lg hover:scale-105 transition-all duration-200">
                    Login
                </button>

                <!-- Google Login -->
                @if (Route::has('google.auth'))
                    <button type="button"
                            onclick="window.location.href='{{ route('google.auth') }}'"
                            class="w-full py-3 border border-gray-300 rounded-xl flex items-center justify-center gap-3 hover:bg-gray-50 transition-all">
                        <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" class="w-5 h-5">
                        Sign in with Google
                    </button>
                @endif

                <!-- No Account -->
                @if (Route::has('register'))
                    <p class="text-center text-gray-600 text-sm">
                        Don’t have an account?
                        <a href="{{ route('register') }}" class="text-primary hover:underline">Register</a>
                    </p>
                @endif
            </form>
        </div>
    </div>
</div>


    <style>
        .gradient-bg {
            background: linear-gradient(135deg, var(--primary-bg), var(--secondary-bg), var(--primary-bg));
            background-size: 300% 300%;
            animation: gradientMove 8s ease infinite;
        }
        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in { animation: fadeIn 0.8s ease-in-out; }
        input:focus { box-shadow: 0 0 0 3px rgba(var(--primary-rgb), 0.1); }
        button:focus { outline: none; }
    </style>
</x-guest-layout>
