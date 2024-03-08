<div class="w-[100vw] h-[100vh] flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="bg-white p-8 rounded-md shadow-md sm:mx-auto sm:w-full sm:max-w-sm">
        <div class="m-2">
            <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Seja bem vindo!</h2>
            <p class="text-center leading-7 text-slate-600">Acesse com o seu email e senha.</p>
        </div>
        <form class="space-y-6" wire:submit="login">
            <div>
                <label class="block text-sm font-medium leading-6 text-gray-900">Email de acesso</label>
                <div class="mt-2">
                    <input type="text" wire:model="email" autofocus placeholder="antonio@gmail.com" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 pl-[14px] pr-[14px] focus:ring-2 focus:ring-inset @error('email') focus:ring-red-600 ring-red-300 @else focus:ring-indigo-600 ring-gray-300 @enderror sm:text-sm sm:leading-6">
                </div>
                @error('email') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium leading-6 text-gray-900">Senha</label>
                <div class="mt-2">
                    <input type="password" wire:model="password" placeholder="*********" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 pl-[14px] pr-[14px] focus:ring-2 focus:ring-inset @error('password') focus:ring-red-600 ring-red-300 @else focus:ring-indigo-600 ring-gray-300 @enderror sm:text-sm sm:leading-6">
                </div>
                @error('password') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
            </div>
            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Acessar</button>
            </div>
        </form>
        @if(config('app.env') == 'local')
        <hr class="mt-5">
        <div class="mt-5">
            <button wire:click="loginAsManager" class="flex w-full mt-2 justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Gerente</button>
            <button wire:click="loginAsCashier" class="flex w-full mt-2 justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Caixa</button>
        </div>
        @endif
    </div>
</div>
