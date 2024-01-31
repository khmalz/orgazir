@extends('layouts.main')

@section('content')
    <div>
        <div class="mb-5 flex w-full items-center justify-between rounded-lg bg-white p-5">
            <h2 class="text-xl font-semibold">Transaksi</h2>
            <button class="rounded-lg px-5 py-2.5 text-center text-sm font-medium focus:outline-none focus:ring-0"
                data-drawer-target="drawer-transaction" data-drawer-show="drawer-transaction" data-drawer-placement="right"
                type="button" aria-controls="drawer-transaction"><svg class="h-6 w-6 text-blue-500" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M4 4c0-.6.4-1 1-1h1.5c.5 0 .9.3 1 .8L7.9 6H19a1 1 0 0 1 1 1.2l-1.3 6a1 1 0 0 1-1 .8h-8l.2 1H17a3 3 0 1 1-2.8 2h-2.4a3 3 0 1 1-4-1.8L5.7 5H5a1 1 0 0 1-1-1Z"
                        clip-rule="evenodd" />
                </svg>
            </button>

            <div class="fixed right-0 top-0 z-50 h-screen translate-x-full overflow-y-auto bg-white p-4 transition-transform dark:bg-gray-800 sm:w-1/2 lg:w-1/3"
                id="drawer-transaction" aria-labelledby="drawer-right-label" tabindex="-1">
                <h5 class="mb-6 inline-flex items-center text-base font-semibold uppercase text-gray-500 dark:text-gray-400"
                    id="drawer-label">New Order</h5>
                <button
                    class="absolute end-2.5 top-2.5 inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-drawer-hide="drawer-transaction" type="button" aria-controls="drawer-transaction">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close menu</span>
                </button>
                <form class="mb-6">
                    <div class="flex flex-col space-y-2" id="cart-container">
                        <p class="font-semibold">Belum Pilih Makanan/Minuman</p>
                    </div>

                    <div class="my-5 w-full border border-t bg-black"></div>
                    <div class="flex w-full items-center justify-between">
                        <p class="text-sm font-medium">Sub Total</p>
                        <p class="text-sm font-semibold text-pink-500" id="sub-total-price">0</p>
                    </div>
                    <div class="flex w-full items-center justify-between">
                        <p class="text-sm font-medium">Diskon</p>
                        <p class="text-sm font-semibold text-pink-500" id="total-diskon">0%</p>
                    </div>
                    <div class="flex w-full items-center justify-between">
                        <p class="text-sm font-medium">Total</p>
                        <p class="text-sm font-semibold text-pink-500" id="total-price">0</p>
                    </div>
                    <button
                        class="mb-2 mt-4 flex w-full items-center justify-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="submit">Create Bills</button>
                </form>
            </div>
        </div>

        <div class="mx-auto flex w-full flex-col items-center">
            <div class="grid grid-cols-1 gap-y-2 sm:grid-cols-1 md:grid-cols-2 md:gap-4 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($products as $product)
                    <div class="flex w-full max-w-sm flex-col justify-between rounded-lg border border-gray-200 bg-white shadow"
                        id="card-header" data-product="{{ json_encode($product) }}">
                        <div>
                            <div>
                                <img class="h-64 w-full rounded-t-lg" src="{{ $product->image }}" alt="product image" />
                            </div>
                            <div class="mt-2 px-5 pb-5">
                                <h5 class="text-lg font-semibold tracking-tight text-gray-900">{{ $product->name }}</h5>
                            </div>
                        </div>
                        <div class="px-5 pb-5">
                            <div>
                                <button
                                    class="card-button-unactive rounded-lg border border-blue-600 px-5 py-2.5 text-center text-sm font-medium hover:bg-blue-700 hover:text-white focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    id="item-{{ $product->id }}" onclick="addToCart(this)">
                                    Add item
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        let cart = [];

        function calculateTotals() {
            let subtotal = 0;

            // Iterate through each item in the cart
            for (let item of cart) {
                const quantity = parseInt(item.quantity) || 1;
                const price = parseFloat(item.standard_price) || 0;
                console.log(item.standard_price)

                subtotal += quantity * price;
            }

            // Assume a discount of 0% (no discount)
            const discountPercentage = 10;
            const discount = (subtotal * discountPercentage) / 100;

            // Calculate total after discount
            const total = subtotal - discount;

            console.log({
                total,
                discount,
                subtotal
            })

            // Save the results to HTML elements
            $('#total-price').text(total);
            $('#total-diskon').text(`${discountPercentage}%`);
            $('#sub-total-price').text(subtotal);
        }

        function isProductInCart(productId) {
            return cart.some(item => item.id === productId);
        }

        function addToCart(button) {
            let data = $(button).closest('#card-header').data('product');
            if (!isProductInCart(data.id)) {
                cart.push(data);
                updateCartContainer();

                $(button).removeClass('card-button-unactive').addClass('card-button-active')
                    .attr('onclick', '') // Menghapus atribut onclick
                    .text('Terpilih');

                calculateTotals()
            }
        }

        function removeFromCart(productId) {
            // Buat array baru tanpa produk yang akan dihapus
            cart = cart.filter(item => item.id !== productId);

            const buttonId = `#item-${productId}`;
            $(buttonId).removeClass('card-button-active').addClass('card-button-unactive')
                .attr('onclick', 'addToCart(this)')
                .text('Add item');

            updateCartContainer();
            calculateTotals()
        }

        function updatePrice(productId) {
            const quantityInput = $(`#quantity-product-${productId}`);
            const quantityValue = quantityInput.val() || 1;

            const standardPrice = $(`#standard-price-product-${productId}`).data('standard-price');

            const totalPrice = quantityValue * standardPrice;

            $(`#total-price-product-${productId}`).text(totalPrice);
            calculateTotals()
        }

        function updateCartContainer() {
            let cartContainer = $('#cart-container');

            cartContainer.html('');

            cart.forEach((product, index) => {
                let productHtml = `
                    <div id="cart-${product.id}">
                        <div class="flex items-center justify-between transition-all duration-500">
                            <div class="flex items-center space-x-1.5">
                                <img class="w-20 h-20 border-2 border-white rounded-lg " src="${product.image}" alt="${product.name}" />
                                <div>
                                    <h6 class="text-base font-medium">${product.name}</h6>
                                    <div class="flex items-center">
                                        <p class="inline-block text-sm font-medium text-gray-800" data-old-standard-price="${product.standard_price}" data-standard-price="${product.standard_price}" id="standard-price-product-${product.id}">${product.standard_price}</p>
                                        <span class="mx-1">|</span>
                                        <p class="inline-block text-sm font-medium text-pink-600" id="total-price-product-${product.id}">${product.standard_price}</p>
                                        <button onclick="toggleEditPrice(${product.id})" class="ms-1.5 hidden h-6 w-7 items-center justify-center rounded border-gray-300 bg-gray-100 p-1 hover:bg-gray-200 focus:outline-none focus:ring-0" id="edit-button-product-${product.id}" type="button">
                                            <svg class="h-3.5 w-3.5 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="current" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10.8 17.8-6.4 2.1 2.1-6.4m4.3 4.3L19 9a3 3 0 0 0-4-4l-8.4 8.6m4.3 4.3-4.3-4.3m2.1 2.1L15 9.1m-2.1-2 4.2 4.2" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="flex max-w-[8rem] items-center justify-self-end">
                                <button class="h-8 p-3 bg-gray-100 border border-r-0 border-gray-300 rounded hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100" id="decrement-button" onclick="decrement('quantity-product-${product.id}')" type="button">
                                    <svg class="w-2 h-2 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>
                                <input
                                    class="block h-11 w-full border-0 py-2.5 text-center text-sm text-gray-900 focus:outline-none focus:ring-0 active:ring-0"
                                    id="quantity-product-${product.id}"
                                    onchange="updatePrice(${product.id})"
                                    data-counter-min="1"
                                    type="text"
                                    aria-describedby="helper-text-explanation"
                                    placeholder="1"
                                    required />
                                <button class="h-8 p-3 bg-gray-100 border border-l-0 border-gray-300 rounded hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100" id="increment-button" onclick="increment('quantity-product-${product.id}')" type="button">
                                    <svg class="w-2 h-2 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </div>
                            <button onclick="removeFromCart(${product.id})" class="flex items-center justify-center h-8 p-3 text-white bg-gray-100 bg-red-500 border border-red-300 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-100" type="button">
                                    <span class="text-sm">x</span>
                                </button>
                        </div>
                        <ul class="hidden w-full gap-2 mt-2 md:grid-cols-3" id="edit-price-product-${product.id}">
                            <li>
                                <input onchange="toggleCustomPriceInput(${product.id})" class="hidden peer" id="standpr-${product.id}" name="set-price-product-${product.id}" type="radio" value="standard" checked />
                                <label
                                    class="inline-flex items-center justify-between w-full h-20 p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-100 hover:text-gray-600 peer-checked:border-blue-600 peer-checked:text-blue-600"
                                    for="standpr-${product.id}">
                                    <div class="block">
                                        <div class="w-full text-base font-semibold">${product.standard_price}</div>
                                        <div class="w-full text-sm">Harga Standar</div>
                                    </div>
                                </label>
                            </li>
                            <li>
                                <input onchange="toggleCustomPriceInput(${product.id})" class="hidden peer" id="cuspr-${product.id}" name="set-price-product-${product.id}" type="radio" value="custom" />
                                <label
                                    class="inline-flex items-center justify-between w-full h-20 p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-100 hover:text-gray-600 peer-checked:border-blue-600 peer-checked:text-blue-600"
                                    for="cuspr-${product.id}">
                                    <div class="inline-block space-y-1.5">
                                        <input onchange="updateStandardPrice(${product.id})" disabled class="w-full py-1 text-sm rounded-sm focus:outline-none focus:ring-0" id="input-cuspr-${product.id}" type="number" />
                                        <div class="w-full text-sm">Atur Sendiri</div>
                                    </div>
                                </label>
                            </li>
                        </ul>
                    </div>
                    `;

                // Tambahkan elemen produk ke dalam container
                cartContainer.append(productHtml);
            });
        }
    </script>

    <script>
        // function toggleEditPrice(productId) {
        //     const editPriceSection = $(`#edit-price-product-${productId}`);

        //     editPriceSection.toggleClass('hidden').toggleClass('grid');
        // }

        // function updateStandardPrice(productId) {
        //     const customPriceInput = $(`#input-cuspr-${productId}`);
        //     const customPrice = customPriceInput.val();

        //     const standardPriceText = $(`#standard-price-product-${productId}`);
        //     standardPriceText.attr('data-standard-price', customPrice)

        //     updatePrice(productId)
        // }

        // function toggleCustomPriceInput(productId) {
        //     const customPriceInput = $(`#input-cuspr-${productId}`);
        //     const customPriceLabel = $(`#cuspr-${productId}`);
        //     const isChecked = customPriceLabel.prop('checked');

        //     customPriceInput.prop('disabled', !isChecked).val(!isChecked ? '' : customPriceInput.val());

        //     if (!isChecked) {
        //         resetStandardPrice(productId);

        //         updatePrice(productId)
        //     }
        // }

        // function resetStandardPrice(productId) {
        //     const standardPriceText = $(`#standard-price-product-${productId}`);
        //     const standardPrice = standardPriceText.data('old-standard-price');

        //     standardPriceText.text(standardPrice).attr('data-standard-price', standardPrice);

        //     updatePrice(productId)
        // }
    </script>
@endpush
