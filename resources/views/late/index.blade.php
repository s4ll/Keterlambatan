  @extends('layout.sidebare');
  @section('Content')
      <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
          <a href="{{ route('late.create') }}"><button type="submit"
                  class="ml-8 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button></a>
          <a href="{{ route('late.excel') }}"><button type="submit"
                  class=" text-white focus:outline-none focus:bg-teal-500 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-teal-500 hover:bg-teal-600 :focus:ring-teal-600">Export
                  Data</button></a>

          <!-- component -->

          <div x-data="{ openTab: 1 }" class="p-8">

              <div class="mb-4 flex space-x-4 p-2 bg-white rounded-lg shadow-md w-96 h-14">
                  <button x-on:click="openTab = 1" :class="{ 'bg-blue-600 text-white': openTab === 1 }"
                      class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">Keseluruhan
                      Data</button>
                  <button x-on:click="openTab = 2" :class="{ 'bg-blue-600 text-white': openTab === 2 }"
                      class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">Rekapitulasi
                      Data</button>
              </div>

              {{-- Keseluruhan data --}}
              <div class="flex flex-col transition-all duration-300" x-show="openTab === 1">
                  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                          <div class="overflow-hidden">
                              <table class="min-w-full text-left text-sm font-light">
                                  <thead>
                                      <tr>
                                          <th
                                              class="text-[12px] uppercase tracking-wide font-semibold text-black py-2 px-4 bg-gray-50  rounded-tl-md rounded-bl-md">
                                              No</th>
                                          <th
                                              class="text-[12px] uppercase tracking-wide font-semibold text-black py-2 px-4 bg-gray-50 ">
                                              Nama</th>
                                          <th
                                              class="text-[12px] uppercase tracking-wide font-semibold text-black py-2 px-4 bg-gray-50 ">
                                              Tanggal</th>
                                          <th
                                              class="text-[12px] uppercase tracking-wide font-semibold text-black py-2 px-4 bg-gray-50 ">
                                              Informasi</th>
                                          <th
                                              class="text-[12px] uppercase tracking-wide font-semibold text-black py-2 px-4 bg-gray-50 ">
                                              Action</th>
                                      </tr>
                                  </thead>

                                  <tbody>
                                      @php
                                          $no = 1;
                                      @endphp
                                      @foreach ($lates as $item)
                                          <tr class="border-b dark:border-neutral-500">
                                              <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $no++ }}</td>
                                              <td class="whitespace-nowrap px-6 py-4">{{ $item->student->name }}</td>
                                              <td class="whitespace-nowrap px-6 py-4">{{ $item['date_time_late'] }}</td>
                                              <td class="whitespace-nowrap px-6 py-4">{{ $item['information'] }}</td>
                                              {{-- <td><img src="{{ asset('uploads/'.$item->bukti) }}" style="width: 80px; margin-top:1rem; margin-bottom:1rem;" alt=""></td> --}}
                                              <td class="flex mt-7">
                                                  <div>
                                                      <a href="{{ route('late.edit', $item['id']) }}">
                                                          <i class="fa-solid fa-pen-to-square fa-2xl"
                                                              style="color: #1667f3; margin-right:1.5rem;"></i>
                                                      </a>
                                                  </div>
                                                  <form action="{{ route('late.delete', $item['id']) }}" method="post">
                                                      @csrf
                                                      @method('DELETE')
                                                      <button type="submit" class="btn btn-danger"><i
                                                              class="fa-solid fa-trash-arrow-up fa-2xl"
                                                              style="color: #e01f1f;"></i></button>
                                                  </form>
                                              </td>
                                          </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>

              {{-- Rekapitulasi Data --}}
              <div class="flex flex-col transition-all duration-300" x-show="openTab === 2">
                  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                          <div class="overflow-hidden">
                              <table class="min-w-full text-left text-sm font-light">
                                  <thead>
                                      <tr>
                                          <th
                                              class="text-[12px] uppercase tracking-wide font-semibold text-black py-2 px-4 bg-gray-50  rounded-tl-md rounded-bl-md">
                                              No</th>
                                          <th
                                              class="text-[12px] uppercase tracking-wide font-semibold text-black py-2 px-4 bg-gray-50 ">
                                              Nis</th>
                                          <th
                                              class="text-[12px] uppercase tracking-wide font-semibold text-black py-2 px-4 bg-gray-50 ">
                                              Nama</th>
                                          <th
                                              class="text-[12px] uppercase tracking-wide font-semibold text-black py-2 px-4 bg-gray-50">
                                              Keterlambatan</th>
                                          <th
                                              class="text-[12px] uppercase tracking-wide font-semibold text-black py-2 px-4 bg-gray-50 ">
                                              Bukti</th>
                                          <th
                                              class="text-[12px] uppercase tracking-wide font-semibold text-black py-2 px-4 bg-gray-50 ">
                                          </th>
                                      </tr>
                                  </thead>

                                  <tbody>
                                      @php
                                          $no = 1;
                                      @endphp

                                      @foreach ($groupedLates as $studentId => $lateGroup)
                                          @php
                                              $student = $lateGroup->first()->student;
                                              $totalLates = $student->getTotalLates();
                                          @endphp
                                          <tr class="border-b dark:border-neutral-500">
                                              <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $no++ }}</td>
                                              <td class="whitespace-nowrap px-6 py-4">{{ $student->nis }}</td>
                                              <td class="whitespace-nowrap px-6 py-4">{{ $student->name }}</td>
                                              <td class="whitespace-nowrap px-6 py-4">{{ $totalLates }}</td>
                                              <td><a href="{{ route('late.show', $student['id'])}}"
                                                      class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat
                                                      Bukti</a></td>
                                              {{-- <td><img src="{{ asset('uploads/' . $lateGroup->first()->bukti) }}"
                                                    style="width: 80px; margin-top:1rem; margin-bottom:1rem;"
                                                    alt=""></td> --}}
                                              @if ($totalLates >= 3)
                                                  <td>
                                                      <a href="{{ route('late.download', $student['id']) }}">
                                                          <button type="submit"
                                                              class="ml-8 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                                                              Cetak Surat Pernyataan
                                                          </button>
                                                      </a>
                                                  </td>
                                              @else
                                                  <td></td>
                                              @endif
                                          </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
  @endsection
