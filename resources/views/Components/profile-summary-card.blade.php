<div class="block bg-white rounded-lg shadow-md cursor-pointer summary-card">
    <div class="p-4">
        <h2 class="text-lg font-semibold mb-2">{{ $summary->title }}</h2> 
        <p class="text-gray-600">{{ $summary->reflection }}</p>
        <p class="text-gray-700">{{ Str::limit($summary->text, 150) }}</p>
    </div>
    <div class="p-4 border-t border-gray-300">
        @php
        $createdDate = \Carbon\Carbon::parse($summary->created_on);
        @endphp

        <p class="text-gray-400 text-sm italic">Created on: {{ $createdDate->format('d-m-Y') }}</p>
    </div>
    <div class="p-4">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="window.location='{{ route('home.shareSummary', $summary->id) }}'">Share</button>
    </div>
</div>