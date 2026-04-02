<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rentalyzet - Sewa Mobil & Motor Mudah di Banjarmasin</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="text-gray-900 bg-gray-50" x-data="appData()">

    <header class="sticky top-0 z-40 bg-white shadow-sm">
        <nav class="container flex items-center justify-between px-6 py-4 mx-auto">
            <div class="flex items-center gap-2">
                <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-2xl font-bold text-gray-800">Rental<span class="text-teal-600">yzet</span></span>
            </div>

            <div class="flex items-center gap-6 text-sm font-medium text-gray-600">
                <a href="#katalog" class="hover:text-teal-600">Katalog</a>

                <a href="#" @click.prevent="helpModalOpen = true" class="cursor-pointer hover:text-teal-600">Cara
                    Pesan</a>

                <a href="#" @click.prevent="contactModalOpen = true"
                    class="cursor-pointer hover:text-teal-600">Kontak</a>

                <a href="https://wa.me/6281234567890" target="_blank"
                    class="px-4 py-2 text-xs text-white bg-teal-600 rounded-full hover:bg-teal-700">Hubungi Kami</a>
            </div>
        </nav>

        <div x-show="helpModalOpen" style="display: none;"
            class="fixed inset-0 z-50 flex items-center justify-center p-4" x-cloak>

            <div x-show="helpModalOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black/50 backdrop-blur-sm"
                @click="helpModalOpen = false">
            </div>

            <div x-show="helpModalOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                class="relative w-full max-w-lg p-8 bg-white shadow-2xl rounded-3xl">

                <button @click="helpModalOpen = false" class="absolute text-gray-400 top-6 right-6 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l18 18">
                        </path>
                    </svg>
                </button>

                <div class="mb-8 text-center">
                    <h3 class="text-2xl font-bold text-gray-800">Cara Pesan Kendaraan</h3>
                    <p class="mt-2 text-sm text-gray-500">Ikuti langkah mudah berikut untuk mulai menyewa.</p>
                </div>

                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div
                            class="flex items-center justify-center w-10 h-10 font-bold text-teal-600 rounded-full bg-teal-50 shrink-0">
                            1</div>
                        <div>
                            <h4 class="font-bold text-gray-800">Pilih Kendaraan</h4>
                            <p class="text-sm text-gray-600">Lihat katalog kami dan pilih kendaraan yang sesuai dengan
                                kebutuhanmu.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div
                            class="flex items-center justify-center w-10 h-10 font-bold text-teal-600 rounded-full bg-teal-50 shrink-0">
                            2</div>
                        <div>
                            <h4 class="font-bold text-gray-800">Isi Form Booking</h4>
                            <p class="text-sm text-gray-600">Klik "Lihat Detail" dan lengkapi data penyewaan pada form
                                yang tersedia.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div
                            class="flex items-center justify-center w-10 h-10 font-bold text-teal-600 rounded-full bg-teal-50 shrink-0">
                            3</div>
                        <div>
                            <h4 class="font-bold text-gray-800">Konfirmasi WhatsApp</h4>
                            <p class="text-sm text-gray-600">Setelah klik tombol booking, kirimkan pesan konfirmasi
                                otomatis ke WhatsApp Admin.</p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div
                            class="flex items-center justify-center w-10 h-10 font-bold text-teal-600 rounded-full bg-teal-50 shrink-0">
                            4</div>
                        <div>
                            <h4 class="font-bold text-gray-800">Selesai</h4>
                            <p class="text-sm text-gray-600">Admin akan mengecek ketersediaan dan memandu kamu untuk
                                proses pembayaran/DP.</p>
                        </div>
                    </div>
                </div>

                <button @click="helpModalOpen = false"
                    class="w-full py-4 mt-8 font-bold text-white transition bg-teal-600 rounded-xl hover:bg-teal-700">
                    Mengerti, Siap Pesan!
                </button>
            </div>
        </div>

        <div x-show="contactModalOpen" style="display: none;"
            class="fixed inset-0 z-50 flex items-center justify-center p-4" x-cloak>

            <div x-show="contactModalOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black/50 backdrop-blur-sm"
                @click="contactModalOpen = false">
            </div>

            <div x-show="contactModalOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative w-full max-w-sm p-6 bg-white shadow-2xl rounded-3xl">

                <button @click="contactModalOpen = false"
                    class="absolute text-gray-400 top-4 right-4 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l18 18">
                        </path>
                    </svg>
                </button>

                <div class="mb-6 text-center">
                    <h3 class="text-xl font-bold text-gray-800">Ikuti Kami</h3>
                    <p class="text-sm text-gray-500">Temukan info dan promo menarik lainnya.</p>
                </div>

                <div class="flex flex-col gap-3">
                    <a href="https://instagram.com/rentalyzet" target="_blank"
                        class="flex items-center gap-4 p-3 transition-colors border border-gray-100 rounded-xl hover:bg-gray-50 hover:border-pink-200 group">
                        <div
                            class="flex items-center justify-center w-10 h-10 text-pink-500 rounded-lg bg-pink-50 group-hover:bg-pink-100">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </div>
                        <span class="font-medium text-gray-700">@rentalyzet</span>
                    </a>

                    <a href="https://tiktok.com/@rentalyzet" target="_blank"
                        class="flex items-center gap-4 p-3 transition-colors border border-gray-100 rounded-xl hover:bg-gray-50 hover:border-gray-300 group">
                        <div
                            class="flex items-center justify-center w-10 h-10 text-gray-800 bg-gray-100 rounded-lg group-hover:bg-gray-200">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 2.26-1.17 4.54-3.04 5.92-1.9 1.4-4.43 1.83-6.68 1.25-2.32-.59-4.28-2.31-4.99-4.63-.73-2.37-.2-5.01 1.34-6.95 1.5-1.89 3.93-2.9 6.27-2.61v4.11c-1.07-.15-2.24.16-3.03.92-.81.79-1.11 2.01-.84 3.12.28 1.14 1.26 2.07 2.42 2.3 1.18.23 2.44-.06 3.32-.86.85-.76 1.3-1.87 1.31-3.03.02-4.91.01-9.81.01-14.72z" />
                            </svg>
                        </div>
                        <span class="font-medium text-gray-700">@rentalyzet</span>
                    </a>

                    <a href="mailto:hello@rentalyzet.com"
                        class="flex items-center gap-4 p-3 transition-colors border border-gray-100 rounded-xl hover:bg-gray-50 hover:border-blue-200 group">
                        <div
                            class="flex items-center justify-center w-10 h-10 text-blue-500 rounded-lg bg-blue-50 group-hover:bg-blue-100">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <span class="font-medium text-gray-700">hello@rentalyzet.com</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <section class="relative px-6 py-24 overflow-hidden text-white bg-gray-900">
        <img src="https://images.unsplash.com/photo-1610641818989-c2051b5e2cfd?q=80&w=2070"
            alt="Scenic Banjarmasin Road" class="absolute inset-0 object-cover w-full h-full opacity-30">

        <div class="container relative z-10 mx-auto text-center">
            <h1 class="mb-4 text-4xl font-extrabold leading-tight md:text-5xl">Sewa Mobil & Motor Mudah<br>di
                Banjarmasin!</h1>
            <p class="max-w-2xl mx-auto mb-10 text-lg text-gray-200">Sewa mobil service di South Kalimantan. Proses
                cepat, armada terawat, dan komunikasi langsung via WhatsApp.</p>

            <div class="flex items-center max-w-xl gap-2 p-2 mx-auto bg-white rounded-full shadow-lg h-14">
                <svg class="w-5 h-5 ml-4 text-gray-400 shrink-0" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>

                <input type="text" x-model="searchQuery"
                    @keydown.enter="document.getElementById('katalog').scrollIntoView({behavior: 'smooth'})"
                    placeholder="Cari kendaraan (misal: Avanza)..."
                    class="flex-grow w-full p-2 text-sm text-gray-800 bg-transparent focus:outline-none">

                <button x-show="searchQuery.length > 0" @click="searchQuery = ''" x-cloak
                    class="px-5 py-2 text-sm font-semibold text-gray-600 transition-colors bg-gray-100 rounded-full shrink-0 hover:bg-red-100 hover:text-red-600">
                    Bersihkan
                </button>
            </div>
        </div>
    </section>

    <main class="container px-6 py-16 mx-auto">

        <div class="flex flex-col items-start justify-between gap-4 mb-10 sm:flex-row sm:items-center">
            <h2 id="katalog" class="text-3xl font-extrabold text-gray-800 scroll-mt-24">Daftar Kendaraan</h2>

            <div class="flex items-center gap-3">
                <label for="statusFilter" class="text-sm font-medium text-gray-600">Filter Status:</label>
                <select id="statusFilter" x-model="currentFilter"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 cursor-pointer rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-500">
                    <option value="all">Semua Kendaraan</option>
                    <option value="tersedia">Tersedia</option>
                    <option value="disewa">Sedang Disewa</option>
                    <option value="maintenance">Maintenance</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($vehicles as $vehicle)
                <div x-show="(currentFilter === 'all' || currentFilter === '{{ $vehicle->status }}') && '{{ strtolower($vehicle->nama) }}'.includes(searchQuery.toLowerCase())"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    class="flex flex-col p-6 transition-shadow duration-300 bg-white border border-gray-100 rounded-3xl hover:shadow-lg">

                    <div
                        class="aspect-[16/10] w-full rounded-2xl overflow-hidden mb-5 bg-gray-50 flex items-center justify-center">
                        <img src="{{ $vehicle->foto ? asset('storage/' . $vehicle->foto) : 'https://placehold.co/400x250?text=No+Photo' }}"
                            alt="{{ $vehicle->nama }}" class="object-contain max-h-full">
                    </div>

                    <h3 class="flex-grow mb-1 text-lg font-semibold text-gray-800">{{ $vehicle->nama }}</h3>
                    <p class="mb-3 text-xs font-bold tracking-wide text-gray-400 uppercase">{{ $vehicle->plat_nomor }}
                    </p>

                    <div class="mb-3 text-teal-700">
                        <span class="text-2xl font-extrabold">Rp
                            {{ number_format($vehicle->harga_per_hari, 0, ',', '.') }}</span>
                        <span class="text-xs font-medium text-gray-500"> /hari</span>
                    </div>

                    <div class="mb-5">
                        <span @class([
                            'text-xs font-bold px-3 py-1.5 rounded-full',
                            'bg-green-100 text-green-700' => $vehicle->status === 'tersedia',
                            'bg-yellow-100 text-yellow-700' => $vehicle->status === 'disewa',
                            'bg-red-100 text-red-700' => $vehicle->status === 'maintenance',
                        ])>{{ ucfirst($vehicle->status) }}</span>
                    </div>

                    @if ($vehicle->status === 'tersedia')
                        <button @click="selectedVehicle = {{ $vehicle->toJson() }}; modalOpen = true"
                            class="w-full bg-navy-900 bg-[#001D4A] text-white text-sm font-semibold py-3.5 rounded-xl hover:bg-navy-950 flex items-center justify-center gap-2 mt-auto">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                            Lihat Detail & Pesan
                        </button>
                    @else
                        <button disabled
                            class="flex items-center justify-center w-full gap-2 py-3.5 mt-auto text-sm font-semibold text-gray-500 bg-gray-100 rounded-xl cursor-not-allowed">
                            Tidak Tersedia Saat Ini
                        </button>
                    @endif
                </div>
            @endforeach
        </div>

        <div x-show="!adaHasil" x-transition.opacity.duration.300ms
            class="flex flex-col items-center justify-center py-20 text-center" x-cloak>

            <div class="flex items-center justify-center w-24 h-24 mb-6 text-gray-400 bg-gray-100 rounded-full">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 10l4 4m0-4l-4 4">
                    </path>
                </svg>
            </div>

            <h3 class="mb-2 text-2xl font-bold text-gray-800">Kendaraan Tidak Ditemukan</h3>
            <p class="max-w-md mx-auto text-gray-500">Maaf, tidak ada armada yang sesuai dengan kata kunci atau filter
                status yang kamu pilih.</p>

            <button @click="searchQuery = ''; currentFilter = 'all'"
                class="px-6 py-3 mt-6 text-sm font-semibold text-teal-700 transition-colors rounded-full bg-teal-50 hover:bg-teal-100">
                Reset Pencarian
            </button>
        </div>

    </main>


    <div x-show="modalOpen" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;" x-cloak>

        <div x-show="modalOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black/60 backdrop-blur-sm"
            @click="modalOpen = false">
        </div>

        <div class="relative flex items-center justify-center min-h-screen p-4 md:p-8">
            <div x-show="modalOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="relative flex flex-col w-full max-w-6xl gap-10 p-8 overflow-hidden bg-white shadow-xl rounded-3xl md:p-12 md:flex-row">

                <button @click="modalOpen = false" class="absolute text-gray-400 top-6 right-6 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l18 18"></path>
                    </svg>
                </button>

                <div class="flex flex-col gap-6 md:w-1/2">
                    <h2 class="text-2xl font-bold text-gray-800">Detail & Booking Kendaraan</h2>

                    <div class="aspect-[16/10] w-full bg-gray-50 rounded-2xl flex items-center justify-center p-4">
                        <img :src="selectedVehicle?.foto ? '/storage/' + selectedVehicle.foto :
                            'https://placehold.co/400x250?text=No+Photo'"
                            :alt="selectedVehicle?.nama" class="object-contain max-h-full">
                    </div>

                    <div class="p-6 border border-gray-100 rounded-2xl bg-gray-50">
                        <h3 class="mb-5 text-xl font-bold text-gray-800" x-text="selectedVehicle?.nama"></h3>

                        <div class="grid grid-cols-2 text-sm gap-x-6 gap-y-4">
                            <p class="text-gray-500">Spesifikasi</p>
                            <p class="font-medium text-gray-800">: <span
                                    x-text="selectedVehicle?.jenis === 'mobil' ? 'Mobil Keluarga' : 'Motor Matic'"></span>
                            </p>

                            <p class="text-gray-500">Plat Nomor</p>
                            <p class="font-medium text-gray-800">: <span x-text="selectedVehicle?.plat_nomor"></span>
                            </p>

                            <p class="text-gray-500">Harga per Hari</p>
                            <p class="font-semibold text-teal-700">: Rp <span
                                    x-text="selectedVehicle ? new Intl.NumberFormat('id-ID').format(selectedVehicle.harga_per_hari) : '0'"></span>
                            </p>

                            <p class="text-gray-500">Deskripsi</p>
                            <p class="font-medium text-gray-800">: <span
                                    x-text="selectedVehicle?.deskripsi || 'Tidak ada deskripsi.'"></span></p>
                        </div>
                    </div>
                </div>

                <div class="border-l border-gray-100 md:w-1/2 md:pl-10">
                    <h3 class="mb-8 text-xl font-bold text-gray-800">Form Booking</h3>

                    <form action="{{ route('booking.store') }}" method="POST" class="space-y-6 text-sm">
                        @csrf
                        <input type="hidden" name="vehicle_id" :value="selectedVehicle?.id">

                        <div>
                            <label class="block mb-2 font-medium text-gray-600">Nama Penyewa</label>
                            <input type="text" name="nama_penyewa" required
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-teal-400 focus:ring-1 focus:ring-teal-100"
                                placeholder="Masukkan nama lengkap">
                        </div>

                        <div>
                            <label class="block mb-2 font-medium text-gray-600">No WhatsApp</label>
                            <input type="tel" name="no_hp" required
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-teal-400 focus:ring-1 focus:ring-teal-100"
                                placeholder="Contoh: 08123456789">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-2 font-medium text-gray-600">Tanggal Mulai</label>
                                <input type="date" name="tanggal_mulai" required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-teal-400 focus:ring-1 focus:ring-teal-100">
                            </div>
                            <div>
                                <label class="block mb-2 font-medium text-gray-600">Tanggal Selesai</label>
                                <input type="date" name="tanggal_selesai" required
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-teal-400 focus:ring-1 focus:ring-teal-100">
                            </div>
                        </div>

                        <div>
                            <label class="block mb-2 font-medium text-gray-600">Lokasi Tujuan</label>
                            <input type="text" name="lokasi_tujuan" required
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-teal-400 focus:ring-1 focus:ring-teal-100"
                                placeholder="Ke mana kendaraan akan dibawa?">
                        </div>

                        <div>
                            <label class="block mb-2 font-medium text-gray-600">Keperluan Sewa</label>
                            <input type="text" name="keperluan_sewa" required
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-teal-400 focus:ring-1 focus:ring-teal-100"
                                placeholder="Dinas kantor / Wisata / dll">
                        </div>

                        <div>
                            <label class="block mb-2 font-medium text-gray-600">Catatan tambahan</label>
                            <textarea name="catatan" rows="3"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-teal-400 focus:ring-1 focus:ring-teal-100"
                                placeholder="Opsional (misal: minta helm dua)"></textarea>
                        </div>

                        <button type="submit"
                            class="flex items-center justify-center w-full gap-3 py-4 font-bold text-white transition duration-150 bg-green-600 rounded-xl hover:bg-green-700">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.414 0 0 5.414 0 12.05c0 2.123.552 4.197 1.6 6.032L0 24l6.105-1.603a11.83 11.83 0 005.94 1.6c6.637 0 12.05-5.413 12.05-12.05 0-3.217-1.252-6.242-3.522-8.513z">
                                </path>
                            </svg>
                            Kirim Permintaan & Konfirmasi via WhatsApp
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div x-data="{ showBackToTop: false }" @scroll.window="showBackToTop = window.pageYOffset > 300"
        class="fixed z-50 bottom-8 right-8" x-cloak>

        <button x-show="showBackToTop && !modalOpen && !helpModalOpen && !contactModalOpen"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-4"
            @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
            class="p-3 text-white transition-colors shadow-xl bg-teal-600/90 backdrop-blur-sm rounded-2xl hover:bg-teal-700"
            title="Kembali ke atas">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
            </svg>
        </button>
    </div>

    <script>
        function appData() {
            return {
                modalOpen: false,
                selectedVehicle: null,
                helpModalOpen: false,
                contactModalOpen: false,
                currentFilter: 'all',
                searchQuery: '',
                kendaraanList: @json($vehicles->map->only(['nama', 'status'])),
                get adaHasil() {
                    return this.kendaraanList.some(k =>
                        (this.currentFilter === 'all' || this.currentFilter === k.status) &&
                        k.nama.toLowerCase().includes(this.searchQuery.toLowerCase())
                    );
                }
            };
        }
    </script>
</body>

</html>
