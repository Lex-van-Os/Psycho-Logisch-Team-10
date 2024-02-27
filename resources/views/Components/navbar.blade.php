<nav class="border-gray-200 py-2.5 bg-gray-900">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
        <a href="/" class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Psycho-Logisch</a>
        <div class="flex items-center lg:order-2">
            @guest()
                <a href="{{ route('login') }}" class="text-white  hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 bg-red-400 hover:bg-red-600 focus:outline-none focus:ring-red-800">Log in</a>
                <a href="{{ route('register') }}" class="text-white  hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">register</a>
            @endguest
            @auth()
                <form method="post" action="{{ route('logout') }}">
                    {{ csrf_field() }}
                    <input type="submit" value="logout" class="text-white  hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 bg-red-400 hover:bg-red-600 focus:outline-none focus:ring-red-800">
                </form>
            @endauth
            <!-- <a href="#" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log in</a> -->
         </div>
    </div>
</nav>
