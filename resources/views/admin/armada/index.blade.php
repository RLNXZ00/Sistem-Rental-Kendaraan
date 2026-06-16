@extends('layouts.admin')

@section('content')
    <div class="p-margin-desktop max-w-[1280px] mx-auto">
        <!-- Page Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-stack-lg gap-4">
            <div>
                <h2 class="font-headline-lg text-headline-lg font-bold text-on-background">Armada Management</h2>
                <p class="font-body-md text-body-md text-on-surface-variant mt-1">Manage your vehicle fleet, track status, and update details.</p>
            </div>
            <button class="border border-secondary-container text-secondary-container px-6 py-3 rounded-lg font-label-md text-label-md flex items-center gap-2 hover:bg-secondary-container/10 transition-all hover:-translate-y-1">
                <span class="material-symbols-outlined">visibility</span>
                Lihat Semua
            </button>
            <button class="bg-secondary-container text-white px-6 py-3 rounded-lg font-label-md text-label-md flex items-center gap-2 hover:bg-[#E66A17] transition-all hover:-translate-y-1 shadow-md hover:shadow-lg" onclick="document.getElementById('add-vehicle-slideover').classList.remove('hidden')">
                <span class="material-symbols-outlined">add</span>
                Tambah Kendaraan Baru
            </button>
        </div>
        
        <!-- Filters & Tabs -->
        <div class="bg-surface rounded-xl border border-slate-200 p-4 mb-stack-lg flex flex-wrap gap-4 items-center justify-between shadow-sm">
            <div class="flex gap-2">
                <button class="px-4 py-2 rounded-lg bg-primary-container text-white font-label-md text-label-md">Semua</button>
                <button class="px-4 py-2 rounded-lg bg-slate-100 text-on-surface-variant hover:bg-slate-200 font-label-md text-label-md transition-colors">Mobil</button>
                <button class="px-4 py-2 rounded-lg bg-slate-100 text-on-surface-variant hover:bg-slate-200 font-label-md text-label-md transition-colors">Motor</button>
            </div>
            <div class="flex gap-4">
                <select class="border border-slate-200 rounded-lg px-4 py-2 text-body-sm font-body-sm bg-slate-50 outline-none focus:border-primary-container">
                    <option>Status: Semua</option>
                    <option>Tersedia</option>
                    <option>Disewa</option>
                    <option>Maintenance</option>
                </select>
            </div>
        </div>
        
        <!-- Vehicle Grid (Bento/Card Style) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-gutter">
            <!-- Card 1: Mobil -->
            <div class="vehicle-card bg-surface rounded-[20px] border border-slate-200 overflow-hidden flex flex-col h-full bg-white relative">
                <div class="absolute top-4 right-4 z-10 flex gap-2">
                    <span class="bg-success/10 text-success px-3 py-1 rounded-full font-label-sm text-label-sm border border-success/20">Tersedia</span>
                </div>
                <div class="aspect-video w-full bg-slate-100 relative">
                    <img alt="A modern white sedan" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBvLcijVXvIAaUPzWOArb52s4HBuP9nkQRygfzMq7jOx77rBF6hSAKPWSFoXq6kl1aOYAE8M3CQMcjaEEvZRh3GtoEfyOVUaakh50yg-2wx27B--ReVQf3C7ywrRKqdsWY2D-zd0tFHVbh85DocZBUw3BVG4ILmbNgPduAIsYny9nr223KO5Q7nLzenPzMMB4DwvTQUSx8J0T1WZbQFD77Jm_p_KBNixfxYLVgqDAQynh-ROsm7ZiAsMNSltQQBGt0PdXvgtUJWznA"/>
                </div>
                <div class="p-4 flex-1 flex flex-col">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-headline-sm text-headline-sm font-bold text-on-background">Toyota Camry</h3>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">Mobil • Sedan</p>
                        </div>
                        <div class="flex items-center gap-1 bg-slate-50 px-2 py-1 rounded text-secondary-container">
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="font-label-sm text-label-sm font-bold">4.8</span>
                        </div>
                    </div>
                    <div class="flex gap-3 mb-4 mt-2">
                        <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant bg-slate-50 px-2 py-1 rounded">
                            <span class="material-symbols-outlined text-[16px]">airline_seat_recline_normal</span>
                            4 Seats
                        </span>
                        <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant bg-slate-50 px-2 py-1 rounded">
                            <span class="material-symbols-outlined text-[16px]">settings</span>
                            Auto
                        </span>
                    </div>
                    <div class="mt-auto pt-4 border-t border-slate-100 flex gap-2">
                        <button class="flex-1 bg-slate-100 text-primary-container px-4 py-2 rounded-lg font-label-md text-label-md hover:bg-slate-200 transition-colors flex justify-center items-center gap-2" onclick="document.getElementById('edit-vehicle-modal').classList.remove('hidden')">
                            <span class="material-symbols-outlined text-[18px]">edit</span> Edit
                        </button>
                        <button class="px-4 py-2 rounded-lg border border-error text-error hover:bg-error-container transition-colors flex justify-center items-center">
                            <span class="material-symbols-outlined text-[18px]">delete</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Card 2: Motor -->
            <div class="vehicle-card bg-surface rounded-[20px] border border-slate-200 overflow-hidden flex flex-col h-full bg-white relative">
                <div class="absolute top-4 right-4 z-10 flex gap-2">
                    <span class="bg-secondary-container/10 text-secondary-container px-3 py-1 rounded-full font-label-sm text-label-sm border border-secondary-container/20">Disewa</span>
                </div>
                <div class="aspect-video w-full bg-slate-100 relative">
                    <img alt="Honda CBR150R" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCU6qtAOwo-dWxUPaPFeoTqKdJVXtDMtJGyXi5GJG8YL6OnmwWUSBrjxYkhNVkIgTmALmUHZT8eqlO44yWZ2tZoBzTZpOw0VjXEe8m3xInYAOkn8OhV3ZnpAxDEDpOSrptgU6ITVAMIzZtq7wIVkh8W2SCpQX8Z_cAEkd4oR3bG-s2Go3YKcbXjW-hioRe7v5SlSAhAekladUAb_CMMqNZPoiurl8ZHMoPpARd8KhVe0tOBTXVOPZZDvOhT45DucNDUpyKIGN-IDMM"/>
                </div>
                <div class="p-4 flex-1 flex flex-col">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-headline-sm text-headline-sm font-bold text-on-background">Honda CBR150R</h3>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">Motor • Sport</p>
                        </div>
                        <div class="flex items-center gap-1 bg-slate-50 px-2 py-1 rounded text-secondary-container">
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="font-label-sm text-label-sm font-bold">4.9</span>
                        </div>
                    </div>
                    <div class="flex gap-3 mb-4 mt-2">
                        <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant bg-slate-50 px-2 py-1 rounded">
                            <span class="material-symbols-outlined text-[16px]">speed</span>
                            150 CC
                        </span>
                        <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant bg-slate-50 px-2 py-1 rounded">
                            <span class="material-symbols-outlined text-[16px]">settings</span>
                            Manual
                        </span>
                    </div>
                    <div class="mt-auto pt-4 border-t border-slate-100 flex gap-2">
                        <button class="flex-1 bg-slate-100 text-primary-container px-4 py-2 rounded-lg font-label-md text-label-md hover:bg-slate-200 transition-colors flex justify-center items-center gap-2" onclick="document.getElementById('edit-vehicle-modal').classList.remove('hidden')">
                            <span class="material-symbols-outlined text-[18px]">edit</span> Edit
                        </button>
                        <button class="px-4 py-2 rounded-lg border border-error text-error hover:bg-error-container transition-colors flex justify-center items-center">
                            <span class="material-symbols-outlined text-[18px]">delete</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 3: Mobil (7 Seater) -->
            <div class="vehicle-card bg-surface rounded-[20px] border border-slate-200 overflow-hidden flex flex-col h-full bg-white relative">
                <div class="absolute top-4 right-4 z-10 flex gap-2">
                    <span class="bg-success/10 text-success px-3 py-1 rounded-full font-label-sm text-label-sm border border-success/20">Tersedia</span>
                </div>
                <div class="aspect-video w-full bg-slate-100 relative">
                    <img alt="Mitsubishi Pajero" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAx-kahO7mPqIUXPYy2t5sgdwmXdx2w_MzmIdmeTf-v-w3BKkTXAMc0jQDppRtkufihhOyD0NqKD3QYYz23Z929SCU32e1DwHo_BI_VWA1RdQzbE-JR9M48ZT-zd7gSR0YLgtgp7jw6B5WD22wmyR8KSYW_xMPyq3LPQaSo4hgsNdw31t9qHattssef3mLczFHyD1KZtEUhJM2lxuqVJl1KNTamYGQPsmTTeVvVm8UNoSJvcrKm-K8u2ZULw87fYH6_N4QcmzRJ_Mw"/>
                </div>
                <div class="p-4 flex-1 flex flex-col">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-headline-sm text-headline-sm font-bold text-on-background">Mitsubishi Pajero</h3>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">Mobil • SUV</p>
                        </div>
                        <div class="flex items-center gap-1 bg-slate-50 px-2 py-1 rounded text-secondary-container">
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="font-label-sm text-label-sm font-bold">4.7</span>
                        </div>
                    </div>
                    <div class="flex gap-3 mb-4 mt-2">
                        <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant bg-slate-50 px-2 py-1 rounded">
                            <span class="material-symbols-outlined text-[16px]">airline_seat_recline_normal</span>
                            7 Seats
                        </span>
                        <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant bg-slate-50 px-2 py-1 rounded">
                            <span class="material-symbols-outlined text-[16px]">settings</span>
                            Auto
                        </span>
                    </div>
                    <div class="mt-auto pt-4 border-t border-slate-100 flex gap-2">
                        <button class="flex-1 bg-slate-100 text-primary-container px-4 py-2 rounded-lg font-label-md text-label-md hover:bg-slate-200 transition-colors flex justify-center items-center gap-2" onclick="document.getElementById('edit-vehicle-modal').classList.remove('hidden')">
                            <span class="material-symbols-outlined text-[18px]">edit</span> Edit
                        </button>
                        <button class="px-4 py-2 rounded-lg border border-error text-error hover:bg-error-container transition-colors flex justify-center items-center">
                            <span class="material-symbols-outlined text-[18px]">delete</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 4: Motor Maintenance -->
            <div class="vehicle-card bg-surface rounded-[20px] border border-slate-200 overflow-hidden flex flex-col h-full bg-white relative opacity-75">
                <div class="absolute top-4 right-4 z-10 flex gap-2">
                    <span class="bg-slate-200 text-on-surface-variant px-3 py-1 rounded-full font-label-sm text-label-sm border border-slate-300">Maintenance</span>
                </div>
                <div class="aspect-video w-full bg-slate-100 relative">
                    <img alt="Yamaha NMAX" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAyXgdDJj-3XKxko-SGs0-v8a7a89hzEAo8LAqeJpH06aXca3zC7qyQ_kQxFRqp2vznTpsn0KzR8fiSseaMAGAe3rHi6chg-Q6PU1i5F67Z8ILE1AgT0Gtze_uCRNmtevopzmy-FdN84beLnq-zaI5x5BHwsnWivyctqmbbZffn1wIbxQu1hS1oblchJNPYiAIMzSQPmYjOpIvZZjvYEN5mM9rAtEZASdYbu5sHeqTZKDWZ3oIUZhk1wz_W7bvoXSxzPH5xFeYWTTk"/>
                </div>
                <div class="p-4 flex-1 flex flex-col">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-headline-sm text-headline-sm font-bold text-on-background">Yamaha NMAX</h3>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">Motor • Matic</p>
                        </div>
                        <div class="flex items-center gap-1 bg-slate-50 px-2 py-1 rounded text-secondary-container">
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="font-label-sm text-label-sm font-bold">4.6</span>
                        </div>
                    </div>
                    <div class="flex gap-3 mb-4 mt-2">
                        <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant bg-slate-50 px-2 py-1 rounded">
                            <span class="material-symbols-outlined text-[16px]">speed</span>
                            155 CC
                        </span>
                        <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant bg-slate-50 px-2 py-1 rounded">
                            <span class="material-symbols-outlined text-[16px]">settings</span>
                            Auto
                        </span>
                    </div>
                    <div class="mt-auto pt-4 border-t border-slate-100 flex gap-2">
                        <button class="flex-1 bg-slate-100 text-primary-container px-4 py-2 rounded-lg font-label-md text-label-md hover:bg-slate-200 transition-colors flex justify-center items-center gap-2" onclick="document.getElementById('edit-vehicle-modal').classList.remove('hidden')">
                            <span class="material-symbols-outlined text-[18px]">edit</span> Edit
                        </button>
                        <button class="px-4 py-2 rounded-lg border border-error text-error hover:bg-error-container transition-colors flex justify-center items-center">
                            <span class="material-symbols-outlined text-[18px]">delete</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Card 5: Suzuki Ertiga -->
            <div class="vehicle-card bg-surface rounded-[20px] border border-slate-200 overflow-hidden flex flex-col h-full bg-white relative">
                <div class="absolute top-4 right-4 z-10 flex gap-2">
                    <span class="bg-success/10 text-success px-3 py-1 rounded-full font-label-sm text-label-sm border border-success/20">Tersedia</span>
                </div>
                <div class="aspect-video w-full bg-slate-100 relative">
                    <img alt="Suzuki Ertiga" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB8xPzFD6YiA7IoqsQpH3BJ8J40Dnwxj_-PqFWxBZvX1piEA-Rm4zNEh1ROaKb5WPvDXbPDjt96iFT7qrRMPWHT7zPwVFhfgX1k-8Sd-ISLzfg1ixoCNaF_nVU0AqRXSFqZ9zZlkdRFDPNU_-BdmnzXnd5t7F48kRSW4ZkGYzi8CIb8iN_E3UWhWtOmVidrSi9tYYJkYMdSRNHS4EuAugLfhihMWahkj_-GifaWhS1iYqacpaseOeIfL2oE1LYYpQ5FvA2iOnReROE"/>
                </div>
                <div class="p-4 flex-1 flex flex-col">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-headline-sm text-headline-sm font-bold text-on-background">Suzuki Ertiga</h3>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">Mobil • MPV</p>
                        </div>
                        <div class="flex items-center gap-1 bg-slate-50 px-2 py-1 rounded text-secondary-container">
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="font-label-sm text-label-sm font-bold">4.7</span>
                        </div>
                    </div>
                    <div class="flex gap-3 mb-4 mt-2">
                        <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant bg-slate-50 px-2 py-1 rounded">
                            <span class="material-symbols-outlined text-[16px]">airline_seat_recline_normal</span>
                            7 Seats
                        </span>
                        <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant bg-slate-50 px-2 py-1 rounded">
                            <span class="material-symbols-outlined text-[16px]">settings</span>
                            Manual
                        </span>
                    </div>
                    <div class="mt-auto pt-4 border-t border-slate-100 flex gap-2">
                        <button class="flex-1 bg-slate-100 text-primary-container px-4 py-2 rounded-lg font-label-md text-label-md hover:bg-slate-200 transition-colors flex justify-center items-center gap-2" onclick="document.getElementById('edit-vehicle-modal').classList.remove('hidden')">
                            <span class="material-symbols-outlined text-[18px]">edit</span> Edit
                        </button>
                        <button class="px-4 py-2 rounded-lg border border-error text-error hover:bg-error-container transition-colors flex justify-center items-center">
                            <span class="material-symbols-outlined text-[18px]">delete</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Card 6: Kawasaki Ninja 250 -->
            <div class="vehicle-card bg-surface rounded-[20px] border border-slate-200 overflow-hidden flex flex-col h-full bg-white relative">
                <div class="absolute top-4 right-4 z-10 flex gap-2">
                    <span class="bg-secondary-container/10 text-secondary-container px-3 py-1 rounded-full font-label-sm text-label-sm border border-secondary-container/20">Disewa</span>
                </div>
                <div class="aspect-video w-full bg-slate-100 relative">
                    <img alt="Kawasaki Ninja 250" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCamlkSWIslzEkeeWJeH-f6AmoA59TV6m-rOvGxypzDFx4x9rcdw8dKyyppCRanTtieUWIskH-jhofhHYmZ841OgvHDpivGissvZrZIxGVw91rQgWRMlPVmOSaUaZeCNrdN3E3wdVxx5qRN3S4L0zbM77sidwDWv3uMwa-BAx0C1YfJUACDub08K5qCcy9KUHuQSaaA5k83w7aDbM4jun_T_OawidzqLbmlpIh4vJ0Nwf9WXfdNl0fnOHVGUaZ-X2oDY_KiaV4cpm0"/>
                </div>
                <div class="p-4 flex-1 flex flex-col">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-headline-sm text-headline-sm font-bold text-on-background">Kawasaki Ninja 250</h3>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">Motor • Sport</p>
                        </div>
                        <div class="flex items-center gap-1 bg-slate-50 px-2 py-1 rounded text-secondary-container">
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="font-label-sm text-label-sm font-bold">4.9</span>
                        </div>
                    </div>
                    <div class="flex gap-3 mb-4 mt-2">
                        <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant bg-slate-50 px-2 py-1 rounded">
                            <span class="material-symbols-outlined text-[16px]">speed</span>
                            250 CC
                        </span>
                        <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant bg-slate-50 px-2 py-1 rounded">
                            <span class="material-symbols-outlined text-[16px]">settings</span>
                            Manual
                        </span>
                    </div>
                    <div class="mt-auto pt-4 border-t border-slate-100 flex gap-2">
                        <button class="flex-1 bg-slate-100 text-primary-container px-4 py-2 rounded-lg font-label-md text-label-md hover:bg-slate-200 transition-colors flex justify-center items-center gap-2" onclick="document.getElementById('edit-vehicle-modal').classList.remove('hidden')">
                            <span class="material-symbols-outlined text-[18px]">edit</span> Edit
                        </button>
                        <button class="px-4 py-2 rounded-lg border border-error text-error hover:bg-error-container transition-colors flex justify-center items-center">
                            <span class="material-symbols-outlined text-[18px]">delete</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Card 7: Honda Brio -->
            <div class="vehicle-card bg-surface rounded-[20px] border border-slate-200 overflow-hidden flex flex-col h-full bg-white relative">
                <div class="absolute top-4 right-4 z-10 flex gap-2">
                    <span class="bg-success/10 text-success px-3 py-1 rounded-full font-label-sm text-label-sm border border-success/20">Tersedia</span>
                </div>
                <div class="aspect-video w-full bg-slate-100 relative">
                    <img alt="Honda Brio" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDGRWuYe_Iet_TnqQARty6hOwt2IyscB7Hm8t4oez26TgjeM54jALIW-Qn34DQz_LHlgDsEkIydXnZM_nPZjMFttBDfW2pIA2Rf8zYaw3pOnoSVygIZ4HBH4GKIUqS39eHaqiKcCLJSpFIuujpwJh7s_HcF3UB6O9uwwTOiEHy-CTIojYKrBdHcmQGYC2_kdyzaObpJqW7AYGPdLzHF5MUVMwfqD8HAXph9Za7_wjSYFmavNtQaQz73pqA7cSWOJcsJaSGGbjjwJaw"/>
                </div>
                <div class="p-4 flex-1 flex flex-col">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-headline-sm text-headline-sm font-bold text-on-background">Honda Brio</h3>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">Mobil • Hatchback</p>
                        </div>
                        <div class="flex items-center gap-1 bg-slate-50 px-2 py-1 rounded text-secondary-container">
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="font-label-sm text-label-sm font-bold">4.6</span>
                        </div>
                    </div>
                    <div class="flex gap-3 mb-4 mt-2">
                        <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant bg-slate-50 px-2 py-1 rounded">
                            <span class="material-symbols-outlined text-[16px]">airline_seat_recline_normal</span>
                            5 Seats
                        </span>
                        <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant bg-slate-50 px-2 py-1 rounded">
                            <span class="material-symbols-outlined text-[16px]">settings</span>
                            Auto
                        </span>
                    </div>
                    <div class="mt-auto pt-4 border-t border-slate-100 flex gap-2">
                        <button class="flex-1 bg-slate-100 text-primary-container px-4 py-2 rounded-lg font-label-md text-label-md hover:bg-slate-200 transition-colors flex justify-center items-center gap-2" onclick="document.getElementById('edit-vehicle-modal').classList.remove('hidden')">
                            <span class="material-symbols-outlined text-[18px]">edit</span> Edit
                        </button>
                        <button class="px-4 py-2 rounded-lg border border-error text-error hover:bg-error-container transition-colors flex justify-center items-center">
                            <span class="material-symbols-outlined text-[18px]">delete</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Card 8: Yamaha Lexi -->
            <div class="vehicle-card bg-surface rounded-[20px] border border-slate-200 overflow-hidden flex flex-col h-full bg-white relative">
                <div class="absolute top-4 right-4 z-10 flex gap-2">
                    <span class="bg-success/10 text-success px-3 py-1 rounded-full font-label-sm text-label-sm border border-success/20">Tersedia</span>
                </div>
                <div class="aspect-video w-full bg-slate-100 relative">
                    <img alt="Yamaha Lexi" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCWopKax7FQt4zpD8shnUG-71hlZkK6RZtrUjkl5PpbEbIsYafmSNMfA7z8p0QFzOhuRoNDH8ZyVQSveZipgaLMbu9nliBN_Hq8R1JviB0WZo6F8_DixKcDPLqfknfBLJDiADhEHehwbFY5IlQG3lGzt2u4nZ_I93X3gjtB4XQIiwp4WBCEAspDilG7QqpuSjViRarI4-0qgvLigrgN8WkgduJi6CpZtAESxmXfMpok-r-jMqG4TmN2UgpbkAKaXzrh8ELcR8yrcZU"/>
                </div>
                <div class="p-4 flex-1 flex flex-col">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-headline-sm text-headline-sm font-bold text-on-background">Yamaha Lexi</h3>
                            <p class="font-body-sm text-body-sm text-on-surface-variant">Motor • Matic</p>
                        </div>
                        <div class="flex items-center gap-1 bg-slate-50 px-2 py-1 rounded text-secondary-container">
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="font-label-sm text-label-sm font-bold">4.5</span>
                        </div>
                    </div>
                    <div class="flex gap-3 mb-4 mt-2">
                        <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant bg-slate-50 px-2 py-1 rounded">
                            <span class="material-symbols-outlined text-[16px]">speed</span>
                            125 CC
                        </span>
                        <span class="flex items-center gap-1 font-body-sm text-body-sm text-on-surface-variant bg-slate-50 px-2 py-1 rounded">
                            <span class="material-symbols-outlined text-[16px]">settings</span>
                            Auto
                        </span>
                    </div>
                    <div class="mt-auto pt-4 border-t border-slate-100 flex gap-2">
                        <button class="flex-1 bg-slate-100 text-primary-container px-4 py-2 rounded-lg font-label-md text-label-md hover:bg-slate-200 transition-colors flex justify-center items-center gap-2" onclick="document.getElementById('edit-vehicle-modal').classList.remove('hidden')">
                            <span class="material-symbols-outlined text-[18px]">edit</span> Edit
                        </button>
                        <button class="px-4 py-2 rounded-lg border border-error text-error hover:bg-error-container transition-colors flex justify-center items-center">
                            <span class="material-symbols-outlined text-[18px]">delete</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals & Sideovers -->
    <!-- Slideover Tambah Kendaraan -->
    <div class="fixed inset-0 z-[100] hidden" id="add-vehicle-slideover">
        <div class="absolute inset-0 bg-on-background/40 backdrop-blur-sm" onclick="document.getElementById('add-vehicle-slideover').classList.add('hidden')"></div>
        <div class="absolute right-0 top-0 h-full w-full max-w-2xl bg-surface shadow-2xl flex flex-col">
            <!-- Header -->
            <div class="px-6 py-4 border-b border-slate-200 flex justify-between items-center bg-white">
                <h2 class="font-headline-md text-headline-md font-bold text-on-background">Tambah Kendaraan Baru</h2>
                <button class="p-2 hover:bg-slate-100 rounded-full transition-colors" onclick="document.getElementById('add-vehicle-slideover').classList.add('hidden')">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <!-- Content -->
            <div class="flex-1 overflow-y-auto p-6 space-y-8">
                <!-- Section 1: Informasi Dasar -->
                <section>
                    <h3 class="font-label-md text-label-md text-primary mb-4 uppercase tracking-wider">Informasi Dasar</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Nama Kendaraan</label>
                            <input class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none" placeholder="e.g., Toyota Avanza" type="text"/>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Tipe Kendaraan</label>
                            <select class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none bg-slate-50">
                                <option>Mobil</option>
                                <option>Motor</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Kategori</label>
                            <input class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none" placeholder="e.g., SUV, MPV, Matic" type="text"/>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Harga Sewa per Hari</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant font-body-sm">Rp</span>
                                <input class="w-full border border-slate-200 rounded-lg pl-12 pr-4 py-2 focus:border-primary-container outline-none" type="number"/>
                            </div>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Stok Unit</label>
                            <input class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none" type="number"/>
                        </div>
                    </div>
                </section>
                <!-- Section 2: Spesifikasi Utama -->
                <section>
                    <h3 class="font-label-md text-label-md text-primary mb-4 uppercase tracking-wider">Spesifikasi Utama</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Kapasitas Penumpang</label>
                            <input class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none" placeholder="e.g., 7 Penumpang" type="text"/>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Transmisi</label>
                            <select class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none bg-slate-50">
                                <option>Manual</option>
                                <option>Otomatis</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Bahan Bakar</label>
                            <select class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none bg-slate-50">
                                <option>Bensin</option>
                                <option>Diesel</option>
                                <option>Listrik</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Kapasitas Bagasi</label>
                            <input class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none" placeholder="e.g., 4 Koper" type="text"/>
                        </div>
                    </div>
                </section>
                <!-- Section 3: Detail Spesifikasi (Dynamic) -->
                <section>
                    <h3 class="font-label-md text-label-md text-primary mb-4 uppercase tracking-wider">Detail Spesifikasi (Opsional)</h3>
                    <div class="space-y-3">
                        <div class="flex gap-2 items-center">
                            <input class="flex-1 border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none" placeholder="Nama Spesifikasi" type="text"/>
                            <input class="flex-1 border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none" placeholder="Nilai" type="text"/>
                            <button class="p-2 text-error hover:bg-error-container rounded-lg transition-colors">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </div>
                        <button class="text-primary font-label-md text-label-md flex items-center gap-1 hover:underline">
                            <span class="material-symbols-outlined text-[18px]">add_circle</span>
                            Tambah Detail Spesifikasi
                        </button>
                    </div>
                </section>
                <!-- Section 4: Deskripsi & Media -->
                <section class="space-y-6">
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Deskripsi Lengkap</label>
                        <textarea class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none resize-none" rows="4"></textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Foto Utama</label>
                            <div class="border-2 border-dashed border-slate-200 rounded-xl p-6 flex flex-col items-center justify-center gap-2 hover:border-primary transition-colors cursor-pointer bg-slate-50">
                                <span class="material-symbols-outlined text-on-surface-variant text-3xl">photo_camera</span>
                                <span class="text-label-sm text-on-surface-variant">Upload Foto</span>
                            </div>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Galeri Foto Tambahan</label>
                            <div class="border-2 border-dashed border-slate-200 rounded-xl p-6 flex flex-col items-center justify-center gap-2 hover:border-primary transition-colors cursor-pointer bg-slate-50">
                                <span class="material-symbols-outlined text-on-surface-variant text-3xl">add_photo_alternate</span>
                                <span class="text-label-sm text-on-surface-variant">Upload Galeri</span>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Footer -->
            <div class="p-6 border-t border-slate-200 bg-white flex gap-3">
                <button class="flex-1 px-6 py-3 border border-slate-200 rounded-lg font-label-md text-label-md text-on-surface-variant hover:bg-slate-50 transition-colors" onclick="document.getElementById('add-vehicle-slideover').classList.add('hidden')">
                    Batal
                </button>
                <button class="flex-1 px-6 py-3 bg-secondary-container text-white rounded-lg font-label-md text-label-md hover:bg-[#E66A17] transition-all shadow-md">
                    Simpan Kendaraan
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Edit Kendaraan -->
    <div class="fixed inset-0 z-[100] hidden" id="edit-vehicle-modal">
        <div class="absolute inset-0 bg-on-background/40 backdrop-blur-sm" onclick="document.getElementById('edit-vehicle-modal').classList.add('hidden')"></div>
        <div class="absolute right-0 top-0 h-full w-full max-w-2xl bg-surface shadow-2xl flex flex-col">
            <!-- Header -->
            <div class="px-6 py-4 border-b border-slate-200 flex justify-between items-center bg-white">
                <h2 class="font-headline-md text-headline-md font-bold text-on-background">Edit Detail Kendaraan</h2>
                <button class="p-2 hover:bg-slate-100 rounded-full transition-colors" onclick="document.getElementById('edit-vehicle-modal').classList.add('hidden')">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <!-- Content -->
            <div class="flex-1 overflow-y-auto p-6 space-y-8">
                <!-- Section 1: Informasi Dasar -->
                <section>
                    <h3 class="font-label-md text-label-md text-primary mb-4 uppercase tracking-wider">Informasi Dasar</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Nama Kendaraan</label>
                            <input class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none" type="text" value="Toyota Camry"/>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Tipe Kendaraan</label>
                            <select class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none bg-slate-50">
                                <option selected="">Mobil</option>
                                <option>Motor</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Kategori</label>
                            <input class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none" placeholder="e.g., SUV, MPV, Matic" type="text" value="Sedan"/>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Harga Sewa per Hari</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-on-surface-variant font-body-sm">Rp</span>
                                <input class="w-full border border-slate-200 rounded-lg pl-12 pr-4 py-2 focus:border-primary-container outline-none" type="number" value="850000"/>
                            </div>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Status</label>
                            <select class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none bg-slate-50">
                                <option selected="">Tersedia</option>
                                <option>Disewa</option>
                                <option>Maintenance</option>
                            </select>
                        </div>
                    </div>
                </section>
                <!-- Section 2: Spesifikasi Utama -->
                <section>
                    <h3 class="font-label-md text-label-md text-primary mb-4 uppercase tracking-wider">Spesifikasi Utama</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Transmisi</label>
                            <select class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none bg-slate-50">
                                <option>Manual</option>
                                <option selected="">Otomatis</option>
                            </select>
                        </div>
                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Bahan Bakar</label>
                            <select class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none bg-slate-50">
                                <option selected="">Bensin</option>
                                <option>Diesel</option>
                                <option>Listrik</option>
                            </select>
                        </div>
                    </div>
                </section>
                <!-- Section 3: Deskripsi & Media -->
                <section class="space-y-6">
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Deskripsi Kendaraan</label>
                        <textarea class="w-full border border-slate-200 rounded-lg px-4 py-2 focus:border-primary-container outline-none resize-none" rows="4">Kendaraan premium dengan kenyamanan maksimal untuk perjalanan bisnis atau keluarga.</textarea>
                    </div>
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface-variant mb-1">Ganti Gambar Kendaraan</label>
                        <div class="border-2 border-dashed border-slate-200 rounded-xl p-6 flex flex-col items-center justify-center gap-2 hover:border-primary transition-colors cursor-pointer bg-slate-50">
                            <span class="material-symbols-outlined text-on-surface-variant text-3xl">photo_camera</span>
                            <span class="text-label-sm text-on-surface-variant">Upload Foto Baru</span>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Footer -->
            <div class="p-6 border-t border-slate-200 bg-white flex gap-3">
                <button class="flex-1 px-6 py-3 border border-slate-200 rounded-lg font-label-md text-label-md text-on-surface-variant hover:bg-slate-50 transition-colors" onclick="document.getElementById('edit-vehicle-modal').classList.add('hidden')">
                    Batal
                </button>
                <button class="flex-1 px-6 py-3 bg-secondary-container text-white rounded-lg font-label-md text-label-md hover:bg-[#E66A17] transition-all shadow-md">
                    Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
@endsection
