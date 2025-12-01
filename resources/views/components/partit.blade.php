<div class="partit border rounded-lg shadow-md p-4 bg-white">
  <h2 class="text-xl font-bold text-blue-800">{{ $local }} – {{ $visitant }}</h2>
  <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($data)->locale('ca')->isoFormat('D MMMM YYYY') }}</p>
  <p>
    <strong>Resultat:</strong> 
    @if(empty($resultat))
      <span class="text-gray-500 italic">Pendent</span>
    @else
      <span class="font-mono bg-blue-50 text-blue-800 px-2 py-0.5 rounded">{{ $resultat }}</span>
    @endif
  </p>
</div>