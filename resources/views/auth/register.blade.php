@extends('auth.layouts.main')

@section('content')
    <h1 class="mb-5 text-3xl font-semibold">Register</h1>
    <form>
        <div class="mb-5">
            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="name">Name</label>
            <input
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="name" type="text" placeholder="name" required>
        </div>
        <div class="mb-5">
            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="email">Email</label>
            <input
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="email" type="email" placeholder="name@flowbite.com" required>
        </div>
        <div class="mb-5">
            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="password">Password</label>
            <input
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                id="password" type="password" required>
        </div>
        <button
            class="w-auto rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
            type="submit">Register</button>
    </form>
@endsection
