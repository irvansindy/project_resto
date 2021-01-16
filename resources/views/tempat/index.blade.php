<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tempat Meja') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <a href="{{route('tempat.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Tambah Tempat (Meja)
                </a>

                <table class="table-auto w-full border py-5 px-4 mt-4">
                    <thead>
                        <tr class="bg-blue-400">
                            <th class="border-black">ID</th>
                            <th class="border-black">Nama Tempat</th>
                            <th class="border-black">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tempat as $item)
                            <tr class="bg-transparent">
                                <td class="border-black">{{$item->id}}</td>
                                <td class="border-black">{{$item->nama_tempat}}</td>
                                <td class="border-black">
                                    <a href="{{route('tempat.edit', $item->id)}}">Edit</a>
                                    <form action="{{route('tempat.destroy', $item->id)}}" method="POST" class="inline-block">
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