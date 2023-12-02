<div class="block bg-white rounded-lg shadow-md cursor-pointer summary-card">
    <div class="p-4">
        <h2 class="text-lg font-semibold mb-2">{{ $summary->title }}</h2> 
        <p class="text-gray-600">Type reflectie: {{ $summary->type }}</p>
        <p class="text-gray-700">{{ Str::limit($summary->text, 150) }}</p>
    </div>
    <div class="p-4 border-t border-gray-300">
        @php
        $createdDate = \Carbon\Carbon::parse($summary->created_on);
        @endphp

        <p class="text-gray-400 text-sm italic">Aangemaakt op: {{ $createdDate->format('d-m-Y') }}</p>
    </div>
    <div class="p-4">
        @if ($summary->isShared)
            <button summary-id="{{ $summary->summaryId }}" class="share-reflection-btn bg-blue-300 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded">Gedeeld</button>
        @else
            <button summary-id="{{ $summary->summaryId }}" class="share-reflection-btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Reflectie delen</button>
        @endif
    </div>
</div>