@extends('layouts.main')

@section('content')
    <main>
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
                <div class="flex flex-col space-y-2" id="cart-container">
                    <p class="font-semibold">Belum Pilih Makanan/Minuman</p>
                </div>

                <div class="my-5 w-full border border-t bg-black"></div>
                <div class="flex w-full items-center justify-between">
                    <p class="text-sm font-medium">Sub Total</p>
                    <p class="text-sm font-semibold text-pink-500" id="subtotal-price">0</p>
                </div>
                <div class="flex w-full items-center justify-between">
                    <p class="text-sm font-medium">Diskon</p>
                    <p class="text-sm font-semibold text-pink-500" id="total-discount">0%</p>
                </div>
                <div class="flex w-full items-center justify-between">
                    <p class="text-sm font-medium">Total</p>
                    <p class="text-sm font-semibold text-pink-500" id="total-price">0</p>
                </div>
                <form class="mb-6" method="POST" action="{{ route('transaction.store') }}">
                    @csrf

                    <div>
                        <h3 class="mt-3 text-base font-semibold">Pembayaran</h3>
                        <div class="mt-2 flex flex-col space-y-2">
                            <div>
                                <h4 class="mb-1 text-sm font-medium">Cash</h4>
                                <div class="grid grid-cols-2 md:grid-cols-4">
                                    <div>
                                        <input class="peer hidden" id="tunai-option" name="payment" type="radio"
                                            value="tunai" checked>
                                        <label
                                            class="inline-flex w-full cursor-pointer items-center justify-between rounded-lg border-2 border-cyan-200 bg-white p-2.5 text-cyan-500 hover:bg-cyan-50 hover:text-cyan-600 peer-checked:border-cyan-600 peer-checked:text-cyan-600"
                                            for="tunai-option">
                                            <div class="flex items-center justify-center space-x-1">
                                                <svg class="h-8 w-8 text-cyan-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M7 6c0-1.1.9-2 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2h-2v-4a3 3 0 0 0-3-3H7V6Z"
                                                        clip-rule="evenodd" />
                                                    <path fill-rule="evenodd"
                                                        d="M2 11c0-1.1.9-2 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-7Zm7.5 1a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5Z"
                                                        clip-rule="evenodd" />
                                                    <path d="M10.5 14.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" />
                                                </svg>
                                                <p class="font-medium">TUNAI</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4 class="mb-1 text-sm font-medium">E-Wallets</h4>
                                <div class="grid grid-cols-2 gap-1.5 md:grid-cols-4">
                                    <div>
                                        <input class="peer hidden" id="dana-option" name="payment" type="radio"
                                            value="dana">
                                        <label
                                            class="inline-flex w-full cursor-pointer items-center justify-between rounded-lg border-2 border-blue-200 bg-white p-2 text-blue-500 hover:bg-blue-50 hover:text-blue-600 peer-checked:border-blue-600 peer-checked:text-blue-600"
                                            for="dana-option">
                                            <div class="flex items-center justify-center space-x-2">
                                                <svg class="h-8 w-full fill-current" id="Layer_1" data-name="Layer 1"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 382 109.22">
                                                    <defs>
                                                        <style>
                                                            .cls-1,
                                                            .cls-2 {
                                                                fill: #008ceb;
                                                            }

                                                            .cls-1 {
                                                                fill-rule: evenodd;
                                                            }

                                                            .cls-3 {
                                                                fill: #fefefe;
                                                            }
                                                        </style>
                                                    </defs>
                                                    <title>Dana</title>
                                                    <path class="cls-1"
                                                        d="M151,82.84c7.26.52,15.72-5.12,18.7-8.34,10.36-11.21,10.61-27.42.18-39.16-3.88-4.37-13-9.2-18.77-8.52H130.22V82.77l20.83.07ZM142,70.72V38.87a75,75,0,0,1,9.82,0,15.22,15.22,0,0,1,7.13,2.76c12,8.2,7,27.75-7.33,29.06A71.77,71.77,0,0,1,142,70.72Z" />
                                                    <path class="cls-1"
                                                        d="M334.39,82.94H346.3V70.88h23.63l.07,12h11.91V63c0-6,.5-13.48-1-18.91a23.62,23.62,0,0,0-45.49-.25c-1.6,5.36-1.06,13.05-1.06,19,0,6.72-.07,13.48,0,20.2Zm11.92-24.19c-.07-5-.6-10.35,1.75-14.2a11.61,11.61,0,0,1,10.15-5.77,11.79,11.79,0,0,1,10.08,5.82c2.32,4,1.77,9,1.71,14.16Z" />
                                                    <path class="cls-1"
                                                        d="M198.19,82.93h11.87c0-2.52-.32-10.23.11-12.06h23.54l.08,12.05h11.89c-.06-6.68,0-13.35,0-20,0-5.7.53-13.86-1-18.92a23.63,23.63,0,0,0-45.49-.23c-1.59,5.2-1.05,13.15-1.05,18.94,0,6.68-.15,13.53,0,20.19Zm11.88-24.18c-.08-5-.59-10.42,1.76-14.19a11.71,11.71,0,0,1,20.23,0c2.33,4,1.77,9.08,1.73,14.17Z" />
                                                    <path class="cls-1"
                                                        d="M266.57,48.67,266.4,57c0,7-.34,20.07,0,25.76h11.64c.27-4-.42-32.41.31-33.32,0-5.52,5.77-10.66,11.59-10.68A11.62,11.62,0,0,1,298.06,42c1.48,1.35,3.75,4.43,3.71,7.54.54.31.11,30,.28,33.29H313.7l-.09-33.95c.29-2.66-1.31-6.77-2.34-8.85A23.56,23.56,0,0,0,269,39.67C268,41.72,266.32,45.94,266.57,48.67Z" />
                                                    <circle class="cls-2" cx="54.61" cy="54.61" r="54.61" />
                                                    <path class="cls-3"
                                                        d="M86.43,54.84V70.21c0,1-.43,1.21-1.27.72a28.08,28.08,0,0,0-3.5-1.78,23.73,23.73,0,0,0-11.49-1.53,55.06,55.06,0,0,0-12.44,3.12c-4,1.35-7.92,2.81-12,3.94a33.41,33.41,0,0,1-10.42,1.37,22.12,22.12,0,0,1-11-3.43A2.71,2.71,0,0,1,23,70.2Q23,55.1,23,40c0-.49,0-1.07.44-1.32s.89.16,1.27.41a21,21,0,0,0,12.15,3.6A32.4,32.4,0,0,0,45.94,41c4.16-1.29,8.18-3,12.27-4.45a74.14,74.14,0,0,1,9.77-3,21.21,21.21,0,0,1,16.73,3.09,3.67,3.67,0,0,1,1.75,3.27c0,5,0,10,0,15Z" />
                                                </svg>
                                            </div>
                                        </label>
                                    </div>
                                    <div>
                                        <input class="peer hidden" id="gopay-option" name="payment" type="radio"
                                            value="gopay">
                                        <label
                                            class="inline-flex w-full cursor-pointer items-center justify-between rounded-lg border-2 border-blue-200 bg-white p-2 text-blue-500 hover:bg-blue-50 hover:text-blue-600 peer-checked:border-blue-600 peer-checked:text-blue-600"
                                            for="gopay-option">
                                            <div class="flex items-center justify-center space-x-2">
                                                <svg class="h-8 w-full fill-current" xmlns="http://www.w3.org/2000/svg"
                                                    width="308" height="63" version="1.1" viewBox="0 0 308 63">
                                                    <title>Gopay logo</title>
                                                    <g transform="scale(4.889 3.938)" fill="none" fill-rule="evenodd">
                                                        <path d="m0 0h63v16h-63z" fill="#fff" fill-opacity=".01" />
                                                        <g transform="translate(0,1.143)">
                                                            <ellipse cx="6.811" cy="6.857" rx="6.811"
                                                                ry="6.857" fill="#00aed6" fill-rule="nonzero" />
                                                            <path
                                                                d="m10.78 6.644a1.587 1.587 0 0 0-1.652-1.5h-4.302a0.285 0.285 0 0 1-0.284-0.286c0-0.158 0.127-0.286 0.284-0.286h4.359a1.362 1.362 0 0 0-0.993-1.26 10.97 10.97 0 0 0-3.84 0 1.82 1.82 0 0 0-1.362 1.526 13.71 13.71 0 0 0 0 4.06 1.92 1.92 0 0 0 1.552 1.526 19.13 19.13 0 0 0 4.748 0 1.669 1.669 0 0 0 1.317-1.44c0.14-0.772 0.199-1.556 0.173-2.34zm-1.413 0.96v0.254a0.285 0.285 0 0 1-0.284 0.286 0.285 0.285 0 0 1-0.284-0.286v-0.254a0.427 0.427 0 0 1 0.284-0.746 0.427 0.427 0 0 1 0.284 0.746z"
                                                                fill="#fff" />
                                                        </g>
                                                        <g fill="#000" fill-rule="nonzero">
                                                            <path
                                                                d="m18.94 11.41a2.921 2.921 0 0 0 2.545 1.252c1.187 0 2.059-0.763 2.059-1.8v-0.547h-0.029c-0.65 0.64-1.537 0.974-2.444 0.922a3.955 3.955 0 0 1-3.513-1.94 4.012 4.012 0 0 1-0.037-4.033 3.956 3.956 0 0 1 3.478-2.002 3.39 3.39 0 0 1 2.516 0.892h0.029v-0.748h2.03v7.428c0 2.159-1.7 3.656-4.089 3.656a4.87 4.87 0 0 1-4.06-1.814zm4.519-4.622c0-0.863-0.973-1.655-2.059-1.655-1.373 0-2.288 0.835-2.288 2.087-0.04 0.594 0.18 1.175 0.605 1.588a1.995 1.995 0 0 0 1.597 0.557c1.187 0 2.145-0.748 2.145-1.684zm7.46-3.598c2.474 0 4.276 1.77 4.276 4.03s-1.802 4.031-4.276 4.031a4.005 4.005 0 0 1-3.692-1.935 4.063 4.063 0 0 1 0-4.191 4.005 4.005 0 0 1 3.692-1.935zm0 1.87a2.152 2.152 0 0 0-2.13 2.17 2.152 2.152 0 0 0 2.15 2.15 2.152 2.152 0 0 0 2.14-2.16 2.075 2.075 0 0 0-0.605-1.562 2.045 2.045 0 0 0-1.555-0.597zm5.374-1.654h2.03v0.676h0.03a3.359 3.359 0 0 1 2.444-0.892c2.18 0.04 3.928 1.828 3.932 4.023 4e-3 2.196-1.738 3.99-3.918 4.038-0.86 0.02-1.7-0.265-2.373-0.806h-0.029v3.829h-2.116zm4.176 1.67c-1.116 0-2.06 0.791-2.06 1.655v0.964c0 0.922 0.916 1.684 2.073 1.684a2.145 2.145 0 0 0 2.131-2.158 2.145 2.145 0 0 0-2.144-2.146zm8.337 1.41c1.387-0.187 1.802-0.388 1.802-0.777 0-0.504-0.53-0.806-1.344-0.806a1.79 1.79 0 0 0-1.888 1.367l-2.002-0.417c0.286-1.555 1.874-2.663 3.832-2.663 2.216 0 3.59 1.137 3.59 2.993v4.852h-1.903v-0.835h-0.03a3.117 3.117 0 0 1-2.559 1.051c-1.673 0-2.83-0.921-2.83-2.275 0-1.425 0.943-2.159 3.331-2.49zm1.973 0.806h-0.028c-0.187 0.274-0.587 0.432-1.616 0.62-1.244 0.23-1.687 0.474-1.687 0.92 0 0.461 0.372 0.663 1.172 0.663 1.216 0 2.16-0.562 2.16-1.296v-0.907zm6.044 3.326-3.503-7.212h2.331l2.302 4.98h0.028l2.274-4.98h2.345l-5.247 10.87h-2.331z" />
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                        </label>
                                    </div>
                                    <div>
                                        <input class="peer hidden" id="shopeepay-option" name="payment" type="radio"
                                            value="shopeepay">
                                        <label
                                            class="inline-flex w-full cursor-pointer items-center justify-between rounded-lg border-2 border-blue-200 bg-white p-2 text-blue-500 hover:bg-blue-50 hover:text-blue-600 peer-checked:border-blue-600 peer-checked:text-blue-600"
                                            for="shopeepay-option">
                                            <div class="flex items-center justify-center space-x-2">
                                                <img class="h-8 w-full object-cover"
                                                    src="{{ asset('assets/brand/shopeepay.png') }}" alt="shopeepay">
                                            </div>
                                        </label>
                                    </div>
                                    <div>
                                        <input class="peer hidden" id="ovo-option" name="payment" type="radio"
                                            value="ovo">
                                        <label
                                            class="inline-flex w-full cursor-pointer items-center justify-between rounded-lg border-2 border-blue-200 bg-white p-2 text-blue-500 hover:bg-blue-50 hover:text-blue-600 peer-checked:border-blue-600 peer-checked:text-blue-600"
                                            for="ovo-option">
                                            <div class="flex items-center justify-center space-x-2">
                                                <svg class="h-8 w-full fill-current" class="ovo-main-logo" width="77"
                                                    height="24" viewBox="0 0 77 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g fill="#06B3BA" fill-rule="evenodd">
                                                        <path
                                                            d="M21.186 20.244c-2.321 2.234-5.435 3.445-8.798 3.445-3.408 0-6.522-1.211-8.844-3.445A11.613 11.613 0 0 1 0 11.856c0-3.2 1.28-6.212 3.556-8.39C5.876 1.234 8.99.023 12.399.023c3.363 0 6.477 1.211 8.799 3.445 2.276 2.177 3.555 5.189 3.555 8.389 0 3.2-1.29 6.2-3.567 8.388M12.4 3.856c-4.45 0-7.802 3.444-7.802 8 0 4.555 3.363 8 7.802 8 4.394 0 7.757-3.445 7.757-8 0-4.556-3.363-8-7.757-8M50.424 2.789l-9.535 21.178-.543-.1c-2.718-.49-3.261-1.167-4.541-3.923l-7.122-15.5H26.01V.667h10.123v3.777H33.71l5.73 12.845 5.548-12.845h-2.966V.667h8.402v2.122zM73.444 20.244c-2.32 2.234-5.435 3.445-8.798 3.445-3.408 0-6.522-1.211-8.844-3.445-2.276-2.177-3.555-5.188-3.555-8.388s1.28-6.212 3.555-8.39C58.124 1.234 61.238.023 64.646.023c3.363 0 6.477 1.211 8.798 3.445C75.72 5.644 77 8.656 77 11.856c0 3.2-1.28 6.2-3.556 8.388M64.646 3.856c-4.45 0-7.802 3.444-7.802 8 0 4.555 3.363 8 7.802 8 4.394 0 7.757-3.445 7.757-8 0-4.556-3.352-8-7.757-8">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4 class="mb-1 text-sm font-medium">Bank</h4>
                                <div class="grid grid-cols-2 gap-1.5 md:grid-cols-4">
                                    <div>
                                        <input class="peer hidden" id="bca-option" name="payment" type="radio"
                                            value="bca">
                                        <label
                                            class="inline-flex w-full cursor-pointer items-center justify-between rounded-lg border-2 border-blue-200 bg-white p-2 text-blue-500 hover:bg-blue-50 hover:text-blue-600 peer-checked:border-blue-600 peer-checked:text-blue-600"
                                            for="bca-option">
                                            <div class="flex items-center justify-center space-x-2">
                                                <svg class="h-8 w-full fill-current" id="svg2"
                                                    xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                    xmlns:cc="http://creativecommons.org/ns#"
                                                    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                    xmlns:svg="http://www.w3.org/2000/svg"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                                                    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                                                    viewBox="0 0 999.99999 313.40301" height="313.40302" width="1000"
                                                    xml:space="preserve" version="1.1" inkscape:version="0.91 r13725"
                                                    sodipodi:docname="Bank Central Asia.svg">
                                                    <sodipodi:namedview id="namedview42" pagecolor="#ffffff"
                                                        bordercolor="#666666" borderopacity="1" objecttolerance="10"
                                                        gridtolerance="10" guidetolerance="10" inkscape:pageopacity="0"
                                                        inkscape:pageshadow="2" inkscape:window-width="1366"
                                                        inkscape:window-height="705" showgrid="false"
                                                        inkscape:zoom="0.42048248" inkscape:cx="505.94223"
                                                        inkscape:cy="380.97932" inkscape:window-x="-8"
                                                        inkscape:window-y="-8" inkscape:window-maximized="1"
                                                        inkscape:current-layer="svg2" />
                                                    <metadata id="metadata8">
                                                        <rdf:RDF>
                                                            <cc:Work rdf:about="">
                                                                <dc:format>image/svg+xml</dc:format>
                                                                <dc:type
                                                                    rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                                                                <dc:title />
                                                            </cc:Work>
                                                        </rdf:RDF>
                                                    </metadata>
                                                    <defs id="defs6" />
                                                    <path id="path20"
                                                        style="fill:#0060af;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                        inkscape:connector-curvature="0"
                                                        d="m 147.34669,237.88336 c 0,-12.4911 0.13562,-45.8787 -0.17228,-49.99236 0.26842,-49.68172 -35.85414,-84.72767 -58.674773,-81.99559 -15.79108,1.37038 -29.025179,7.8093 -36.131016,26.33267 -6.585974,17.26296 -0.697885,40.22487 21.198868,45.61295 23.413963,5.78646 37.086001,10.60092 46.980501,17.39303 12.12372,8.3152 22.02105,24.2022 22.28381,42.669" />
                                                    <path id="path22"
                                                        style="fill:#0060af;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                        inkscape:connector-curvature="0"
                                                        d="m 156.69305,313.40296 c -41.28452,0 -83.71334,-10.1684 -126.085648,-30.2796 l -1.039728,-0.5113 -0.497275,-1.0595 C 10.055561,241.41496 0,197.51416 0,154.56275 0,111.67615 9.6430481,69.654125 28.67202,29.570445 l 0.522703,-1.06518 1.05952,-0.53118 C 69.45081,9.4056654 111.61685,-4.4667969e-5 155.61942,-4.4667969e-5 c 40.99069,0 84.7672,10.470869667969 126.57727,30.333339667969 l 1.07365,0.47749 0.49444,1.08494 c 19.37931,40.87763 29.59874,84.767165 29.59874,127.006815 0,42.07562 -9.81258,84.13432 -29.2145,124.98642 l -0.51139,1.0737 -1.07929,0.4974 c -38.5976,18.2716 -82.12548,27.9429 -125.86529,27.9429 M 34.529044,277.61956 c 41.163036,19.3623 82.215886,29.1411 122.164006,29.1411 42.3582,0 84.4847,-9.259 121.98321,-26.8101 18.62776,-39.5866 28.07019,-80.3286 28.07019,-121.04802 0,-40.88347 -9.85493,-83.411095 -28.49683,-123.085165 -40.57537,-19.0742 -82.95049,-29.1890696 -122.6302,-29.1890696 -42.60116,0 -83.43363,9.0355796 -121.446374,26.8609396 C 15.926699,72.341065 6.6396702,113.05204 6.6396702,154.56275 c 0,41.58951 9.6515028,84.13431 27.8893738,123.05681" />
                                                    <path id="path24"
                                                        style="fill:#0060af;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                        inkscape:connector-curvature="0"
                                                        d="m 137.56237,237.90306 c 0.0763,-16.0114 -8.86041,-30.1694 -20.54055,-37.7782 -10.36068,-6.7244 -24.270055,-11.1434 -46.70926,-16.83366 -6.936336,-1.77427 -14.191926,-5.71569 -16.438108,-10.73929 -5.941786,5.98692 -7.021076,19.44705 -5.97569,27.31295 1.21493,9.1034 11.852506,24.1062 27.869603,24.694 9.781485,0.3926 22.148198,-2.1051 28.078685,-3.365 10.23073,-2.2096 26.41735,4.1984 28.9941,16.6895" />
                                                    <path id="path26"
                                                        style="fill:#0060af;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                        inkscape:connector-curvature="0"
                                                        d="m 155.61942,28.465705 c -27.15761,0 -50.61679,17.91012 -50.53203,48.90172 0.0848,26.061425 21.04348,40.013175 28.52227,49.978385 11.30153,15.01678 17.4185,32.79128 18.05421,59.98852 0.49444,21.64533 0.46901,43.01923 0.5792,50.59413 l 5.99548,0 c -0.10447,-7.9252 -0.37579,-30.6158 -0.0651,-51.26375 0.40685,-27.20571 6.7442,-44.30212 18.05139,-59.3189 7.54378,-9.96521 28.48553,-23.91696 28.53075,-49.978385 0.10171,-30.9916 -23.34334,-48.90172 -50.47836,-48.90172" />
                                                    <path id="path28"
                                                        style="fill:#0060af;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                        inkscape:connector-curvature="0"
                                                        d="m 162.51335,237.88336 c 0,-12.4911 -0.14134,-45.8787 0.16105,-49.99236 -0.26558,-49.68172 35.83437,-84.72767 58.67478,-81.99559 15.79108,1.37038 29.01106,7.8093 36.13669,26.33267 6.58032,17.26296 0.6583,40.22487 -21.213,45.61295 -23.42528,5.78646 -37.08037,10.60092 -47.00029,17.39303 -12.10961,8.3152 -21.31472,24.2022 -21.59725,42.669" />
                                                    <path id="path30"
                                                        style="fill:#0060af;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                        inkscape:connector-curvature="0"
                                                        d="m 172.29202,237.90306 c -0.0848,-16.0114 8.84911,-30.1694 20.49535,-37.7782 10.40306,-6.7244 24.32939,-11.1434 46.74882,-16.83366 6.95045,-1.77427 14.19756,-5.71569 16.40418,-10.73929 5.97006,5.98692 7.04653,19.44705 6.00112,27.31295 -1.24034,9.1034 -11.84967,24.1062 -27.83852,24.694 -9.77866,0.3926 -22.21035,-2.1051 -28.11541,-3.365 -10.19116,-2.2096 -26.423,4.1984 -29.01106,16.6895" />
                                                    <path id="path32"
                                                        style="fill:#0060af;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                        inkscape:connector-curvature="0"
                                                        d="m 180.66928,289.59346 -3.47522,-25.3577 8.38857,-1.2714 c 2.04276,-0.2798 4.52909,0.076 5.52362,1.3561 1.09908,1.3363 1.43531,2.4412 1.64721,4.1928 0.31644,2.1671 -0.3108,4.6733 -2.75193,5.9221 l 0,0.076 c 2.7265,0 4.3737,1.958 4.85118,5.2637 0.0706,0.6978 0.27689,2.3846 0.0706,3.7916 -0.55379,3.3481 -2.55132,4.4246 -5.92201,4.8965 z m 5.39931,-4.5403 c 0.99453,-0.142 2.00319,-0.1949 2.79148,-0.698 1.20645,-0.7883 1.09626,-2.475 0.92956,-3.7265 -0.42099,-2.752 -1.13863,-3.7973 -4.05726,-3.3651 l -1.83367,0.2825 1.16123,7.6483 z m -1.75738,-11.717 c 1.11038,-0.1801 2.61629,-0.3136 3.24353,-1.3674 0.32775,-0.7035 0.74874,-1.263 0.47185,-2.8283 -0.34187,-1.8563 -0.95781,-3.0061 -3.31418,-2.5598 l -2.19533,0.3533 0.86457,6.4984" />
                                                    <path id="path34"
                                                        style="fill:#0060af;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                        inkscape:connector-curvature="0"
                                                        d="m 217.00657,274.34206 c 0.065,0.4719 0.14134,0.9974 0.16952,1.4691 0.67809,4.6253 -0.16952,8.4537 -5.36823,9.5075 -7.68505,1.4806 -9.15709,-3.2944 -10.51043,-9.9792 l -0.72047,-3.6165 c -1.05952,-6.3968 -1.51442,-11.2394 5.9785,-12.7312 4.22395,-0.7713 7.01544,0.9097 8.17668,5.1139 0.18075,0.6272 0.40685,1.2489 0.49161,1.8789 l -4.59691,0.9494 c -0.53116,-1.5794 -1.23468,-4.4019 -3.30286,-4.1646 -3.71256,0.4463 -2.48636,5.0658 -2.10493,6.9956 l 1.38161,6.942 c 0.41533,2.0993 1.24036,5.4529 4.45282,4.8059 2.60782,-0.5227 1.47202,-4.5856 1.24034,-6.2496" />
                                                    <path id="path36"
                                                        style="fill:#0060af;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                        inkscape:connector-curvature="0"
                                                        d="m 224.38364,282.01576 -1.59068,-26.2422 6.17628,-1.8845 12.94875,22.8236 -4.8625,1.4549 -3.06836,-5.8004 -5.39932,1.6217 0.69789,6.5944 z m 3.75212,-12.265 3.90185,-1.1301 -5.18175,-10.6179" />
                                                    <path id="path38"
                                                        style="fill:#0060af;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                        inkscape:connector-curvature="0"
                                                        d="m 71.835428,262.17606 c 1.932564,-6.1876 3.66454,-10.7423 11.038775,-8.7192 3.947071,1.1019 6.393862,2.8422 6.278014,7.4278 -0.01907,1.0201 -0.355999,2.0597 -0.576379,3.0684 l -4.591259,-1.2685 c 0.601808,-2.5316 0.983235,-4.5404 -2.135991,-5.501 -3.605185,-0.9889 -4.483866,3.382 -4.981141,5.2692 l -1.867573,6.8799 c -0.593331,2.0428 -1.305328,5.419 1.867573,6.2893 2.621951,0.7063 4.21265,-1.8675 5.16198,-5.6254 l -3.212464,-0.8504 1.110377,-3.981 7.552256,2.4299 -3.585415,13.2595 -3.475224,-0.9437 0.782625,-2.8028 -0.09896,0 c -1.599155,2.2915 -3.551489,2.5316 -5.260854,2.2038 -7.552256,-2.0428 -6.763973,-6.9786 -4.96137,-13.5731" />
                                                    <path id="path40"
                                                        style="fill:#0060af;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                        inkscape:connector-curvature="0"
                                                        d="m 99.945183,273.37576 -2.274429,10.7874 -5.119598,-1.1076 5.455826,-25.1884 8.727598,1.9722 c 5.10831,1.1019 6.65097,3.3763 5.92768,8.0581 -0.41252,2.6869 -1.73761,5.5828 -4.97269,5.3484 l -0.0339,-0.044 c 2.73498,0.9578 2.96665,2.3365 2.48917,4.7213 -0.20618,1.0141 -1.62742,7.1708 -0.64703,8.1652 l 0.0339,0.7544 -5.2976,-1.3816 c -0.22038,-1.7064 0.52836,-4.7748 0.82502,-6.473 0.29949,-1.503 0.77697,-3.6221 -0.74874,-4.4188 -1.19513,-0.6358 -1.63871,-0.6046 -2.98924,-0.9155 z m 0.873047,-3.9018 3.44697,0.9295 c 2.09361,0.3023 3.25767,-0.7826 3.67018,-3.3113 0.37295,-2.3197 -0.11019,-3.2266 -1.98908,-3.6759 l -3.6956,-0.7486" />
                                                    <path id="path42"
                                                        style="fill:#0060af;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                        inkscape:connector-curvature="0"
                                                        d="m 132.78181,263.49536 5.06311,0.5878 -2.18121,17.7067 c -1.05952,5.614 -3.22942,8.0693 -9.4057,7.3007 -6.28367,-0.794 -7.77547,-3.656 -7.39405,-9.3153 l 2.19533,-17.6925 5.10265,0.5849 -2.18967,17.2969 c -0.23168,1.8789 -0.6668,4.6618 2.67565,4.9981 2.96381,0.2261 3.63627,-1.7376 3.96966,-4.1787" />
                                                    <path id="path44"
                                                        style="fill:#0060af;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                        inkscape:connector-curvature="0"
                                                        d="m 143.42787,290.05966 1.52289,-25.3211 9.72781,0.4211 c 4.59689,0.2259 5.80051,3.9808 5.65641,7.5635 -0.13286,2.1783 -0.81371,4.611 -2.71237,5.9305 -1.55679,1.1216 -3.55717,1.3871 -5.41344,1.2969 l -3.17009,-0.1759 -0.63287,10.6121 z m 5.75531,-14.1467 2.57675,0.1441 c 2.09361,0.076 3.48088,-0.7515 3.6617,-3.8255 0.10171,-2.9525 -1.0143,-3.4526 -3.72667,-3.5713 l -2.04275,-0.07" />
                                                    <path id="path46"
                                                        style="fill:#0060af;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                        inkscape:connector-curvature="0"
                                                        d="m 829.5219,52.939205 -38.66259,70.174035 c -14.5931,-11.84967 -32.41283,-20.57163 -55.1487,-20.57163 -53.80382,0 -75.65817,40.10642 -75.65817,68.35745 0,20.97 13.73137,51.9107 61.60471,51.9107 20.09415,0 48.66161,-13.9799 56.88348,-20.3398 l -38.23876,81.4135 c -18.22657,3.6363 -24.21356,5.8909 -39.64298,6.3684 -85.68547,2.557 -120.31057,-50.0799 -120.28514,-103.86686 0.0566,-71.10373 63.27451,-157.577415 168.07371,-157.577415 6.42209,0 14.27667,2.22076 20.9926,4.68166 l 6.78658,-8.67958" />
                                                    <path id="path48"
                                                        style="fill:#0060af;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                        inkscape:connector-curvature="0"
                                                        d="M 989.05162,27.010645 1000,282.06386 l -81.47846,0 -0.0481,-43.7427 -55.55839,0 -18.28589,43.7427 -88.36393,0 92.38163,-182.129935 -20.83157,-0.13562 39.58083,-72.78766 z m -71.10645,78.025925 -31.41264,74.18607 32.35913,0" />
                                                    <path id="path50"
                                                        style="fill:#0060af;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                        inkscape:connector-curvature="0"
                                                        d="m 528.93477,27.010645 c 40.34935,0.22602 63.15021,22.12841 63.15021,53.76716 0,29.166455 -24.04686,54.984825 -50.44445,68.334775 27.1774,9.99042 29.52811,34.51491 29.52811,51.86558 0,41.9174 -42.06151,81.0857 -96.73556,81.0857 l -119.23691,0 46.51149,-179.59282 -19.10526,-0.11019 39.05531,-75.350205 c 0,0 74.46586,-0.22604 107.27706,0 M 489.3483,130.41969 c 8.3462,0 23.08339,-2.11332 26.7677,-18.26612 4.03747,-17.534195 -9.79278,-18.006105 -16.42679,-18.006105 l -23.70499,-0.10383 -8.26707,36.376905 z m -33.51472,45.07069 -10.91448,41.91738 27.91199,0 c 10.98228,0 25.94835,-5.4502 29.61569,-19.0911 3.62216,-13.68051 -6.84026,-22.82628 -17.78298,-22.82628" />
                                                </svg>
                                            </div>
                                        </label>
                                    </div>
                                    <div>
                                        <input class="peer hidden" id="bri-option" name="payment" type="radio"
                                            value="bri">
                                        <label
                                            class="inline-flex w-full cursor-pointer items-center justify-between rounded-lg border-2 border-blue-200 bg-white p-2 text-blue-500 hover:bg-blue-50 hover:text-blue-600 peer-checked:border-blue-600 peer-checked:text-blue-600"
                                            for="bri-option">
                                            <div class="flex items-center justify-center space-x-2">
                                                <svg class="h-8 w-full fill-current" id="svg8"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:svg="http://www.w3.org/2000/svg"
                                                    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                    xmlns:cc="http://creativecommons.org/ns#"
                                                    xmlns:dc="http://purl.org/dc/elements/1.1/" width="264.58334mm"
                                                    height="100.14234mm" viewBox="0 0 264.58334 100.14234"
                                                    version="1.1">
                                                    <defs id="defs2" />
                                                    <metadata id="metadata5">
                                                        <rdf:RDF>
                                                            <cc:Work rdf:about="">
                                                                <dc:format>image/svg+xml</dc:format>
                                                                <dc:type
                                                                    rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                                                            </cc:Work>
                                                        </rdf:RDF>
                                                    </metadata>
                                                    <g id="layer1" transform="translate(-371.14847,59.527701)">
                                                        <g id="g1470">
                                                            <g id="g1458">
                                                                <g id="g38"
                                                                    transform="matrix(5.6393519,0,0,5.6393519,-1721.8884,276.16993)">
                                                                    <g id="g1188">
                                                                        <g id="g140"
                                                                            transform="matrix(0.35277777,0,0,-0.35277777,399.81696,-51.4826)">
                                                                            <path id="path142"
                                                                                style="fill:#00529c;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                                d="M 0,0 C 0.281,0.281 0.613,0.643 0.996,1.086 1.378,1.529 1.74,2.052 2.082,2.656 2.424,3.26 2.716,3.933 2.957,4.678 3.199,5.422 3.32,6.217 3.32,7.062 c 0,1.649 -0.282,3.188 -0.845,4.617 -0.564,1.428 -1.429,2.676 -2.596,3.743 -1.167,1.065 -2.625,1.901 -4.376,2.505 -1.75,0.603 -3.793,0.905 -6.126,0.905 h -0.064 -6.708 -1.746 -6.874 v -7.694 -26.636 -7.921 h 16.901 c 2.454,0 4.596,0.332 6.428,0.996 1.83,0.664 3.35,1.579 4.557,2.746 1.207,1.167 2.102,2.525 2.686,4.074 0.583,1.549 0.875,3.209 0.875,4.98 0,2.374 -0.543,4.486 -1.629,6.338 C 2.716,-2.435 1.448,-1.006 0,0 m -7.473,11.09 c 0.569,-0.217 1.044,-0.499 1.415,-0.854 0.961,-0.922 1.442,-2.024 1.442,-3.306 0,-1.163 -0.201,-2.124 -0.601,-2.885 C -5.618,3.283 -6.019,2.702 -6.419,2.302 h -11.749 v 9.287 h 7.303 c 1.369,0 2.496,-0.169 3.392,-0.499 m -1.219,-16.1 c 2.127,0 3.703,-0.551 4.729,-1.651 0.965,-1.083 1.451,-2.361 1.451,-3.84 0,-1.524 -0.551,-2.825 -1.653,-3.907 -1.103,-1.082 -2.915,-1.624 -5.44,-1.624 h -0.943 -7.62 V -5.01 Z" />
                                                                        </g>
                                                                        <g id="g144"
                                                                            transform="matrix(0.35277777,0,0,-0.35277777,411.84175,-49.640747)">
                                                                            <path id="path146"
                                                                                style="fill:#00529c;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                                d="m 0,0 c 1.267,0.865 2.324,1.871 3.169,3.018 0.845,1.147 1.468,2.414 1.871,3.802 0.402,1.389 0.604,2.807 0.604,4.256 0,1.891 -0.313,3.631 -0.936,5.221 -0.625,1.589 -1.56,2.957 -2.807,4.104 -1.248,1.147 -2.807,2.042 -4.678,2.686 -1.871,0.643 -4.034,0.966 -6.488,0.966 h -0.221 -16.257 -0.152 v -42.251 h 7.999 v 15.693 h 4.46 L -2.405,-18.198 H 6.971 L -4.436,-1.962 C -2.747,-1.52 -1.268,-0.866 0,0 m -9.205,16.81 c 0.503,0 0.978,-0.033 1.43,-0.09 1.426,-0.215 2.591,-0.724 3.489,-1.533 1.222,-1.103 1.833,-2.455 1.833,-4.057 0,-0.803 -0.131,-1.584 -0.391,-2.345 C -3.105,8.023 -3.515,7.352 -4.076,6.772 -4.638,6.19 -5.359,5.72 -6.24,5.359 -7.122,4.998 -8.184,4.818 -9.426,4.818 h -8.47 V 16.81 Z" />
                                                                        </g>
                                                                        <g id="g148"
                                                                            transform="matrix(0.35277777,0,0,-0.35277777,415.29756,-58.126111)">
                                                                            <path id="path150"
                                                                                style="fill:#00529c;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                                d="M 0,0 V -0.012 C -0.081,-0.01 -0.16,0 -0.241,0 H -0.309 V -0.003 -15.49 -26.587 -42.251 H 7.847 V 0 Z" />
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                                <path id="path4"
                                                                    style="fill:#00529c;fill-opacity:1;stroke-width:0.235536"
                                                                    d="m 386.70465,40.570688 c -1.95943,-0.22834 -3.48215,-0.69163 -5.29985,-1.612789 -4.72613,-2.39468 -8.27066,-6.524929 -9.60764,-11.195278 -0.65282,-2.279449 -0.61679,-0.08579 -0.59185,-36.055711 l 0.12808,-34.15566 c 0.16314,-2.26342 0.50711,-3.73836 1.41795,-6.07672 1.64114,-4.21108 4.32661,-7.16567 8.28971,-9.12109 2.22901,-1.09978 4.35912,-1.65309 6.96313,-1.80909 0.90025,-0.0535 15.58854,-0.0623 34.76354,-0.0198 36.69966,0.0815 33.6674,0.0198 35.96301,0.73311 1.05612,0.32802 3.00872,1.25271 4.2023,1.98983 4.19032,2.58815 7.22491,6.79922 8.1299,11.282 0.17773,0.88063 0.18667,2.62515 0.18667,35.44844 l -0.18552,35.702472 c -0.59328,3.77253 -2.34952,7.058679 -5.41756,10.137448 -2.40249,2.410939 -4.62041,3.73883 -7.56462,4.529199 l -1.07022,0.28726 -34.76355,0.0142 c -19.11988,0.008 -35.11432,-0.0271 -35.54302,-0.077 z m 14.50726,-10.282367 c 1.49891,-0.50995 3.35217,-1.76219 4.86618,-3.2885 1.18937,-1.198759 2.12235,-2.499079 2.7714,-3.861608 0.75547,-1.58593 0.9403,-2.35085 1.00291,-4.151459 0.0909,-2.62255 -0.28888,-4.808449 -1.1484,-6.616589 -1.03327,-2.172939 -2.39027,-3.773238 -8.59201,-10.133917 -6.68624,-6.857428 -8.6106,-8.907128 -10.05752,-10.712438 -0.43433,-0.54153 -0.55181,-0.7621 -0.50499,-0.94284 0.22297,-0.8547 2.50822,-3.20226 8.33541,-8.56448 6.13349,-5.64383 8.06465,-7.66242 10.17594,-10.63632 1.31603,-1.8534 2.25818,-4.01808 2.59389,-5.95914 0.20647,-1.19192 0.20718,-3.43154 0.004,-4.63453 -0.44071,-2.58226 -1.80686,-5.16004 -3.60738,-6.80371 -2.5581,-2.33482 -5.06819,-3.41151 -8.6558,-3.71244 -1.5385,-0.1289 -7.84313,-0.0502 -9.40281,0.11759 -3.48639,0.37516 -6.72628,2.8231 -7.54954,5.7044 -0.16411,0.57404 -0.17988,2.33954 -0.21376,23.82709 l 0.0566,34.103345 c 0.10101,12.140247 0.0507,11.362837 0.83786,12.592696 0.53817,0.83844 1.67245,2.04027 2.46512,2.61054 0.79266,0.57027 1.55192,0.925159 2.54773,1.191679 0.72748,0.19465 1.09638,0.20408 7.00338,0.18098 l 6.23566,-0.0243 z m 53.2666,0.15788 c -0.39385,-0.736401 -3.25708,-3.73412 -10.1837,-10.661298 -7.89845,-7.899248 -28.43442,-29.048643 -28.46948,-29.320343 -0.093,-0.71426 3.55229,-4.56385 8.18941,-8.64979 2.64192,-2.32776 6.45225,-6.01592 8.77094,-8.48955 4.60959,-4.91779 5.78201,-6.64322 6.19799,-9.12108 0.20315,-1.20677 0.18269,-3.98132 -0.0339,-4.85653 -0.24085,-0.97017 -0.64364,-1.96131 -1.15475,-2.8443 -0.5603,-0.96664 -2.63016,-3.07147 -3.75031,-3.81259 -1.57874,-1.04464 -3.50826,-1.87153 -5.3003,-2.2719 -0.8706,-0.19442 -7.03493,-0.31837 -9.04873,-0.18193 l -1.25411,0.0851 0.0874,0.33722 c 0.0509,0.18546 0.57253,1.0642 1.16581,1.95307 0.59326,0.88888 1.26468,2.01034 1.49188,2.49224 1.20371,2.55422 1.76403,5.73739 1.65431,9.3968 -0.0892,2.96896 -0.51627,4.71466 -1.78827,7.30964 -1.76873,3.60829 -4.14721,6.40192 -9.40398,11.04707 -3.06638,2.70927 -5.52986,5.17535 -6.67542,6.6821 l -0.80352,1.05666 6.05181,6.41158 8.9037,9.567647 c 2.49218,3.004539 3.73475,5.686488 4.21621,9.100358 0.22787,1.613499 0.20363,4.692498 -0.0507,6.168138 -0.38586,2.264609 -1.22187,4.242659 -2.77353,6.562638 -0.49039,0.7324 -1.00716,1.5322 -1.14956,1.777039 l -0.25898,0.44538 h 17.73293 l 17.6351,-0.183329 z m 7.01491,-36.382081 -0.42306,-35.04618 c -0.85882,-5.68507 -3.16527,-8.06962 -8.34975,-8.63235 -1.22231,-0.13267 -7.60863,-0.1593 -7.60863,-0.032 0,0.19158 0.7112,1.19074 1.66091,2.33341 1.16605,1.40259 1.70516,2.17623 2.18495,3.13509 1.06883,2.13547 1.38806,4.4677 1.15523,8.43417 -0.21259,3.61959 -0.63682,5.20151 -1.97967,7.38435 -1.90221,3.09197 -4.39959,5.75105 -11.13059,11.85157 -3.97369,3.60144 -6.61986,6.3932 -6.52309,6.88193 0.012,0.0846 6.99865,7.24083 15.51555,15.902167 l 15.48523,15.748066 0.0338,-0.49087 c 0.0225,-0.27005 0.005,-12.631326 -0.0227,-27.469543 z" />
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                        </label>
                                    </div>
                                    <div>
                                        <input class="peer hidden" id="mandiri-option" name="payment" type="radio"
                                            value="mandiri">
                                        <label
                                            class="inline-flex w-full cursor-pointer items-center justify-between rounded-lg border-2 border-blue-200 bg-white p-2 text-blue-500 hover:bg-blue-50 hover:text-blue-600 peer-checked:border-blue-600 peer-checked:text-blue-600"
                                            for="mandiri-option">
                                            <div class="flex items-center justify-center space-x-2">
                                                <svg class="h-8 w-full fill-current" id="svg945"
                                                    xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                    xmlns:cc="http://creativecommons.org/ns#"
                                                    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                    xmlns:svg="http://www.w3.org/2000/svg"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                                                    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                                                    width="59.999561mm" height="17.510006mm"
                                                    viewBox="0 0 59.999561 17.510006" version="1.1"
                                                    inkscape:version="0.92.2 (5c3e80d, 2017-08-06)"
                                                    sodipodi:docname="Bank Mandiri logo 2016.svg">
                                                    <defs id="defs939">
                                                        <clipPath id="clipPath20" clipPathUnits="userSpaceOnUse">
                                                            <path id="path18"
                                                                d="M 382.677,748.082 H 552.755 V 799.37 H 382.677 Z"
                                                                inkscape:connector-curvature="0" />
                                                        </clipPath>
                                                    </defs>
                                                    <sodipodi:namedview id="base" pagecolor="#ffffff"
                                                        bordercolor="#666666" borderopacity="1.0"
                                                        inkscape:pageopacity="0.0" inkscape:pageshadow="2"
                                                        inkscape:zoom="0.35" inkscape:cx="140.52785"
                                                        inkscape:cy="-472.62453" inkscape:document-units="mm"
                                                        inkscape:current-layer="layer1" showgrid="false"
                                                        fit-margin-top="0" fit-margin-left="0" fit-margin-right="0"
                                                        fit-margin-bottom="0" inkscape:window-width="1600"
                                                        inkscape:window-height="837" inkscape:window-x="-8"
                                                        inkscape:window-y="-8" inkscape:window-maximized="1" />
                                                    <metadata id="metadata942">
                                                        <rdf:RDF>
                                                            <cc:Work rdf:about="">
                                                                <dc:format>image/svg+xml</dc:format>
                                                                <dc:type
                                                                    rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                                                                <dc:title />
                                                            </cc:Work>
                                                        </rdf:RDF>
                                                    </metadata>
                                                    <g id="layer1" inkscape:label="Layer 1" inkscape:groupmode="layer"
                                                        transform="translate(60.237875,-6.2747549)">
                                                        <g id="g14"
                                                            transform="matrix(0.35277777,0,0,-0.35277777,-195.23799,287.69146)">
                                                            <g id="g16" clip-path="url(#clipPath20)">
                                                                <g id="g22"
                                                                    transform="translate(382.8575,763.6027)">
                                                                    <path id="path24"
                                                                        style="fill:#003a70;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                        d="M 0,0 C 0,2.465 -0.047,4.533 -0.18,6.378 H 4.484 L 4.703,3.211 h 0.13 c 1.055,1.674 2.992,3.654 6.598,3.654 2.815,0 5.013,-1.59 5.936,-3.962 h 0.09 c 0.751,1.189 1.629,2.065 2.638,2.683 1.187,0.835 2.552,1.279 4.314,1.279 3.558,0 7.161,-2.42 7.161,-9.285 v -12.619 h -5.276 v 11.831 c 0,3.561 -1.23,5.673 -3.821,5.673 -1.851,0 -3.217,-1.321 -3.785,-2.861 -0.132,-0.527 -0.265,-1.186 -0.265,-1.799 v -12.844 h -5.279 v 12.402 c 0,2.99 -1.186,5.102 -3.692,5.102 C 7.428,2.465 6.067,0.882 5.583,-0.611 5.364,-1.143 5.271,-1.757 5.271,-2.373 V -15.039 H 0 Z"
                                                                        inkscape:connector-curvature="0" />
                                                                </g>
                                                                <g id="g26" transform="translate(429.7098,759.028)">
                                                                    <path id="path28"
                                                                        style="fill:#003a70;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                        d="m 0,0 c -3.827,0.09 -7.475,-0.743 -7.475,-4 0,-2.108 1.364,-3.079 3.079,-3.079 2.151,0 3.738,1.407 4.217,2.946 C -0.046,-3.738 0,-3.296 0,-2.946 Z m 5.276,-5.32 c 0,-1.934 0.089,-3.818 0.311,-5.144 H 0.704 L 0.353,-8.088 H 0.216 c -1.317,-1.672 -3.559,-2.858 -6.327,-2.858 -4.312,0 -6.729,3.116 -6.729,6.377 0,5.409 4.79,8.133 12.707,8.09 v 0.352 c 0,1.408 -0.573,3.739 -4.351,3.739 -2.113,0 -4.315,-0.663 -5.763,-1.586 l -1.057,3.517 c 1.583,0.971 4.356,1.897 7.742,1.897 6.861,0 8.838,-4.358 8.838,-9.018 z"
                                                                        inkscape:connector-curvature="0" />
                                                                </g>
                                                                <g id="g30"
                                                                    transform="translate(438.7279,763.6027)">
                                                                    <path id="path32"
                                                                        style="fill:#003a70;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                        d="m 0,0 c 0,2.465 -0.049,4.533 -0.177,6.378 h 4.745 l 0.265,-3.21 h 0.13 c 0.923,1.668 3.257,3.697 6.816,3.697 3.742,0 7.611,-2.42 7.611,-9.193 v -12.711 h -5.411 v 12.093 c 0,3.079 -1.144,5.411 -4.089,5.411 C 7.735,2.465 6.243,0.928 5.668,-0.701 5.496,-1.187 5.449,-1.848 5.449,-2.457 V -15.039 H 0 Z"
                                                                        inkscape:connector-curvature="0" />
                                                                </g>
                                                                <g id="g34"
                                                                    transform="translate(476.1589,761.0557)">
                                                                    <path id="path36"
                                                                        style="fill:#003a70;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                        d="m 0,0 c 0,0.437 -0.045,0.965 -0.131,1.405 -0.485,2.111 -2.198,3.825 -4.662,3.825 -3.474,0 -5.408,-3.08 -5.408,-7.081 0,-3.914 1.934,-6.776 5.366,-6.776 2.196,0 4.133,1.497 4.659,3.828 C -0.045,-4.314 0,-3.782 0,-3.211 Z M 5.408,17.53 V -6.466 c 0,-2.198 0.09,-4.575 0.176,-6.024 H 0.747 l -0.216,3.383 h -0.09 c -1.275,-2.371 -3.876,-3.867 -6.994,-3.867 -5.1,0 -9.147,4.347 -9.147,10.946 -0.043,7.171 4.444,11.44 9.589,11.44 2.944,0 5.057,-1.233 6.023,-2.822 H 0 v 10.94 z"
                                                                        inkscape:connector-curvature="0" />
                                                                </g>
                                                                <path id="path38"
                                                                    style="fill:#003a70;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                    d="m 485.391,769.981 h 5.461 v -21.415 h -5.461 z"
                                                                    inkscape:connector-curvature="0" />
                                                                <g id="g40"
                                                                    transform="translate(494.6713,763.0753)">
                                                                    <path id="path42"
                                                                        style="fill:#003a70;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                        d="M 0,0 C 0,2.902 -0.044,4.972 -0.177,6.904 H 4.53 L 4.704,2.818 h 0.179 c 1.054,3.034 3.562,4.086 5.849,4.086 0.527,0 0.835,0.091 1.275,0 V 2.153 C 11.567,2.243 11.084,2.331 10.421,2.331 7.829,2.331 6.07,0.661 5.588,-1.757 5.5,-2.24 5.413,-2.816 5.413,-3.434 V -14.51 H 0 Z"
                                                                        inkscape:connector-curvature="0" />
                                                                </g>
                                                                <path id="path44"
                                                                    style="fill:#003a70;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                                    d="m 509.185,769.981 h 5.45 v -21.415 h -5.45 z"
                                                                    inkscape:connector-curvature="0" />
                                                                <g id="g46"
                                                                    transform="translate(548.2855,792.6043)">
                                                                    <path id="path48"
                                                                        style="fill:#ffb700;fill-opacity:1;fill-rule:evenodd;stroke:none"
                                                                        d="m 0,0 c -2.691,3.065 -5.547,1.681 -7.827,0.551 -0.955,-0.472 -4.422,-2.78 -7.858,-4.389 -2.448,-1.147 -5.962,-0.8 -7.889,1.58 -0.117,0.144 -3.232,3.918 -3.562,4.383 -2.023,2.537 -7.14,4.641 -13.254,1.142 -3.276,-1.896 -10.996,-6.326 -13.882,-7.974 -1.754,-0.895 -5.826,-1.286 -8.126,1.821 -0.038,0.051 -3.06,3.822 -3.181,3.967 -0.089,0.102 -2.041,2.997 -6.392,3.086 -0.64,0.016 -3.836,0.035 -6.959,-1.738 -4.141,-2.369 -13.779,-7.879 -13.779,-7.879 -0.007,0 -0.007,-0.005 -0.007,-0.005 -3.962,-2.268 -7.052,-4.029 -7.052,-4.029 l 3.648,-4.484 c 1.708,-2.117 5.554,-3.758 8.892,-1.842 0,0 12.33,7.14 12.373,7.16 5.334,2.927 9.45,2.927 12.177,1.837 2.453,-1.033 4.585,-3.613 4.585,-3.613 0,0 2.789,-3.456 3.279,-4.06 1.586,-1.952 4.209,-1.186 4.209,-1.186 0,0 0.969,0.112 2.441,0.982 0,0 11.94,6.923 11.947,6.925 3.794,2.225 7.274,2.64 9.049,2.478 5.567,-0.507 7.298,-4.396 9.714,-7.108 1.421,-1.599 2.702,-2.503 4.663,-2.457 1.291,0.029 2.746,0.808 2.961,0.948 l 14.3,8.255 c 0,0 -1.465,2.208 -4.47,5.649"
                                                                        inkscape:connector-curvature="0" />
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                        </label>
                                    </div>
                                    <div>
                                        <input class="peer hidden" id="bni-option" name="payment" type="radio"
                                            value="bni">
                                        <label
                                            class="inline-flex w-full cursor-pointer items-center justify-between rounded-lg border-2 border-blue-200 bg-white p-2 text-blue-500 hover:bg-blue-50 hover:text-blue-600 peer-checked:border-blue-600 peer-checked:text-blue-600"
                                            for="bni-option">
                                            <div class="flex items-center justify-center space-x-2">
                                                <img class="h-8 w-full object-cover"
                                                    src="{{ asset('assets/brand/BNI.png') }}" alt="BNI">
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input id="items-input" name="items" type="hidden">
                    <input id="itemtotal-input" name="item_total" type="hidden" value="0">
                    <input id="subtotal-input" name="subtotal" type="hidden" value="0">
                    <input id="discount-input" name="discount" type="hidden" value="0">
                    <input id="total-input" name="total" type="hidden" value="0">

                    <button
                        class="mb-2 mt-4 flex w-full items-center justify-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        id="create-bill-button" type="submit" disabled>Create Bills</button>
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

    </main>
