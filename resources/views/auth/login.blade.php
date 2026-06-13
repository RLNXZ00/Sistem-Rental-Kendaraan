<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center px-4 py-8 relative">
        <!-- Background decorative elements -->
        <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-[20%] -right-[10%] w-[50%] h-[50%] rounded-full bg-primary/5 blur-3xl"></div>
            <div class="absolute -bottom-[20%] -left-[10%] w-[50%] h-[50%] rounded-full bg-secondary-container/5 blur-3xl"></div>
        </div>

        <main class="w-full max-w-[440px] bg-surface rounded-2xl shadow-xl border border-slate-100 overflow-hidden z-10">
            <!-- Header -->
            <div class="px-8 pt-8 pb-6 text-center">
                <div class="inline-flex items-center justify-center w-14 h-14 rounded-xl bg-primary/5 text-primary mb-4">
                    <span class="material-symbols-outlined text-[32px]">directions_car</span>
                </div>
                <h1 class="font-label-md text-[28px] font-bold text-on-surface mb-2 tracking-tight">Selamat Datang</h1>
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                    Masuk ke akun AutoRide Anda untuk melanjutkan
                </p>
            </div>

            <!-- Validation Errors -->
            <div class="px-8">
                <x-auth-session-status class="mb-4" :status="session('status')" />
                @if ($errors->any())
                    <div class="mb-4 p-4 rounded-lg bg-error/10 border border-error/20 flex items-start gap-3">
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
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="px-8 pb-8">
                @csrf
                
                <!-- Email -->
                <div class="mb-5">
                    <label class="block font-label-sm text-label-sm font-semibold text-on-surface mb-1.5" for="email">
                        Alamat Email <span class="text-error">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-outline text-[20px]">mail</span>
                        </div>
                        <input class="w-full pl-10 pr-4 py-3 bg-surface border border-slate-200 rounded-lg font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all shadow-sm" 
                               id="email" type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus autocomplete="username" />
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <div class="flex items-center justify-between mb-1.5">
                        <label class="block font-label-sm text-label-sm font-semibold text-on-surface" for="password">
                            Kata Sandi <span class="text-error">*</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a class="font-label-sm text-xs font-semibold text-primary hover:text-primary-container transition-colors" href="{{ route('password.request') }}">
                                Lupa Sandi?
                            </a>
                        @endif
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="material-symbols-outlined text-outline text-[20px]">lock</span>
                        </div>
                        <input class="w-full pl-10 pr-10 py-3 bg-surface border border-slate-200 rounded-lg font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all shadow-sm" 
                               id="password" type="password" name="password" placeholder="••••••••" required autocomplete="current-password" />
                        <button class="absolute inset-y-0 right-0 pr-3 flex items-center text-outline hover:text-on-surface transition-colors" type="button" onclick="const p=document.getElementById('password'); const i=this.querySelector('span'); if(p.type==='password'){p.type='text'; i.innerText='visibility'}else{p.type='password'; i.innerText='visibility_off'}">
                            <span class="material-symbols-outlined text-[20px]">visibility_off</span>
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center gap-2 mb-6">
                    <input class="w-4 h-4 text-primary bg-surface border-slate-200 rounded focus:ring-primary focus:ring-2 transition-all" id="remember_me" type="checkbox" name="remember">
                    <label class="font-body-sm text-body-sm text-on-surface-variant cursor-pointer" for="remember_me">Ingat saya</label>
                </div>

                <!-- Submit Button -->
                <button class="w-full bg-secondary-container text-on-secondary py-3.5 rounded-lg font-label-md text-label-md font-semibold shadow-sm hover:shadow-md hover:-translate-y-0.5 hover:bg-[#eb6a11] transition-all flex items-center justify-center gap-2" type="submit">
                    Masuk
                    <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                </button>

                <!-- Footer Links -->
                <div class="text-center pt-6 mt-6 border-t border-slate-100">
                    <p class="font-body-sm text-sm text-on-surface-variant">
                        Belum punya akun? 
                        <a class="font-label-sm font-semibold text-primary hover:text-primary-container hover:underline transition-all ml-1" href="{{ route('register') }}">Daftar di sini</a>
                    </p>
                </div>
            </form>
        </main>
    </div>
</x-guest-layout>
