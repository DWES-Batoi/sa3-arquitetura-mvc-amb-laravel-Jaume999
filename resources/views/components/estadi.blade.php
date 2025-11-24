<div class="estadi border rounded-lg shadow-md p-5 bg-white max-w-2xl mx-auto">
  <h2 class="text-2xl font-bold text-blue-800 mb-3">{{ $estadi['nom'] }}</h2>
  
  <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-gray-700">
    <div>
      <strong>Ciutat:</strong>
      <span class="ml-1">{{ $estadi['ciutat'] }}</span>
    </div>
    <div>
      <strong>Aforament:</strong>
      <span class="ml-1">{{ number_format($estadi['aforament'], 0, ',', '.') }} espectadors</span>
    </div>
    <div class="md:col-span-2">
      <strong>Equip resident:</strong>
      <span class="ml-1 font-medium text-gray-900">{{ $estadi['equip'] }}</span>
    </div>
  </div>
</div>