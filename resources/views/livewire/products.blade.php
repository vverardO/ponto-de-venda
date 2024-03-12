<div class="mt-5">
    <div class="mb-4 flex flex-row">
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Pequise por nome" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ring-gray-300 lg:text-lg lg:leading-6">
        <a href="{{route('product-create')}}" wire:navigate class="ml-3 px-4 py-2 text-sm font-medium text-center text-white bg-emerald-700 rounded-lg hover:bg-emerald-800 focus:outline-none dark:bg-emerald-600 dark:hover:bg-emerald-700">+</a>
    </div>
    @forelse($products as $product)
        <a class="bg-white rounded-lg flex-row p-3 mb-3 flex justify-between hover:border-2 hover:cursor-pointer" wire:navigate href="{{route('product-update', ['product' => $product])}}">
            <div class="hidden shrink-0 self-center sm:flex sm:flex-col sm:items-end">
                <p class="text-sm leading-6 text-gray-900"><strong>{{$product->name}}</strong></p>
            </div>
            <div class="hidden shrink-0 self-center sm:flex sm:flex-col sm:items-end">
                <p class="text-sm leading-6 text-gray-900"><strong>R$ {{$product->price_formatted}}</strong></p>
            </div>
        </a>
    @empty
    @endforelse
</div>