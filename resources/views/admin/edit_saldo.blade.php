@extends('admin.app')

@section('admin')

<div class="max-w-4xl mx-auto px-4">
    <h2 class="text-xl font-semibold mt-8">Edit Saldo Investor</h2>
    <div class="mt-4">
        <form action="{{ route('updateInvestorSaldo', $investorUser->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="saldo" class="block text-gray-200">Saldo:</label>
                <input type="number" name="saldo" id="saldo" class="bg-gray-800 rounded-md py-2 px-3 w-full text-gray-200" value="{{ number_format($investorUser->saldo, 0, '.', '') }}">
            </div>
            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded-md py-2 px-4">Simpan</button>
                <a href="{{ route('investorAdmin') }}" class="bg-gray-500 hover:bg-gray-600 text-white rounded-md py-2 px-4">Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection
