@extends('layouts.main')

@section('content')
    <div>
        <div class="mb-5 flex w-full items-center justify-between rounded-lg bg-white p-5">
            <h2 class="text-xl font-semibold">Transaksi</h2>
            <button class="rounded-lg px-5 py-2.5 text-center text-sm font-medium focus:outline-none focus:ring-0"><svg
                    class="h-6 w-6 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M4 4c0-.6.4-1 1-1h1.5c.5 0 .9.3 1 .8L7.9 6H19a1 1 0 0 1 1 1.2l-1.3 6a1 1 0 0 1-1 .8h-8l.2 1H17a3 3 0 1 1-2.8 2h-2.4a3 3 0 1 1-4-1.8L5.7 5H5a1 1 0 0 1-1-1Z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <div class="grid grid-cols-2 space-x-2 sm:grid-cols-3 md:grid-cols-4">
            <div class="flex w-full max-w-sm flex-col justify-between rounded-lg border border-gray-200 bg-white shadow">
                <div>
                    <div>
                        <img class="h-64 w-full rounded-t-lg"
                            src="https://www.astronauts.id/blog/wp-content/uploads/2023/04/Resep-Ayam-Goreng-Serundeng-ala-Rumahan-yang-Nggak-Kalah-Enak-dari-Restoran.jpg"
                            alt="product image" />
                    </div>
                    <div class="mt-2 px-5 pb-5">
                        <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white">Ayam Goreng Lorem,
                            ipsum dolor sit amet consectetur adipisicing elit. Ex, unde!</h5>
                    </div>
                </div>
                <div class="px-5 pb-5">
                    <div class="flex items-center justify-between">

                        <form>
                            <div class="relative flex max-w-[9rem] items-center">
                                <button
                                    class="h-11 rounded-s-full border border-r-0 border-gray-300 bg-gray-100 p-3 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100"
                                    id="decrement-button" data-input-counter-decrement="quantity-input" type="button">
                                    <svg class="h-3 w-3 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>
                                <input
                                    class="block h-11 w-full border-x-0 border-gray-300 bg-gray-100 py-2.5 text-center text-sm text-gray-900 focus:border-gray-300 focus:outline-none focus:ring-0 active:ring-0"
                                    id="quantity-input" data-input-counter data-input-counter-min="1" type="text"
                                    aria-describedby="helper-text-explanation" placeholder="1" required>
                                <button
                                    class="h-11 rounded-e-full border border-l-0 border-gray-300 bg-gray-100 p-3 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100"
                                    id="increment-button" data-input-counter-increment="quantity-input" type="button">
                                    <svg class="h-3 w-3 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </div>
                        </form>

                        <button
                            class="rounded-lg border border-blue-600 px-5 py-2.5 text-center text-sm font-medium text-blue-500 hover:bg-blue-700 hover:text-white focus:outline-none focus:ring-1 focus:ring-blue-600">Add
                            item</button>
                    </div>
                </div>
            </div>
            <div class="flex w-full max-w-sm flex-col justify-between rounded-lg border border-gray-200 bg-white shadow">
                <div>
                    <div>
                        <img class="h-64 w-full rounded-t-lg"
                            src="https://img-global.cpcdn.com/recipes/4cac056c1b633b76/400x400cq70/photo.jpg"
                            alt="product image" />
                    </div>
                    <div class="mt-2 px-5 pb-5">
                        <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white">Ayam Goreng Lorem,
                            ipsum dolor sit amet consectetur adipisicing elit. Ex, unde!</h5>
                    </div>
                </div>
                <div class="px-5 pb-5">
                    <div class="flex items-center justify-between">

                        <form>
                            <div class="relative flex max-w-[9rem] items-center">
                                <button
                                    class="h-11 rounded-s-full border border-r-0 border-gray-300 bg-gray-100 p-3 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100"
                                    id="decrement-button" data-input-counter-decrement="quantity-input" type="button">
                                    <svg class="h-3 w-3 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>
                                <input
                                    class="block h-11 w-full border-x-0 border-gray-300 bg-gray-100 py-2.5 text-center text-sm text-gray-900 focus:border-gray-300 focus:outline-none focus:ring-0 active:ring-0"
                                    id="quantity-input" data-input-counter data-input-counter-min="1" type="text"
                                    aria-describedby="helper-text-explanation" placeholder="1" required>
                                <button
                                    class="h-11 rounded-e-full border border-l-0 border-gray-300 bg-gray-100 p-3 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100"
                                    id="increment-button" data-input-counter-increment="quantity-input" type="button">
                                    <svg class="h-3 w-3 text-gray-900 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </div>
                        </form>

                        <button
                            class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white focus:outline-none focus:ring-1 focus:ring-blue-600">Terpilih</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
