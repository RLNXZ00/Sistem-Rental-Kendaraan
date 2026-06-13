<x-app-layout>
    <main class="max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-stack-lg min-h-screen w-full">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 mb-stack-lg text-on-surface-variant font-label-md text-label-md">
            <a href="{{ route('beranda') }}" class="hover:text-primary transition-colors">Beranda</a>
            <span class="material-symbols-outlined text-[18px]">chevron_right</span>
            <a href="{{ route('pemesanan.riwayat') }}" class="hover:text-primary transition-colors">Pemesanan</a>
            <span class="material-symbols-outlined text-[18px]">chevron_right</span>
            <span class="text-primary font-bold">Pembayaran</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter items-start">
            <!-- Main Payment Section -->
            <div class="lg:col-span-8 space-y-stack-lg">
                <!-- Countdown Timer -->
                <div class="bg-primary-container text-white p-4 rounded-xl flex items-center justify-between shadow-sm">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined">schedule</span>
                        <p class="font-label-md text-label-md">Selesaikan pembayaran dalam waktu:</p>
                    </div>
                    <div id="countdown" class="font-headline-sm text-headline-sm font-bold bg-white/10 px-4 py-1 rounded-lg">58:50</div>
                </div>

                <!-- Payment Methods Accordion -->
                <div class="space-y-4">
                    <h2 class="font-headline-sm text-headline-sm text-on-background">Pilih Metode Pembayaran</h2>
                    
                    <form action="#" method="POST" id="form-pembayaran">
                        @csrf
                        
                        <!-- QRIS -->
                        <div class="bg-surface border border-slate-200 rounded-[20px] overflow-hidden shadow-sm">
                            <input type="radio" name="payment_method" id="qris" class="hidden payment-option-input" checked>
                            <label for="qris" class="flex flex-col p-6 cursor-pointer hover:bg-slate-50 transition-colors border-2 border-transparent">
                                <div class="flex items-center justify-between w-full">
                                    <div class="flex items-center gap-4">
                                        <div class="radio-circle w-5 h-5 rounded-full border-2 border-slate-300 transition-all"></div>
                                        <span class="font-headline-sm text-headline-sm">QRIS</span>
                                    </div>
                                    <div class="flex gap-2">
                                        <div class="h-6 w-12 bg-slate-100 rounded flex items-center justify-center text-[10px] font-bold text-slate-400">QRIS</div>
                                    </div>
                                </div>
                                <div class="mt-6 flex flex-col items-center py-4 space-y-4 qris-content">
                                    <div class="p-4 bg-white border-2 border-slate-100 rounded-xl shadow-inner">
                                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDPm3ZnUrQROHOrK9ZhMyRL9yfQa6qHvUAKjCg9MNQ_lfcBtTG10GRToOefzToLLFiiYn6N2d02XI6XgG0HqTHzA2HILnFpIbJaIR119Meb6mMR2DkXGf9HFtaizxNEjoHa_Mzi1-iEPn-5a2B5r7ybl0Lxm8JGeHv37vImkL7HYeGXf-8nrfbSg6C6fHxedRLi5Uz5IFF2bo7LNw7DmON2THrLksU-YExMtuzQh5lgm01KqPEnDd0RenpGOwgz5ZR_fplBG9IaBhU" alt="QRIS Code" class="w-48 h-48">
                                    </div>
                                    <p class="text-body-sm text-on-surface-variant text-center max-w-xs">Scan kode QR di atas menggunakan aplikasi m-banking atau e-wallet pilihan Anda.</p>
                                </div>
                            </label>
                        </div>

                        <!-- Virtual Account -->
                        <div class="bg-surface border border-slate-200 rounded-[20px] overflow-hidden shadow-sm mt-4">
                            <div class="p-6">
                                <div class="flex items-center gap-4 mb-6">
                                    <span class="material-symbols-outlined text-primary">account_balance</span>
                                    <span class="font-headline-sm text-headline-sm">Virtual Account</span>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <input type="radio" name="payment_method" id="va_bca" class="hidden payment-option-input">
                                    <label for="va_bca" class="border border-slate-200 p-4 rounded-xl flex flex-col items-center justify-center gap-2 cursor-pointer hover:border-primary transition-all group">
                                        <div class="radio-circle w-4 h-4 rounded-full border-2 border-slate-300 self-end -mt-2 -mr-2"></div>
                                        <span class="font-bold text-primary">BCA</span>
                                        <span class="text-xs text-on-surface-variant">Pengecekan Otomatis</span>
                                    </label>
                                    <input type="radio" name="payment_method" id="va_mandiri" class="hidden payment-option-input">
                                    <label for="va_mandiri" class="border border-slate-200 p-4 rounded-xl flex flex-col items-center justify-center gap-2 cursor-pointer hover:border-primary transition-all group">
                                        <div class="radio-circle w-4 h-4 rounded-full border-2 border-slate-300 self-end -mt-2 -mr-2"></div>
                                        <span class="font-bold text-primary">Mandiri</span>
                                        <span class="text-xs text-on-surface-variant">Pengecekan Otomatis</span>
                                    </label>
                                    <input type="radio" name="payment_method" id="va_bni" class="hidden payment-option-input">
                                    <label for="va_bni" class="border border-slate-200 p-4 rounded-xl flex flex-col items-center justify-center gap-2 cursor-pointer hover:border-primary transition-all group">
                                        <div class="radio-circle w-4 h-4 rounded-full border-2 border-slate-300 self-end -mt-2 -mr-2"></div>
                                        <span class="font-bold text-primary">BNI</span>
                                        <span class="text-xs text-on-surface-variant">Pengecekan Otomatis</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- E-Wallet -->
                        <div class="bg-surface border border-slate-200 rounded-[20px] overflow-hidden shadow-sm mt-4">
                            <div class="p-6">
                                <div class="flex items-center gap-4 mb-6">
                                    <span class="material-symbols-outlined text-primary">account_balance_wallet</span>
                                    <span class="font-headline-sm text-headline-sm">E-Wallet</span>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <input type="radio" name="payment_method" id="ew_gopay" class="hidden payment-option-input">
                                    <label for="ew_gopay" class="border border-slate-200 p-4 rounded-xl flex flex-col items-center justify-center gap-2 cursor-pointer hover:border-primary transition-all">
                                        <div class="radio-circle w-4 h-4 rounded-full border-2 border-slate-300 self-end -mt-2 -mr-2"></div>
                                        <span class="font-bold text-[#00AED6]">GoPay</span>
                                    </label>
                                    <input type="radio" name="payment_method" id="ew_ovo" class="hidden payment-option-input">
                                    <label for="ew_ovo" class="border border-slate-200 p-4 rounded-xl flex flex-col items-center justify-center gap-2 cursor-pointer hover:border-primary transition-all">
                                        <div class="radio-circle w-4 h-4 rounded-full border-2 border-slate-300 self-end -mt-2 -mr-2"></div>
                                        <span class="font-bold text-[#4D2A86]">OVO</span>
                                    </label>
                                    <input type="radio" name="payment_method" id="ew_dana" class="hidden payment-option-input">
                                    <label for="ew_dana" class="border border-slate-200 p-4 rounded-xl flex flex-col items-center justify-center gap-2 cursor-pointer hover:border-primary transition-all">
                                        <div class="radio-circle w-4 h-4 rounded-full border-2 border-slate-300 self-end -mt-2 -mr-2"></div>
                                        <span class="font-bold text-[#118EEA]">DANA</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Payment Summary Sidebar -->
            <div class="lg:col-span-4 space-y-gutter">
                <div class="bg-surface border border-slate-200 rounded-[20px] p-6 shadow-sm sticky top-24">
                    <h3 class="font-headline-sm text-headline-sm mb-6 pb-4 border-b border-slate-100">Ringkasan Pembayaran</h3>
                    
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-20 h-20 rounded-xl bg-slate-100 overflow-hidden">
                            <img src="{{ isset($pesanan) ? $pesanan->kendaraan->gambar_url : 'https://lh3.googleusercontent.com/aida-public/AB6AXuCKBIqdnvM8wos-TF9RZbSqzX2q-Dx5C1UkOZ75eNYNkDl3tHMCjva1FeTphKUVQ8j97DMdTVk9QP9QWrNV2TjZ7VkJ8p--hd3X5Pfd4qD5WggmmAOKHnxgEhmGMePDWxdxE_JqReDO3z5gMXK9-iSuhZs1WHyT_QnQnUi8n3df742tMsz5gz3AQkPXcVrEnS0L27oGlhNDhDWo718HJFZKkhE_RgoZtCTH5-zgMX69S_mmPe9GjjuRSE3Kdb2AoZiG3dfnDE_HLBA' }}" alt="Vehicle" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-label-md text-label-md text-primary">{{ isset($pesanan) ? $pesanan->kendaraan->nama : 'Toyota Innova Zenix' }}</h4>
                            <p class="text-body-sm text-on-surface-variant">{{ isset($pesanan) ? $pesanan->kendaraan->tipe : 'Mobil' }}</p>
                        </div>
                    </div>

                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between text-body-md">
                            <span class="text-on-surface-variant">Harga Sewa ({{ isset($pesanan) ? $pesanan->durasi_hari : 1 }} Hari)</span>
                            <span class="font-medium text-on-background">Rp {{ number_format(isset($pesanan) ? $pesanan->total_biaya : 650000, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-body-md">
                            <span class="text-on-surface-variant">Biaya Layanan</span>
                            <span class="font-medium text-on-background">Rp 0</span>
                        </div>
                        <div class="flex justify-between text-body-md">
                            <span class="text-on-surface-variant">Asuransi Perjalanan</span>
                            <span class="font-medium text-success">Gratis</span>
                        </div>
                        <div class="pt-4 border-t border-dashed border-slate-200 flex justify-between items-center">
                            <span class="font-bold text-on-background">Total Pembayaran</span>
                            <span class="text-headline-sm font-headline-sm text-secondary">Rp {{ number_format(isset($pesanan) ? $pesanan->total_biaya : 650000, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <button onclick="document.getElementById('form-pembayaran').submit();" class="w-full bg-secondary-container hover:bg-secondary text-white font-bold py-4 rounded-xl shadow-lg transition-all duration-300 active:scale-[0.98] flex items-center justify-center gap-2">
                        Konfirmasi Pembayaran
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </button>
                    <p class="mt-4 text-[12px] text-center text-on-surface-variant italic">
                        Dengan menekan tombol di atas, Anda menyetujui <a href="#" class="underline">Syarat & Ketentuan</a> yang berlaku.
                    </p>
                </div>

                <!-- Trust Badge Card -->
                <div class="bg-surface-container-low border border-slate-100 rounded-xl p-4 flex items-center gap-4">
                    <span class="material-symbols-outlined text-success text-[32px]">verified_user</span>
                    <div class="text-[12px]">
                        <p class="font-bold text-on-background">Pembayaran Aman & Terenkripsi</p>
                        <p class="text-on-surface-variant">Semua transaksi dilindungi dengan protokol keamanan SSL 256-bit.</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let timeLeft = 59 * 60 + 59; // 59 minutes 59 seconds
            const countdownElement = document.getElementById('countdown');

            const timer = setInterval(() => {
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                
                countdownElement.textContent = `${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                
                if (timeLeft <= 0) {
                    clearInterval(timer);
                    countdownElement.textContent = "EXPIRED";
                    countdownElement.classList.add('text-error');
                }
                timeLeft--;
            }, 1000);
        });
    </script>

    <style>
        .payment-option-input:checked + label {
            border-color: #00236f;
            background-color: #eff4ff;
        }
        .payment-option-input:checked + label .radio-circle {
            border-color: #00236f;
            background-color: #00236f;
            box-shadow: inset 0 0 0 3px #eff4ff;
        }
    </style>
</x-app-layout>
