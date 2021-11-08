<x-app-layout>
    <x-slot name='css'>
        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    </x-slot>


    <div class="py-12 mx-5">
        <div class="max-w-7xl mx-auto">
            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 max-w-2xl px-4 py-3 mb-5" role="alert">
                <p class="font-bold">Információ</p>
                <p class="text-sm">Alapértelmezett lakhely beállítása kötelező! Később a beállításokban megváltoztatható.</p>
            </div>
        </div>
        <div class="w-full max-w-7xl mx-auto py-1 mb-5">
            <h1 class="inline-block relative text-blue-800 text-xl tracking-wide font-bold form-header">Alapértelmezett lakhely</h1>
        </div>
        <form class="w-full max-w-7xl mx-auto py-1" action="{{route('address_set.store')}}" method="post">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="zip_code">
                        Irányítószám
                    </label>
                    <input name="zip_code" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="zip_code" type="text" placeholder="1021">
                    <!--<p class="text-red-500 text-xs italic"></p>-->
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="city">
                        Város
                    </label>
                    <input name="city" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="city" type="text" placeholder="Budapest">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="address">
                        Cím
                    </label>
                    <input name="address" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="address" type="text" placeholder="Kossuth Lajos u. 8/C">
                    <!--<p class="text-gray-600 text-xs italic"></p>-->
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="street_number">
                        Házszám
                    </label>
                    <input name="street_number" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="street_number" type="text" placeholder="22/B">
                </div>
            </div>
            <div class="flex items-center justify-end">
                <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" value="Mentés" type="submit"/>
            </div>
        </form>
    </div>
</x-app-layout>
