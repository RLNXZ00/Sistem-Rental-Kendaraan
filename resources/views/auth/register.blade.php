<x-guest-layout>
    <main class="grid grid-cols-1 lg:grid-cols-2 min-h-screen">
        <!-- Kolom Kiri: Branding & Image (Hanya tampil di desktop) -->
        <div class="hidden lg:flex flex-col justify-between bg-primary relative overflow-hidden text-on-primary">
            <!-- Background Image with Overlay -->
            <div class="absolute inset-0 z-0">
                <img src="https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80" 
                     alt="Rental Mobil Mewah" 
                     class="w-full h-full object-cover object-center opacity-40">
                <div class="absolute inset-0 bg-gradient-to-t from-primary via-primary/80 to-transparent"></div>
            </div>
            
            <div class="relative z-10 p-12 flex flex-col h-full justify-between">
                <div>
                    <div class="flex items-center gap-2 mb-12">
                        <span class="material-symbols-outlined text-[32px] text-secondary-container">directions_car</span>
                        <span class="font-label-md text-2xl font-bold tracking-tight">AutoRide</span>
                    </div>
                    
                    <h1 class="font-label-md text-4xl lg:text-5xl font-bold leading-tight mb-6">
                        Mulai Perjalanan<br>Luar Biasa Anda<br>Hari Ini.
                    </h1>
                    
                    <p class="font-body-lg text-lg text-inverse-primary max-w-md">
                        Bergabunglah dengan ribuan pelanggan yang telah mempercayakan perjalanan mereka kepada AutoRide. Nikmati akses ke ratusan armada kendaraan premium.
                    </p>
                </div>
                
                <div class="bg-surface/10 backdrop-blur-md border border-surface/20 rounded-2xl p-6 max-w-md mt-12">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="flex -space-x-3">
                            <img class="w-10 h-10 rounded-full border-2 border-primary object-cover" src="https://randomuser.me/api/portraits/men/32.jpg" alt="User">
                            <img class="w-10 h-10 rounded-full border-2 border-primary object-cover" src="https://randomuser.me/api/portraits/women/44.jpg" alt="User">
                            <img class="w-10 h-10 rounded-full border-2 border-primary object-cover" src="https://randomuser.me/api/portraits/men/68.jpg" alt="User">
                        </div>
                        <div class="text-sm font-medium">
                            Dipercaya oleh <span class="font-bold text-secondary-fixed">10,000+</span> Pengguna
                        </div>
                    </div>
                    <div class="flex items-center gap-1 text-secondary-container">
                        <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
                        <span class="ml-2 text-sm text-inverse-primary">4.9/5 Rating rata-rata</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Kolom Kanan: Form Register -->
        <div class="flex flex-col justify-center px-6 py-12 lg:px-16 xl:px-24 bg-surface relative">
            <div class="w-full max-w-md mx-auto">
                
                <!-- Mobile Header -->
                <div class="flex items-center gap-2 mb-8 lg:hidden">
                    <span class="material-symbols-outlined text-[28px] text-primary">directions_car</span>
                    <span class="font-label-md text-xl font-bold tracking-tight text-on-surface">AutoRide</span>
                </div>
                
                <div class="mb-8">
                    <h2 class="font-label-md text-3xl font-bold text-on-surface tracking-tight mb-2">Buat Akun Baru</h2>
                    <p class="font-body-md text-on-surface-variant">Lengkapi data diri Anda untuk mulai menyewa kendaraan impian.</p>
                </div>

                <!-- Validation Errors -->
                <div class="mb-6">
                    @if ($errors->any())
                        <div class="p-4 rounded-lg bg-error/10 border border-error/20 flex items-start gap-3">
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

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf
                    
                    <!-- Name -->
                    <div>
                        <label class="block font-label-sm text-sm font-semibold text-on-surface mb-1.5" for="name">
                            Nama Lengkap <span class="text-error">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="material-symbols-outlined text-outline text-[20px]">person</span>
                            </div>
                            <input class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-lg font-body-md text-on-surface focus:bg-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all shadow-sm" 
                                   id="name" type="text" name="name" value="{{ old('name') }}" placeholder="John Doe" required autofocus autocomplete="name" />
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div>
                        <label class="block font-label-sm text-sm font-semibold text-on-surface mb-1.5" for="email">
                            Alamat Email <span class="text-error">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="material-symbols-outlined text-outline text-[20px]">mail</span>
                            </div>
                            <input class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-lg font-body-md text-on-surface focus:bg-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all shadow-sm" 
                                   id="email" type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autocomplete="username" />
                        </div>
                    </div>

                    <!-- Password Group -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Password -->
                        <div>
                            <label class="block font-label-sm text-sm font-semibold text-on-surface mb-1.5" for="password">
                                Kata Sandi <span class="text-error">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="material-symbols-outlined text-outline text-[20px]">lock</span>
                                </div>
                                <input class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-lg font-body-md text-on-surface focus:bg-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all shadow-sm" 
                                       id="password" type="password" name="password" placeholder="••••••••" required autocomplete="new-password" />
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label class="block font-label-sm text-sm font-semibold text-on-surface mb-1.5" for="password_confirmation">
                                Ulangi Sandi <span class="text-error">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="material-symbols-outlined text-outline text-[20px]">lock_reset</span>
                                </div>
                                <input class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-lg font-body-md text-on-surface focus:bg-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all shadow-sm" 
                                       id="password_confirmation" type="password" name="password_confirmation" placeholder="••••••••" required autocomplete="new-password" />
                            </div>
                        </div>
                    </div>

                    <!-- Additional Details (Optional if required by your user migration) -->
                    <!-- In standard Breeze, name, email, password are required. In your schema, NIK/HP are nullable so they can be added later in Profile. -->

                    <!-- Terms agreement -->
                    <div class="flex items-start pt-2">
                        <div class="flex items-center h-5 mt-0.5">
                            <input class="w-4 h-4 rounded border-slate-300 text-secondary-container focus:ring-secondary-container focus:ring-offset-0 bg-surface cursor-pointer" 
                                   id="terms" name="terms" type="checkbox" required />
                        </div>
                        <div class="ml-3 font-body-sm text-sm text-on-surface-variant">
                            <label class="cursor-pointer" for="terms">
                                Saya setuju dengan <a class="text-primary font-medium hover:underline" href="#">Ketentuan Layanan</a> dan <a class="text-primary font-medium hover:underline" href="#">Kebijakan Privasi</a>.
                            </label>
                        </div>
                    </div>

                    <!-- Register Button -->
                    <div class="pt-4">
                        <button class="w-full flex justify-center items-center gap-2 py-3.5 px-4 border border-transparent rounded-lg font-label-md text-base font-semibold text-on-secondary bg-secondary-container hover:bg-[#eb6a11] shadow-sm hover:shadow-md hover:-translate-y-0.5 transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary-container" type="submit">
                            <span>Daftar Sekarang</span>
                            <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
                        </button>
                    </div>
                </form>

                <!-- Login Link -->
                <div class="mt-8 text-center border-t border-slate-100 pt-6">
                    <p class="font-body-sm text-sm text-on-surface-variant">
                        Sudah punya akun? 
                        <a class="font-label-sm font-semibold text-primary hover:text-primary-container transition-colors hover:underline ml-1" href="{{ route('login') }}">Masuk di sini</a>
                    </p>
                </div>
                
            </div>
        </div>
    </main>
</x-guest-layout>
