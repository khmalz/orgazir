@extends('layouts.main')

@section('content')
    <div>
        <div class="w-full rounded-lg bg-white p-5">
            <h2 class="mb-3 text-xl font-semibold">List Histori Transaksi</h2>

            <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3" scope="col">
                            Kode
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Total Item
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Diskon
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Total Harga
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800">
                        <th class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white" scope="row">
                            FJASJ12
                        </th>
                        <td class="px-6 py-4">
                            2
                        </td>
                        <td class="px-6 py-4">
                            0
                        </td>
                        <td class="px-6 py-4">
                            8.000
                        </td>
                        <td class="px-6 py-4">
                            <a class="font-medium text-blue-600 hover:underline" href="#">Edit</a>
                            <a class="font-medium text-red-600 hover:underline" href="#">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection
