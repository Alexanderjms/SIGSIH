<aside :class="sidebarOpen ? 'w-72' : 'w-20'" x-data x-init="
    if ($store.perfil.firstTime) {
        $el.classList.add('pointer-events-none', 'opacity-50');
    }
  "
    class="bg-gray-900 text-gray-200 h-screen flex flex-col p-0 shadow-lg overflow-y-auto scrollbar-hidden transition-all duration-300 ease-in-out relative">

    <!-- BLOQUEO VISUAL -->
    <template x-if="$store.perfil.firstTime">
        <div class="absolute inset-0 z-50 bg-black bg-opacity-60 flex flex-col items-center justify-center">
            <div class="bg-white rounded-lg shadow p-6 text-center">
                <div class="text-lg font-bold mb-2 text-gray-800">Completa tu perfil</div>
                <div class="text-gray-600 mb-4">Debes completar tu perfil antes de navegar por el sistema.</div>
                <span class="inline-block animate-bounce text-blue-600 text-3xl"><i class="fas fa-user-lock"></i></span>
            </div>
        </div>
    </template>

    <!-- Menú -->
    <nav class="flex-1 flex flex-col py-4">
        <ul class="space-y-3 flex-1">
            {{-- Dashboard --}}
            <li>
                <x-admin.sidebar-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')"
                    class="py-2 px-2 rounded-l-full no-flash">
                    <i class="fa-solid fa-house w-5 text-center"></i>
                    <span :class="!sidebarOpen && 'hidden'" class="nunito-bold">Dashboard</span>
                </x-admin.sidebar-link>
            </li>

            {{-- Seguridad --}}
            <li class="mt-2"
                x-data="sidebarDropdown('seguridad', {{ (request()->routeIs('admin.gestion-usuarios') || request()->routeIs('admin.roles-permisos') || request()->routeIs('admin.configuracion-acceso')) ? 'true' : 'false' }})"
                x-init="init()">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-4 py-1.5 transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-shield-alt w-5 text-center"></i>
                        <span :class="!sidebarOpen && 'hidden'" class="text-sm nunito-bold uppercase">Seguridad</span>
                    </div>
                    <svg :class="{'rotate-90': open, 'hidden': !sidebarOpen}" class="w-4 h-4 ml-2 transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="open && sidebarOpen" x-transition class="space-y-0.5 ml-4 mt-1">
                    <li>
                        <x-admin.sidebar-link :href="route('admin.gestion-usuarios')"
                            :active="request()->routeIs('admin.gestion-usuarios')" class="py-1 px-3">
                            <i class="fas fa-user text-sm w-4 text-center"></i>
                            Gestión de Usuarios
                        </x-admin.sidebar-link>
                    </li>
                    <li>
                        <x-admin.sidebar-link :href="route('admin.roles-permisos')"
                            :active="request()->routeIs('admin.roles-permisos')" class="py-1 px-3">
                            <i class="fas fa-user-shield text-sm w-4 text-center"></i>
                            Gestión de roles y permisos
                        </x-admin.sidebar-link>
                    </li>
                    <li>
                        <x-admin.sidebar-link :href="route('admin.gestion-objetos')"
                            :active="request()->routeIs('admin.gestion-objetos')" class="py-1 px-3">
                            <i class="fas fa-cube text-sm w-4 text-center"></i>
                            Gestión de Objetos
                        </x-admin.sidebar-link>
                    </li>
                    <li>
                        <x-admin.sidebar-link :href="route('admin.configuracion-acceso')"
                            :active="request()->routeIs('admin.configuracion-acceso')" class="py-1 px-3">
                            <i class="fas fa-key text-sm w-4 text-center"></i>
                            Configuración de accesos al sistema
                        </x-admin.sidebar-link>
                    </li>
                </ul>
            </li>

            {{-- Clientes --}}
            <li class="mt-2"
                x-data="sidebarDropdown('clientes', {{ (request()->routeIs('admin.gestion-empresas') || request()->routeIs('admin.cotizaciones')) ? 'true' : 'false' }})"
                x-init="init()">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-4 py-1.5 transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-users w-5 text-center"></i>
                        <span :class="!sidebarOpen && 'hidden'" class="text-sm nunito-bold uppercase">Clientes</span>
                    </div>
                    <svg :class="{'rotate-90': open, 'hidden': !sidebarOpen}" class="w-4 h-4 ml-2 transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="open && sidebarOpen" x-transition class="space-y-0.5 ml-4 mt-1">
                    <li>
                        <x-admin.sidebar-link :href="route('admin.gestion-empresas')"
                            :active="request()->routeIs('admin.gestion-empresas')" class="py-1 px-3">
                            <i class="fas fa-building text-sm w-4 text-center"></i>
                            Gestión de Empresas
                        </x-admin.sidebar-link>
                    </li>
                    <li>
                        <x-admin.sidebar-link :href="route('admin.cotizaciones')"
                            :active="request()->routeIs('admin.cotizaciones')" class="py-1 px-3">
                            <i class="fas fa-file-invoice text-sm w-4 text-center"></i>
                            Cotizaciones
                        </x-admin.sidebar-link>
                    </li>
                </ul>
            </li>

            {{-- Solicitudes --}}
            <li class="mt-2"
                x-data="sidebarDropdown('solicitudes', {{ (request()->routeIs('admin.solicitudes.index') || request()->routeIs('admin.solicitudes.empresas')) ? 'true' : 'false' }})"
                x-init="init()">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-4 py-1.5 transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-tasks w-5 text-center"></i>
                        <span :class="!sidebarOpen && 'hidden'" class="text-sm nunito-bold uppercase">Solicitudes</span>
                    </div>
                    <svg :class="{'rotate-90': open, 'hidden': !sidebarOpen}" class="w-4 h-4 ml-2 transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="open && sidebarOpen" x-transition class="space-y-0.5 ml-4 mt-1">
                    <li>
                        <x-admin.sidebar-link :href="route('admin.solicitudes.index')"
                            :active="request()->routeIs('admin.solicitudes.index')" class="py-1 px-3">
                            <i class="fas fa-envelope-open-text text-sm w-4 text-center"></i>
                            Solicitudes
                        </x-admin.sidebar-link>
                    </li>
                    <li>
                        <x-admin.sidebar-link :href="route('admin.solicitudes.empresas')"
                            :active="request()->routeIs('admin.solicitudes.empresas')" class="py-1 px-3">
                            <i class="fas fa-building text-sm w-4 text-center"></i>
                            Empresas
                        </x-admin.sidebar-link>
                    </li>
                </ul>
            </li>

            {{-- Órdenes de Servicio --}}
            <li class="mt-2"
                x-data="sidebarDropdown('ordenes-servicio', {{ request()->routeIs('admin.ordenes-servicio*') ? 'true' : 'false' }})"
                x-init="init()">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-4 py-1.5 transition-colors">
                    <div class="flex items-center gap-3 min-w-0">
                        <i class="fas fa-clipboard-list w-5 text-center flex-shrink-0"></i>
                        <span :class="!sidebarOpen && 'hidden'" class="text-sm nunito-bold uppercase truncate">Órdenes
                            de Servicio</span>
                    </div>
                    <svg :class="{'rotate-90': open, 'hidden': !sidebarOpen}" class="w-4 h-4 ml-2 transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="open && sidebarOpen" x-transition class="space-y-0.5 ml-4 mt-1">
                    <li>
                        <x-admin.sidebar-link :href="route('admin.ordenes-servicio.index')"
                            :active="request()->routeIs('admin.ordenes-servicio*')" class="py-1 px-3">
                            <i class="fas fa-clipboard-list text-sm w-4 text-center"></i>
                            Órdenes de Servicio
                        </x-admin.sidebar-link>
                    </li>
                </ul>
            </li>

            {{-- Proyectos --}}
            <li class="mt-2"
                x-data="sidebarDropdown('proyectos', {{ (request()->routeIs('admin.proyectos*') || request()->routeIs('admin.vista-proyectos')) ? 'true' : 'false' }})"
                x-init="init()">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-4 py-1.5 transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-project-diagram w-5 text-center"></i>
                        <span :class="!sidebarOpen && 'hidden'" class="text-sm nunito-bold uppercase">Proyectos</span>
                    </div>
                    <svg :class="{'rotate-90': open, 'hidden': !sidebarOpen}" class="w-4 h-4 ml-2 transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="open && sidebarOpen" x-transition class="space-y-0.5 ml-4 mt-1">
                    <li>
                        <x-admin.sidebar-link :href="route('admin.vista-proyectos')"
                            :active="request()->routeIs('admin.vista-proyectos')" class="py-1 px-3">
                            <i class="fas fa-eye text-sm w-4 text-center"></i>
                            Vista de proyectos
                        </x-admin.sidebar-link>
                    </li>
                    <li>
                        <x-admin.sidebar-link :href="route('admin.proyectos')"
                            :active="request()->routeIs('admin.proyectos*')" class="py-1 px-3">
                            <i class="fas fa-cogs text-sm w-4 text-center"></i>
                            Gestión de proyectos
                        </x-admin.sidebar-link>
                    </li>
                </ul>
            </li>

            {{-- Tickets --}}
            <li class="mt-2"
                x-data="sidebarDropdown('tickets', {{ request()->routeIs('admin.tickets*') ? 'true' : 'false' }})"
                x-init="init()">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-4 py-1.5 transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-ticket-alt w-5 text-center"></i>
                        <span :class="!sidebarOpen && 'hidden'" class="text-sm nunito-bold uppercase">Tickets</span>
                    </div>
                    <svg :class="{'rotate-90': open, 'hidden': !sidebarOpen}" class="w-4 h-4 ml-2 transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="open && sidebarOpen" x-transition class="space-y-0.5 ml-4 mt-1">
                    <li>
                        <x-admin.sidebar-link :href="route('admin.tickets.index')"
                            :active="request()->routeIs('admin.tickets*')" class="py-1 px-3">
                            <i class="fas fa-ticket-alt text-sm w-4 text-center"></i>
                            Gestión de tickets
                        </x-admin.sidebar-link>
                    </li>
                </ul>
            </li>

            {{-- Calendario --}}
            <li class="mt-2"
                x-data="sidebarDropdown('calendario', {{ (request()->routeIs('admin.agencias') || request()->routeIs('admin.calendario')) ? 'true' : 'false' }})"
                x-init="init()">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-4 py-1.5 transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-calendar-alt w-5 text-center"></i>
                        <span :class="!sidebarOpen && 'hidden'" class="text-sm nunito-bold uppercase">Calendario</span>
                    </div>
                    <svg :class="{'rotate-90': open, 'hidden': !sidebarOpen}" class="w-4 h-4 ml-2 transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="open && sidebarOpen" x-transition class="space-y-0.5 ml-4 mt-1">
                    <li>
                        <x-admin.sidebar-link :href="route('admin.agencias')"
                            :active="request()->routeIs('admin.agencias')" class="py-1 px-3">
                            <i class="fas fa-map-marker-alt text-sm w-4 text-center"></i>
                            Agencias
                        </x-admin.sidebar-link>
                    </li>
                    <li>
                        <x-admin.sidebar-link :href="route('admin.calendario')"
                            :active="request()->routeIs('admin.calendario')" class="py-1 px-3">
                            <i class="fas fa-calendar-alt text-sm w-4 text-center"></i>
                            Calendario
                        </x-admin.sidebar-link>
                    </li>
                </ul>
            </li>

            {{-- Facturación --}}
            <li class="mt-2"
                x-data="sidebarDropdown('facturacion', {{ (request()->routeIs('admin.facturas') || request()->routeIs('admin.cai')) ? 'true' : 'false' }})"
                x-init="init()">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-4 py-1.5 transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-file-invoice-dollar w-5 text-center"></i>
                        <span :class="!sidebarOpen && 'hidden'" class="text-sm nunito-bold uppercase">Facturación</span>
                    </div>
                    <svg :class="{'rotate-90': open, 'hidden': !sidebarOpen}" class="w-4 h-4 ml-2 transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="open && sidebarOpen" x-transition class="space-y-0.5 ml-4 mt-1">
                    <li>
                        <x-admin.sidebar-link :href="route('admin.facturas')"
                            :active="request()->routeIs('admin.facturas')" class="py-1 px-3">
                            <i class="fas fa-file-invoice-dollar text-sm w-4 text-center"></i>
                            Facturas
                        </x-admin.sidebar-link>
                    </li>
                    <li>
                        <x-admin.sidebar-link :href="route('admin.cai')" :active="request()->routeIs('admin.cai')"
                            class="py-1 px-3">
                            <i class="fas fa-barcode text-sm w-4 text-center"></i>
                            CAI
                        </x-admin.sidebar-link>
                    </li>
                </ul>
            </li>

            {{-- Reportes --}}
            <li class="mt-2"
                x-data="sidebarDropdown('reportes', {{ request()->routeIs('admin.reportes*') ? 'true' : 'false' }})"
                x-init="init()">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-4 py-1.5 transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-chart-bar w-5 text-center"></i>
                        <span :class="!sidebarOpen && 'hidden'" class="text-sm nunito-bold uppercase">Reportes</span>
                    </div>
                    <svg :class="{'rotate-90': open, 'hidden': !sidebarOpen}" class="w-4 h-4 ml-2 transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="open && sidebarOpen" x-transition class="space-y-0.5 ml-4 mt-1">
                    <li>
                        <x-admin.sidebar-link :href="route('admin.reportes')"
                            :active="request()->routeIs('admin.reportes')" class="py-1 px-3">
                            <i class="fas fa-file-alt text-sm w-4 text-center"></i>
                            Gestión de Reportes
                        </x-admin.sidebar-link>
                    </li>
                </ul>
            </li>

            {{-- Inventario --}}
            <li class="mt-2"
                x-data="sidebarDropdown('inventario', {{ (request()->routeIs('admin.productos') || request()->routeIs('admin.kardex')) ? 'true' : 'false' }})"
                x-init="init()">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-4 py-1.5 transition-colors">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-boxes w-5 text-center"></i>
                        <span :class="!sidebarOpen && 'hidden'" class="text-sm nunito-bold uppercase">Inventario</span>
                    </div>
                    <svg :class="{'rotate-90': open, 'hidden': !sidebarOpen}" class="w-4 h-4 ml-2 transition-transform"
                        fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <ul x-show="open && sidebarOpen" x-transition class="space-y-0.5 ml-4 mt-1">
                    <li>
                        <x-admin.sidebar-link :href="route('admin.productos')"
                            :active="request()->routeIs('admin.productos')" class="py-1 px-3">
                            <i class="fas fa-box text-sm w-4 text-center"></i>
                            Productos
                        </x-admin.sidebar-link>
                    </li>
                    <li>
                        <x-admin.sidebar-link :href="route('admin.kardex')" :active="request()->routeIs('admin.kardex')"
                            class="py-1 px-3">
                            <i class="fas fa-archive text-sm w-4 text-center"></i>
                            Kardex
                        </x-admin.sidebar-link>
                    </li>
                </ul>
            </li>

            {{-- Administración --}}
            <li class="mt-2"
                x-data="sidebarDropdown('administracion', {{ (request()->routeIs('admin.gestion-usuarios') || request()->routeIs('admin.cambio-contrasena') || request()->routeIs('admin.bitacora') || request()->routeIs('admin.gestion-db')) ? 'true' : 'false' }})"
                x-init="init()">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-4 py-1.5 transition-colors">
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
                <ul x-show="open && sidebarOpen" x-transition class="space-y-0.5 ml-4 mt-1">
                    <li>
                        <x-admin.sidebar-link :href="route('admin.gestion-usuarios')"
                            :active="request()->routeIs('admin.gestion-usuarios')" class="py-1 px-3">
                            <i class="fas fa-user-cog text-sm w-4 text-center"></i>
                            Gestión de usuarios
                        </x-admin.sidebar-link>
                    </li>
                    <li>
                        <x-admin.sidebar-link :href="route('admin.perfil')" :active="request()->routeIs('admin.perfil')"
                            class="py-1 px-3">
                            <i class="fas fa-user-circle text-sm w-4 text-center"></i>
                            Mi perfil
                        </x-admin.sidebar-link>
                    </li>
                    <li>
                        <x-admin.sidebar-link :href="route('admin.cambio-contrasena')"
                            :active="request()->routeIs('admin.cambio-contrasena')" class="py-1 px-3">
                            <i class="fas fa-unlock-alt text-sm w-4 text-center"></i>
                            Cambio de contraseña
                        </x-admin.sidebar-link>
                    </li>
                    <li>
                        <x-admin.sidebar-link :href="route('admin.bitacora')"
                            :active="request()->routeIs('admin.bitacora')" class="py-1 px-3">
                            <i class="fas fa-book text-sm w-4 text-center"></i>
                            Bitácora
                        </x-admin.sidebar-link>
                    </li>
                    <li>
                        <x-admin.sidebar-link :href="route('admin.gestion-db')"
                            :active="request()->routeIs('admin.gestion-db')" class="py-1 px-3">
                            <i class="fas fa-database text-sm w-4 text-center"></i>
                            Gestión de Base de Datos
                        </x-admin.sidebar-link>
                    </li>
                </ul>
            </li>

            {{-- Mantenimiento --}}
            <li class="mt-2"
                x-data="sidebarDropdown('mantenimiento', {{ request()->routeIs('admin.mantenimiento.tickets') ? 'true' : 'false' }})"
                x-init="init()">
                <button @click="toggle()" :class="open ? 'bg-gray-800 text-yellow-400' : 'text-gray-400'"
                    class="w-full flex items-center justify-between px-4 py-1.5 transition-colors">
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
                <ul x-show="open && sidebarOpen" x-transition class="space-y-0.5 ml-4 mt-1">
                    <li>
                        <x-admin.sidebar-link :href="route('admin.mantenimiento.tickets')"
                            :active="request()->routeIs('admin.mantenimiento.tickets')" class="py-1 px-3">
                            Gestión de tickets
                        </x-admin.sidebar-link>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Botón salir -->
    <div class="p-4 border-t border-gray-800">
        <button type="button" onclick="window.location.href='/login'"
            class="w-full flex items-center gap-3 px-4 py-2 rounded bg-red-600 hover:bg-red-700 text-white font-semibold transition-colors"
            :class="!sidebarOpen && 'justify-center'">
            <i class="fas fa-sign-out-alt"></i>
            <span :class="!sidebarOpen && 'hidden'">Cerrar sesión</span>
        </button>
    </div>
</aside>