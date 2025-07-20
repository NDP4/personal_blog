<div>
    <div class="container mx-auto">
        <div class="p-5 rounded-sm shadow-sm card bg-base-100">
            <div class="flex justify-end">
                <x-button-kembali route="artikel"/>
            </div>
            <div>
                <form class="space-y-5" wire:submit.prevent="handleSubmit">
                    <div class="flex flex-col space-y-1">
                        <label for="gambar" class="label">Gambar</label>
                        <input type="file" class="w-full input" wire:model="gambar_artikel" />

                    </div>
                    <div class="flex flex-col space-y-1">
                        <label for="judul" class="label">Judul</label>
                        <input type="text" class="w-full input" wire:model="judul" />
                        @error('judul')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col mt-3 space-y-1">
                        <label for="kategori" class="label">Kategori</label>
                        <select class="w-full input" wire:model="kategori_id">
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col mt-3 space-y-1">
                        <label for="status" class="label">Status</label>
                        <select class="w-full input" wire:model="status">
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                        </select>
                        @error('status')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col mt-3 space-y-1">
                        <label for="konten" class="label">Konten</label>
                        <textarea class="w-full textarea" cols="30" rows="10" wire:model="konten"></textarea>
                        @error('konten')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex justify-end mt-5">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
