<button
    {{ $attributes->merge([
        'class' => 'inline-flex items-center px-4 py-2 rounded-md 
    bg-gradient-to-r from-cyan-400 to-cyan-500 text-stone-50
    hover:bg-gradien-to-r hover:from-cyan-500 hover:to-cyan-600 hover:text-stone-100
    font-semibold text-xs uppercase tracking-widest focus:bg-gray-700 active:bg-gray-900 focus:outline-none 
    focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150',
    ]) }}>
    {{ $slot }}
</button>
