<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center p-margin-mobile md:p-margin-desktop">
        <!-- Main Registration Container -->
        <div class="w-full max-w-5xl bg-surface rounded-[20px] shadow-sm border border-slate-200 overflow-hidden flex flex-col md:flex-row relative z-10 transition-transform duration-300 hover:-translate-y-1 hover:shadow-lg">
            
            <!-- Left Side: Image/Branding Panel (Hidden on smaller mobile) -->
            <div class="hidden md:flex md:w-5/12 bg-primary text-on-primary p-10 flex-col justify-between relative overflow-hidden">
                <!-- Background Image overlay -->
                <div class="absolute inset-0 bg-cover bg-center opacity-40 mix-blend-overlay" data-alt="A sleek modern vehicle interior" style="background-image: url('https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');"></div>
                <div class="relative z-10">
                    <a class="inline-flex items-center gap-2 mb-12 group" href="/">
                        <span class="material-symbols-outlined fill text-3xl group-hover:scale-110 transition-transform duration-300">directions_car</span>
                        <span class="font-headline-md text-headline-md tracking-tight">AutoRide</span>
                    </a>
                    <div class="space-y-6">
                        <h2 class="font-headline-lg text-headline-lg">Bergabunglah dalam perjalanan.</h2>
                        <p class="font-body-lg text-body-lg opacity-90">Rasakan penyewaan kendaraan yang lancar. Melajulah lebih cepat dengan armada premium dan andal kami.</p>
                    </div>
                </div>
                <div class="relative z-10">
                    <div class="flex items-center gap-4 text-sm font-label-md text-on-primary/80">
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[18px]">verified</span> Aman</span>
                        <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[18px]">support_agent</span> Layanan 24/7</span>
                    </div>
                </div>
                <!-- Decorative gradient element -->
                <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-primary-fixed rounded-full blur-3xl opacity-20 pointer-events-none"></div>
            </div>

            <!-- Right Side: Registration Form -->
            <div class="w-full md:w-7/12 p-8 md:p-10 lg:p-12 flex flex-col justify-center bg-surface relative z-10">
                <!-- Mobile Logo Header (Visible only on mobile) -->
                <div class="md:hidden flex items-center justify-center gap-2 mb-6 text-primary">
                    <span class="material-symbols-outlined fill text-3xl">directions_car</span>
                    <span class="font-headline-md text-headline-md tracking-tight">AutoRide</span>
                </div>
                
                <div class="mb-6">
                    <h1 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface mb-2">Buat Akun</h1>
                    <p class="font-body-md text-body-md text-on-surface-variant">Masukkan detail Anda di bawah ini untuk memulai dengan AutoRide.</p>
                </div>

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="mb-5 p-4 rounded-lg bg-error-container border border-error/20 flex items-start gap-3">
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

                <form action="{{ route('register') }}" class="space-y-5" method="POST">
                    @csrf
                    <!-- Grid layout for form fields to maximize space -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Name -->
                        <div class="space-y-stack-sm col-span-1 md:col-span-2">
                            <label class="block font-label-md text-label-md text-on-surface" for="name">Nama Pengguna (Username)</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-outline">
                                    <span class="material-symbols-outlined text-[20px]">person</span>
                                </span>
                                <input class="w-full pl-10 pr-4 py-3 bg-surface border border-slate-200 rounded-lg font-body-md text-body-md text-on-surface placeholder:text-outline-variant transition-all duration-200 input-glow" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. johndoe" required type="text" autofocus autocomplete="name" />
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="space-y-stack-sm col-span-1 md:col-span-2">
                            <label class="block font-label-md text-label-md text-on-surface" for="email">Email Aktif</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-outline">
                                    <span class="material-symbols-outlined text-[20px]">mail</span>
                                </span>
                                <input class="w-full pl-10 pr-4 py-3 bg-surface border border-slate-200 rounded-lg font-body-md text-body-md text-on-surface placeholder:text-outline-variant transition-all duration-200 input-glow" id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required type="email" autocomplete="username"/>
                            </div>
                        </div>

                        <!-- Phone Number -->
                        <div class="space-y-stack-sm col-span-1 md:col-span-2">
                            <label class="block font-label-md text-label-md text-on-surface" for="no_hp">Nomor HP</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-outline">
                                    <span class="material-symbols-outlined text-[20px]">call</span>
                                </span>
                                <input class="w-full pl-10 pr-4 py-3 bg-surface border border-slate-200 rounded-lg font-body-md text-body-md text-on-surface placeholder:text-outline-variant transition-all duration-200 input-glow" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" placeholder="+62 812 3456 7890" required type="tel" />
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="space-y-stack-sm col-span-1">
                            <label class="block font-label-md text-label-md text-on-surface" for="password">Kata Sandi</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-outline">
                                    <span class="material-symbols-outlined text-[20px]">lock</span>
                                </span>
                                <input class="w-full pl-10 pr-10 py-3 bg-surface border border-slate-200 rounded-lg font-body-md text-body-md text-on-surface placeholder:text-outline-variant transition-all duration-200 input-glow" id="password" name="password" placeholder="••••••••" required type="password" autocomplete="new-password"/>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="space-y-stack-sm col-span-1">
                            <label class="block font-label-md text-label-md text-on-surface" for="password_confirmation">Konfirmasi Sandi</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-outline">
                                    <span class="material-symbols-outlined text-[20px]">lock_reset</span>
                                </span>
                                <input class="w-full pl-10 pr-10 py-3 bg-surface border border-slate-200 rounded-lg font-body-md text-body-md text-on-surface placeholder:text-outline-variant transition-all duration-200 input-glow" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required type="password" autocomplete="new-password"/>
                            </div>
                        </div>
                    </div>

                    <!-- Terms agreement -->
                    <div class="flex items-start mt-4">
                        <div class="flex items-center h-5">
                            <input class="w-4 h-4 rounded border-slate-200 text-secondary-container focus:ring-secondary-container focus:ring-offset-0 bg-surface cursor-pointer" id="terms" name="terms" required type="checkbox"/>
                        </div>
                        <div class="ml-3 font-body-sm text-body-sm">
                            <label class="text-on-surface-variant cursor-pointer" for="terms">
                                Saya setuju dengan <a class="text-primary font-medium hover:underline focus:outline-none focus:underline" href="#">Ketentuan Layanan</a> dan <a class="text-primary font-medium hover:underline focus:outline-none focus:underline" href="#">Kebijakan Privasi</a>.
                            </label>
                        </div>
                    </div>

                    <!-- Register Button -->
                    <div class="pt-2">
                        <button class="w-full flex justify-center items-center gap-2 py-3.5 px-4 border border-transparent rounded-lg font-label-md text-label-md text-on-secondary bg-secondary-container hover:bg-[#ff8533] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary-container transition-all duration-200 hover:-translate-y-0.5 shadow-sm hover:shadow-md" type="submit">
                            <span>Daftar</span>
                            <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                        </button>
                    </div>
                </form>

                <!-- Login Link -->
                <div class="mt-6 text-center">
                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                        Sudah punya akun? 
                        <a class="font-label-md text-primary hover:text-primary-container transition-colors duration-200 hover:underline" href="{{ route('login') }}">Masuk</a>
                    </p>
                </div>

                <!-- Minimal Footer Text -->
                <div class="mt-6 pt-6 text-center border-t border-slate-100">
                    <p class="font-body-sm text-body-sm text-outline">
                        &copy; {{ date('Y') }} AutoRide. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
