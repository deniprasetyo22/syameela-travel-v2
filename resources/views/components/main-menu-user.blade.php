<div class="rounded-md bg-gray-50">
    <h2 class="my-2 text-center text-lg font-bold text-gray-900 dark:text-white">Menu Utama</h2>
    <ul class="space-y-2 px-4" id="profile-tabs" role="tablist">
        <li>
            <a href="{{ route('profile') }}"
                class="{{ request()->routeIs('profile', 'edit-personal-informations', 'profile-documents', 'edit-profile-documents', 'profile-security', 'edit-security') ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex w-full cursor-pointer items-center rounded-lg p-2 text-gray-900">
                <i
                    class="fa-solid fa-user flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                Profil
            </a>
        </li>
        <li>
            <a href="{{ route('hajj-list') }}"
                class="{{ request()->routeIs('hajj-list', 'show-hajj-list') ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex w-full cursor-pointer items-center rounded-lg p-2 text-gray-900">
                <i
                    class="fa-solid fa-list flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                Haji
            </a>
        </li>
        <li>
            <a href="{{ route('umrah-list') }}"
                class="{{ request()->routeIs('umrah-list', 'show-umrah-list') ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex w-full cursor-pointer items-center rounded-lg p-2 text-gray-900">
                <i
                    class="fa-solid fa-list flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                Umroh
            </a>
        </li>
        <li>
            <a href="{{ route('my-payments') }}"
                class="{{ request()->routeIs('my-payments', 'show-my-payment') ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex w-full cursor-pointer items-center rounded-lg p-2 text-gray-900">
                <i
                    class="fa-solid fa-dollar flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                Pembayaran
            </a>
        </li>
        <li>
            <a href="{{ route('my-manasik') }}"
                class="{{ request()->routeIs('my-manasik', 'show-my-manasik') ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex w-full cursor-pointer items-center rounded-lg p-2 text-gray-900">
                <i
                    class="fa-solid fa-calendar-days flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                Jadwal Manasik
            </a>
        </li>
        <li>
            <a href="{{ route('my-trips') }}"
                class="{{ request()->routeIs('my-trips', 'show-my-trip') ? 'bg-blue-100 hover:bg-blue-200' : 'hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group flex w-full cursor-pointer items-center rounded-lg p-2 text-gray-900">
                <i
                    class="fa-solid fa-circle-info flex w-6 justify-center text-gray-500 transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"></i>
                Informasi Keberangkatan
            </a>
        </li>
    </ul>
</div>
