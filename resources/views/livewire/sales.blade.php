<div class="mt-5">
    <div class="mb-4 flex flex-row">
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Pequise por produto" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ring-gray-300 lg:text-lg lg:leading-6">
    </div>
    @forelse($sales as $sale)
        <a class="bg-white rounded-lg flex-row p-3 mb-3 flex justify-between hover:border-2 hover:cursor-pointer" wire:navigate href="{{route('show-sale', ['sale' => $sale])}}">
            <div class="hidden shrink-0 self-center sm:flex sm:flex-col sm:items-end">
                <p class="text-sm leading-6 text-green-500"><strong>R$ {{$sale->total_amount_formatted}}</strong></p>
            </div>
            <div class="hidden shrink-0 self-center sm:flex sm:flex-col sm:items-end">
                <p class="text-sm leading-6 text-gray-900"><strong>{{$sale->products->count()}} produtos</strong></p>
            </div>
            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                <p class="text-sm leading-6 text-gray-900"><strong>{{$sale->user->name}}</strong></p>
                <p class="mt-1 text-xs leading-5 text-gray-500">{{$sale->created_at->format('Y/m/d H:i:s')}}</p>
            </div>
        </a>
    @empty
    @endforelse
</div>