<x-app-layout>
    <main class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-stack-lg w-full">
        
        @include('profile.partials.header')

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
            
            @include('profile.partials.sidebar')

            <!-- Main Panel: Ubah Kata Sandi -->
            <div class="lg:col-span-8">
                <div class="bg-surface rounded-2xl p-6 md:p-8 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] hover:shadow-[0px_10px_15px_-3px_rgba(0,0,0,0.1)] transition-all duration-300 border border-slate-200">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h2 class="font-headline-lg text-headline-sm md:text-headline-md text-primary">Ganti Kata Sandi</h2>
                            <p class="text-body-md text-on-surface-variant">Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.</p>
                        </div>
                        <div class="hidden md:block">
                            <span class="material-symbols-outlined text-primary-container text-4xl opacity-20" data-icon="lock">lock</span>
                        </div>
                    </div>
                    
                    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
                        @csrf
                        @method('put')
                        
                        @if (session('status') === 'password-updated')
                            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                                Kata sandi berhasil diperbarui.
                            </div>
                        @endif

                        <div class="grid grid-cols-1 gap-6">
                            <div class="space-y-2">
                                <label class="text-label-md text-on-surface font-semibold" for="current_password">Kata Sandi Saat Ini</label>
                                <div class="relative">
                                    <input class="w-full pl-10 pr-10 py-3 rounded-lg border border-slate-200 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none bg-surface-bright" id="current_password" name="current_password" type="password" autocomplete="current-password" />
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]" data-icon="key">key</span>
                                    <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-outline hover:text-on-surface transition-colors" onclick="const p=document.getElementById('current_password'); const i=this.querySelector('span'); if(p.type==='password'){p.type='text'; i.innerText='visibility'}else{p.type='password'; i.innerText='visibility_off'}">
                                        <span class="material-symbols-outlined text-[20px]">visibility_off</span>
                                    </button>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->updatePassword->get('current_password')" />
                            </div>

                            <div class="space-y-2">
                                <label class="text-label-md text-on-surface font-semibold" for="password">Kata Sandi Baru</label>
                                <div class="relative">
                                    <input class="w-full pl-10 pr-10 py-3 rounded-lg border border-slate-200 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none bg-surface-bright" id="password" name="password" type="password" autocomplete="new-password" />
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]" data-icon="lock_reset">lock_reset</span>
                                    <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-outline hover:text-on-surface transition-colors" onclick="const p=document.getElementById('password'); const i=this.querySelector('span'); if(p.type==='password'){p.type='text'; i.innerText='visibility'}else{p.type='password'; i.innerText='visibility_off'}">
                                        <span class="material-symbols-outlined text-[20px]">visibility_off</span>
                                    </button>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password')" />
                            </div>

                            <div class="space-y-2">
                                <label class="text-label-md text-on-surface font-semibold" for="password_confirmation">Konfirmasi Kata Sandi Baru</label>
                                <div class="relative">
                                    <input class="w-full pl-10 pr-10 py-3 rounded-lg border border-slate-200 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none bg-surface-bright" id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" />
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]" data-icon="lock_clock">lock_clock</span>
                                    <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-outline hover:text-on-surface transition-colors" onclick="const p=document.getElementById('password_confirmation'); const i=this.querySelector('span'); if(p.type==='password'){p.type='text'; i.innerText='visibility'}else{p.type='password'; i.innerText='visibility_off'}">
                                        <span class="material-symbols-outlined text-[20px]">visibility_off</span>
                                    </button>
                                </div>
                                <x-input-error class="mt-2" :messages="$errors->updatePassword->get('password_confirmation')" />
                            </div>
                        </div>

                        <div class="pt-4 flex flex-col sm:flex-row gap-4">
                            <button class="px-8 py-3 w-full sm:w-auto bg-primary text-white rounded-lg font-label-md hover:bg-primary-container transition-colors active:scale-95 ml-auto" type="submit">
                                Perbarui Kata Sandi
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Delete Account Section -->
                <div class="bg-surface rounded-2xl p-6 md:p-8 shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.05)] hover:shadow-[0px_10px_15px_-3px_rgba(0,0,0,0.1)] transition-all duration-300 border border-error/20 mt-6 relative overflow-hidden">
                    <div class="absolute inset-0 bg-error/5"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h2 class="font-headline-lg text-headline-sm md:text-headline-md text-error">Hapus Akun</h2>
                                <p class="text-body-md text-on-surface-variant">Sekali akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen dan tidak dapat dipulihkan.</p>
                            </div>
                            <div class="hidden md:block">
                                <span class="material-symbols-outlined text-error text-4xl opacity-20" data-icon="person_remove">person_remove</span>
                            </div>
                        </div>
                        
                        <div x-data="{ showDeleteModal: {{ $errors->userDeletion->isNotEmpty() ? 'true' : 'false' }} }">
                            <button @click="showDeleteModal = true" class="px-8 py-3 bg-error text-white rounded-lg font-label-md hover:bg-red-600 transition-colors active:scale-95 flex items-center gap-2" type="button">
                                <span class="material-symbols-outlined text-[20px]">warning</span>
                                Hapus Akun Saya
                            </button>

                            <!-- Delete Modal -->
                            <div x-show="showDeleteModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">
                                <div @click.away="showDeleteModal = false" class="bg-surface p-6 rounded-2xl w-full max-w-md shadow-xl">
                                    <div class="flex items-center gap-3 text-error mb-4">
                                        <span class="material-symbols-outlined text-[28px]">warning</span>
                                        <h3 class="font-headline-sm text-headline-sm">Peringatan!</h3>
                                    </div>
                                    <p class="font-body-sm text-on-surface-variant mb-6">Apakah Anda yakin ingin menghapus akun? Sekali akun Anda dihapus, semua data profil dan riwayat pemesanan Anda akan dihapus secara permanen. Masukkan kata sandi Anda untuk mengonfirmasi.</p>
                                    
                                    <form method="post" action="{{ route('profile.destroy') }}">
                                        @csrf
                                        @method('delete')
                                        
                                        <div class="mb-6 relative">
                                            <input class="w-full pl-10 pr-4 py-3 rounded-lg border border-slate-200 focus:border-error focus:ring-2 focus:ring-error/20 transition-all outline-none bg-surface-bright" id="delete_password" name="password" type="password" placeholder="Kata Sandi Saat Ini" required />
                                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]" data-icon="key">key</span>
                                            <x-input-error class="mt-2 text-error font-body-sm" :messages="$errors->userDeletion->get('password')" />
                                        </div>

                                        <div class="flex justify-end gap-3">
                                            <button type="button" @click="showDeleteModal = false" class="px-4 py-2 text-on-surface-variant font-label-md hover:bg-slate-50 rounded-lg">Batal</button>
                                            <button type="submit" class="px-4 py-2 bg-error text-white font-label-md rounded-lg hover:bg-red-600 transition-colors flex items-center gap-2">
                                                Hapus Permanen
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Micro-interactions for form focus effects
        document.querySelectorAll('input:not([readonly]), textarea').forEach(element => {
            element.addEventListener('focus', () => {
                const icon = element.parentElement.querySelector('.material-symbols-outlined:first-child');
                if(icon) icon.style.color = '#00236f';
            });
            element.addEventListener('blur', () => {
                const icon = element.parentElement.querySelector('.material-symbols-outlined:first-child');
                if(icon) icon.style.color = '#444651';
            });
        });
    </script>
</x-app-layout>
