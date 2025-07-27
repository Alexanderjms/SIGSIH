<aside :class="sidebarOpen ? 'w-72' : 'w-20'"
    class="bg-gray-900 text-gray-200 h-screen flex flex-col p-0 shadow-lg overflow-y-auto scrollbar-hidden transition-all duration-300 ease-in-out">
    <nav class="flex-1 flex flex-col py-6">
        <ul class="space-y-4 flex-1">
           <li>
                <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 py-2 px-6 rounded-l-full {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400 transition-colors' }}">
                    <i class="fa-solid fa-house w-5 text-center"></i>
                    <span :class="!sidebarOpen && 'hidden'" class="nunito-bold">Dashboard</span>
                </a>
            </li>
            <li class="mt-4"
                x-data="sidebarDropdown('seguridad', {{ (request()->routeIs('admin.gestion-usuarios') || request()->routeIs('admin.roles-permisos') || request()->routeIs('admin.configuracion-acceso')) ? 'true' : 'false' }})">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-6 py-2 cursor-pointer focus:outline-none transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-shield-alt w-5 text-center"></i>
                        <span :class="!sidebarOpen && 'hidden'" class="text-sm nunito-bold uppercase">Seguridad</span>
                    </div>
                    <svg :class="{'rotate-90': open, 'hidden': !sidebarOpen}" class="w-4 h-4 ml-2 transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="open && sidebarOpen" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="{{ route('admin.gestion-usuarios') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors {{ request()->routeIs('admin.gestion-usuarios') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}">
                            <i class="fas fa-user text-sm w-4 text-center"></i>
                            <span class="list-sub-modules nunito-regular">Gestión de Usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.roles-permisos') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors {{ request()->routeIs('admin.roles-permisos') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}">
                            <i class="fas fa-user-shield text-sm w-4 text-center"></i>
                            <span class="list-sub-modules nunito-regular">Gestión de roles y permisos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.configuracion-acceso') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors {{ request()->routeIs('admin.configuracion-acceso') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}">
                            <i class="fas fa-key text-sm w-4 text-center"></i>
                            <span class="list-sub-modules nunito-regular">Configuración de accesos al sistema</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="mt-4" x-data="sidebarDropdown('clientes', {{ request()->routeIs('admin.gestion-empresas') || request()->routeIs('admin.cotizaciones') ? 'true' : 'false' }})">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-6 py-2 cursor-pointer focus:outline-none transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-users w-5 text-center"></i>
                        <span :class="!sidebarOpen && 'hidden'" class="text-sm nunito-bold uppercase">Clientes</span>
                    </div>
                    <svg :class="{'rotate-90': open, 'hidden': !sidebarOpen}" class="w-4 h-4 ml-2 transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="open && sidebarOpen" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="{{ route('admin.gestion-empresas') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors {{ request()->routeIs('admin.empresas') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}">
                            <i class="fas fa-building text-sm w-4 text-center"></i>
                            <span class="list-sub-modules nunito-regular">Gestión de Empresas</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.cotizaciones') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors {{ request()->routeIs('admin.cotizaciones') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}">
                            <i class="fas fa-file-invoice text-sm w-4 text-center"></i>
                            <span class="list-sub-modules nunito-regular">Cotizaciones</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="mt-4" x-data="sidebarDropdown('solicitudes', {{ request()->routeIs('admin.solicitudes.index') ||     request()->routeIs('admin.solicitudes.empresas') ? 'true' : 'false' }})">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-6 py-2 cursor-pointer focus:outline-none transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-tasks w-5 text-center"></i>
                        <span :class="!sidebarOpen && 'hidden'"
                            class="text-sm nunito-bold uppercase text-left">Solicitudes</span>
                    </div>
                    <svg :class="{'rotate-90': open, 'hidden': !sidebarOpen}"
                        class="w-6 h-4 ml-2 transition-transform align-middle" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="open && sidebarOpen" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="{{ route('admin.solicitudes.index') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors {{ request()->routeIs('admin.solicitudes.index') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}">
                            <i class="fas fa-envelope-open-text text-sm w-4 text-center"></i>
                            <span class="list-sub-modules nunito-regular">Solicitudes</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.solicitudes.empresas') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors {{ request()->routeIs('admin.solicitudes.empresas') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}">
                            <i class="fas fa-building text-sm w-4 text-center"></i>
                            <span class="list-sub-modules nunito-regular">Empresas</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="mt-4" x-data="sidebarDropdown('ordenes-servicio', {{ request()->routeIs('admin.ordenes-servicio*') ? 'true' : 'false' }})">
            <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                class="w-full flex items-center justify-between px-6 py-2 cursor-pointer focus:outline-none transition-colors">
                <div class="flex items-center gap-3">
                    <i class="fas fa-clipboard-list w-5 text-center"></i>
                    <span :class="!sidebarOpen && 'hidden'" class="text-sm nunito-bold uppercase text-left">Ordenes de Servicio</span>
                </div>
                <svg :class="{'rotate-90': open, 'hidden': !sidebarOpen}"
                    class="w-6 h-4 ml-2 transition-transform align-middle" fill="none" stroke="currentColor"
                    stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>
            <ul x-show="open && sidebarOpen" x-transition class="space-y-1 ml-4 mt-2">
                <li>
                    <a href="{{ route('admin.ordenes-servicio.index') }}"
                        class="flex items-center gap-2 py-2 px-4 rounded transition-colors {{ request()->routeIs('admin.ordenes-servicio*') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}">
                        <i class="fas fa-clipboard-list text-sm w-4 text-center"></i>
                        <span class="list-sub-modules nunito-regular">Ordenes de Servicio</span>
                    </a>
                </li>
            </ul>
        </li>

            <li class="mt-4" x-data="sidebarDropdown('proyectos', {{ request()->routeIs(['admin.proyectos*', 'admin.vista-proyectos']) ? 'true' : 'false' }})">
                <button
                    @click="toggle()"
                    :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-6 py-2 cursor-pointer focus:outline-none transition-colors"
                >
                    <div class="flex items-center gap-3">
                        <i class="fas fa-project-diagram w-5 text-center"></i>
                        <span :class="!sidebarOpen && 'hidden'" class="text-sm nunito-bold uppercase">Proyectos</span>
                    </div>
                    <svg
                        :class="{'rotate-90': open, 'hidden': !sidebarOpen}"
                        class="w-4 h-4 ml-2 transition-transform"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul
                    x-show="open && sidebarOpen"
                    x-transition
                    class="space-y-1 ml-4 mt-2"
                >
                    <li>
                        <a href="{{ route('admin.vista-proyectos') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors
                            {{ request()->routeIs('admin.vista-proyectos') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}"
                        >
                            <i class="fas fa-eye text-sm w-4 text-center"></i>
                            <span class="list-sub-modules nunito-regular">Vista de proyectos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.proyectos') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors
                            {{ request()->routeIs('admin.proyectos*') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}"
                        >
                            <i class="fas fa-cogs text-sm w-4 text-center"></i>
                            <span class="list-sub-modules nunito-regular">Gestión de proyectos</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="mt-4" x-data="sidebarDropdown('tickets', {{ request()->routeIs('admin.tickets*') ? 'true' : 'false' }})">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-6 py-2 cursor-pointer focus:outline-none transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-ticket-alt w-5 text-center"></i>
                        <span :class="!sidebarOpen && 'hidden'" class="text-sm nunito-bold uppercase">Tickets</span>
                    </div>
                    <svg :class="{'rotate-90': open, 'hidden': !sidebarOpen}" class="w-4 h-4 ml-2 transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="open && sidebarOpen" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="{{ route('admin.tickets.index') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors {{ request()->routeIs('admin.tickets*') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}">
                            <i class="fas fa-ticket-alt text-sm w-4 text-center"></i>
                            <span class="list-sub-modules nunito-regular">Gestión de tickets</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="mt-4" x-data="sidebarDropdown('calendario', {{ request()->routeIs('admin.agencias') || request()->routeIs('admin.calendario') ? 'true' : 'false' }})">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-6 py-2 cursor-pointer focus:outline-none transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-calendar-alt w-5 text-center"></i>
                        <span :class="!sidebarOpen && 'hidden'" class="text-sm nunito-bold uppercase">Calendario</span>
                    </div>
                    <svg :class="{'rotate-90': open, 'hidden': !sidebarOpen}" class="w-4 h-4 ml-2 transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="open && sidebarOpen" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="{{ route('admin.agencias') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors {{ request()->routeIs('admin.agencias') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}">
                            <i class="fas fa-map-marker-alt text-sm w-4 text-center"></i>
                            <span class="list-sub-modules nunito-regular">Agencias</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.calendario') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors {{ request()->routeIs('admin.calendario') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}">
                            <i class="fas fa-calendar-alt text-sm w-4 text-center"></i>
                            <span class="list-sub-modules nunito-regular">Calendario</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="mt-4" x-data="sidebarDropdown('facturacion', {{ request()->routeIs('admin.facturas') || request()->routeIs('admin.cai') ? 'true' : 'false' }})">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-6 py-2 cursor-pointer focus:outline-none transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-file-invoice-dollar w-5 text-center"></i>
                        <span :class="!sidebarOpen && 'hidden'" class="text-sm nunito-bold uppercase">Facturación</span>
                    </div>
                    <svg :class="{'rotate-90': open, 'hidden': !sidebarOpen}" class="w-4 h-4 ml-2 transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="open && sidebarOpen" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="{{ route('admin.facturas') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors {{ request()->routeIs('admin.facturas') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}">
                            <i class="fas fa-file-invoice-dollar text-sm w-4 text-center"></i>
                            <span class="list-sub-modules nunito-regular">Facturas</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.cai') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors {{ request()->routeIs('admin.cai') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}">
                            <i class="fas fa-barcode text-sm w-4 text-center"></i>
                            <span class="list-sub-modules nunito-regular">CAI</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="mt-4" x-data="sidebarDropdown('reportes', {{ request()->routeIs('admin.reportes*') ? 'true' : 'false' }})">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-6 py-2 cursor-pointer focus:outline-none transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-chart-bar w-5 text-center"></i>
                        <span :class="!sidebarOpen && 'hidden'" class="text-sm nunito-bold uppercase">Reportes</span>
                    </div>
                    <svg :class="{'rotate-90': open, 'hidden': !sidebarOpen}" class="w-4 h-4 ml-2 transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="open && sidebarOpen" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="{{ route('admin.reportes') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors {{ request()->routeIs('admin.reportes') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}">
                            <i class="fas fa-file-alt text-sm w-4 text-center"></i>
                            <span class="list-sub-modules nunito-regular">Gestión de Reportes</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="mt-4" x-data="sidebarDropdown('inventario', '{{ request()->routeIs('admin.productos') || request()->routeIs('admin.kardex') ? true : false }}')">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-6 py-2 cursor-pointer focus:outline-none transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-boxes w-5 text-center"></i>
                        <span :class="!sidebarOpen && 'hidden'" class="text-sm nunito-bold uppercase">Inventario</span>
                    </div>
                    <svg :class="{'rotate-90': open, 'hidden': !sidebarOpen}" class="w-4 h-4 ml-2 transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="open && sidebarOpen" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="{{ route('admin.productos') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors {{ request()->routeIs('admin.productos') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}">
                            <i class="fas fa-box text-sm w-4 text-center"></i>
                            <span class="list-sub-modules nunito-regular">Productos</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.kardex') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors {{ request()->routeIs('admin.kardex') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}">
                            <i class="fas fa-archive text-sm w-4 text-center"></i>
                            <span class="list-sub-modules nunito-regular">Kardex</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="mt-4" x-data="sidebarDropdown('administracion', '{{ request()->routeIs('admin.gestion-usuarios') || request()->routeIs('admin.cambio-contrasena') || request()->routeIs('admin.bitacora') || request()->routeIs('admin.gestion-db') ? true : false }}')">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-6 py-2 cursor-pointer focus:outline-none transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-cogs w-5 text-center"></i>
                        <span :class="!sidebarOpen && 'hidden'"
                            class="text-sm nunito-bold uppercase">Administración</span>
                    </div>
                    <svg :class="{'rotate-90': open, 'hidden': !sidebarOpen}" class="w-4 h-4 ml-2 transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="open && sidebarOpen" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="{{ route('admin.gestion-usuarios') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors {{ request()->routeIs('admin.gestion-usuarios') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}">
                            <i class="fas fa-user-cog text-sm w-4 text-center"></i>
                            <span class="list-sub-modules nunito-regular">Gestión de usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.cambio-contrasena') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors {{ request()->routeIs('admin.cambio-contrasena') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}">
                            <i class="fas fa-unlock-alt text-sm w-4 text-center"></i>
                            <span class="list-sub-modules nunito-regular">Cambio de contraseña</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.bitacora') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors {{ request()->routeIs('admin.bitacora') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}">
                            <i class="fas fa-book text-sm w-4 text-center"></i>
                            <span class="list-sub-modules nunito-regular">Bitácora</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.gestion-db') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors {{ request()->routeIs('admin.gestion-db') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}">
                            <i class="fas fa-database text-sm w-4 text-center"></i>
                            <span class="list-sub-modules nunito-regular">Gestión de Base de Datos</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="mt-4" x-data="sidebarDropdown('mantenimiento', '{{ request()->routeIs('admin.mantenimiento.tickets') ? true : false }}')">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-6 py-2 cursor-pointer focus:outline-none transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-tools w-5 text-center"></i>
                        <span :class="!sidebarOpen && 'hidden'"
                            class="text-sm nunito-bold uppercase">Mantenimiento</span>
                    </div>
                    <svg :class="{'rotate-90': open, 'hidden': !sidebarOpen}" class="w-4 h-4 ml-2 transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="open && sidebarOpen" x-transition class="space-y-1 ml-4 mt-2">
                    <li>
                        <a href="{{ route('admin.mantenimiento.tickets') }}"
                            class="flex items-center gap-2 py-2 px-4 rounded transition-colors {{ request()->routeIs('admin.mantenimiento.tickets') ? 'bg-gray-800 text-blue-400' : 'hover:bg-gray-800 hover:text-blue-400' }}">
                            <span class="text-sm nunito-regular">Gestión de tickets</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Botón cerrar sesión -->
    <div class="p-4 border-t border-gray-800">
        <button type="button" onclick="window.location.href='/login'"
            class="w-full flex items-center gap-3 px-4 py-2 rounded bg-red-600 hover:bg-red-700 text-white font-semibold transition-colors"
            :class="!sidebarOpen && 'justify-center'">
            <i class="fas fa-sign-out-alt"></i>
            <span :class="!sidebarOpen && 'hidden'">Cerrar sesión</span>
        </button>
    </div>
</aside>