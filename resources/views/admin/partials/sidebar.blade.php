<!-- Desktop sidebar -->
<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            {{ config('app.name') }}
        </a>

        <ul class="mt-6">
            <x-admin.sidenav-link
                title="Dashboard"
                icon="fas fa-home"
                :href="route('admin.dashboard')"
                :active="isActiveNav('admin.dashboard')"
            />
            <x-admin.sidenav-link
                title="Users"
                icon="fas fa-users"
                :href="route('admin.users.index')"
                :active="isActiveNav('admin.users')"
            />
            <x-admin.sidenav-link
                title="Roles"
                icon="fas fa-cog"
                :href="route('admin.roles.index')"
                :active="isActiveNav('admin.roles')"
            />
        </ul>
        <div class="px-6 my-6">
            <button class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Create account
                <span class="ml-2" aria-hidden="true">+</span>
            </button>
        </div>
    </div>
</aside>


<!-- Mobile sidebar -->
<!-- Backdrop -->
<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            {{ config('app.name') }}
        </a>

        <ul class="mt-6">
            <x-admin.sidenav-link
                title="Dashboard"
                icon="fas fa-home"
                :href="route('admin.dashboard')"
                :active="isActiveNav('admin.dashboard')"
            />
            <x-admin.sidenav-link
                title="Users"
                icon="fas fa-users"
                :href="route('admin.users.index')"
                :active="isActiveNav('admin.users')"
            />
            <x-admin.sidenav-link
                title="Roles"
                icon="fas fa-cog"
                :href="route('admin.roles.index')"
                :active="isActiveNav('admin.roles')"
            />
        </ul>
        <div class="px-6 my-6">
            <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Create account
                <span class="ml-2" aria-hidden="true">+</span>
            </button>
        </div>
    </div>
</aside>