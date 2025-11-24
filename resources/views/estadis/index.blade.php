@extends('layouts.app')

@section('title', "Guia d'Estadis")

@section('content')
<div class="max-w-4xl mx-auto">
  <h1 class="text-3xl font-bold text-blue-800 mb-6">Guia d'Estadis</h1>

  @if (session('success'))
    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
      {{ session('success') }}
    </div>
  @endif

  <div class="mb-6">
    <a href="{{ route('estadis.create') }}" 
       class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded shadow-sm transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
      </svg>
      Nou estadi
    </a>
  </div>

  <div class="overflow-hidden rounded-lg border border-gray-300">
    <table class="w-full border-collapse">
      <thead class="bg-gray-100">
        <tr>
          <th class="border-b border-gray-300 p-3 text-left font-semibold text-gray-700">Nom</th>
          <th class="border-b border-gray-300 p-3 text-left font-semibold text-gray-700">Ciutat</th>
          <th class="border-b border-gray-300 p-3 text-left font-semibold text-gray-700">Aforament</th>
          <th class="border-b border-gray-300 p-3 text-left font-semibold text-gray-700">Equip</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        @forelse($estadis as $key => $estadi)
          <tr class="hover:bg-gray-50 transition-colors">
            <td class="p-3">
              <a href="{{ route('estadis.show', $key) }}" 
                 class="text-blue-700 font-medium hover:underline hover:text-blue-900">
                {{ $estadi['nom'] }}
              </a>
            </td>
            <td class="p-3 text-gray-600">{{ $estadi['ciutat'] }}</td>
            <td class="p-3 text-gray-600">{{ number_format($estadi['aforament'], 0, ',', '.') }}</td>
            <td class="p-3 text-gray-800">{{ $estadi['equip'] }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="p-4 text-center text-gray-500 italic">No hi ha estadis registrats.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection