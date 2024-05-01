<button
    {{ $attributes->merge([
        'class' => 'inline-flex items-center px-4 py-2 rounded-md 
    bg-gradient-to-r from-red-500 to-red-600 text-stone-50
    hover:bg-gradien-to-r hover:from-red-700 hover:to-red-800 hover:text-stone-100
    font-semibold text-xs uppercase tracking-widest focus:bg-gray-700 active:bg-gray-900 focus:outline-none 
    focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150',
    ]) }}>
    {{ $slot }}
</button>
