<div class="space-y-3">
    <div class="flex flex-col items-center justify-center lg:justify-start lg:items-start">
        <h1 class="text-3xl font-semibold">List Artikel</h1>
        <p class="text-gray-600">Menampilkan 6 Artikel terbaru</p>
    </div>
    <div class="space-y-5">
        @foreach($artikel as $item)
        <div class="grid gap-5 lg:grid-cols-3">
            <div class="w-full overflow-hidden shadow-md lg:col-span-1 h-96 bg-slate-300 rounded-xl">
                <img src="{{ asset('storage/artikel/' . $item->gambar_artikel) }}" class="object-cover w-full h-full aspect-square" alt="{{ $item->judul }}">
            </div>
            <div class="space-y-3 text-center lg:col-span-2 lg:text-left">
                <div class="flex justify-center lg:justify-start">
                    <p class="px-3 py-1 text-white capitalize bg-black rounded-full w-fit">{{ $item->kategori->nama_kategori }}</p>
                </div>
                <h1 class="text-2xl font-semibold tracking-wider">{{ $item->judul }}</h1>
                <small class="text-gray-600">{{ $item->tanggal_publish }}</small>
                <p class="text-gray-600">{{ $item->konten }}</p>
                <div>
                    <a href="#" class="px-3 py-1 border rounded-full">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="grid grid-cols-1 gap-4 mt-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach($artikel as $item)
            <div class="p-4 border rounded-lg shadow-sm bg-base-100">
                <img src="{{ $item->gambar_artikel ? asset('storage/artikel/' . $item->gambar_artikel) : asset('images/default-image.png') }}" alt="{{ $item->judul }}" class="object-cover w-full h-40 mb-2 rounded-md">
                <h2 class="mb-1 text-lg font-bold">{{ $item->judul }}</h2>
                <p class="mb-1 text-sm">Status: <span class="capitalize">{{ $item->status }}</span></p>
                <a href="/artikel/{{ $item->slug }}/detail" class="text-blue-500 hover:underline">Detail</a>
            </div>
        @endforeach
    </div>
</div>
