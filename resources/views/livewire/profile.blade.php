<form  wire:submit="store" class="w-full bg-white border border-gray-200 rounded-lg shadow p-5">
    <div class="border-b border-gray-900/10">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Informações Pessoais</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Use um email válido e que você tenha acesso e preencha ao menos uma rede social para entrarem em contato com você.</p>
        <div class="mt-5 mb-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
                <div class="mt-2">
                    <input type="text" wire:model="name" placeholder="antonio" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 pl-[14px] pr-[14px] focus:ring-2 focus:ring-inset @error('name') focus:ring-red-600 ring-red-300  @else focus:ring-indigo-600 ring-gray-300 @enderror sm:text-sm sm:leading-6">
                </div>
                @error('name') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                <div class="mt-2">
                    <input type="text" wire:model="email" disabled placeholder="antonio@gmail.com" class="block w-full rounded-md border-1 py-1.5 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-pink-500 invalid:text-pink-600 focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
                </div>
            </div>
        </div>
        <div class="mt-5 mb-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-6 text-gray-900">Whatsapp (número corrido)</label>
                <div class="mt-2">
                    <input type="text" wire:model="phone" placeholder="55999989796" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 pl-[14px] pr-[14px] focus:ring-2 focus:ring-inset @error('phone') focus:ring-red-600 ring-red-300  @else focus:ring-indigo-600 ring-gray-300 @enderror sm:text-sm sm:leading-6">
                </div>
                @error('phone') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-6 text-gray-900">CPF (número corrido)</label>
                <div class="mt-2">
                    <input type="text" wire:model="registration_physical_person" placeholder="12345612345" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 pl-[14px] pr-[14px] focus:ring-2 focus:ring-inset @error('registration_physical_person') focus:ring-red-600 ring-red-300  @else focus:ring-indigo-600 ring-gray-300 @enderror sm:text-sm sm:leading-6">
                </div>
                @error('registration_physical_person') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
            </div>
        </div>
    </div>
    <div class="mt-4 flex items-center justify-center gap-x-6">
        <button type="submit" class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Atualizar</button>
    </div>
</form>
