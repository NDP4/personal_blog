<div class="">
    <div class="container p-5 mx-auto space-y-5 shadow-sm card bg-base-100 rounded-xl">
        <div class="flex justify-end">
            <a href="{{ route('artikel.create') }}" wire:navigate class="btn btn-primary">Tambah Artikel</a>
        </div>

        <table class="table">
            <thead class="bg-base-200">
                <tr>
                    <th>no</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Konten</th>
                    <th>Status</th>
                    <th>Tanggal Publish</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artikel as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->judul }}</td>
                        <td class="capitalize">{{ $item->kategori->nama_kategori }}</td>
                        <td>{!! Str::limit(is_array($item->konten) ? implode("\n\n", $item->konten) : strip_tags($item->konten), 100, '...') !!}</td>
                        <td>
                            <p class="{{ $item->status == 'draft' ? 'bg-red-500 text-red-100' : 'bg-green-500 text-green-100'}} capitalize text-center py-1 px-2 rounded-xl">{{ $item->status }}</p>
                        </td>
                        <td>
                           <p>{{ $item->status == 'published' ? $item->tanggal_publish : '-' }}</p>
                        </td>
                        <td>
                            <div class="dropdown">
                                <div tabindex="0" role="button" class="">Aksi</div>
                                <ul tabindex="0" class="p-2 shadow-sm dropdown-content menu bg-base-100 rounded-box z-1 w-52">
                                    <li><a href="/artikel/{{ $item->slug }}/detail" wire:navigate>Detail</a></li>
                                    <li><a href="/artikel/{{ $item->slug }}/edit" wire:navigate>Edit</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
