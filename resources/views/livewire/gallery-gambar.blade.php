<div class="grid grid-cols-6">
    {{-- <div class="absolute top-0 left-0 w-full h-full bg-black opacity-50"></div> --}}
    @foreach ($gambar as $item)
        <div>
            <img src="{{ asset('storage/artikel/' . $item->gambar_artikel) }}" class="object-cover h-full" alt="{{ $item->judul }}">
        </div>
    @endforeach
</div>
