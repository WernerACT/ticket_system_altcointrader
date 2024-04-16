@props(['route', 'target'])

<div>
    <a href="{{ $route }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border
border-transparent rounded-md font-bold text-sm text-white tracking-widest hover:bg-gray-700
active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300
disabled:opacity-25 transition ease-in-out duration-150" title="Create ">
        Create {{$target}}
    </a>

</div>


