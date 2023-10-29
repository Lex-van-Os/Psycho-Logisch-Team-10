<x-layout>
    <x-slot:title>
        Home Page
    </x-slot:title>
    @if(isset($ref_trajs))
        @foreach($ref_trajs as $ref)
            <button class="rounded-2xl border-2 p-1.5 hover:bg-gray-300 cursor-pointer">{{$ref.title}}</button>
        @endforeach
    @endif

    <button class="rounded-2xl border-2 p-1.5 hover:bg-gray-300 cursor-pointer">+</button>
</x-layout>
