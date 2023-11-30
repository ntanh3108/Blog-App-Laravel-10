<div class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div class="text-gray-600 flex gap-2">
            {{-- Neu co chon category hoac la dang tim kiem se xuat hien dau X de reset --}}
            @if ($this->activeCategory || $search)
                <button class='gray-500 text-xs mr-3' wire:click='clearFilters()'>X</button>
            @endif
            @if ($this->activeCategory)
            <x-badge wire:navigate href="{{route('post.index', ['category' => $this->activeCategory->slug])}}"
                :textColor='$this->activeCategory->text_color' :bgColor='$this->activeCategory->bg_color'>
                {{ $this->activeCategory->title }}
            </x-badge>
            @endif
            @if ($search)
                Containing: <p style="font-weight: bold">{{ $search }}</p>
            @endif
        </div>
        <div class="flex items-center space-x-4 font-light ">
            <button class="{{ $sort === 'desc' ? 'text-gray-900 font-semibold py-4 border-b border-gray-700' : 'text-gray-500 py-4' }}"
                wire:click="setSort('desc')">Latest</button>
            <button class="{{ $sort === 'asc' ? 'text-gray-900 font-semibold py-4 border-b border-gray-700' : 'text-gray-500 py-4' }}"
                wire:click="setSort('asc')">Oldest</button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->posts as $post)
            <x-posts.post-item :post="$post" />
        @endforeach
    </div>

    <div class="my-3">
        {{ $this->posts->onEachSide(1)->links() }}
    </div>
</div>
