<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Produk') }}
    </h2>
  </x-slot>

  <div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
				<form action="{{route('produk.store')}}" method="post" enctype="multipart/form-data">
					@csrf
						<p class="mt-1 text-xl text-gray-600">
								Form Tambah Produk
						</p>
						<div class="mx-5 my-5">
							<div class="my-5">
								<x-jet-label for="nama_produk" value="{{ __('Nama Produk') }}" />
								<x-jet-input id="nama_produk" class="block mt-1 w-full" type="text" name="nama_produk" :value="old('nama_produk')" required autofocus />
								@error('nama_produk')
									<p>{{$message}}</p>
								@enderror
							</div>
							<div class="my-5">
								<x-jet-label for="deskripsi" value="{{ __('Deskripsi') }}" />
								<textarea name="deskripsi" class="form-input rounded-md shadow-sm block mt-1 w-full resize-none" id="deskripsi" cols="30" rows="10" :value="old('deskripsi')"></textarea>
								@error('deskripsi')
									<p>{{$message}}</p>
								@enderror
							</div>
							<div class="my-5">
								<x-jet-label for="jenis" value="{{ __('Jenis Produk') }}" />
								{{-- <x-jet-input id="jenis" class="block mt-1 w-full" type="text" name="jenis" :value="old('jenis')" required /> --}}
								<select name="jenis" class="form-input rounded-md shadow-sm block mt-1 w-full" id="jenis">
									<option hidden>Pilih Jenis Produk</option>
									<option value="">Makanan</option>
									<option value="">Minuman</option>
									<option value="">Cemilan</option>
								</select>
								@error('jenis')
									<p>{{$message}}</p>
								@enderror
							</div>
							<div class="my-5">
								<x-jet-label for="harga" value="{{ __('Harga Produk') }}" />
								<x-jet-input id="harga" class="block mt-1 w-full" type="text" name="harga" :value="old('harga')" required />
								@error('harga')
									<p>{{$message}}</p>
								@enderror
							</div>
							<div class="my-5">
								<x-jet-label for="qty" value="{{ __('Qty Produk') }}" />
								<x-jet-input id="qty" class="block mt-1 w-full" type="text" name="qty" :value="old('qty')" required />
								@error('qty')
									<p>{{$message}}</p>
								@enderror
							</div>
							<div class="my-5">
								<div class="grid-rows-4">
									<x-jet-button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
										<a href="{{route('produk.index')}}">
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
