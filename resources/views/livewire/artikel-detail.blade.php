<div>
    <div class="container mx-auto">
        <div class="p-4 shadow-sm card bg-base-100">
            <div class="flex justify-end">
                <a href="{{ route('artikel') }}" wire:navigate class="mb-4 capitalize btn btn-sm btn-primary">Kembali</a>
            </div>
            {{-- gambar artikel --}}
            <img src="{{ $artikel->gambar_artikel ? asset('storage/artikel/' . $artikel->gambar_artikel) : asset('images/default-image.png') }}" alt="{{ $artikel->judul }}" class="object-cover w-full aspect-videorounded-lg">
            <h1 class="mb-4 text-2xl font-bold">Judul : {{ $artikel->judul }}</h1>
            <p>Kategori : {{ $artikel->kategori->nama_kategori }}</p>
            <p>Status : {{ $artikel->status }}</p>
            <p>Tanggal Publish : {{ $artikel->status == 'published' ? $artikel->tanggal_publish : '-' }}</p>
            <div class="mt-5">
                <p>Konten :</p>
                <p class="text-justify">{{ $artikel->konten }}</p>
            </div>
        </div>
    </div>
</div>
