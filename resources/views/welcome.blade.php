<x-layout>
    <x-slot:title>
        Home Page
    </x-slot:title>
    <div class="modal-container">
    @if(isset($ref_trajs))
        @foreach($ref_trajs as $ref)
            <x-card class="ref-card" href="/reflectionTrajectory/{{$ref->id}}" title="{{$ref->title}}"></x-card>
        @endforeach
    @endif
    </div>
    <button onclick="openModal()">
        <h1 class="focus:outline-none px-4 bg-gray-900 p-3 ml-3 rounded-lg text-white hover:bg-gray-800 text-primary-500  mb-8 text-4xl font-extrabold tracking-tight lg:text-4xlxl dark:text-white text-gray-900">+</h1>
    </button>
    <div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
         style="background: rgba(0,0,0,.7);">
        <div class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Nieuwe reflectie</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </div>
                </div>
                <!--Body-->
                <form action="/NewReflectionTrajectory" method="POST">
                    @csrf
                    <label
                        for="title"
                        class="mb-3 block text-base font-medium text-2xl">
                        title
                    </label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        placeholder="title"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />
                    <div class="flex justify-end pt-2">
                        <button
                            class="focus:outline-none modal-close px-4 bg-gray-400 p-3 rounded-lg text-black hover:bg-gray-300">Cancel</button>
                        <input type="submit" class="focus:outline-none px-4 bg-teal-500 p-3 ml-3 rounded-lg text-white hover:bg-teal-400">
                    </div>
                </form>
                <!--Footer-->
            </div>
        </div>
    </div>
</x-layout>
<script>
    const modal = document.querySelector('.main-modal');
    const closeButton = document.querySelectorAll('.modal-close');

    const modalClose = () => {
        modal.classList.remove('fadeIn');
        modal.classList.add('fadeOut');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 500);
    }

    const openModal = () => {
        modal.classList.remove('fadeOut');
        modal.classList.add('fadeIn');
        modal.style.display = 'flex';
    }

    for (let i = 0; i < closeButton.length; i++) {

        const elements = closeButton[i];

        elements.onclick = (e) => modalClose();

        modal.style.display = 'none';

        window.onclick = function (event) {
            if (event.target == modal) modalClose();
        }
    }
</script>

