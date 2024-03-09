<div>
    <div class="mb-4 flex flex-row">
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Digite o nome do produto" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ring-gray-300 lg:text-lg lg:leading-6">
    </div>
    @if($cart->isNotEmpty())
    <div class="mb-4 flex items-center justify-between">
        <span class="ml-5"><strong>{{$cart->sum('quantity')}} Itens</strong></span>
        <span class="mr-5"><strong>Total: R$ {{number_format($cart->sum('price') / 100, 2, ',', '.')}}</strong></span>
        <button wire:click="$dispatch('finish-cart')" class="ml-3 px-4 py-2 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-yellow-800 focus:outline-none dark:bg-yellow-600 dark:hover:bg-yellow-700">Fechar</button>
        <button wire:click="$dispatch('close-cart')" class="ml-3 px-4 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:outline-none dark:bg-red-600 dark:hover:bg-red-700">Limpar</button>
    </div>
    @endif
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-4">
        @forelse($products as $product)
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow relative">
            @if($cart->keys()->contains($product->id))
                <div class="absolute top-0 mt-5 right-0 mr-5 bg-gray-300 border border-gray-700 rounded-full px-4 py-2"><strong>{{$cart->get($product->id)["quantity"]}}</strong></div>
            @endif
            <div class="flex flex-col items-center p-10">
                <img class="w-24 h-24" src="{{asset($product->image)}}" alt="product image"/>
                <h5 class="mb-2 text-xl font-medium text-gray-900">{{$product->name}}</h5>
                <span class="text-sm text-gray-500 dark:text-gray-400">R$ {{$product->price_formatted}}</span>
                <div class="flex mt-4 space-x-3 lg:mt-6">
                    @if($cart->keys()->contains($product->id))
                    <button wire:click="$dispatch('increment-quantity', {product: {{$product}}})" class="ml-3 px-4 py-2 text-sm font-medium text-center text-white bg-emerald-700 rounded-lg hover:bg-emerald-800 focus:outline-none dark:bg-emerald-600 dark:hover:bg-emerald-700">+ 1</button>
                    <button wire:click="$dispatch('remove-from-cart', {product: {{$product}}})" class="ml-3 px-4 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:outline-none dark:bg-red-600 dark:hover:bg-red-700">x</button>
                    @else
                    <button wire:click="$dispatch('push-to-cart', {product: {{$product}}})" class="ml-3 px-4 py-2 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:outline-none dark:bg-indigo-600 dark:hover:bg-indigo-700">+</button>
                    @endif
                </div>
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
