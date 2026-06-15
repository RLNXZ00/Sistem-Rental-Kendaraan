<x-app-layout>
    <main class="flex-grow w-full max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-stack-lg">

        {{-- Flash Messages --}}
        @if (session('success'))
            <div class="mb-stack-lg bg-green-50 border border-green-200 text-green-800 p-stack-md rounded-xl flex items-center gap-stack-sm">
                <span class="material-symbols-outlined icon-fill text-success">check_circle</span>
                <p class="font-label-md text-label-md">{{ session('success') }}</p>
            </div>
        @endif
        @if (session('error'))
            <div class="mb-stack-lg bg-red-50 border border-red-200 text-red-800 p-stack-md rounded-xl flex items-center gap-stack-sm">
                <span class="material-symbols-outlined icon-fill text-error">error</span>
                <p class="font-label-md text-label-md">{{ session('error') }}</p>
            </div>
        @endif

        {{-- Breadcrumbs --}}
        <nav aria-label="Breadcrumb" class="mb-stack-lg">
            <ol class="flex items-center space-x-2 font-body-sm text-body-sm text-on-surface-variant">
                <li>
                    <a href="{{ route('beranda') }}" class="hover:text-primary transition-colors flex items-center">
                        <span class="material-symbols-outlined text-[16px] mr-1">home</span>
                        Beranda
                    </a>
                </li>
                <li>
                    <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                </li>
                <li>
                    <a href="{{ route('pemesanan.riwayat') }}" class="hover:text-primary transition-colors">Riwayat Pemesanan</a>
                </li>
                <li>
                    <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                </li>
                <li aria-current="page" class="font-medium text-error">Pembayaran Denda</li>
            </ol>
        </nav>

        {{-- Main Grid Layout --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">

            {{-- ============================================================ --}}
            {{-- Left Column: Payment Details                                  --}}
            {{-- ============================================================ --}}
            <div class="lg:col-span-8 space-y-stack-lg">

                {{-- Card Utama --}}
                <div class="bg-surface rounded-card p-stack-lg shadow-[0_4px_6px_-1px_rgba(0,0,0,0.05)] border border-slate-200">

                    {{-- Page Header --}}
                    <div class="mb-stack-lg">
                        <h1 class="font-headline-lg text-headline-lg text-on-surface mb-stack-sm">Pembayaran Denda</h1>
                        <p class="font-body-md text-body-md text-on-surface-variant">Selesaikan pembayaran denda keterlambatan Anda untuk melanjutkan layanan.</p>
                    </div>

                    {{-- Notification Banner --}}
                    <div class="bg-error-container text-on-error-container p-stack-md rounded-lg flex items-start gap-stack-sm mb-stack-lg">
                        <span class="material-symbols-outlined icon-fill mt-0.5" style="font-variation-settings: 'FILL' 1;">error</span>
                        <div>
                            <h3 class="font-label-md text-label-md">Denda Keterlambatan Pengembalian</h3>
                            <p class="font-body-sm text-body-sm mt-1">
                                Kendaraan <strong>{{ $pesanan->kendaraan->nama_kendaraan }}</strong> dikembalikan melewati batas waktu sewa yang disepakati.
                                Harap selesaikan pembayaran denda ini sesegera mungkin.
                            </p>
                        </div>
                    </div>

                    {{-- Rincian Denda --}}
                    <div class="bg-slate-50 p-stack-md rounded-lg border border-slate-200 mb-stack-lg">
                        <h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Rincian Denda</h2>
                        <div class="space-y-stack-sm">
                            <div class="flex justify-between items-center py-2 border-b border-slate-200">
                                <span class="font-body-md text-body-md text-on-surface-variant">Kendaraan</span>
                                <span class="font-label-md text-label-md text-on-surface">{{ $pesanan->kendaraan->nama_kendaraan }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-slate-200">
                                <span class="font-body-md text-body-md text-on-surface-variant">Tanggal Seharusnya Kembali</span>
                                <span class="font-label-md text-label-md text-on-surface">{{ $pesanan->tanggal_selesai->translatedFormat('d F Y') }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-slate-200">
                                <span class="font-body-md text-body-md text-on-surface-variant">Durasi Keterlambatan</span>
                                <span class="font-label-md text-label-md text-error">
                                    {{ $terlambatHari }} Hari
                                </span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-slate-200">
                                <span class="font-body-md text-body-md text-on-surface-variant">Biaya Sewa Harian</span>
                                <span class="font-label-md text-label-md text-on-surface">Rp {{ number_format($pesanan->kendaraan->harga_sewa, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2 border-b border-slate-200">
                                <span class="font-body-md text-body-md text-on-surface-variant">Denda / Hari (Sewa + 10%)</span>
                                <span class="font-label-md text-label-md text-on-surface">Rp {{ number_format($dendaPerHari, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center py-2 pt-4">
                                <span class="font-body-lg text-body-lg text-on-surface font-semibold">Total Denda</span>
                                <span class="font-headline-md text-headline-md text-error">Rp {{ number_format($pesanan->denda, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Payment Method Selection --}}
                    <div>
                        <h2 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Pilih Metode Pembayaran</h2>
                        <form action="{{ route('pemesanan.bayarDenda', $pesanan->id) }}" method="POST" id="form-bayar-denda">
                            @csrf
                            <input type="hidden" name="metode_pembayaran" id="selected-method" value="">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-stack-md">

                                {{-- Transfer Bank --}}
                                <div class="space-y-stack-sm">
                                    <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Transfer Bank</p>

                                    <label class="block relative cursor-pointer" id="label-bca">
                                        <input class="peer sr-only payment-radio" type="radio" name="payment_method" value="BCA Virtual Account">
                                        <div class="flex items-center p-stack-md border-2 border-slate-200 rounded-lg hover:border-primary peer-checked:border-primary peer-checked:bg-surface-container-low transition-all duration-200">
                                            <span class="material-symbols-outlined text-primary mr-3">account_balance</span>
                                            <span class="font-body-md text-body-md flex-grow">BCA Virtual Account</span>
                                            <span class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 transition-all flex-shrink-0"></span>
                                        </div>
                                    </label>

                                    <label class="block relative cursor-pointer" id="label-mandiri">
                                        <input class="peer sr-only payment-radio" type="radio" name="payment_method" value="Mandiri Virtual Account">
                                        <div class="flex items-center p-stack-md border-2 border-slate-200 rounded-lg hover:border-primary peer-checked:border-primary peer-checked:bg-surface-container-low transition-all duration-200">
                                            <span class="material-symbols-outlined text-primary mr-3">account_balance</span>
                                            <span class="font-body-md text-body-md flex-grow">Mandiri Virtual Account</span>
                                            <span class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 transition-all flex-shrink-0"></span>
                                        </div>
                                    </label>

                                    <label class="block relative cursor-pointer" id="label-bni">
                                        <input class="peer sr-only payment-radio" type="radio" name="payment_method" value="BNI Virtual Account">
                                        <div class="flex items-center p-stack-md border-2 border-slate-200 rounded-lg hover:border-primary peer-checked:border-primary peer-checked:bg-surface-container-low transition-all duration-200">
                                            <span class="material-symbols-outlined text-primary mr-3">account_balance</span>
                                            <span class="font-body-md text-body-md flex-grow">BNI Virtual Account</span>
                                            <span class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 transition-all flex-shrink-0"></span>
                                        </div>
                                    </label>
                                </div>

                                {{-- E-Wallet & Kartu --}}
                                <div class="space-y-stack-sm">
                                    <p class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">E-Wallet &amp; Kartu</p>

                                    <label class="block relative cursor-pointer" id="label-gopay">
                                        <input class="peer sr-only payment-radio" type="radio" name="payment_method" value="GoPay / OVO">
                                        <div class="flex items-center p-stack-md border-2 border-slate-200 rounded-lg hover:border-primary peer-checked:border-primary peer-checked:bg-surface-container-low transition-all duration-200">
                                            <span class="material-symbols-outlined text-primary mr-3">account_balance_wallet</span>
                                            <span class="font-body-md text-body-md flex-grow">GoPay / OVO</span>
                                            <span class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 transition-all flex-shrink-0"></span>
                                        </div>
                                    </label>

                                    <label class="block relative cursor-pointer" id="label-kartu">
                                        <input class="peer sr-only payment-radio" type="radio" name="payment_method" value="Kartu Kredit / Debit">
                                        <div class="flex items-center p-stack-md border-2 border-slate-200 rounded-lg hover:border-primary peer-checked:border-primary peer-checked:bg-surface-container-low transition-all duration-200">
                                            <span class="material-symbols-outlined text-primary mr-3">credit_card</span>
                                            <span class="font-body-md text-body-md flex-grow">Kartu Kredit / Debit</span>
                                            <span class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 transition-all flex-shrink-0"></span>
                                        </div>
                                    </label>

                                    <label class="block relative cursor-pointer" id="label-dana">
                                        <input class="peer sr-only payment-radio" type="radio" name="payment_method" value="DANA">
                                        <div class="flex items-center p-stack-md border-2 border-slate-200 rounded-lg hover:border-primary peer-checked:border-primary peer-checked:bg-surface-container-low transition-all duration-200">
                                            <span class="material-symbols-outlined text-primary mr-3">payments</span>
                                            <span class="font-body-md text-body-md flex-grow">DANA</span>
                                            <span class="radio-indicator w-4 h-4 rounded-full border-2 border-slate-300 transition-all flex-shrink-0"></span>
                                        </div>
                                    </label>
                                </div>

                            </div>

                            {{-- Error if no method selected --}}
                            <p id="method-error" class="hidden text-error font-body-sm text-body-sm mt-stack-sm flex items-center gap-1">
                                <span class="material-symbols-outlined text-[16px]">warning</span>
                                Pilih metode pembayaran terlebih dahulu.
                            </p>

                        </form>
                    </div>
                </div>

            </div>

            {{-- ============================================================ --}}
            {{-- Right Column: Summary Sidebar (Sticky)                        --}}
            {{-- ============================================================ --}}
            <div class="lg:col-span-4">
                <div class="sticky top-24 space-y-gutter">

                    {{-- Summary Card --}}
                    <div class="bg-surface rounded-card p-stack-lg shadow-[0_4px_6px_-1px_rgba(0,0,0,0.05)] border border-slate-200">
                        <h3 class="font-headline-sm text-headline-sm text-on-surface mb-stack-md">Ringkasan Pembayaran</h3>

                        {{-- Vehicle Info --}}
                        <div class="flex items-center gap-3 mb-stack-md pb-stack-md border-b border-slate-100">
                            <div class="w-16 h-16 rounded-xl bg-slate-100 overflow-hidden flex-shrink-0">
                                @if($pesanan->kendaraan->gambar_utama)
                                    <img src="{{ asset($pesanan->kendaraan->gambar_utama) }}" alt="{{ $pesanan->kendaraan->nama_kendaraan }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <span class="material-symbols-outlined text-slate-400 text-[32px]">directions_car</span>
                                    </div>
                                @endif
                            </div>
                            <div>
                                <h4 class="font-label-md text-label-md text-primary">{{ $pesanan->kendaraan->nama_kendaraan }}</h4>
                                <p class="font-body-sm text-body-sm text-on-surface-variant">{{ $pesanan->kendaraan->tipe }}</p>
                            </div>
                        </div>

                        {{-- Fine Breakdown --}}
                        <div class="space-y-3 mb-stack-lg">
                            <div class="flex justify-between text-body-sm">
                                <span class="text-on-surface-variant">Keterlambatan</span>
                                <span class="font-medium text-error">{{ $terlambatHari }} Hari</span>
                            </div>
                            <div class="flex justify-between text-body-sm">
                                <span class="text-on-surface-variant">Denda / Hari</span>
                                <span class="font-medium text-on-background">Rp {{ number_format($dendaPerHari, 0, ',', '.') }}</span>
                            </div>
                            <div class="pt-3 border-t border-dashed border-slate-200 flex justify-between items-center">
                                <span class="font-bold font-body-lg text-body-lg text-on-surface">Total Tagihan</span>
                                <span class="font-headline-md text-headline-md text-error">Rp {{ number_format($pesanan->denda, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        {{-- Pay Button --}}
                        <button
                            id="btn-bayar-denda"
                            onclick="submitDendaPayment()"
                            class="w-full bg-[#F97316] text-white font-label-md text-label-md py-4 px-6 rounded-lg hover:bg-orange-600 hover:-translate-y-1 hover:shadow-lg active:scale-95 transition-all duration-200 flex justify-center items-center gap-2"
                        >
                            <span class="material-symbols-outlined">lock</span>
                            Bayar Denda Sekarang
                        </button>

                        <p class="font-body-sm text-body-sm text-on-surface-variant text-center mt-stack-sm flex items-center justify-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">verified_user</span>
                            Pembayaran Aman &amp; Terenkripsi
                        </p>
                    </div>

                    {{-- Trust Badge --}}
                    <div class="bg-surface-container-low border border-slate-100 rounded-xl p-4 flex items-center gap-4">
                        <span class="material-symbols-outlined text-success text-[32px]" style="font-variation-settings: 'FILL' 1;">verified_user</span>
                        <div class="text-[12px]">
                            <p class="font-bold text-on-background">Pembayaran Aman &amp; Terenkripsi</p>
                            <p class="text-on-surface-variant">Semua transaksi dilindungi dengan protokol keamanan SSL 256-bit.</p>
                        </div>
                    </div>

                    {{-- Back Link --}}
                    <a href="{{ route('pemesanan.riwayat') }}" class="flex items-center justify-center gap-2 text-on-surface-variant hover:text-primary font-body-sm text-body-sm transition-colors">
                        <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                        Kembali ke Riwayat Pemesanan
                    </a>

                </div>
            </div>

        </div>
    </main>

    {{-- ================================================================ --}}
    {{-- Inline Styles for Radio Button Checked State                      --}}
    {{-- ================================================================ --}}
    <style>
        .payment-radio:checked + div {
            border-color: #1e3a8a;
            background-color: #eff4ff;
        }
        .payment-radio:checked + div .radio-indicator {
            border-color: #1e3a8a;
            background-color: #1e3a8a;
            box-shadow: inset 0 0 0 3px #eff4ff;
        }
        .icon-fill {
            font-variation-settings: 'FILL' 1;
        }
    </style>

    {{-- ================================================================ --}}
    {{-- JavaScript: Validate method selection before submitting           --}}
    {{-- ================================================================ --}}
    <script>
        function submitDendaPayment() {
            const selectedMethod = document.querySelector('.payment-radio:checked');
            const errorMsg = document.getElementById('method-error');
            const btnBayar = document.getElementById('btn-bayar-denda');

            if (!selectedMethod) {
                errorMsg.classList.remove('hidden');
                errorMsg.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            errorMsg.classList.add('hidden');

            // Visual feedback on button
            btnBayar.disabled = true;
            btnBayar.innerHTML = `
                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                Memproses...
            `;

            document.getElementById('selected-method').value = selectedMethod.value;
            document.getElementById('form-bayar-denda').submit();
        }

        // Hide error when user selects a method
        document.querySelectorAll('.payment-radio').forEach(radio => {
            radio.addEventListener('change', () => {
                document.getElementById('method-error').classList.add('hidden');
            });
        });
    </script>
</x-app-layout>
