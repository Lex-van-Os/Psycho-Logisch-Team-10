<x-layout>
    <div class="flex flex-col items-center">
        <div class="mb-10 text-white">
            <h1
                class="focus:outline-none px-4 p-3 ml-3 text-white text-primary-500 mb-6 text-4xl font-extrabold tracking-tight lg:text-4xlxl dark:text-white text-gray-900"
            >{{$question->title}}</h1>
        </div>
        {{$questionOptions}}
        <div class="m-2">
            @if(isset($questionOptions))
                @foreach($questionOptions as $option)
                    <form action="/answerMultipleChoice" method="post">
                        <input type="hidden" id="reflection_id" name="reflection_id" value="{{$ref_id}}" />
                        <input
                            class="focus:outline-none px-4 bg-gray-900 p-3 ml-3 rounded-lg text-white hover:bg-gray-800 text-primary-500  mb-8 text-4xl font-extrabold tracking-tight lg:text-4xlxl dark:text-white text-gray-900"
                            type="submit" value="{{$option->text}}">
                    </form>
                @endforeach
            @endif
        </div>
    </div>
</x-layout>
