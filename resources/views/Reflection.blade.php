<x-layout>
    <x-slot:title>
        Reflection
    </x-slot:title>
    <h1 class="text-3xl font-black font-bold underline dark:font-light">
        Reflection {{$ref_subject}}
    </h1>
    <a type="button" href="{{url('/reflectionTrajectory/').$ref->id}}" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto">
        Verleden
    </a>
    <a type="button" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto">
        Heden
    </a>
    <a type="button" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto">
        Toekomst
    </a>
</x-layout>
