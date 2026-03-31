<!DOCTYPE html>
<html lang="id">

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
    </style>
</head>

<body class="text-gray-900 bg-gray-50" x-data="{ modalOpen: false, selectedVehicle: null }">

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
                <a href="#" class="hover:text-teal-600">Katalog</a>
                <a href="#" class="hover:text-teal-600">Cara Pesan</a>
                <a href="#" class="hover:text-teal-600">Kontak</a>
                <a href="#"
                    class="px-4 py-2 text-xs text-white bg-teal-600 rounded-full hover:bg-teal-700">Hubungi Kami</a>
            </div>
        </nav>
    </header>

    <section class="relative px-6 py-24 overflow-hidden text-white bg-gray-900">
        <img src="https://images.unsplash.com/photo-1610641818989-c2051b5e2cfd?q=80&w=2070"
            alt="Scenic Banjarmasin Road" class="absolute inset-0 object-cover w-full h-full opacity-30">

        <div class="container relative z-10 mx-auto text-center">
            <h1 class="mb-4 text-4xl font-extrabold leading-tight md:text-5xl">Sewa Mobil & Motor Mudah<br>di
                Banjarmasin!</h1>
            <p class="max-w-2xl mx-auto mb-10 text-lg text-gray-200">Sewa mobil service di South Kalimantan. Proses
                cepat, armada terawat, dan komunikasi langsung via WhatsApp.</p>

            <div class="flex items-center max-w-xl gap-2 p-2 mx-auto bg-white rounded-full shadow-lg">
                <svg class="w-5 h-5 ml-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input type="text" placeholder="Sewa dari Kendaraan..."
                    class="flex-grow p-2 text-sm text-gray-800 focus:outline-none">
                <button
                    class="bg-teal-600 text-white font-semibold text-sm px-6 py-2.5 rounded-full hover:bg-teal-700">Sewa</button>
            </div>
        </div>
    </section>

    <main class="container px-6 py-16 mx-auto">
        <h2 class="mb-10 text-3xl font-extrabold text-gray-800">Daftar Kendaraan</h2>

        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($vehicles as $vehicle)
                <div
                    class="flex flex-col p-6 transition-shadow duration-300 bg-white border border-gray-100 rounded-3xl hover:shadow-lg">
                    <div
                        class="aspect-[16/10] w-full rounded-2xl overflow-hidden mb-5 bg-gray-50 flex items-center justify-center">
                        <img src="{{ $vehicle->foto ? asset('storage/' . $vehicle->foto) : 'https://placehold.co/400x250?text=No+Photo' }}"
                            alt="{{ $vehicle->nama }}" class="object-contain max-h-full">
                    </div>

                    <h3 class="flex-grow mb-1 text-lg font-semibold text-gray-800">{{ $vehicle->nama }}</h3>
                    <p class="mb-3 text-xs font-bold tracking-wide text-gray-400 uppercase">{{ $vehicle->plat_nomor }}
                    </p>

                    <div class="flex items-end justify-between mb-5">
                        <div class="text-teal-700">
                            <span class="text-2xl font-extrabold">Rp
                                {{ number_format($vehicle->harga_per_hari, 0, ',', '.') }}</span>
                            <span class="text-xs font-medium text-gray-500"> /hari</span>
                        </div>

                        <span
                            class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1.5 rounded-full">Tersedia</span>
                    </div>

                    <button @click="selectedVehicle = {{ $vehicle->toJson() }}; modalOpen = true"
                        class="w-full bg-navy-900 bg-[#001D4A] text-white text-sm font-semibold py-3.5 rounded-xl hover:bg-navy-950 flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                        Lihat Detail & Pesan
                    </button>
                </div>
            @endforeach
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

                    <form action="#" method="POST" class="space-y-6 text-sm">
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

</body>

</html>
