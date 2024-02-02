@extends('layouts.main')

@section('content')
    <div>
        <div class="w-full p-5 bg-white rounded-lg">
            <div class="flex items-center justify-between mb-4">
                <h2 class="mb-3 text-xl font-semibold">List Produk</h2>

                <a class="px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    href="{{ route('product.create') }}">Tambah Produk</a>
            </div>

            <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3" scope="col">
                            Nama
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Kategori
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Persediaan
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Harga (Normal)
                        </th>
                        <th class="px-6 py-3" scope="col">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr
                            class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800">
                            <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                                scope="row">
                                {{ $product->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $product->category->text }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $product->stock }}
                            </td>
                            <td class="px-6 py-4">
                                {{ number_format($product->standard_price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                <a class="font-medium text-blue-600 hover:underline"
                                    href="{{ route('product.edit', $product) }}" href="#">Edit</a>
                                <form method="POST" action="{{ route('product.destroy', $product) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a class="font-medium text-red-600 hover:underline" href="#"
                                        onclick="return confirm('Apakah yakin untuk menghapus') ? this.parentElement.submit() : null">Delete</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <div class="mt-4">{{ $products->links() }}</div>
    </div>
@endsection