@endsection

@push('scripts')
    <script>
        let cart = [];

        const addToCart = (button) => {
            const data = $(button).closest('#card-header').data('product');

            if (!isProductInCart(data.id)) {
                cart.push({
                    id: data.id,
                    category_id: data.category_id,
                    name: data.name,
                    price: data.standard_price,
                    image: data.image,
                    quantity: 1
                });

                $(button).toggleClass('card-button-unactive card-button-active')
                    .prop('onclick', null)
                    .text('Terpilih');

                updateCartContainer();
                calculateTotals();
                toggleActiveBillButton();
            }
        }

        const removeFromCart = (productId) => {
            cart = cart.filter(item => item.id !== productId);

            $(`#item-${productId}`).toggleClass('card-button-active card-button-unactive')
                .attr('onclick', 'addToCart(this)')
                .text('Add item');

            updateCartContainer();
            calculateTotals();
            toggleActiveBillButton();
        }

        const toggleActiveBillButton = () => $('#create-bill-button').prop('disabled', cart.length === 0)

        const calculateTotals = () => {
            const subtotal = cart.reduce((acc, item) => acc + (parseInt(item.quantity) || 1) * (parseFloat(item.price)),
                0);
            const discountPercentage = subtotal >= 200000 ? 10 : (subtotal >= 100000 ? 5 : 0);
            const discount = (subtotal * discountPercentage) / 100;
            const total = subtotal - discount;

            $('#subtotal-price').text(subtotal);
            $('#total-discount').text(`${discountPercentage}%`);
            $('#total-price').text(total);

            setInputValue(subtotal, discountPercentage, total);
        }

        const setInputValue = (subtotal, discountPercentage, total) => {
            const cartData = cart.map(({
                image,
                ...item
            }) => item);

            $('#items-input').val(JSON.stringify(cartData));
            $('#itemtotal-input').val(cart.length);
            $('#subtotal-input').val(subtotal);
            $('#discount-input').val(discountPercentage);
            $('#total-input').val(total);
        }

        const isProductInCart = (productId) => cart.some(item => item.id === productId);

        const updatePrice = (productId) => {
            const quantityValue = $(`#quantity-product-${productId}`).val();
            const standardPrice = $(`#standard-price-product-${productId}`);
            const price = standardPrice.attr('data-price');
            const totalPrice = quantityValue * price;

            $(`#price-input-${productId}`).val(totalPrice);
            $(`#total-price-product-${productId}`).text(totalPrice);
            standardPrice.text(price)

            const productInCart = cart.find(item => item.id === productId);
            if (productInCart) {
                productInCart.quantity = quantityValue;
                productInCart.price = price;
            }

            calculateTotals();
        }

        const toggleEditPrice = (productId) => $(`#edit-price-product-${productId}`).toggleClass('hidden grid');

        const customPrice = (el, productId) => {
            $(`#standard-price-product-${productId}`).attr('data-price', $(el).val())
            updatePrice(productId);
        }

        const toggleCustomPriceInput = (productId) => {
            const customPriceInput = $(`#input-cuspr-${productId}`);
            const isChecked = $(`#cuspr-${productId}`).prop('checked');

            customPriceInput.prop('disabled', !isChecked).val(isChecked ? customPriceInput.val() : '');
            if (!isChecked) resetStandardPrice(productId);
        }

        const resetStandardPrice = (productId) => {
            const standardPriceText = $(`#standard-price-product-${productId}`);
            standardPriceText.attr('data-price', standardPriceText.data('standard-price'));

            updatePrice(productId);
        }

        const updateCartContainer = () => {
            const cartContainer = $('#cart-container');
            cartContainer.html('');

            cart.forEach((product, index) => {
                let productHtml = `
                    <div id="cart-${product.id}">
                        <input type="hidden" id="price-input-${product.id}" value="${product.price}">
                        <div class="flex items-center justify-between transition-all duration-500">
                            <div class="flex items-center space-x-1.5">
                                <img class="w-20 h-20 border-2 border-white rounded-lg " src="${product.image}" alt="${product.name}" />
                                <div>
                                    <h6 class="text-base font-medium">${product.name}</h6>
                                    <div class="flex items-center group">
                                        <p class="inline-block text-sm font-medium text-gray-800" data-standard-price="${product.price}" data-price="${product.price}" id="standard-price-product-${product.id}">${product.price}</p>
                                        <span class="mx-1">|</span>
                                        <p class="inline-block text-sm font-medium text-pink-600" id="total-price-product-${product.id}">${product.price}</p>
                                        <button onclick="toggleEditPrice(${product.id})" class="ms-1.5 hidden group-hover:flex h-6 w-7 items-center justify-center rounded border-gray-300 bg-gray-100 p-1 hover:bg-gray-200 focus:outline-none focus:ring-0" id="edit-button-product-${product.id}" type="button">
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
                                    value="1"
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
                                        <div class="w-full text-base font-semibold">${product.price}</div>
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
                                        <input onchange="customPrice(this, ${product.id})" disabled class="w-full py-1 text-sm rounded-sm focus:outline-none focus:ring-0" id="input-cuspr-${product.id}" type="number" />
                                        <div class="w-full text-sm">Atur Sendiri</div>
                                    </div>
                                </label>
                            </li>
                        </ul>
                    </div>
                    `;

                cartContainer.append(productHtml);
            });
        }
    </script>
@endpush
