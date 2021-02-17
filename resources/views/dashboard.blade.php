<x-admin-layout>
    <div class="grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
        </h2>
        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <x-admin.status-box
                title="Total clients"
                subtitle="6389"
                icon="fas fa-users"
                iconClasses="text-gray-500 bg-gray-100 dark:text-gray-100 dark:bg-gray-500"
            />
            <x-admin.status-box
                title="Account balance"
                subtitle="$ 46,760.89"
                icon="fas fa-cash-register"
                iconClasses="text-green-500 bg-green-100 dark:text-green-100 dark:bg-green-500"
            />
            <x-admin.status-box
                title="New sales"
                subtitle="376"
                icon="fas fa-shopping-cart"
                iconClasses="text-blue-500 bg-blue-100 dark:text-blue-100 dark:bg-blue-500"
            />
            <x-admin.status-box
                title="Pending contacts"
                subtitle="35"
                icon="fas fa-inbox"
                iconClasses="text-purple-500 bg-purple-100 dark:text-purple-100 dark:bg-purple-500"
            />
        </div>
    </div>
</x-admin-layout>
