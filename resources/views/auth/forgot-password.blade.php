<x-guest-layout class="bg-pattern">
    <div class="min-h-screen flex items-center justify-center p-margin-mobile md:p-margin-desktop relative">
        <!-- Decorative background elements -->
        <div class="absolute top-[-10%] left-[-5%] w-96 h-96 bg-surface-container-high rounded-full blur-3xl opacity-50 z-0 pointer-events-none"></div>
        <div class="absolute bottom-[-10%] right-[-5%] w-96 h-96 bg-primary-fixed rounded-full blur-3xl opacity-40 z-0 pointer-events-none"></div>
        
        <!-- Card Container -->
        <main class="w-full max-w-[440px] bg-surface rounded-xl shadow-md border border-slate-200 p-8 md:p-10 mb-[6px] relative z-10 flex flex-col gap-stack-lg transition-transform hover:-translate-y-1 hover:shadow-lg duration-300">
            
            <div class="flex flex-col items-center text-center gap-stack-sm">
                <div class="w-12 h-12 bg-primary rounded-xl flex items-center justify-center mb-2 shadow-sm">
                    <span class="material-symbols-outlined text-on-primary text-2xl" style="font-variation-settings: 'FILL' 1;">lock_reset</span>
                </div>
                <h1 class="font-headline-md text-headline-md text-primary">Lupa Kata Sandi</h1>
                <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                    Lupa kata sandi Anda? Tidak masalah. Masukkan email Anda dan kami akan mengirimkan tautan reset kata sandi.
                </p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-success font-label-sm" :status="session('status')" />

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="p-4 rounded-lg bg-error-container border border-error/20 flex items-start gap-3">
                    <span class="material-symbols-outlined text-error text-[20px] mt-0.5">error</span>
                    <div class="text-sm text-error">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="flex flex-col gap-stack-md">
                @csrf

                <!-- Email Input -->
                <div class="flex flex-col gap-2">
                    <label class="font-label-sm text-label-sm text-on-surface block" for="email">Alamat Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-outline text-[20px]">mail</span>
                        </div>
                        <input class="w-full pl-10 pr-4 py-3 bg-surface border border-slate-200 rounded-lg font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all shadow-sm" id="email" name="email" value="{{ old('email') }}" placeholder="name@company.com" required type="email" autofocus />
                    </div>
                </div>

                <!-- Submit Button -->
                <button class="mt-4 w-full bg-secondary-container text-on-secondary py-3.5 rounded-lg font-label-md text-label-md shadow-sm hover:shadow-md hover:-translate-y-0.5 hover:bg-[#eb6a11] transition-all flex items-center justify-center gap-2" type="submit">
                    Kirim Tautan Reset
                    <span class="material-symbols-outlined text-[18px]">send</span>
                </button>
            </form>
            
            <!-- Footer Links -->
            <div class="text-center border-t border-slate-100 pt-6 mt-2">
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                    Ingat kata sandi Anda? 
                    <a class="font-label-sm text-label-sm text-primary hover:text-primary-container hover:underline transition-all ml-1" href="{{ route('login') }}">Kembali ke Login</a>
                </p>
            </div>
        </main>
    </div>
</x-guest-layout>
