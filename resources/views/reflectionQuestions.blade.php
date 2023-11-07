<x-layout>
<div class="mb-10 text-white">
    {{$question}}
</div>
    <div class="m-2">
        @if(isset($questionOptions))
            {{$questionOptions}}
        @endif
    </div>

</x-layout>
