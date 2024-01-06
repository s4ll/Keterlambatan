@extends('layout.sidebare');
@section('Content')
<div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
<h1 class="font-bold text-3xl  mb-10">Data Siswa</h1>
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