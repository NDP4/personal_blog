<div class="">
    <div class="container space-y-5">
            <div class="grid grid-cols-2 mih-h-[70vh] place-items-center">
            <div class="col-span-2 py-8 lg:col-span-1 lg:px-5 space-y-7 lg:py-8">
                <div class="flex flex-col items-center justify-center gap-y-2 lg:justify-normal lg:items-start">
                    <div class="w-24 rounded-full bg-slate-300 aspect-square">
                        <img src="{{ asset('images/avatar.jpg') }}" alt="Avatar" class="object-cover w-full h-full rounded-full">
                    </div>
                    <h1><span class="text-gray-400 font-poppins">By</span> <span class="font-medium">john doe</span></h1>
                </div>
                <div class="flex flex-col items-center justify-center gap-y-2 lg:justify-normal lg:items-start">
                    <h1 class="font-medium lg:text-5xl lg:w-[30rem] text-3xl w-full text-center lg:text-left">
                        {{ $artikel ? $artikel->judul : 'No articles available' }}
                    </h1>
                    <small class="text-gray-600">
                        {{ $artikel ? $artikel->tanggal_publish : '' }}
                    </small>
                </div>
            </div>
            <div class="col-span-2 p-0 lg:col-span-1 lg:p-5">
                <img src="{{ asset('images/gambar1.jpg') }}" alt="Gambar 1" class="shadow-md rounded-xl">
            </div>
        </div>

        {{-- section artikel terbaru --}}
        <div class="grid grid-cols-12 lg:gap-10 gap-y-5">
            {{-- list artikel --}}
            <div class="col-span-12 lg:col-span-8">
                @livewire('list-artikel')
            </div>
            {{-- akhir list artikel --}}
            {{-- tranding artikel --}}
            <div class="col-span-12 lg:col-span-4">
                @livewire('trending-artikel')
            </div>
            {{-- akhir trending artikel --}}
        </div>
    </div>

    {{-- gallery gambar --}}
    <div class="pt-10 space-y-5">
        <div class="flex flex-col items-center justify-center gap-y-2">
            <h1 class="tittle">Gallery Gambar</h1>
            <p class="text-gray-600">Artikel berdasarkan gambar</p>
        </div>
        @livewire('gallery-gambar')
    </div>

    {{-- footer --}}
    <footer>
        <div class="container py-5 mx-auto mt-10 text-center">
            <p class="text-gray-600">© {{ date('Y') }} Personal Blog. All rights reserved.</p>
        </div>
    </footer>
</div>

