<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-slate-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-slate-700 focus:bg-slate-700 disabled:opacity-50 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
