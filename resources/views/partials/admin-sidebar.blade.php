<aside class="w-64 bg-gray-900 text-gray-200 h-screen flex flex-col p-0 shadow-lg overflow-y-auto scrollbar-hidden">
    <nav class="flex-1 flex flex-col py-6">
        <ul class="space-y-4 flex-1">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 py-2 px-6 rounded-l-full {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400 transition-colors' }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0H7m6 0v6m0 0H7m6 0h6"/></svg>
                    <span class="nunito-bold">Dashboard</span>
                </a>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('seguridad')">
                <button @click="toggle()"
                    :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-6 py-2 cursor-pointer focus:outline-none transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-shield-alt w-5 text-center"></i>
                        <span class="text-sm nunito-bold uppercase">Seguridad</span>
                    </div>
                    <svg :class="{'rotate-90': open}" class="w-4 h-4 ml-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                        <i class="fas fa-user text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">Gestión de Usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                        <i class="fas fa-user-shield text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">Gestión de roles y permiso</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                        <i class="fas fa-key text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">Configuración de accesos al sistema</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('clientes')">
                <button @click="toggle()"
                    :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-6 py-2 cursor-pointer focus:outline-none transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-users w-5 text-center"></i>
                        <span class="text-sm nunito-bold uppercase">Clientes</span>
                    </div>
                    <svg :class="{'rotate-90': open}" class="w-4 h-4 ml-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-transition class="space-y-1 ml-4 mt-2">
                     <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                        <i class="fas fa-building text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">Gestión de Empresas</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                        <i class="fas fa-file-invoice text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">Cotizaciones</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('solicitudes')">
                <button @click="toggle()"
                    :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-6 py-2 cursor-pointer focus:outline-none transition-colors">
                    <div class="flex items-center gap-3">
                         <i class="fas fa-tasks w-5 text-center"></i>
                        <span class="text-sm nunito-bold uppercase text-left">Solicitudes y Orden de Servicio</span>
                    </div>
                    <svg :class="{'rotate-90': open}" class="w-6 h-4 ml-2 transition-transform align-middle" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                        <i class="fas fa-envelope-open-text text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">Solicitudes</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                        <i class="fas fa-clipboard-list text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">Ordenes de Servicio</span>
                        </a>
                    </li>
                      <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                        <i class="fas fa-building text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">Empresas</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('proyectos')">
                <button @click="toggle()"
                    :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-6 py-2 cursor-pointer focus:outline-none transition-colors">
                     <div class="flex items-center gap-3">
                        <i class="fas fa-project-diagram w-5 text-center"></i>
                        <span class="text-sm nunito-bold uppercase">Proyectos</span>
                    </div>
                    <svg :class="{'rotate-90': open}" class="w-4 h-4 ml-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                        <i class="fas fa-tasks text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">Gestion de proyectos</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('tickets')">
                <button @click="toggle()"
                    :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-6 py-2 cursor-pointer focus:outline-none transition-colors">
                     <div class="flex items-center gap-3">
                        <i class="fas fa-ticket-alt w-5 text-center"></i>
                        <span class="text-sm nunito-bold uppercase">Tickets</span>
                    </div>
                    <svg :class="{'rotate-90': open}" class="w-4 h-4 ml-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                        <i class="fas fa-ticket-alt text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">Gestion de tickets</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('calendario')">
                <button @click="toggle()"
                    :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-6 py-2 cursor-pointer focus:outline-none transition-colors">
                     <div class="flex items-center gap-3">
                        <i class="fas fa-calendar-alt w-5 text-center"></i>
                        <span class="text-sm nunito-bold uppercase">Calendario</span>
                    </div>
                    <svg :class="{'rotate-90': open}" class="w-4 h-4 ml-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                        <i class="fas fa-map-marker-alt text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">Agencias</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                        <i class="fas fa-calendar-alt text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">Calendario</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('facturacion')">
                <button @click="toggle()"
                    :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-6 py-2 cursor-pointer focus:outline-none transition-colors">
                     <div class="flex items-center gap-3">
                        <i class="fas fa-file-invoice-dollar w-5 text-center"></i>
                        <span class="text-sm nunito-bold uppercase">Facturación</span>
                    </div>
                    <svg :class="{'rotate-90': open}" class="w-4 h-4 ml-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                        <i class="fas fa-file-invoice-dollar text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">Facturas</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                        <i class="fas fa-barcode text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">CAI</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('reportes')">
                <button @click="toggle()"
                    :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-6 py-2 cursor-pointer focus:outline-none transition-colors">
                     <div class="flex items-center gap-3">
                        <i class="fas fa-chart-bar w-5 text-center"></i>
                        <span class="text-sm nunito-bold uppercase">Reportes</span>
                    </div>
                    <svg :class="{'rotate-90': open}" class="w-4 h-4 ml-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                        <i class="fas fa-chart-line text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">Gestion de Reportes</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('inventario')">
                <button @click="toggle()"
                    class="w-full flex items-center justify-between px-6 py-2 text-gray-400 cursor-pointer focus:outline-none">
                     <div class="flex items-center gap-3">
                        <i class="fas fa-boxes w-5 text-center"></i>
                        <span class="text-sm nunito-bold uppercase">Inventario</span>
                    </div>
                    <svg :class="{'rotate-90': open}" class="w-4 h-4 ml-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                        <i class="fas fa-box text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">Productos</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                        <i class="fas fa-archive text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">Kardex</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('administracion')">
                <button @click="toggle()"
                    class="w-full flex items-center justify-between px-6 py-2 text-gray-400 cursor-pointer focus:outline-none">
                     <div class="flex items-center gap-3">
                        <i class="fas fa-cogs w-5 text-center"></i>
                        <span class="text-sm nunito-bold uppercase">Administración</span>
                    </div>
                    <svg :class="{'rotate-90': open}" class="w-4 h-4 ml-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-transition class="space-y-1 ml-4 mt-2">
                     <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                        <i class="fas fa-user-cog text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">Gestión de usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                        <i class="fas fa-unlock-alt text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">Cambio de contraseña</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                        <i class="fas fa-book text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">Bitácora</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                        <i class="fas fa-database text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">Gestion de Base de Datos</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="mt-4" x-data="sidebarDropdown('mantenimiento')">
                <button @click="toggle()"
                    class="w-full flex items-center justify-between px-6 py-2 text-gray-400 cursor-pointer focus:outline-none">
                     <div class="flex items-center gap-3">
                        <i class="fas fa-tools w-5 text-center"></i>
                        <span class="text-sm nunito-bold uppercase">Mantenimiento</span>
                    </div>
                    <svg :class="{'rotate-90': open}" class="w-4 h-4 ml-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
                <ul x-show="open" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="#" class="flex items-center gap-2 py-2 px-4 rounded hover:bg-gray-800 hover:text-blue-400 transition-colors">
                            <span class="text-sm nunito-regular">Gestion de tickets</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>