@extends('layouts.app')

@section('title', 'Afegir nou estadi')

@section('content')
<div class="max-w-2xl mx-auto">
  <h1 class="text-2xl font-bold text-gray-800 mb-5">Afegir nou estadi</h1>

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

  <form action="{{ route('estadis.store') }}" method="POST" class="space-y-5 bg-white p-6 rounded-lg shadow-sm border">
    @csrf

    <div>
      <label for="nom" class="block font-bold text-gray-700 mb-1">Nom de l’estadi</label>
      <input 
        type="text" 
        name="nom" 
        id="nom" 
        value="{{ old('nom') }}" 
        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        placeholder="Ex: Estadi Johan Cruyff"
        required
      >
    </div>

    <div>
      <label for="ciutat" class="block font-bold text-gray-700 mb-1">Ciutat</label>
      <input 
        type="text" 
        name="ciutat" 
        id="ciutat" 
        value="{{ old('ciutat') }}" 
        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        placeholder="Ex: Sant Joan Despí"
        required
      >
    </div>

    <div>
      <label for="aforament" class="block font-bold text-gray-700 mb-1">Aforament (espectadors)</label>
      <input 
        type="number" 
        name="aforament" 
        id="aforament" 
        value="{{ old('aforament') }}" 
        min="1"
        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        placeholder="Ex: 6000"
        required
      >
    </div>

    <div>
      <label for="equip" class="block font-bold text-gray-700 mb-1">Equip resident</label>
      <input 
        type="text" 
        name="equip" 
        id="equip" 
        value="{{ old('equip') }}" 
        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        placeholder="Ex: FC Barcelona Femení"
        required
      >
    </div>

    <div class="pt-2">
      <button 
        type="submit" 
        class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2.5 rounded-md shadow transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
      >
        Afegir estadi
      </button>
      <a 
        href="{{ route('estadis.index') }}" 
        class="mt-2 md:mt-0 md:ml-3 inline-block text-gray-600 hover:text-gray-800"
      >
        ← Cancel·lar
      </a>
    </div>
  </form>
</div>
@endsection