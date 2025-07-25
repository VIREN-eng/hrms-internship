<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#ff2626] via-[#ff4d4d] to-[#ff6969] p-4"> {{-- Updated to red gradient --}}
        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md overflow-hidden animate-fade-in">

            <!-- Header Section -->
            <div class="bg-gradient-to-r from-[#ff2626] to-[#ff6969] text-center p-8"> {{-- Updated to red gradient --}}
                <img src="{{ asset($company->company_logo ?? 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png') }}"
                     alt="Company Logo"
                     class="w-16 h-16 mx-auto mb-4 rounded-full bg-white/20 p-2">
                <h3 class="text-white text-2xl font-bold">{{ $company->system_title ?? 'HRMS Portal' }}</h3>
                <p class="text-white text-sm font-medium">{{ $company->company_description ?? 'Create Your Account' }}</p>
            </div>

            <!-- Form Section -->
            <div class="p-8">
                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-gray-700 font-semibold mb-2">Full Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-4 focus:ring-red-300 outline-none transition-all"> {{-- Updated focus ring color --}}
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-gray-700 font-semibold mb-2">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-4 focus:ring-red-300 outline-none transition-all"> {{-- Updated focus ring color --}}
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Password -->
                    <div class="relative">
                        <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                        <input id="password" type="password" name="password" required
                               class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl focus:ring-4 focus:ring-red-300 outline-none transition-all"> {{-- Updated focus ring color --}}
                        <span id="togglePassword" class="absolute right-4 top-11 text-gray-500 cursor-pointer">
                            <i class="bi bi-eye-slash" id="toggleIcon"></i>
                        </span>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="relative">
                        <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                               class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-xl focus:ring-4 focus:ring-red-300 outline-none transition-all"> {{-- Updated focus ring color --}}
                        <span id="togglePasswordConfirm" class="absolute right-4 top-11 text-gray-500 cursor-pointer">
                            <i class="bi bi-eye-slash" id="toggleIconConfirm"></i>
                        </span>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
                    </div>

                    <!-- Register Button -->
                    <button type="submit"
                            class="w-full py-3 bg-gradient-to-r from-[#ff2626] to-[#ff6969] hover:from-[#ff6969] hover:to-[#ff2626] text-white rounded-xl font-semibold shadow-lg hover:scale-105 transition-all duration-200"> {{-- Updated to red gradient button --}}
                        Register
                    </button>

                    <!-- Google Sign Up -->
                    @if (Route::has('google.auth'))
                        <button type="button"
                                onclick="window.location.href='{{ route('google.auth') }}'"
                                class="w-full py-3 border border-gray-300 rounded-xl flex items-center justify-center gap-3 hover:bg-gray-50 transition-all">
                            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" class="w-5 h-5">
                            Sign up with Google
                        </button>
                    @endif

                    <!-- Already Registered -->
                    @if (Route::has('login'))
                        <p class="text-center text-gray-600 text-sm">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-red-600 hover:underline">Login</a> {{-- Updated link color --}}
                        </p>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <!-- Animations -->
    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fade-in 0.8s ease-in-out;
        }
    </style>

    <script>
        // Toggle Password
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');
        const toggleIcon = document.getElementById('toggleIcon');

        togglePassword.addEventListener('click', () => {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            toggleIcon.classList.toggle('bi-eye');
            toggleIcon.classList.toggle('bi-eye-slash');
        });

        // Toggle Confirm Password
        const confirmPasswordInput = document.getElementById('password_confirmation');
        const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
        const toggleIconConfirm = document.getElementById('toggleIconConfirm');

        togglePasswordConfirm.addEventListener('click', () => {
            const type = confirmPasswordInput.type === 'password' ? 'text' : 'password';
            confirmPasswordInput.type = type;
            toggleIconConfirm.classList.toggle('bi-eye');
            toggleIconConfirm.classList.toggle('bi-eye-slash');
        });
    </script>
</x-guest-layout>
