@extends('mitra.layout_mitra')
@section('content')
   

        <!--Project Details Top-->
            <section class="about_one">
                <div class="card">
                    <div class="card-body" style="margin-left: 2%" style="margin-right: 2%">
                <div id="form" style="margin-top: 10px">
                    <form action="{{ url('store_umkm') }}" method="post" enctype="multipart/form-data" >
                        {{ csrf_field() }}
                        <h1>Form UMKM</h1>
                        <div class="mb-3">
                            {{-- {{ Auth::user()->id }} --}}
                            <input type="hidden" id="id_mitra" name="id_mitra" value="{{ Auth::user()->id }}">
                            {{-- <input type="hidden" id="id_mitra" name="id_mitra" value="1"> --}}
                            <label for="nama_usaha" class="form-label input-runded"> Nama Usaha </label>
                            <input type="text" class="form-control Background" name="nama_usaha" value="{{ old('nama_usaha') }}">
                            @error('nama_usaha')
                                <div id="nama_usahaHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="dana" class="form-label input-runded"> Dana yang dibutuhkan</label>
                            <input type="text" class="form-control Background" name="dana" placeholder="5000000" value="{{ old('dana') }}">
                            @error('dana')
                            <div id="danaHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        
                        <div class="mb-3">
                            <label for="waktu" class="form-label input-runded"> Waktu pelunasan</label>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="waktu">
                                <option selected disabled>Pilih</option>
                                <option value="4"> 4 Minggu dari pendanaan</option>
                                <option value="12"> 12 Minggu dari pendanaan</option>
                                <option value="24"> 24 Minggu dari pendanaan</option>
                                <option value="54"> 54 Minggu dari pendanaan</option>
                                <option value="108"> 108 Minggu dari pendanaan</option>
                            </select>
                            @error('waktu')
                            <div id="waktuHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="pembayaran" class="form-label input-runded"> Opsi Pembayaran</label>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="pembayaran">
                                <option selected disabled>Pilih</option>
                                <option value="lunas"> Dibayar langsung lunas</option>
                                <option value="dicicil"> Dicicil tiap minggu</option>
                            </select>
                            @error('pembayaran')
                            <div id="pembayaranHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        {{-- <div class="mb-3">
                            <label for="pembayaran" class="form-label input-runded"> Opsi pembayaran</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Dibayar langsung lunas" id="Dibayar langsung lunas" value="Dibayar langsung lunas">
                                <label class="form-check-label" for="Dibayar langsung lunas">
                                    Dibayar langsung lunas
                                </label>
                            </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="Dicicil setiap minggu" id="Dicicil setiap minggu" value="Dicicil setiap minggu">
                                <label class="form-check-label" for="Dicicil setiap minggu">
                                  Dicicil setiap minggu
                                </label>
                            </div>
                            @error('pembayaran')
                            <div id="pembayaranHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        
                        <div class="mb-3">
                            <label for="gambar" class="form-label input-runded"> Gambar </label>
                            <input type="file" class="form-control Background" name="gambar">
                            @error('gambar')
                            <div id="gambarHelp" class="form-file">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label input-runded"> Deskripsi Usaha</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4" cols="50">{{ old('deskripsi') }}</textarea>
                        
                            {{-- <input type="text" class="form-control Background" name="deskripsi" value="{{ old('deskripsi') }}"> --}}
                            @error('deskripsi')
                            <div id="deskripsiHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    
    
</div>
    </div>

@endsection
