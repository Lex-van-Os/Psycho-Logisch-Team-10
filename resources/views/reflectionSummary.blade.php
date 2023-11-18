<x-layout>
    <head>
        @vite('resources/js/reflectionSummary.js')
    </head>

    <div class="m-2 dark:text-white flex gap-3">
        <!-- Left side: Reflection title and text -->
        <div class="w-3/4 p-6 bg-gray-900 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold mb-6">Samenvatting</h1>
            <p class="mb-6">
                Hier kan je een samenvatting vinden van alle geschreven reflecties. 
                Voel je vrij om nog terug te gaan om het antwoord van de reflectie aan te passen. 
                Hier heb je ook de mogelijkheid om een reflectie te kunnen delen, zodat andere jongeren 
                extra inzichten kunnen krijgen door het inzien van het antwoord van jouw reflectie.
            </p>
            <div class="border-b border-gray-700 mb-6"></div>
    
            <div>
                <h2 id="selected-answer-title" class="text-2xl font-bold mb-4"></h2>
                <p id="selected-answer-text" class="mb-4"></p>
    
                <a id="share-answer-btn" href="" class="text-center bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">Deel antwoord</a>
            </div>
        </div>
    
        <!-- Right side: Reflection index -->
        <div class="w-1/4 p-6 bg-gray-800 rounded-lg shadow-lg">
            <h2 class="text-lg font-bold mb-4">Beantwoordde vragen</h2>
            <ul>
                @foreach($questions as $question)
                    <li class="mb-3 cursor-pointer">
                        <a class="questionListItem block hover:text-blue-400" questionId="{{ $question->questionId }}" answerId="{{ $question->answerId }}">
                            {{ $question->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-layout>