<x-layout>
    <div class="m-3 dark:text-white flex gap-8">
        <!-- Left side: Reflection title and text -->
        <div class="flex-1 p-6 bg-gray-900 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold mb-6">Samenvatting</h1>
            <p class="mb-6">
                Hier kan je een samenvatting vinden van alle geschreven reflecties. 
                Voel je vrij om nog terug te gaan om het antwoord van de reflectie aan te passen. 
                Hier heb je ook de mogelijkheid om een reflectie te kunnen delen, zodat andere jongeren 
                extra inzichten kunnen krijgen door het inzien van het antwoord van jouw reflectie.
            </p>
            <div class="border-b border-gray-700 mb-6"></div>

            <div>
                <h2 id="selected-answer-title" class="text-2xl font-bold mb-4">Test reflectie</h2>
                <p id="selected-answer-text" class="mb-4">Test antwoord</p>

                <a id="share-answer-btn" href="" class="text-center bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg">Deel antwoord</a>

            </div>
        </div>
    
        <!-- Right side: Reflection index -->
        <div class="w-1/4 p-6 bg-gray-800 rounded-lg shadow-lg">
            <h2 class="text-lg font-bold mb-4">Reflection Index</h2>
            <ul>
                @foreach($questions as $question)
                    <li class="mb-3 cursor-pointer">
                        <a href="" type="{{ $question->type }}" class="hover:text-blue-400">
                            {{ $question->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-layout>