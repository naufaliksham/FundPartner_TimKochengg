@extends('mitra.layout_mitra')
@section('content')
   

        <!--Project Details Top-->
            <section class="about_one">
                <div class="card">
                    <div class="card-body">
                <div id="form" style="margin-top: 10px">
                    <form action="{{ url('store_umkm') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            {{-- {{ Auth::user()->id }} --}}
                            <input type="hidden" id="id_mitra" name="id_mitra" value="{{ Auth::user()->id }}">
                            {{-- <input type="hidden" id="id_mitra" name="id_mitra" value="1"> --}}
                            <label for="nama_usaha" class="form-label input-runded"> Nama Usaha </label>
                            <input type="text" class="form-control Background" name="nama_usaha">
                            @error('nama_usaha')
                                <div id="nama_usahaHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label input-runded"> Deskripsi Usaha</label>
                            <input type="text" class="form-control Background" name="deskripsi">
                            @error('deskripsi')
                            <div id="deskripsiHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="dana" class="form-label input-runded"> Dana yang dibutuhkan</label>
                            <input type="text" class="form-control Background" name="dana">
                            @error('dana')
                            <div id="danaHelp" class="form-text">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="mb-3">
                            <label for="gambar" class="form-label input-runded"> Gambar </label>
                            <input type="file" class="form-control Background" name="gambar">
                            @error('gambar')
                            <div id="gambarHelp" class="form-file">{{ $message }}</div>
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
