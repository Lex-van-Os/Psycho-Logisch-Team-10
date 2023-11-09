<?php
    $counter = 0
    ?>

<x-layout>
    <div class="flex items-center justify-center">
        @for($i = 0; $i < $questionCount; $i++)
            @method($counter+=1)
            <div class="flex items-center">
                @if($i == $progression->progress)
                    <div class="w-9 h-9 flex items-center justify-center border-2 border-green-600 bg-green-300 rounded-2xl">
                        {{$i+1}}
                    </div>
                @else
                    <div class="w-8 h-8 flex items-center justify-center border-2 border-gray-300 bg-gray-300 rounded-full">
                        {{$i+1}}
                    </div>
                @endif

                @if($counter != $questionCount)
                        <div class="h-1 w-4 bg-gray-300"></div>
                @endif

            </div>
        @endfor
    </div>
    <div class="flex flex-col items-center">
        <div class="mb-10 text-white">
            <h1
                class="focus:outline-none px-4 p-3 ml-3 text-white text-primary-500 mb-6 text-4xl font-extrabold tracking-tight lg:text-4xlxl dark:text-white text-gray-900"
            >{{$question->title}}</h1>
        </div>
        <div class="m-2">
            @if(isset($questionOptions))
                @foreach($questionOptions as $option)
                    <form action="/answerMultipleChoice" method="POST">
                        @csrf
                        <input type="hidden" id="reflection_id" name="reflection_id" value="{{$ref_id}}" />
                        <input type="hidden" id="question_id" name="question_id" value="{{$question->id}}" />
                        <input type="hidden" id="option_id" name="option_id" value="{{$option->id}}" />
                        <input
                            class="focus:outline-none px-4 bg-gray-900 p-3 ml-3 rounded-lg text-white hover:bg-gray-800 text-primary-500  mb-8 text-4xl font-extrabold tracking-tight lg:text-4xlxl dark:text-white text-gray-900"
                            type="submit" value="{{$option->text}}">
                    </form>
                @endforeach
            @else
                <form action="/answerOpenQuestion" method="POST" autocomplete="off">
                    {{--Necessary hidden fields--}}
                    @csrf
                    <input type="hidden" id="reflection_id" name="reflection_id" value="{{$ref_id}}" />
                    <input type="hidden" id="question_id" name="question_id" value="{{$question->id}}" />

                    <input type="text" id="answer" name="answer" maxlength="3000">
                    <input type="submit"
                           class="focus:outline-none px-4 bg-gray-900 p-3 ml-3 rounded-lg text-white hover:bg-gray-800 text-primary-500  mb-8 text-4xl font-extrabold tracking-tight lg:text-4xlxl dark:text-white text-gray-900"
                           value=">">
                </form>
            @endif
        </div>
    </div>
</x-layout>
