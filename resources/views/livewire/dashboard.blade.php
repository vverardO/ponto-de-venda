<div class="grid grid-cols-12 gap-6 mt-5">
    <a class="transform hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white" href="#">
        <div class="p-5">
            <div class="flex justify-between">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
            <div class="ml-2 w-full flex-1">
                <div>
                    <div class="mt-3 text-3xl font-bold leading-8">{{$yesterdayTotalSales}}</div>
                    <div class="mt-1 text-base text-gray-600">Vendas - Ontem</div>
                </div>
            </div>
        </div>
    </a>
    <a class="transform hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white" href="#">
        <div class="p-5">
            <div class="flex justify-between">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <div class="bg-green-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                    <span class="flex items-center">{{$todayPercentageByQuantity}} %</span>
                </div>
            </div>
            <div class="ml-2 w-full flex-1">
                <div>
                    <div class="mt-3 text-3xl font-bold leading-8">{{$todayTotalSales}}</div>
                    <div class="mt-1 text-base text-gray-600">Vendas - Hoje</div>
                </div>
            </div>
        </div>
    </a>
    <a class="transform hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white" href="#">
        <div class="p-5">
            <div class="flex justify-between">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </div>
            <div class="ml-2 w-full flex-1">
                <div>
                    <div class="mt-3 text-3xl font-bold leading-8">R$ {{$yesterdayTotalSalesValue}}</div>
                    <div class="mt-1 text-base text-gray-600">Vendas - Ontem</div>
                </div>
            </div>
        </div>
    </a>
    <a class="transform hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white" href="#">
        <div class="p-5">
            <div class="flex justify-between">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                <div class="bg-green-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                    <span class="flex items-center">{{$todayPercentageByValue}} %</span>
                </div>
            </div>
            <div class="ml-2 w-full flex-1">
                <div>
                    <div class="mt-3 text-3xl font-bold leading-8">R$ {{$todayTotalSalesValue}}</div>
                    <div class="mt-1 text-base text-gray-600">Vendas - Hoje</div>
                </div>
            </div>
        </div>
    </a>
</div>