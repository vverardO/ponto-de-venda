<div>
    <div class="mb-4 flex flex-row">
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Digite o nome do produto" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ring-gray-300 lg:text-lg lg:leading-6">
    </div>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-4">
        @forelse($products as $product)
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow relative">
            <div class="flex flex-col items-center p-10">
                <img class="w-24 h-24" src="{{asset($product->image)}}" alt="product image"/>
                <h5 class="mb-2 text-xl font-medium text-gray-900">{{$product->name}}</h5>
                <span class="text-sm text-gray-500 dark:text-gray-400">R$ {{$product->price_formatted}}</span>
            </div>
        </div>
        @empty
        <div class="col-span-4">
            <blockquote class="text-center text-xl font-semibold leading-8 text-gray-900 sm:text-2xl sm:leading-9">
                <p>Nenhum produto disponível no momento.</p>
            </blockquote>
        </div>
        @endforelse
    </div>
</div>
