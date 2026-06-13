<x-app-layout>
    <main class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-stack-lg w-full">
        
        @include('profile.partials.header')

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
            
            @include('profile.partials.sidebar')

            <!-- Main Panel: Personal Information -->
            <div class="lg:col-span-8">
                <div class="bg-surface rounded-2xl p-6 md:p-8 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] hover:shadow-[0px_10px_15px_-3px_rgba(0,0,0,0.1)] transition-all duration-300 border border-slate-200">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h2 class="font-headline-lg text-headline-sm md:text-headline-md text-primary">Informasi Pribadi</h2>
                            <p class="text-body-md text-on-surface-variant">Perbarui detail profil Anda untuk kemudahan transaksi.</p>
                        </div>
                        <div class="hidden md:block">
                            <span class="material-symbols-outlined text-primary-container text-4xl opacity-20" data-icon="badge">badge</span>
                        </div>
                    </div>
                    
                    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                        @csrf
                        @method('patch')
                        
                        @if (session('status') === 'profile-updated')
                            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                                Profil berhasil diperbarui.
                            </div>
                        @endif

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-label-md text-on-surface font-semibold" for="name">Nama Lengkap</label>
                                <div class="relative">
                                    <input class="w-full pl-10 pr-4 py-3 rounded-lg border border-slate-200 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none bg-surface-bright" id="name" name="name" placeholder="Masukkan nama sesuai KTP" type="text" value="{{ old('name', $user->name) }}"/>
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]" data-icon="person">person</span>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                            <div class="space-y-2">
                                <label class="text-label-md text-on-surface font-semibold" for="nik">NIK (Nomor Induk Kependudukan)</label>
                                <div class="relative">
                                    <input class="w-full pl-10 pr-4 py-3 rounded-lg border border-slate-200 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none bg-surface-bright" id="nik" name="nik" placeholder="16 digit nomor NIK" type="text" value="{{ old('nik', $user->nik) }}"/>
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]" data-icon="id_card">id_card</span>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('nik')" />
                            </div>
                            <div class="space-y-2">
                                <label class="text-label-md text-on-surface font-semibold" for="no_hp">Nomor WhatsApp</label>
                                <div class="relative">
                                    <input class="w-full pl-10 pr-4 py-3 rounded-lg border border-slate-200 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none bg-surface-bright" id="no_hp" name="no_hp" placeholder="08xx..." type="tel" value="{{ old('no_hp', $user->no_hp) }}"/>
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]" data-icon="call">call</span>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('no_hp')" />
                            </div>
                            <div class="space-y-2">
                                <label class="text-label-md text-on-surface font-semibold opacity-60" for="email">Alamat Email (Permanen)</label>
                                <div class="relative">
                                    <input class="w-full pl-10 pr-4 py-3 rounded-lg border border-slate-100 bg-slate-50 text-on-surface-variant cursor-not-allowed outline-none" id="email" name="email" readonly type="email" value="{{ old('email', $user->email) }}"/>
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]" data-icon="mail">mail</span>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="text-label-md text-on-surface font-semibold" for="alamat">Alamat Lengkap Domisili</label>
                            <div class="relative">
                                <textarea class="w-full pl-10 pr-4 py-3 rounded-lg border border-slate-200 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none bg-surface-bright resize-none" id="alamat" name="alamat" placeholder="Masukkan alamat lengkap pengiriman/penjemputan" rows="4">{{ old('alamat', $user->alamat) }}</textarea>
                                <span class="material-symbols-outlined absolute left-3 top-4 text-on-surface-variant text-[20px]" data-icon="location_on">location_on</span>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                        </div>
                        <div class="pt-4 flex flex-col sm:flex-row gap-4">
                            <button class="flex-1 bg-secondary-container text-on-primary py-3 rounded-lg font-label-md hover:translate-y-[-2px] transition-transform flex items-center justify-center gap-2 active:scale-95" type="button">
                                <span class="material-symbols-outlined" data-icon="upload_file">upload_file</span>
                                Upload Verifikasi SIM
                            </button>
                            <button class="px-8 py-3 rounded-lg border border-slate-200 text-on-surface-variant font-label-md hover:bg-surface-container-low transition-colors active:scale-95" type="submit">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Micro-interactions for form focus effects
        document.querySelectorAll('input:not([readonly]), textarea').forEach(element => {
            element.addEventListener('focus', () => {
                element.parentElement.querySelector('.material-symbols-outlined').style.color = '#00236f';
            });
            element.addEventListener('blur', () => {
                element.parentElement.querySelector('.material-symbols-outlined').style.color = '#444651';
            });
        });
    </script>
</x-app-layout>
