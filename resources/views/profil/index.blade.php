<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<style>#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {
    opacity: 0.7;
}

/* The Modal (background) */
.modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    padding-top: 100px;
    /* Location of the box */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.9);
    /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content,
#caption {
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {
        -webkit-transform: scale(0)
    }

    to {
        -webkit-transform: scale(1)
    }
}

@keyframes zoom {
    from {
        transform: scale(0)
    }

    to {
        transform: scale(1)
    }
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px) {
    .modal-content {
        width: 100%;
    }
}</style></head>
<body>
    <div class="bg-gray-100 min-h-screen">
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-8">
                <h2 class="text-center text-5xl font-bold mb-5">Halaman Profil</h2>
                <div class="mb-4">
                    @if ($user->foto)
                    {{-- <label class="text-gray-700"><center>Foto</center></label> --}}
                    <center><img src="{{ asset('storage/' . $user->foto) }}" class="rounded" alt="Foto" style="width:50%;max-width:200px"></center>
                    <center><a href="{{ route('upload.foto') }}" class="mt-2 relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm text-blue-900 rounded-lg group bg-gradient-to-br from-blue-600 to-blue-500 dark:text-blue focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                        <span class="relative px-5 py-1 transition-all ease-in duration-75 bg-white dark:bg-blue-900 rounded-md">
                            Ganti Foto
                        </span>
                    </a></center>
                    @else
                    <label class="text-gray-700">Foto:</label>
                    <br><a href="{{ route('upload.foto') }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm text-red-900 rounded-lg group bg-gradient-to-br from-red-600 to-red-500 dark:text-red focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800">
                        <span class="relative px-5 py-1 transition-all ease-in duration-75 bg-white dark:bg-red-900 rounded-md">
                            Upload Foto
                        </span>
                    </a>
                    @endif
                </div>
                <div class="mb-4">
                    <label class="text-gray-700">Nama:</label>
                    <p class="text-gray-900">{{ $user->name }}</p>
                </div>
                <div class="mb-4">
                    <label class="text-gray-700">Email:</label>
                    <p class="text-gray-900">{{ $user->email }}</p>
                </div>
                <div class="mb-4">
                    <label class="text-gray-700">Role:</label>
                    <p class="text-gray-900">
                        @if ($user->role == 0)
                            Investor
                        @elseif ($user->role == 1)
                            Mitra UMKM
                        @elseif ($user->role == 2)
                            Admin
                        @endif
                    </p>
                </div>
                <div class="mb-4">
                    <label class="text-gray-700">Saldo:</label>
                    <p class="text-gray-900">Rp{{ number_format($user->saldo, 0, ',', '.') ?? '-' }}</p>
                    <a href="{{ route('topup.form') }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm text-blue-900 rounded-lg group bg-gradient-to-br from-blue-600 to-blue-500 dark:text-blue focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                        <span class="relative px-5 py-1 transition-all ease-in duration-75 bg-white dark:bg-blue-900 rounded-md">
                            Topup
                        </span>
                    </a>
                </div>
                <div class="mb-4">
                    <label class="text-gray-700">KTP:</label>
                    @if ($user->ktp)
                    <img id="myImg" src="{{ asset('storage/' . $user->ktp) }}" class="p-1 cursor-pointer" alt="KTP" style="width:30%;max-width:100px">
                    <p><i>tekan gambar untuk memperbesar</i></p>
                    <a href="{{ route('upload.ktp') }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm text-blue-900 rounded-lg group bg-gradient-to-br from-blue-600 to-blue-500 dark:text-blue focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                        <span class="relative px-5 py-1 transition-all ease-in duration-75 bg-white dark:bg-blue-900 rounded-md">
                            Ganti KTP
                        </span>
                    </a>
                        @else
                    <br><a href="{{ route('upload.ktp') }}" class="relative inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm text-red-900 rounded-lg group bg-gradient-to-br from-red-600 to-red-500 dark:text-red focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800">
                        <span class="relative px-5 py-1 transition-all ease-in duration-75 bg-white dark:bg-red-900 rounded-md">
                            Upload KTP
                        </span>
                    </a>
                    @endif
                </div>
                <div class="mb-4">
                    <label class="text-gray-700">Status Validasi KTP:</label>
                    @if ($user->validasi_ktp == "valid")
                        <br><p class="relative inline-flex items-center justify-center p-0.5 mr-2 overflow-hidden text-sm text-blue-900 rounded-lg group bg-gradient-to-br from-blue-600 to-blue-500 dark:text-blue focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                            <span class="relative px-5 py-1 transition-all ease-in duration-75 bg-white dark:bg-blue-900 rounded-md">
                                {{ 'Status '.$user->validasi_ktp }}
                            </span>
                        </p>
                    @endif
                    @if ($user->validasi_ktp == "invalid")
                        <br><p class="relative inline-flex items-center justify-center p-0.5 mr-2 overflow-hidden text-sm text-red-900 rounded-lg group bg-gradient-to-br from-red-600 to-red-500 dark:text-red focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800">
                            <span class="relative px-5 py-1 transition-all ease-in duration-75 bg-white dark:bg-red-900 rounded-md">
                                {{ 'Status '.$user->validasi_ktp }}
                            </span>
                        </p>
                        <p><i>mohon ditunggu, admin akan mengecek terlebih dahulu</i></p>
                    @endif
                </div>
                <div class="mb-4">
                    @if (Auth::user()->role == "investor")
                    <a href="{{ route('indexinvestor') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex justify-center items-center">
                        <p>Kembali ke Halaman Investor</p>
                    </a>
                    @elseif (Auth::user()->role == "mitra_umkm")
                        <a href="{{ route('indexmitra') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex justify-center items-center">
                            <p>Kembali ke Halaman Mitra</p>
                        </a>
                    @endif

                </div>
                
            </div>
        </div>
    </div>
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>

    <script>
        var modal = document.getElementById("myModal");
        
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
          modal.style.display = "block";
          modalImg.src = this.src;
          captionText.innerHTML = this.alt;
        }
        
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() { 
          modal.style.display = "none";
        }
    </script>
</body>
</html>
