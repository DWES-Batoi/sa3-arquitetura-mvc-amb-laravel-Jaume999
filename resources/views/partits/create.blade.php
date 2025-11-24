@extends('layouts.app')

@section('title', 'Afegir nou partit')

@section('content')
<div class="max-w-2xl mx-auto">
  <h1 class="text-2xl font-bold text-gray-800 mb-5">Afegir nou partit</h1>

  @if ($errors->any())
    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
      <strong>Hi ha hagut errors al formulari:</strong>
      <ul class="mt-2 list-disc pl-5 space-y-1">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('partits.store') }}" method="POST" class="space-y-5 bg-white p-6 rounded-lg shadow-sm border">
    @csrf

    <div>
      <label for="local" class="block font-bold text-gray-700 mb-1">Equip local</label>
      <input 
        type="text" 
        name="local" 
        id="local" 
        value="{{ old('local') }}" 
        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        placeholder="Ex: Barça Femení"
        required
      >
    </div>

    <div>
      <label for="visitant" class="block font-bold text-gray-700 mb-1">Equip visitant</label>
      <input 
        type="text" 
        name="visitant" 
        id="visitant" 
        value="{{ old('visitant') }}" 
        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        placeholder="Ex: Atlètic de Madrid"
        required
      >
    </div>

    <div>
      <label for="data" class="block font-bold text-gray-700 mb-1">Data del partit</label>
      <input 
        type="date" 
        name="data" 
        id="data" 
        value="{{ old('data', date('Y-m-d')) }}" 
        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        min="{{ date('Y-m-d') }}"
        required
      >
      <p class="mt-1 text-sm text-gray-500">La data ha de ser avui o posterior.</p>
    </div>

    <div>
      <label for="resultat" class="block font-bold text-gray-700 mb-1">
        Resultat (opcional)
        <span class="ml-1 text-sm font-normal text-gray-500">— Deixa buit si encara no s’ha jugat</span>
      </label>
      <input 
        type="text" 
        name="resultat" 
        id="resultat" 
        value="{{ old('resultat') }}" 
        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        placeholder="Ex: 2-1"
        pattern="\d+-\d+"
        title="Format: X-Y (ex: 3-0)"
      >
    </div>

    <div class="pt-2">
      <button 
        type="submit" 
        class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2.5 rounded-md shadow transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
      >
        Afegir partit
      </button>
      <a 
        href="{{ route('partits.index') }}" 
        class="mt-2 md:mt-0 md:ml-3 inline-block text-gray-600 hover:text-gray-800"
      >
        ← Cancel·lar
      </a>
    </div>
  </form>
</div>
@endsection