<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <form action="{{route('tempat.update', $tempat->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <p class="mt-1 text-xl text-gray-600">
                        Form Ubah Tempat Meja
                    </p>
                    <div class="mx-5 my-5">
                        <div class="my-5">
                            <x-jet-label for="nama_tempat" value="{{ __('Nama Tempat') }}" />
                            <x-jet-input id="nama_tempat" class="block mt-1 w-full" type="text" name="nama_tempat" :value="old('nama_tempat')" value="{{$tempat->nama_tempat}}" required autofocus />
                        </div>
                        <div class="my-5">
                            <x-jet-label for="qr_code" value="{{ __('QR Code') }}" />
                            <x-jet-input id="qr_code" class="block mt-1 w-full" type="text" name="qr_code" :value="old('qr_code')" value="{{$tempat->qr_code}}" required/>
                        </div>
                        <div class="my-5">
                            <x-jet-button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="submit">
                                {{ __('Ubah') }}
                            </x-jet-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>