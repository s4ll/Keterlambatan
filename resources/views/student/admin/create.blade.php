@extends('layout.sidebare');
@section('Content')
<div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5">
    <form class="max-w-sm mx-auto " action="{{ route('admin.student.store') }}" method="POST">
        @csrf
        <div class="mb-5">
          <label for="nis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS Siswa:</label>
          <input type="text" id="nis" name="nis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"required>
        </div>
        <div class="mb-5">
          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Siswa:</label>
          <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"required>
        </div>
        
        <div class="mb-4">
          <label for="rayon" class="block text-gray-700 text-sm font-bold mb-2">Rayon:</label>
          <div class="relative">
              <select name="rayon_id" id="rayon_id"
                  class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:shadow-outline"
                  required>
                  @foreach ($rayons as $rayon)
                  <option selected hidden disabled>Pilih Rayon</option>
                  <option value="{{ $rayon['id'] }}">{{ $rayon['rayon'] }}</option>
                  @endforeach
              </select>
              <div
                  class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path
                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                  </svg>
              </div>
          </div>
        <div class="mb-4 mt-3">
          <label for="rayon" class="block text-gray-700 text-sm font-bold mb-2">Rombel:</label>
          <div class="relative">
              <select name="rombel_id" id="rombel_id"
                  class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-3 rounded leading-tight focus:outline-none focus:shadow-outline"
                  required>
                  @foreach ($rombels as $rombel)
                  <option selected hidden disabled>Pilih Rombel</option>
                  <option value="{{ $rombel['id'] }}">{{ $rombel['rombel'] }}</option>
                  @endforeach
              </select>
              <div
                  class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                      <path
                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                  </svg>
              </div>
          </div>
      </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
      </form>
</div>
@endsection