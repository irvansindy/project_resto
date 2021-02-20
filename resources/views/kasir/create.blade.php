<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kasir') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <form action="{{route('kasir.store')}}" method="post">
                    @csrf
                    <p class="mt-1 text-xl text-gray-600">
                        Form Tambah Kasir
                    </p>
                    <div class="mx-5 my-5">
                        <div class="my-5">
                            <x-jet-label for="nama_kasir" value="{{ __('Nama Kasir') }}" />
                            <x-jet-input id="nama_kasir" class="block mt-1 w-full" type="text" name="nama_kasir" :value="old('nama_kasir')" required autofocus />
                        </div>
                        <div class="my-5">
                            <div class="grids-row-4">
                                <x-jet-button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <a href="{{route('kasir.index')}}">
                                        {{ __('Batal') }}
                                    </a>					
                                </x-jet-button>
                                <x-jet-button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="submit">
                                    {{ __('Simpan') }}
                                </x-jet-button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </x-app-layout>
  