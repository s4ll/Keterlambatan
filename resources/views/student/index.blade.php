@extends('layout.sidebare');
@section('Content')
<div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
<h1 class="font-bold text-3xl  mb-10">Data Siswa</h1>
<a href="{{ route('student.create')}}"><button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-3">Tambah</button></a>
<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full text-left text-sm font-light">
            <thead>
              <tr>
                  <th class="text-[12px] uppercase tracking-wide font-semibold text-black py-2 px-4 bg-gray-50  rounded-tl-md rounded-bl-md">No</th>
                  <th class="text-[12px] uppercase tracking-wide font-semibold text-black py-2 px-4 bg-gray-50 "> Nis</th>
                  <th class="text-[12px] uppercase tracking-wide font-semibold text-black py-2 px-4 bg-gray-50 "> Nama</th>
                  <th class="text-[12px] uppercase tracking-wide font-semibold text-black py-2 px-4 bg-gray-50 "> Rombel</th>
                  <th class="text-[12px] uppercase tracking-wide font-semibold text-black py-2 px-4 bg-gray-50 "> Rayon</th>
                  <th class="text-[12px] uppercase tracking-wide font-semibold text-black py-2 px-4 bg-gray-50 ">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach ($students as $item)
                <tr class="border-b dark:border-neutral-500">
                  <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $no }}</td>
                  <td class="whitespace-nowrap px-6 py-4">{{ $item['nis'] }}</td>
                  <td class="whitespace-nowrap px-6 py-4">{{ $item['name'] }}</td>
                  <td class="whitespace-nowrap px-6 py-4">{{ $item->rombel->rombel }}</td>
                  <td class="whitespace-nowrap px-6 py-4">{{ $item->rayon->rayon }}</td>
                  <td class="flex mt-6">
                    <div>
                        <a href="{{ route('student.edit', $item['id']) }}">
                          <i class="fa-solid fa-pen-to-square fa-2xl" style="color: #1667f3; margin-right:1.5rem;"></i>
                        </a>
                    </div>
                    <form action="{{ route('student.delete', $item['id']) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-arrow-up fa-2xl" style="color: #e01f1f;"></i></button>
                    </form>
                  </td>
                </tr>   
                @php
                    $no += 1;
                @endphp
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection