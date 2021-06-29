<x-app-layout>
  <x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Transaksi Detail') }}
		</h2>
	</x-slot>
  
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
        {{-- <div class="grid grid-flow-col grid-cols-3 grid-rows-3 gap-4"></div> --}}
        <div class="w-full md:w-1/6 px-4 mb-4 md:mb-0">
          {{-- <img class="float-left inline-block h-20 w-30 rounded" src="{{asset('storage/'.$item->foto)}}"> --}}
        </div>
        <div class="w-full md:w-5/6 px-4 mb-4 md:mb-0">
          <div class="flex flex-wrap mb-3">
            <div class="w-2/6">
              <div class="text-sm">Product Name</div>
              <div class="text-xl font-bold">
                {{$item->id_produk}}
              </div>
            </div>
            <div class="w-1/6">
              <div class="text-sm">Quantity</div>
              <div class="text-xl font-bold">{{number_format(50000)}}</div>
            </div>
            <div class="w-1/6">
              <div class="text-sm">Total</div>
              <div class="text-xl font-bold">{{number_format(50000)}}</div>
            </div>
            <div class="w-1/6">
              <div class="text-sm">Status</div>
              <div class="text-xl font-bold">Isi status</div>
            </div>
          </div>
          <div class="flex flex-wrap mb-3">
            <div class="w-2/6">
              <div class="text-sm">User Name</div>
              <div class="text-xl font-bold">nama User</div>
            </div>
            <div class="w-3/6">
              <div class="text-sm">Email</div>
              <div class="text-xl font-bold">{{number_format(50000)}}</div>
            </div>
            <div class="w-1/6">
              <div class="text-sm">Meja</div>
              <div class="text-xl font-bold">{{number_format(50000)}}</div>
            </div>
          </div>
          <div class="flex flex-wrap mb-3">
            <div class="w-5/6">
              <div class="text-sm">Link Payment Gateway</div>
              <div class="text-xl font-bold">ISI LINKNYA</div>
            </div>
            <div class="w-1/6">
              <div class="text-sm">Ganti status</div>
              <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-2 rounded block text-center w-full mb-1">
                button change status
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</x-app-layout>