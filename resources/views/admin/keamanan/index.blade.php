<x-admin-layout>
    <div x-data="{ reviewModal: false, selectedUser: {} }">
        <div class="mb-8">
            <h2 class="font-headline-lg text-headline-lg text-on-background mb-2">Keamanan & Kontrol Akses</h2>
            <p class="font-body-md text-body-md text-on-surface-variant">Kelola permintaan reset sandi dan penghapusan akun pengguna.</p>
        </div>
        
        <!-- Flash Messages -->
        @if(session('success'))
            <div class="mb-6 bg-success/10 border border-success text-success px-4 py-3 rounded-lg relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('success_reset_link'))
            <div class="mb-6 bg-surface-container-high border-2 border-primary text-on-background px-6 py-4 rounded-xl shadow-md" role="alert">
                <div class="flex items-center gap-2 mb-2">
                    <span class="material-symbols-outlined text-success">check_circle</span>
                    <strong class="font-bold">Link Reset Sandi Berhasil Dibuat!</strong>
                </div>
                <p class="mb-2">Silakan salin link berikut dan berikan kepada pengguna <strong>{{ session('success_reset_link')['name'] }}</strong>:</p>
                <div class="bg-surface p-3 rounded-lg border border-slate-200 flex flex-col gap-2">
                    <a href="{{ session('success_reset_link')['link'] }}" target="_blank" class="font-mono text-sm font-medium text-primary break-all hover:underline">{{ session('success_reset_link')['link'] }}</a>
                    <span class="text-label-sm text-outline mt-1">*Permintaan ini akan otomatis hilang dari tabel saat pengguna telah berhasil mengganti kata sandi.</span>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 bg-error-container border border-error text-on-error-container px-4 py-3 rounded-lg relative" role="alert">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
            <!-- Reset Password Requests -->
            <div class="lg:col-span-7 bg-surface rounded-[20px] shadow-sm border border-slate-200 p-6 flex flex-col gap-6">
                <div class="flex justify-between items-center border-b border-slate-100 pb-4">
                    <h3 class="font-headline-sm text-headline-sm text-primary flex items-center gap-2">
                        <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">key</span>
                        Permintaan Reset Sandi
                    </h3>
                    <span class="bg-surface-container-high text-primary font-label-sm text-label-sm px-3 py-1 rounded-full">{{ count($passwordResets) }} Menunggu</span>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-slate-200 font-label-md text-label-md text-on-surface-variant">
                                <th class="py-3 px-4 font-semibold">Pengguna</th>
                                <th class="py-3 px-4 font-semibold">Tanggal Request</th>
                                <th class="py-3 px-4 font-semibold text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="font-body-sm text-body-sm">
                            @forelse($passwordResets as $reset)
                            <tr class="border-b border-slate-100 hover:bg-slate-50 transition-colors group">
                                <td class="py-4 px-4">
                                    <div class="flex flex-col">
                                        <span class="font-medium text-on-background">{{ $reset->name }}</span>
                                        <span class="text-outline">{{ $reset->email }}</span>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-on-surface-variant">{{ \Carbon\Carbon::parse($reset->created_at)->translatedFormat('d M Y, H:i') }}</td>
                                <td class="py-4 px-4 text-right">
                                    <form action="{{ route('admin.keamanan.reset-sandi') }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="email" value="{{ $reset->email }}">
                                        <button type="submit" onclick="return confirm('Buat link reset sandi untuk akun ini?')" class="bg-primary text-white px-4 py-2 rounded-lg font-label-sm text-label-sm hover:bg-surface-tint hover:-translate-y-0.5 hover:shadow-md transition-all duration-200 inline-flex items-center gap-1">
                                            Proses <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 0;">arrow_forward</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="py-6 text-center text-outline">Tidak ada permintaan reset sandi saat ini.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Account Deletion Requests -->
            <div class="lg:col-span-5 bg-surface rounded-[20px] shadow-sm border border-slate-200 p-6 flex flex-col gap-6">
                <div class="flex justify-between items-center border-b border-slate-100 pb-4">
                    <h3 class="font-headline-sm text-headline-sm text-primary flex items-center gap-2">
                        <span class="material-symbols-outlined text-error" style="font-variation-settings: 'FILL' 1;">person_remove</span>
                        Manajemen Akun
                    </h3>
                </div>
                <p class="font-body-sm text-body-sm text-on-surface-variant">Berikut adalah daftar pengguna yang mengajukan permohonan penghapusan akun permanen.</p>
                
                <div class="flex flex-col gap-4">
                    @forelse($deletionRequests as $user)
                    <!-- Deletion Item -->
                    <div class="border border-error-container bg-surface-bright rounded-xl p-4 flex flex-col gap-3 hover:-translate-y-1 hover:shadow-md transition-all duration-200">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-label-md text-label-md font-semibold text-on-background">{{ $user->name }}</h4>
                                <p class="font-body-sm text-body-sm text-outline">{{ $user->email }}</p>
                            </div>
                            <span class="bg-error-container text-on-error-container font-label-sm text-label-sm px-2 py-1 rounded">Kritis</span>
                        </div>
                        <div class="flex items-center gap-2 text-on-surface-variant font-body-sm text-body-sm">
                            <span class="material-symbols-outlined text-[16px]">schedule</span>
                            <span class="">Diminta: {{ \Carbon\Carbon::parse($user->deletion_requested_at)->translatedFormat('d M Y') }}</span>
                        </div>
                        <div class="pt-2 flex gap-2">
                            <button @click="selectedUser = { id: '{{ $user->id }}', name: '{{ addslashes($user->name) }}', email: '{{ addslashes($user->email) }}', nik: '{{ $user->nik ?? '-' }}', phone: '{{ $user->no_hp ?? '-' }}', joined: '{{ $user->created_at->translatedFormat('d M Y') }}', photo: '{{ $user->profile_photo_url }}' }; reviewModal = true" class="flex-1 bg-surface border border-slate-200 text-on-surface-variant font-label-md text-label-md py-2 rounded-lg hover:bg-slate-50 transition-colors">Tinjau</button>
                            <form action="{{ route('admin.keamanan.tolak-hapus', $user->id) }}" method="POST" class="flex-1">
                                @csrf
                                <button type="submit" onclick="return confirm('Tolak permohonan hapus akun ini?')" class="w-full border border-slate-200 text-on-surface-variant font-label-md text-label-md py-2 rounded-lg hover:bg-slate-100 transition-all">Batal/Tolak</button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="text-center text-outline py-6">Tidak ada permohonan hapus akun saat ini.</div>
                    @endforelse
                </div>
            </div>
        </div>
        
        <!-- User Review Modal -->
        <div x-show="reviewModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center p-4">
            <!-- Backdrop -->
            <div @click="reviewModal = false" x-show="reviewModal" x-transition.opacity class="absolute inset-0 bg-on-background/60 backdrop-blur-sm"></div>
            
            <!-- Modal Container -->
            <div x-show="reviewModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="relative bg-surface w-full max-w-[600px] rounded-2xl shadow-2xl overflow-hidden flex flex-col">
                <!-- Header -->
                <div class="flex items-center justify-between p-6 border-b border-slate-100">
                    <h3 class="font-headline-sm text-headline-sm text-primary">Detail Pengguna</h3>
                    <button @click="reviewModal = false" class="text-outline hover:text-on-background transition-colors">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
                
                <!-- Content -->
                <div class="p-6 overflow-y-auto max-h-[80vh] flex flex-col gap-6">
                    <!-- Profile Section -->
                    <div class="flex items-center gap-4">
                        <img :src="selectedUser.photo" class="w-20 h-20 rounded-full object-cover border border-slate-200" alt="Profile">
                        <div class="flex-1">
                            <div class="flex items-center gap-2">
                                <h4 class="font-headline-sm text-headline-sm text-on-background" x-text="selectedUser.name"></h4>
                                <span class="bg-error-container text-on-error-container font-label-sm text-label-sm px-2 py-0.5 rounded">Menunggu Dihapus</span>
                            </div>
                            <p class="text-outline" x-text="selectedUser.email"></p>
                        </div>
                    </div>
                    
                    <!-- Stats Grid -->
                    <div class="grid grid-cols-2 gap-4 p-4 bg-surface-container-low rounded-xl">
                        <div>
                            <p class="text-label-sm text-outline uppercase tracking-wider">Bergabung Sejak</p>
                            <p class="font-semibold text-on-background" x-text="selectedUser.joined"></p>
                        </div>
                        <div>
                            <p class="text-label-sm text-outline uppercase tracking-wider">NIK</p>
                            <p class="font-semibold text-on-background" x-text="selectedUser.nik"></p>
                        </div>
                        <div>
                            <p class="text-label-sm text-outline uppercase tracking-wider">No. Telepon</p>
                            <p class="font-semibold text-on-background" x-text="selectedUser.phone"></p>
                        </div>
                    </div>
                </div>
                
                <!-- Footer -->
                <div class="p-6 border-t border-slate-100 flex justify-end gap-3">
                    <button @click="reviewModal = false" class="px-6 py-2 border border-slate-200 text-on-surface-variant font-label-md rounded-lg hover:bg-slate-50 transition-colors">Tutup</button>
                    <form :action="'{{ url('admin/keamanan/hapus-akun') }}/' + selectedUser.id" method="POST" onsubmit="return confirm('Aksi ini tidak dapat dibatalkan. Hapus permanen akun ini beserta semua datanya?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-6 py-2 bg-error text-white font-label-md rounded-lg hover:bg-on-error-container transition-all">Hapus Akun Permanen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
