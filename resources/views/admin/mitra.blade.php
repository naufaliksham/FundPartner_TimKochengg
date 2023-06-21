@extends('admin.app')

@section('admin')

<div class="max-w-4xl mx-auto px-4">
    <h2 class="text-xl font-semibold mt-8">Daftar Pengguna Mitra UMKM</h2>
    <div class="mx-auto mt-4">
        <table class="w-full mx-auto bg-gray-800 rounded-lg overflow-hidden text-white">
            <thead class="bg-gray-700">
                <tr>
                    <th class="py-2 px-4">No.</th>
                    <th class="py-2 px-4">Nama</th>
                    <th class="py-2 px-4">Email</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @foreach ($mitraUmkmUsers as $index => $user)
                <tr>
                    <td class="py-2 px-4"><center>{{ $index + 1 }}</center></td>
                    <td class="py-2 px-4"><center>{{ $user->name }}</center></td>
                    <td class="py-2 px-4"><center>{{ $user->email }}</center></td>
                    <td class="py-2 px-4"><center>Rp{{ $user->saldo }}</center></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Paginasi untuk Pengguna Mitra UMKM -->
    <div class="mt-4">
        {{ $mitraUmkmUsers->links() }}
    </div>
</div>

@endsection
