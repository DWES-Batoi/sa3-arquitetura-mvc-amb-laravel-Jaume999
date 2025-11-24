@extends('layouts.app')

@section('title', "Guia de Partits")

@section('content')
<div class="max-w-5xl mx-auto">
  <h1 class="text-3xl font-bold text-blue-800 mb-6">Guia de Partits</h1>

  @if (session('success'))
    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
      {{ session('success') }}
    </div>
  @endif

  <div class="mb-6">
    <a href="{{ route('partits.create') }}" 
       class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded shadow-sm transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
      </svg>
      Nou partit
    </a>
  </div>

  <div class="overflow-hidden rounded-lg border border-gray-300">
    <table class="w-full border-collapse">
      <thead class="bg-gray-100">
        <tr>
          <th class="border-b border-gray-300 p-3 text-left font-semibold text-gray-700">Equip local</th>
          <th class="border-b border-gray-300 p-3 text-left font-semibold text-gray-700">Visitant</th>
          <th class="border-b border-gray-300 p-3 text-left font-semibold text-gray-700">Data</th>
          <th class="border-b border-gray-300 p-3 text-left font-semibold text-gray-700">Resultat</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        @forelse($partits as $key => $partit)
          <tr class="hover:bg-gray-50 transition-colors">
            <td class="p-3 font-medium text-gray-800">{{ $partit['local'] }}</td>
            <td class="p-3 text-gray-600">{{ $partit['visitant'] }}</td>
            <td class="p-3 text-gray-600">
              {{ \Carbon\Carbon::parse($partit['data'])->locale('ca')->isoFormat('D MMM YYYY') }}
            </td>
            <td class="p-3">
              @if(empty($partit['resultat']))
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                  <svg class="mr-1 h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <circle cx="12" cy="12" r="10" stroke-width="1.5"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2"/>
                  </svg>
                  Pendent
                </span>
              @else
                <span class="inline-flex items-center px-2 py-0.5 rounded font-mono font-bold bg-blue-600 text-white">
                  {{ $partit['resultat'] }}
                </span>
              @endif
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="p-4 text-center text-gray-500 italic">No hi ha partits programats.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection