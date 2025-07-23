<aside class="w-64 bg-gray-900 text-gray-200 min-h-full p-0 shadow-lg">
    <nav class="h-full flex flex-col py-6">
        <ul class="space-y-1 flex-1">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 py-2 px-6 rounded-l-full {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 font-semibold text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400 transition-colors' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0H7m6 0v6m0 0H7m6 0h6"/></svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.usuarios') }}" class="flex items-center gap-3 py-2 px-6 rounded-l-full {{ request()->routeIs('admin.usuarios') ? 'bg-gray-800 font-semibold text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400 transition-colors' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M17 8V6a4 4 0 00-8 0v2m8 0a4 4 0 01-8 0m8 0v2a4 4 0 01-8 0V8m8 0V6a4 4 0 00-8 0v2"/></svg>
                    Usuarios
                </a>
            </li>
        </ul>
    </nav>
</aside>
