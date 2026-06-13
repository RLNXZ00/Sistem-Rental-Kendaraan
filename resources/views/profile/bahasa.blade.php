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
                            <h2 class="font-headline-lg text-headline-sm md:text-headline-md text-primary">Bahasa & Wilayah</h2>
                            <p class="text-body-md text-on-surface-variant">Sesuaikan preferensi bahasa dan wilayah untuk pengalaman yang lebih personal.</p>
                        </div>
                        <div class="hidden md:block">
                            <span class="material-symbols-outlined text-primary-container text-4xl opacity-20">language</span>
                        </div>
                    </div>
                    
                    <form class="space-y-8">
                        <div class="space-y-6">
                            <div class="space-y-2">
                                <label class="text-label-md text-on-surface font-semibold">Bahasa Tampilan</label>
                                <p class="text-body-sm text-on-surface-variant mb-2">Pilih bahasa yang akan digunakan di seluruh aplikasi.</p>
                                <div class="relative">
                                    <select class="w-full pl-10 pr-4 py-3 rounded-lg border border-slate-200 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none bg-surface-bright appearance-none">
                                        <option selected>Bahasa Indonesia</option>
                                        <option>English (US)</option>
                                    </select>
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]">translate</span>
                                    <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none">expand_more</span>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label class="text-label-md text-on-surface font-semibold">Wilayah Rental</label>
                                <p class="text-body-sm text-on-surface-variant mb-2">Ini akan memengaruhi mata uang default dan format tanggal yang ditampilkan.</p>
                                <div class="relative">
                                    <select class="w-full pl-10 pr-4 py-3 rounded-lg border border-slate-200 focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all outline-none bg-surface-bright appearance-none">
                                        <option selected>Indonesia (IDR)</option>
                                        <option>United States (USD)</option>
                                    </select>
                                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]">public</span>
                                    <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none">expand_more</span>
                                </div>
                            </div>
                        </div>
                        <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row justify-end gap-4">
                            <button class="px-8 py-3 rounded-lg border border-slate-200 text-on-surface-variant font-label-md hover:bg-surface-container-low transition-colors active:scale-95" type="button">Batal</button>
                            <button class="px-8 py-3 rounded-lg bg-secondary-container text-on-primary font-label-md hover:translate-y-[-2px] transition-transform shadow-sm active:scale-95" type="submit">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
