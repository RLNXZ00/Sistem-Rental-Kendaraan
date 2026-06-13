<x-guest-layout class="flex">
    <!-- Left Side: Form Canvas -->
    <div class="w-full lg:w-5/12 flex flex-col justify-center items-center px-margin-mobile md:px-margin-desktop py-section-gap relative z-10">
      <div class="w-full max-w-[480px] flex flex-col min-h-full justify-center">
        <!-- Subtle Brand Header -->
        <div class="mb-stack-lg">
            <a class="inline-block" href="/">
                <span class="font-headline-md text-headline-md font-bold text-primary tracking-tight">AutoRide</span>
            </a>
        </div>
        
        <!-- Reset Password Card -->
        <div class="bg-surface rounded-[20px] shadow-[0_4px_6px_-1px_rgba(0,0,0,0.05)] border border-slate-200 p-8 md:p-10 w-full">
            <div class="mb-8">
                <h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary mb-2">Atur Ulang Kata Sandi</h1>
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                    Silakan masukkan alamat email Anda dan kata sandi baru untuk mengamankan akun Anda.
                </p>
            </div>

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-lg bg-error-container border border-error/20 flex items-start gap-3">
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

            <form action="{{ route('password.store') }}" class="space-y-6" method="POST">
                @csrf
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Field -->
                <div class="space-y-stack-sm">
                    <label class="block font-label-md text-label-md text-on-surface" for="email">Alamat Email</label>
                    <div class="relative input-glow rounded-lg transition-all duration-200">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-outline">mail</span>
                        </div>
                        <input class="block w-full pl-10 pr-3 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-primary font-body-sm text-body-sm bg-slate-50 focus:bg-surface transition-colors" id="email" name="email" value="{{ old('email', $request->email) }}" placeholder="you@example.com" required type="email" autofocus autocomplete="username"/>
                    </div>
                </div>

                <!-- New Password Field -->
                <div class="space-y-stack-sm">
                    <label class="block font-label-md text-label-md text-on-surface" for="password">Kata Sandi Baru</label>
                    <div class="relative input-glow rounded-lg transition-all duration-200">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-outline">lock</span>
                        </div>
                        <input class="block w-full pl-10 pr-10 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-primary font-body-sm text-body-sm bg-slate-50 focus:bg-surface transition-colors" id="password" name="password" placeholder="••••••••" required type="password" autocomplete="new-password"/>
                        <button class="absolute inset-y-0 right-0 pr-3 flex items-center text-outline hover:text-primary transition-colors" type="button" onclick="const p=document.getElementById('password'); const i=this.querySelector('span'); if(p.type==='password'){p.type='text'; i.innerText='visibility'}else{p.type='password'; i.innerText='visibility_off'}">
                            <span class="material-symbols-outlined text-[20px]">visibility_off</span>
                        </button>
                    </div>
                    <p class="font-label-sm text-label-sm text-outline mt-1">Minimal harus 8 karakter.</p>
                </div>

                <!-- Confirm Password Field -->
                <div class="space-y-stack-sm">
                    <label class="block font-label-md text-label-md text-on-surface" for="password_confirmation">Konfirmasi Kata Sandi</label>
                    <div class="relative input-glow rounded-lg transition-all duration-200">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-outline">lock_reset</span>
                        </div>
                        <input class="block w-full pl-10 pr-10 py-3 border border-slate-200 rounded-lg focus:outline-none focus:border-primary font-body-sm text-body-sm bg-slate-50 focus:bg-surface transition-colors" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required type="password" autocomplete="new-password"/>
                    </div>
                </div>

                <!-- Action Button -->
                <div class="pt-2">
                    <button class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm font-label-md text-label-md text-on-secondary bg-secondary-container hover:bg-[#e66a15] hover:-translate-y-1 hover:shadow-[0_10px_15px_-3px_rgba(0,0,0,0.1)] transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary-container" type="submit">
                        Atur Ulang Kata Sandi
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center">
                <a class="font-label-md text-label-md text-primary hover:text-navy-light transition-colors inline-flex items-center gap-1" href="{{ route('login') }}">
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    Kembali ke Masuk
                </a>
            </div>
        </div>
        
        <!-- Minimal Footer Text -->
        <div class="mt-auto pt-8 text-center">
            <p class="font-body-sm text-body-sm text-outline">
                &copy; {{ date('Y') }} AutoRide. All rights reserved.
            </p>
        </div>
      </div>
    </div>

    <!-- Right Side: Atmospheric Image -->
    <div class="hidden lg:block lg:w-7/12 relative bg-surface-variant overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-background to-transparent z-10 w-24"></div>
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCh6tOdDlANXK5rRv4GfTzsLYX544_6ohD_WxCdJmX6krpOk05QEOxYYAagS0hEZnGtbeIb8wAH27puhT-bwQatkyz00JaSodnZniP8WviBip2lH4zbEH5GjsFcJbLfmTHquvA-YBnjtdFdrT_M9XoDznZxahva2czatP119U-ACV4WgIfLMwFcF4IX_ECr8BeTZL2NjcgUTO0rngVtQRrfOf62ZiTEEIi0FwfnkoSlh51T_HSjHDQ5M3IBJa2CRR80oiJwpyKhN8s');"></div>
        <div class="absolute inset-0 bg-primary/10 z-0 mix-blend-multiply"></div>
    </div>
</x-guest-layout>
