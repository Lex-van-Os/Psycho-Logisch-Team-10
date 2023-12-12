@include('Components.layout')

    <x-slot:title>
        Reflection
    </x-slot:title>
    <div class="flex-container flex flex-col justify-center items-center w-full">
    <h1 class="text-4xl font-black font-bold underline dark:font-light text-white m-4">
        Reflection {{$ref->title}}
    </h1>

        <div class="row-cols-3">
    <a type="button" href="/reflectionTrajectory/{{$ref->id}}/past" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white scale-125 shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto m-4">
        Verleden
    </a>
    <a type="button" href="/reflectionTrajectory/{{$ref->id}}/present" class=" inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto m-4 scale-125">
        Heden
    </a>
    <a type="button" href="/reflectionTrajectory/{{$ref->id}}/future" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto m-4 scale-125">
        Toekomst
    </a>
        </div>
    </div>
