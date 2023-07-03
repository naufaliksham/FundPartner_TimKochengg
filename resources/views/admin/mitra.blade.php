@extends('admin.app')

@section('admin')

<div class="max-w-4xl mx-auto px-4">
    <h2 class="text-xl font-semibold mt-8">Daftar Pengguna Mitra UMKM</h2>
    <div class="mx-auto mt-4">
        <table class="w-full table-auto bg-gray-800 rounded-lg overflow-hidden text-white">
            <thead class="bg-gray-700">
                <tr>
                    <th class="py-2 px-4">No.</th>
                    <th class="py-2 px-4">Nama</th>
                    <th class="py-2 px-4">Email</th>
                    <th class="py-2 px-4">Saldo</th>
                    <th class="py-2 px-4">Foto</th>
                    <th class="py-2 px-4">KTP</th>
                    <th class="py-2 px-4">Validasi KTP</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @foreach ($mitraUmkmUsers as $index => $user)
                <tr>
                    <td class="py-2 px-4"><center>{{ $index + 1 }}</center></td>
                    <td class="py-2 px-4"><center>{{ $user->name }}</center></td>
                    <td class="py-2 px-4"><center>{{ $user->email }}</center></td>
                    <td class="py-2 px-4"><center>Rp{{ $user->saldo }}</center></td>
                    {{-- <td class="py-2 px-4">
                        <a href="{{ route('editInvestorSaldo', $user->id) }}" class="bg-gray-700 hover:bg-gray-900 text-white rounded-md py-1 px-4 shadow">Edit Saldo</a>
                    </td> --}}
                    <td>
                        <center>
                            @if (is_null($user->foto))
                                X
                            @else
                                <img id="myImg" src="{{ asset('storage/' . $user->foto) }}" style="max-width:60px" onclick="openModal('{{ asset('storage/' . $user->foto) }}')">
                            @endif
                        </center>
                    </td>
                    <td>
                        <center>
                            @if (is_null($user->ktp))
                                X
                            @else
                                <img id="myImg" src="{{ asset('storage/' . $user->ktp) }}" style="max-width:60px" onclick="openModal('{{ asset('storage/' . $user->ktp) }}')">
                            @endif
                        </center>
                    </td>
                    <td class="py-2 px-4">
                        @if (is_null($user->ktp))
                            <p><center>Belum upload</center></p>
                        @elseif ($user->validasi_ktp == "invalid")
                            {{-- <a href="{{ route('editInvestorSaldo', $user->id) }}" class="bg-gray-700 hover:bg-gray-900 text-white rounded-md py-1 px-4 shadow">Validasi</a> --}}
                            <form action="{{ route('validasiKtpMitra', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="bg-gray-700 hover:bg-gray-900 text-white rounded-md py-1 px-4 shadow">Validasi</button>
                            </form>                            
                        @else
                            <p><center>Sudah valid</center></p>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $mitraUmkmUsers->links() }}
    </div>
</div>

<div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
</div>

<script>
function openModal(imageUrl) {
  var modal = document.getElementById("myModal");
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");
  
  modal.style.display = "block";
  modalImg.src = imageUrl;
  captionText.innerHTML = "Pastikan KTP dan Foto Profil sama";
}

function closeModal() {
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
}
</script>

@endsection
