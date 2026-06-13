<x-app-layout>
    <main class="flex-grow w-full max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-stack-lg md:py-section-gap">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-stack-md mb-stack-lg">
            <div>
                <h1 class="font-headline-lg-mobile text-headline-lg-mobile md:font-headline-lg md:text-headline-lg text-primary-container mb-2">Rating & Ulasan Kendaraan</h1>
                <p class="font-body-md text-body-md text-on-surface-variant">Jelajahi kendaraan dengan performa dan ulasan terbaik dari pelanggan kami.</p>
            </div>
            
            <!-- Filter -->
            <div class="flex items-center gap-2">
                <label for="sortFilter" class="font-label-md text-label-md text-on-surface-variant whitespace-nowrap">Urutkan:</label>
                <div class="relative">
                    <form action="{{ route('kendaraan.rating') }}" method="GET" id="ratingSortForm">
                        <select name="sort" id="sortFilter" onchange="document.getElementById('ratingSortForm').submit();" class="appearance-none bg-surface border border-slate-200 rounded-lg py-2 pl-3 pr-8 font-body-sm text-body-sm text-on-surface focus:outline-none focus:ring-2 focus:ring-primary-container focus:border-primary-container shadow-sm cursor-pointer">
                            <option value="Rating Tertinggi" {{ $sort === 'Rating Tertinggi' ? 'selected' : '' }}>Rating Tertinggi</option>
                            <option value="Ulasan Terbaru" {{ $sort === 'Ulasan Terbaru' ? 'selected' : '' }}>Ulasan Terbaru</option>
                            <option value="Paling Banyak Diulas" {{ $sort === 'Paling Banyak Diulas' ? 'selected' : '' }}>Paling Banyak Diulas</option>
                        </select>
                    </form>
                    <span class="material-symbols-outlined absolute right-2 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none text-[20px]">expand_more</span>
                </div>
            </div>
        </div>

        <!-- Rating List -->
        <div class="flex flex-col gap-stack-md">
            @forelse($vehicles as $vehicle)
            <article class="group flex flex-col md:flex-row bg-surface rounded-xl border border-slate-200 shadow-[0_4px_6px_-1px_rgba(0,0,0,0.05)] hover:-translate-y-1 hover:shadow-[0_10px_15px_-3px_rgba(0,0,0,0.1)] transition-all duration-300 overflow-hidden cursor-pointer" onclick="openModal({{ $vehicle->id }})">
                <div class="w-full md:w-64 h-48 md:h-auto shrink-0 relative bg-slate-100">
                    <img src="{{ $vehicle->gambar_url ?? 'https://lh3.googleusercontent.com/aida-public/AB6AXuDZQ8QjaDzY0hoBkw6iw1Sp-SR0UFnCUwr8B4WHSegr2R0_MqQicaF2U4KjIsyDMjOb5bCs459g3KTe7fi97TCbb7v1DVi495-2vTatV8sPbZJp8j4KtCRkhWPJqzv5UqgxosNlQ313BFA_SmomMjWMc5_RkFnIPuZuAW3n_aMOMmUzeBgDVVVWR-0jHSj4QG7wwB9OTlVkaRl1muFxdqOVKgPvXsC51dKtuT3srTpI9shBGZ2v_A8LpV36ZHMb0wFJYV7aDOwJ7Ig' }}" alt="{{ $vehicle->nama_kendaraan }}" class="w-full h-full object-cover">
                    <div class="absolute top-3 left-3 bg-inverse-primary text-primary-container px-2 py-1 rounded-full font-label-sm text-label-sm shadow-sm">
                        {{ $vehicle->tipe }}
                    </div>
                </div>
                
                <div class="p-4 md:p-6 flex flex-col flex-grow justify-center">
                    <div class="flex justify-between items-start mb-2">
                        <h2 class="font-headline-sm text-headline-sm text-primary-container" id="vehicle-title-{{ $vehicle->id }}">{{ $vehicle->nama_kendaraan }}</h2>
                        <div class="flex items-center gap-1 bg-surface-container-low px-2 py-1 rounded-md border border-slate-200">
                            <span class="material-symbols-outlined text-secondary-container text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="font-label-md text-label-md text-on-background">{{ number_format($vehicle->rating, 1) }}<span class="text-on-surface-variant font-normal">/5.0</span></span>
                        </div>
                    </div>
                    
                    @php
                        $reviewsCount = $vehicle->umpanBaliks ? $vehicle->umpanBaliks->count() : 0;
                        $latestReview = $vehicle->umpanBaliks ? $vehicle->umpanBaliks->sortByDesc('created_at')->first() : null;
                    @endphp
                    
                    <div class="flex items-center gap-2 mb-4">
                        <div class="flex text-secondary-container">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= round($vehicle->rating))
                                    <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                                @else
                                    <span class="material-symbols-outlined text-[16px]">star</span>
                                @endif
                            @endfor
                        </div>
                        <span class="font-body-sm text-body-sm text-on-surface-variant border-l border-slate-200 pl-2">{{ $reviewsCount }} Ulasan</span>
                    </div>
                    
                    @if($latestReview)
                    <div class="bg-background rounded-lg p-3 border border-slate-200 relative">
                        <span class="material-symbols-outlined absolute top-2 right-2 text-surface-variant opacity-50 text-[32px]">format_quote</span>
                        <p class="font-body-sm text-body-sm text-on-surface italic relative z-10">
                            "{{ Str::limit($latestReview->komentar, 150) }}"
                        </p>
                        <p class="font-label-sm text-label-sm text-on-surface-variant mt-2">- {{ $latestReview->user ? $latestReview->user->name : 'Pelanggan' }}, {{ $latestReview->created_at->diffForHumans() }}</p>
                    </div>
                    @else
                    <div class="bg-background rounded-lg p-3 border border-slate-200 relative">
                        <p class="font-body-sm text-body-sm text-on-surface-variant italic relative z-10">
                            Belum ada ulasan untuk kendaraan ini.
                        </p>
                    </div>
                    @endif
                </div>
            </article>
            @empty
            <div class="text-center py-12 text-on-surface-variant">
                Tidak ada data rating kendaraan.
            </div>
            @endforelse
        </div>

        <!-- Pagination/Load More -->
        @if($vehicles->count() >= 10)
        <div class="mt-stack-lg flex justify-center">
            <button class="bg-surface text-primary-container border border-primary-container px-6 py-2 rounded-lg font-label-md text-label-md hover:bg-surface-container-low transition-colors duration-200">
                Muat Lebih Banyak
            </button>
        </div>
        @endif
    </main>

    <!-- Modal Detail Ringkas -->
    <div id="vehicle-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-on-background/40 backdrop-blur-sm" onclick="closeModal()"></div>
        <div id="modal-content" class="relative bg-surface w-full rounded-[20px] shadow-2xl overflow-hidden transition-all transform scale-95 opacity-0 md:max-w-2xl">
            <div class="flex flex-col md:flex-row">
                <div class="w-full md:w-1/2 h-48 md:h-auto bg-slate-100">
                    <img id="modal-image" src="" alt="Vehicle Image" class="w-full h-full object-cover">
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <div class="flex justify-between items-start mb-4">
                        <h3 id="modal-title" class="font-headline-md text-headline-md text-primary-container">Detail Kendaraan</h3>
                        <button onclick="closeModal()" class="text-on-surface-variant hover:text-error transition-colors">
                            <span class="material-symbols-outlined">close</span>
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-3 mb-6">
                        <div class="flex items-center gap-3 p-2 bg-surface-container-low rounded-xl">
                            <span class="material-symbols-outlined text-secondary-container">event_seat</span>
                            <div>
                                <p class="text-label-sm text-on-surface-variant">Kursi</p>
                                <p id="modal-seats" class="font-label-md text-on-surface">5 Kursi</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-2 bg-surface-container-low rounded-xl">
                            <span class="material-symbols-outlined text-secondary-container">settings_input_component</span>
                            <div>
                                <p class="text-label-sm text-on-surface-variant">Transmisi</p>
                                <p id="modal-transmission" class="font-label-md text-on-surface">Otomatis</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-2 bg-surface-container-low rounded-xl">
                            <span class="material-symbols-outlined text-secondary-container">local_gas_station</span>
                            <div>
                                <p class="text-label-sm text-on-surface-variant">Bahan Bakar</p>
                                <p id="modal-fuel" class="font-label-md text-on-surface">Bensin</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-2 bg-surface-container-low rounded-xl">
                            <span class="material-symbols-outlined text-secondary-container">work</span>
                            <div>
                                <p class="text-label-sm text-on-surface-variant">Maks. Bagasi</p>
                                <p id="modal-baggage" class="font-label-md text-on-surface">2 Koper</p>
                            </div>
                        </div>
                    </div>
                    
                    <a href="#" id="modal-link" class="w-full bg-secondary-container text-on-primary py-3 rounded-xl font-label-md text-label-md hover:opacity-90 transition-opacity shadow-md mt-auto text-center">
                        Sewa Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal(id) {
            const modal = document.getElementById('vehicle-modal');
            const content = document.getElementById('modal-content');
            const title = document.getElementById('vehicle-title-' + id).innerText;
            
            document.getElementById('modal-title').innerText = title;
            document.getElementById('modal-link').href = "{{ url('/kendaraan') }}/" + id;
            
            // Dummy image logic for modal, normally handled via AJAX or data attributes
            document.getElementById('modal-image').src = "https://lh3.googleusercontent.com/aida-public/AB6AXuDZQ8QjaDzY0hoBkw6iw1Sp-SR0UFnCUwr8B4WHSegr2R0_MqQicaF2U4KjIsyDMjOb5bCs459g3KTe7fi97TCbb7v1DVi495-2vTatV8sPbZJp8j4KtCRkhWPJqzv5UqgxosNlQ313BFA_SmomMjWMc5_RkFnIPuZuAW3n_aMOMmUzeBgDVVVWR-0jHSj4QG7wwB9OTlVkaRl1muFxdqOVKgPvXsC51dKtuT3srTpI9shBGZ2v_A8LpV36ZHMb0wFJYV7aDOwJ7Ig";
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeModal() {
            const modal = document.getElementById('vehicle-modal');
            const content = document.getElementById('modal-content');
            
            content.classList.remove('scale-100', 'opacity-100');
            content.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }
    </script>
</x-app-layout>
