<!-- Hero Profile Header -->
<section class="relative mb-stack-lg" x-data="profilePhotos()">
    <!-- Cover Photo Section -->
    <div class="h-48 md:h-64 rounded-xl bg-primary-container relative group">
        <!-- Background Wrapper (with overflow hidden for rounded corners) -->
        <div class="absolute inset-0 rounded-xl overflow-hidden">
            <template x-if="coverPreview || '{{ auth()->user()->cover_photo_url }}'">
                <img :src="coverPreview || '{{ auth()->user()->cover_photo_url }}'" alt="Cover" class="w-full h-full object-cover">
            </template>
            <template x-if="!coverPreview && !'{{ auth()->user()->cover_photo_url }}'">
                <div class="absolute inset-0 opacity-40 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-secondary-container via-primary-container to-primary"></div>
            </template>
        </div>

        <!-- Cover Options Dropdown -->
        <div class="absolute bottom-4 right-4" x-data="{ showCoverOptions: false }" @click.away="showCoverOptions = false">
            <button @click="showCoverOptions = !showCoverOptions" class="bg-surface/20 backdrop-blur-md text-white border border-white/20 px-4 py-2 rounded-lg text-label-md flex items-center gap-2 hover:bg-surface/30 transition-all relative z-10 shadow-sm">
                <span class="material-symbols-outlined text-[18px]">edit</span>
                Opsi Cover
            </button>
            
            <div x-show="showCoverOptions" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 translate-y-2"
                 style="display: none;" 
                 class="absolute right-0 top-full mt-2 w-48 bg-surface rounded-xl shadow-lg border border-slate-200 py-2 z-50">
                <button @click="$refs.coverInput.click(); showCoverOptions = false" class="w-full text-left px-4 py-2 hover:bg-slate-50 text-body-sm flex items-center gap-2 text-on-surface">
                    <span class="material-symbols-outlined text-[18px]">photo_camera</span> Ubah Cover
                </button>
                @if(auth()->user()->cover_photo)
                <button type="button" @click="showCoverDeleteModal = true; showCoverOptions = false" class="w-full text-left px-4 py-2 hover:bg-red-50 text-error text-body-sm flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">delete</span> Hapus Cover
                </button>
                @endif
            </div>
        </div>
    </div>

    <!-- Profile Info Section -->
    <div class="flex flex-col md:flex-row items-end px-4 md:px-8 -mt-16 md:-mt-20 gap-6">
        <div class="relative group">
            <div class="w-32 h-32 md:w-40 md:h-40 rounded-full border-4 border-surface bg-surface shadow-lg overflow-hidden cursor-pointer" @click="showProfileOptions = !showProfileOptions">
                <img alt="Avatar" class="w-full h-full object-cover" :src="profilePreview || '{{ auth()->user()->profile_photo_url }}'"/>
            </div>
            
            <!-- Options Dropdown for Profile Photo -->
            <div x-show="showProfileOptions" @click.away="showProfileOptions = false" x-transition style="display: none;" class="absolute top-full mt-2 left-1/2 -translate-x-1/2 bg-surface rounded-xl shadow-lg border border-slate-200 py-2 w-48 z-50">
                <button @click="$refs.profileInput.click(); showProfileOptions = false" class="w-full text-left px-4 py-2 hover:bg-slate-50 text-body-sm flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">photo_camera</span> Ubah Foto
                </button>
                @if(auth()->user()->profile_photo)
                <button @click="showProfileDeleteModal = true; showProfileOptions = false" class="w-full text-left px-4 py-2 hover:bg-red-50 text-error text-body-sm flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">delete</span> Hapus Foto
                </button>
                @endif
            </div>

            <button @click="$refs.profileInput.click()" class="absolute bottom-2 right-2 p-2 bg-secondary-container text-on-primary rounded-full shadow-lg hover:scale-105 transition-transform">
                <span class="material-symbols-outlined text-[20px]">photo_camera</span>
            </button>
        </div>
        
        <div class="flex-1 pb-4 text-center md:text-left">
            <h1 class="font-headline-lg text-headline-lg text-on-surface">{{ auth()->user()->name }}</h1>
            <p class="font-body-md text-on-surface-variant flex items-center justify-center md:justify-start gap-2">
                {{ auth()->user()->email }}
                <span class="bg-success/10 text-success text-[10px] uppercase font-bold px-2 py-0.5 rounded-full">Verified</span>
            </p>
        </div>
        
        <div class="pb-4 flex gap-3">
            <button x-show="isDirty" @click="$refs.photoForm.submit()" class="bg-primary text-on-primary px-6 py-2.5 rounded-lg font-label-md flex items-center gap-2 hover:translate-y-[-2px] transition-transform shadow-sm">
                <span class="material-symbols-outlined text-[20px]">save</span>
                Simpan Foto
            </button>
        </div>
    </div>

    <!-- Hidden Form for Uploads -->
    <form x-ref="photoForm" action="{{ route('profile.photos.update') }}" method="POST" enctype="multipart/form-data" class="hidden">
        @csrf
        <input type="file" name="cover_photo" x-ref="coverInput" accept="image/*" @change="previewCover">
        <input type="file" name="profile_photo" x-ref="profileInput" accept="image/*" @change="previewProfile">
    </form>

    <!-- Delete Profile Photo Modal -->
    <div x-show="showProfileDeleteModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">
        <div @click.away="showProfileDeleteModal = false" class="bg-surface p-6 rounded-2xl w-full max-w-sm shadow-xl">
            <h3 class="font-headline-sm text-on-surface mb-2">Hapus Foto Profil?</h3>
            <p class="font-body-sm text-on-surface-variant mb-6">Tindakan ini tidak dapat dibatalkan. Foto Anda akan dihapus secara permanen.</p>
            <div class="flex justify-end gap-3">
                <button @click="showProfileDeleteModal = false" class="px-4 py-2 text-on-surface-variant font-label-md hover:bg-slate-50 rounded-lg">Batal</button>
                <form method="POST" action="{{ route('profile.photos.destroy', 'profile') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-error text-white font-label-md rounded-lg hover:bg-red-600 transition-colors">Hapus</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Cover Photo Modal -->
    <div x-show="showCoverDeleteModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">
        <div @click.away="showCoverDeleteModal = false" class="bg-surface p-6 rounded-2xl w-full max-w-sm shadow-xl">
            <h3 class="font-headline-sm text-on-surface mb-2">Hapus Foto Sampul?</h3>
            <p class="font-body-sm text-on-surface-variant mb-6">Tindakan ini tidak dapat dibatalkan. Foto sampul Anda akan dihapus secara permanen.</p>
            <div class="flex justify-end gap-3">
                <button @click="showCoverDeleteModal = false" class="px-4 py-2 text-on-surface-variant font-label-md hover:bg-slate-50 rounded-lg">Batal</button>
                <form method="POST" action="{{ route('profile.photos.destroy', 'cover') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-error text-white font-label-md rounded-lg hover:bg-red-600 transition-colors">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('profilePhotos', () => ({
            coverPreview: null,
            profilePreview: null,
            showProfileOptions: false,
            showProfileDeleteModal: false,
            showCoverDeleteModal: false,
            
            get isDirty() {
                return this.coverPreview !== null || this.profilePreview !== null;
            },

            previewCover(event) {
                const file = event.target.files[0];
                if (file) {
                    this.coverPreview = URL.createObjectURL(file);
                }
            },

            previewProfile(event) {
                const file = event.target.files[0];
                if (file) {
                    this.profilePreview = URL.createObjectURL(file);
                }
            }
        }));
    });
</script>
