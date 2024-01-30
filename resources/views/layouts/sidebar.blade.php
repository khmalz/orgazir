<aside class="fixed left-0 top-0 z-30 h-screen w-52 -translate-x-full transition-transform sm:w-64 sm:translate-x-0"
    id="separator-sidebar" aria-label="Sidebar">
    <div class="h-full overflow-y-auto bg-gray-50 px-3 py-4 dark:bg-gray-800">
        <h2 class="mb-3 text-center text-3xl font-semibold text-blue-900">Orgazir</h2>
        <ul class="space-y-2 px-1 font-medium">
            <li>
                <a class="{{ request()->routeIs('dashboard') ? 'text-blue-500' : 'text-gray-900' }} group flex items-center rounded-lg p-2 hover:bg-gray-100"
                    href="{{ route('dashboard') }}">
                    <svg class="h-5 w-5 flex-shrink-0 transition duration-75" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <h4 class="py-1 text-sm font-medium text-slate-700">Produk</h4>
            <li>
                <a class="{{ request()->routeIs('product.index') ? 'text-blue-500' : 'text-gray-900' }} group flex items-center rounded-lg p-2 hover:bg-gray-100"
                    href="{{ route('product.index') }}">
                    <svg class="h-5 w-5 flex-shrink-0 transition duration-75" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M20 10H4v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8ZM9 13v-1h6v1c0 .6-.4 1-1 1h-4a1 1 0 0 1-1-1Z"
                            clip-rule="evenodd" />
                        <path d="M2 6c0-1.1.9-2 2-2h16a2 2 0 1 1 0 4H4a2 2 0 0 1-2-2Z" />
                    </svg>
                    <span class="ms-3 flex-1 whitespace-nowrap">List</span>
                </a>
            </li>
            <h4 class="py-1 text-sm font-medium text-slate-700">Transaksi</h4>
            <li>
                <a class="{{ request()->routeIs('transaction.pay') ? 'text-blue-500' : 'text-gray-900' }} group flex items-center rounded-lg p-2 hover:bg-gray-100"
                    href="{{ route('transaction.pay') }}">
                    <svg class="h-5 w-5 flex-shrink-0 transition duration-75" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M7 6c0-1.1.9-2 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2h-2v-4a3 3 0 0 0-3-3H7V6Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M2 11c0-1.1.9-2 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-7Zm7.5 1a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5Z"
                            clip-rule="evenodd" />
                        <path d="M10.5 14.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" />
                    </svg>
                    <span class="ms-3 flex-1 whitespace-nowrap">Pembayaran</span>
                </a>
            </li>
            <li>
                <a class="{{ request()->routeIs('transaction.history') ? 'text-blue-500' : 'text-gray-900' }} group flex items-center rounded-lg p-2 hover:bg-gray-100"
                    href="{{ route('transaction.history') }}">
                    <svg class="h-5 w-5 flex-shrink-0 transition duration-75" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm11-4a1 1 0 1 0-2 0v4c0 .3.1.5.3.7l3 3a1 1 0 0 0 1.4-1.4L13 11.6V8Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="ms-3 flex-1 whitespace-nowrap">History</span>
                </a>
            </li>
            <h4 class="py-1 text-sm font-medium text-slate-700">Akun</h4>
            <li>
                <a class="{{ request()->routeIs('cashier.index') ? 'text-blue-500' : 'text-gray-900' }} group flex items-center rounded-lg p-2 hover:bg-gray-100"
                    href="{{ route('cashier.index') }}">
                    <svg class="h-5 w-5 flex-shrink-0 transition duration-75" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="ms-3 flex-1 whitespace-nowrap">Kasir</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
