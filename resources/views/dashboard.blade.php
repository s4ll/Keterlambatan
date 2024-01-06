@extends('layout.sidebare');
@section('Content')

@if (Auth::user()-> role == 'admin')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="flex justify-between mb-6">
            <div>
                <div class="text-3xl font-semibold mb-1">Peserta Didik</div>
            </div>
        </div>
        <div class="flex items-center">
            <i class="fa-solid fa-users fa-2xl" style="color: #083344;"></i>
            <h2 class="ml-2 font-bold text-2xl ">{{ $students }}</h2>
        </div>
    </div>
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="flex justify-between mb-4">
            <div>
                <div class="flex items-center mb-1">
                    <div>
                        <div class="text-3xl font-semibold mb-1">Administrator</div>
                    </div>
                </div>
            </div>
          
        </div>
        <div class="flex items-center">
            <i class="fa-solid fa-users fa-2xl" style="color: #083344;"></i>
            <h2 class="ml-2 font-bold text-2xl ">{{ $admin }}</h2>
        </div>
    </div>
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="flex justify-between mb-4">
            <div>
                <div class="flex items-center mb-1">
                    <div>
                        <div class="text-3xl font-semibold mb-1">Pembimbing Siswa</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center">
            <i class="fa-solid fa-users fa-2xl" style="color: #083344;"></i>
            <h2 class="ml-2 font-bold text-2xl ">{{ $ps }}</h2>
        </div>
    </div>
    
</div>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="flex justify-between mb-4">
            <div>
                <div class="flex items-center mb-1">
                    <div>
                        <div class="text-3xl font-semibold mb-1">Rombel</div>    
                    </div>
                </div>
            </div>
          
        </div>
        <div class="flex items-center">
            <i class="fa-solid fa-bookmark fa-2xl" style="color: #083344;"></i>
            <h2 class="ml-2 font-bold text-2xl ">{{ $rombels }}</h2>
        </div>
    </div>
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="flex justify-between mb-4">
            <div>
                <div class="flex items-center mb-1">
                    <div>
                        <div class="text-3xl font-semibold mb-1">Rayon</div>  
                    </div>
                </div>
            </div>
          
        </div>
        <div class="flex items-center">
            <i class="fa-solid fa-bookmark fa-2xl" style="color: #083344;"></i>
            <h2 class="ml-2 font-bold text-2xl ">{{ $rayons }}</h2>
        </div>
    </div>
</div>

@else
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mb-6">
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="flex justify-between mb-6">
            <div>
                <div class="text-3xl font-semibold mb-1">Peserta Didik Rayon <br> {{ App\Models\rayon::find($rayonIdLogin)->rayon }}</div>
            </div>
        </div>
        <div class="flex items-center">
            <i class="fa-solid fa-users fa-2xl" style="color: #083344;"></i>
            <h2 class="ml-2 font-bold text-2xl ">{{ $lates }}</h2>
        </div>
    </div>
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
        <div class="flex justify-between mb-4">
            <div>
                <div class="flex items-center mb-1">
                    <div>
                        <div class="text-3xl font-semibold mb-1">Keterlambatan Rayon {{ App\Models\rayon::find($rayonIdLogin)->rayon }}</div>
                    </div>
                </div>
            </div>
          
        </div>
        <div class="items-center">
            <p style="margin-top: -1rem;">Tanggal: {{ now()->format('Y-M-D') }}</p>
        </div>
        <div class="flex items-center mt-5">
            <i class="fa-solid fa-users fa-2xl" style="color: #083344;"></i>
            <h2 class="ml-2 font-bold text-2xl ">{{ $rayon }}</h2>
        </div>
    </div>
</div>
@endif

@endsection