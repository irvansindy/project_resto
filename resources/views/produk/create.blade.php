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
					@method('POST')
					<div class="mt-10 sm:mt-0">
						<div class="md:grid md:grid-cols-3 md:gap-6">
							<div class="md:col-span-1">
								<div class="px-4 sm:px-0">
									<h3 class="text-lg font-medium leading-6 text-gray-900">Input Produk</h3>
									{{-- <p class="mt-1 text-sm text-gray-600">
										Use a permanent address where you can receive mail.
									</p> --}}
								</div>
							</div>
							<div class="mt-5 md:mt-0 md:col-span-2">
								<form action="#" method="POST" enctype="multipart/form-data">
									<div class="shadow overflow-hidden sm:rounded-md">
										<div class="px-4 py-5 bg-gray-100 sm:p-6">
											<div class="grid grid-cols-6 gap-6">
												<div class="col-span-6 sm:col-span-3">
													<label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Poduk</label>
													<input type="text" name="nama_produk" id="nama_produk" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-black-300 rounded-md">
													@error('nama_produk')
															<p>{{$message}}</p>
													@enderror
												</div>
												
												<div class="col-span-6 sm:col-span-4">
													<label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
													<textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
													@error('deskripsi')
															<p>{{$message}}</p>
													@enderror
												</div>

												<div class="col-span-6 sm:col-span-4">
														<label class="block text-sm font-medium text-gray-700">
															Foto
														</label>
														<input type="file" name="foto" id="foto" autocomplete="foto" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
														@error('foto')
															<p>{{$message}}</p>
													@enderror
													</div>
					
												<div class="col-span-6 sm:col-span-4">
													<label for="jenis" class="block text-sm font-medium text-gray-700">Jenis Produk</label>
													<input type="text" name="jenis" id="jenis" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
													@error('jenis')
															<p>{{$message}}</p>
													@enderror
												</div>
												
												<div class="col-span-6 sm:col-span-4">
													<label for="harga" class="block text-sm font-medium text-gray-700">Harga Produk</label>
													<input type="text" name="harga" id="harga" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
													@error('harga')
															<p>{{$message}}</p>
													@enderror
												</div>
												
												<div class="col-span-6 sm:col-span-4">
													<label for="qty" class="block text-sm font-medium text-gray-700">Qty Produk</label>
													<input type="text" name="qty" id="qty" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
													@error('qty')
															<p>{{$message}}</p>
													@enderror
												</div>
					
											</div>
										</div>
										<div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
											<button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
												Save
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</x-app-layout>
