<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <table class="table-auto w-full border py-5 px-4 mt-4">
                    <thead>
                        <tr class="bg-blue-400">
                            <th class="border-black">UUID</th>
                            <th class="border-black">Tempat</th>
                            <th class="border-black">Total Transaksi</th>
                            <th class="border-black">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaksi as $item)
                            <tr class="bg-transparent">
                                <td class="border-black">{{$item->uuid}}</td>
                                <td class="border-black">{{$item->tempat->nama_tempat}}</td>
                                <td class="border-black">{{$item->total_transaksi}}</td>
                                <td class="border-black">
                                    <a 
                                        href="#detailModal"
                                        data-remote="{{route('transaksi.show', [$item->id])}}"
                                        data-toggle="modal"
                                        data-target="#detailModal"
                                        2>
                                    </a>
                                    <a href="{{route('transaksi.edit', $item->id)}}">Edit</a>
                                    <form action="{{route('transaksi.destroy', $item->id)}}" method="POST" class="inline-block">
                                    @csrf
                                    @method('delete')
                                    <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-transparent">
                                <td colspan="4" class="border-black text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
