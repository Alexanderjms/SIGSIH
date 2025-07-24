<aside class="w-64 bg-gray-900 text-gray-200 h-screen flex flex-col p-0 shadow-lg">
    <div class="flex items-center gap-2 px-6 py-4 mb-2">
        <span class="font-bold text-lg tracking-wide">HARDLAN</span>
    </div>
    <nav class="flex-1 flex flex-col py-6">
        <ul class="space-y-1 flex-1">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 py-2 px-6 rounded-l-full {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 font-semibold text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400 transition-colors' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0H7m6 0v6m0 0H7m6 0h6"/></svg>
                    Dashboard
                </a>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('seguridad')">
                <button @click="toggle()"
                    class="w-full flex items-center justify-between px-6 py-2 text-xs font-bold uppercase text-gray-400 cursor-pointer focus:outline-none">
                    <span>Seguridad</span>
                    <svg :class="{'rotate-90': open}" class="w-4 h-4 ml-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-ref="menu" x-smooth-collapse class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Gestión de Usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Gestión de roles y permiso</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Configuración de accesos al sistema</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('clientes')">
                <button @click="toggle()"
                    class="w-full flex items-center justify-between px-6 py-2 text-xs font-bold uppercase text-gray-400 cursor-pointer focus:outline-none">
                    <span>Clientes</span>
                    <svg :class="{'rotate-90': open}" class="w-4 h-4 ml-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Gestión de Empresas</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Cotizaciones</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('solicitudes')">
                <button @click="toggle()"
                    class="w-full flex items-center px-6 py-2 text-xs font-bold uppercase text-gray-400 cursor-pointer focus:outline-none">
                    <span class="flex-1 text-left">Solicitudes y Orden de Servicio</span>
                    <svg :class="{'rotate-90': open}" class="w-4 h-4 ml-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Solicitudes</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Ordenes de Servicio</span>
                        </a>
                    </li>
                      <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Empresas</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('proyectos')">
                <button @click="toggle()"
                    class="w-full flex items-center justify-between px-6 py-2 text-xs font-bold uppercase text-gray-400 cursor-pointer focus:outline-none">
                    <span>Proyectos</span>
                    <svg :class="{'rotate-90': open}" class="w-4 h-4 ml-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Gestion de proyectos</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Finanzas del proyecto</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('tickets')">
                <button @click="toggle()"
                    class="w-full flex items-center justify-between px-6 py-2 text-xs font-bold uppercase text-gray-400 cursor-pointer focus:outline-none">
                    <span>Tickets</span>
                    <svg :class="{'rotate-90': open}" class="w-4 h-4 ml-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Gestion de tickets</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('calendario')">
                <button @click="toggle()"
                    class="w-full flex items-center justify-between px-6 py-2 text-xs font-bold uppercase text-gray-400 cursor-pointer focus:outline-none">
                    <span class="flex-1 text-left">Calendario</span>
                    <svg :class="{'rotate-90': open}" class="w-4 h-4 ml-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Agencias</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Calendario</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('facturacion')">
                <button @click="toggle()"
                    class="w-full flex items-center justify-between px-6 py-2 text-xs font-bold uppercase text-gray-400 cursor-pointer focus:outline-none">
                    <span>Facturación</span>
                    <svg :class="{'rotate-90': open}" class="w-4 h-4 ml-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Facturas</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>CAI</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('reportes')">
                <button @click="toggle()"
                    class="w-full flex items-center justify-between px-6 py-2 text-xs font-bold uppercase text-gray-400 cursor-pointer focus:outline-none">
                    <span>Reportes</span>
                    <svg :class="{'rotate-90': open}" class="w-4 h-4 ml-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Gestion de Reportes</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('inventario')">
                <button @click="toggle()"
                    class="w-full flex items-center justify-between px-6 py-2 text-xs font-bold uppercase text-gray-400 cursor-pointer focus:outline-none">
                    <span>Inventario</span>
                    <svg :class="{'rotate-90': open}" class="w-4 h-4 ml-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Productos</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Kardex</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('administracion')">
                <button @click="toggle()"
                    class="w-full flex items-center justify-between px-6 py-2 text-xs font-bold uppercase text-gray-400 cursor-pointer focus:outline-none">
                    <span>Administración</span>
                    <svg :class="{'rotate-90': open}" class="w-4 h-4 ml-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Gestión de usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Cambio de contraseña</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Bitácora</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Gestion de Base de Datos</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('mantenimiento')">
                <button @click="toggle()"
                    class="w-full flex items-center justify-between px-6 py-2 text-xs font-bold uppercase text-gray-400 cursor-pointer focus:outline-none">
                    <span>Mantenimiento</span>
                    <svg :class="{'rotate-90': open}" class="w-4 h-4 ml-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span>Gestion de tickets</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>
 
