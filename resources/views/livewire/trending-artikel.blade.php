<div class="space-y-10">
    <div class="text-center lg:text-left">
        <h1 class="tittle">Trending Artikel</h1>
    </div>
    <div class="space-y-5">
        @foreach ($artikel as $item)
            <div class="grid grid-cols-3 gap-5">
                <div class="relative w-full h-full col-span-3 lg:h-24 lg:col-span-1 bg-slate-200 rounded-xl">
                    <div class="absolute flex items-center justify-center w-8 h-8 bg-black rounded-full -top-4 -left-4">
                        <i class="text-white fa-solid fa-bolt-lightning"></i>
                    </div>
                    <img src="{{ asset('storage/artikel/' . $item->gambar_artikel) ?: asset('images/default-image.png') }}" alt="{{ $item->judul }}}" class="object-cover w-full h-full shadow-md rounded-xl">
                </div>
                <div class="col-span-3 text-center lg:col-span-2 lg:text-left">
                    <h1 class="font-semibold">{{ $item->judul }}</h1>
                    <p class="text-gray-600">{{ $item->tanggal_publish }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
