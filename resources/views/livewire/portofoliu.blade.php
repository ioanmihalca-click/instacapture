<div>
   <div>
    <h2 class="mb-4 text-2xl font-bold">Portfolio</h2>

    <form wire:submit.prevent="uploadImage" class="mb-8">
        <div class="mb-4">
            <label for="title" class="block mb-2">Title</label>
            <input type="text" id="title" wire:model="title" class="w-full px-3 py-2 border rounded">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block mb-2">Description</label>
            <textarea id="description" wire:model="description" class="w-full px-3 py-2 border rounded"></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="block mb-2">Image</label>
            <input type="file" id="image" wire:model="image" accept="image/*" class="w-full">
            @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">Upload</button>
    </form>

    @if (session()->has('message'))
        <div class="px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded">
            {{ session('message') }}
        </div>
    @endif

    <div class="grid grid-cols-3 gap-4">
        @foreach ($portfolioItems as $item)
            <div class="p-4 border rounded">
                <img src="{{ app(App\Services\CloudinaryService::class)->getImageUrl($item->image_public_id, ['width' => 300, 'height' => 200, 'crop' => 'fill']) }}" alt="{{ $item->title }}" class="object-cover w-full h-48 mb-2">
                <h3 class="font-bold">{{ $item->title }}</h3>
                <p>{{ $item->description }}</p>
            </div>
        @endforeach
    </div>
</div>
</div>
