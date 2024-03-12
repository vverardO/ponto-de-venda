<form  wire:submit="store" class="w-full bg-white border border-gray-200 rounded-lg shadow p-5">
    <div class="border-b border-gray-900/10">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Informações do Produto</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Insira o nome e o preço do produto.</p>
        <div class="mt-5 mb-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
                <div class="mt-2">
                    <input type="text" wire:model="name" placeholder="Coca cola 2l" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 pl-[14px] pr-[14px] focus:ring-2 focus:ring-inset @error('name') focus:ring-red-600 ring-red-300  @else focus:ring-indigo-600 ring-gray-300 @enderror sm:text-sm sm:leading-6">
                </div>
                @error('name') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-6 text-gray-900">Preço</label>
                <div class="mt-2">
                    <input type="text" wire:model="price" placeholder="10,00" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 pl-[14px] pr-[14px] focus:ring-2 focus:ring-inset @error('price') focus:ring-red-600 ring-red-300  @else focus:ring-indigo-600 ring-gray-300 @enderror sm:text-sm sm:leading-6">
                </div>
                @error('price') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
            </div>
        </div>
    </div>
    <div class="mt-4 flex items-center justify-center gap-x-6">
        <button type="submit" class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Atualizar</button>
    </div>
</form>
