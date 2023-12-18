@include('Components.layout')
<?php
    $counter = 0
    ?>
<div class="flex flex-col mt-10 mb-16 items-center">
    <div class="flex items-center mb-6">
        @for($i = 0; $i < $questionCount; $i++)
            @method($counter+=1)
            <div class="flex items-center">
                @if($i <= $progression->progress)
                    <div class="w-9 h-9 text-center border-2 border-green-600 bg-green-300 rounded-2xl">
                        {{$i+1}}
                    </div>
                @else
                    <div class="w-8 h-8 text-center border-2 border-gray-300 bg-gray-300 rounded-full">
                        {{$i+1}}
                    </div>
                @endif

                @if($counter != $questionCount)
                    <div class="h-1 w-4 bg-gray-300"></div>
                @endif
            </div>
        @endfor
    </div>

    <div class="flex flex-col w-full">
        <div class="mb-10 text-white text-center">
            <h1 class="text-4xl font-extrabold tracking-tight">{{$question->title}}</h1>
        </div>

        <div class="m-2 flex justify-between">

            <div class="button-wrapper flex-none flex items-center">
                <a role="button" id="next-btn" class="align-middle float-right bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center" href="/previousQuestion/{{$ref_id}}">
                    Next
                </a>
            </div>

            <div class="form-wrapper grow flex justify-center">
                <div class="question-answer-wrapper w-1/2 justify-center">
                    @if(isset($questionOptions))
                        @foreach($questionOptions as $option)
                            <form action="/answerMultipleChoice" method="POST">
                                @csrf
                                <input type="hidden" id="reflection_id" name="reflection_id" value="{{$ref_id}}" />
                                <input type="hidden" id="question_id" name="question_id" value="{{$question->id}}" />
                                <input type="hidden" id="option_id" name="option_id" value="{{$option->id}}" />
                                <input class="px-4 py-3 mb-8 text-3xl font-extrabold tracking-tight bg-gray-900 text-white hover:bg-gray-800 rounded-lg" type="submit" value="{{$option->text}}">
                            </form>
                        @endforeach
                    @else
                        <form action="/answerOpenQuestion" method="POST" autocomplete="off">
                            {{--Necessary hidden fields--}}
                            @csrf
                            <input type="hidden" id="reflection_id" name="reflection_id" value="{{$ref_id}}" />
                            <input type="hidden" id="question_id" name="question_id" value="{{$question->id}}" />
        
                            <div class="flex">
                                {{-- <textarea type="text"  class="px-4 py-3 mb-8 bg-white text-black hover:bg-gray-200 rounded-lg"></textarea> --}}
                                <textarea id="answer" name="answer" maxlength="3000" rows="4" class="block p-2.5 w-full h-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Wat zijn je gedachten?"></textarea>
        
                                <input type="submit" class="px-4 py-3 text-3xl font-extrabold tracking-tight bg-white text-black hover:bg-gray-200 rounded-lg" value=">">
                            </div>
                        </form>
                    @endif
                </div>
            </div>

            <div class="button-wrapper flex-none flex items-center">
                <a role="button" id="next-btn" class="align-middle float-right bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center" href="/nextQuestion/{{$ref_id}}">
                    Next
                </a>
            </div>
        </div>
    </div>
</div>
