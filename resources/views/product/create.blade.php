@extends('layouts.main')

@section('content')
    <div>
        <div class="w-full rounded-lg bg-white p-5">
            <h2 class="mb-3 text-xl font-semibold">Tambah Produk</h2>

            <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="mb-5">
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="category">Pilih
                        Kategori</label>
                    <select
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm capitalize text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        id="category" name="category_id">
                        @foreach ($categories as $category)
                            <option class="capitalize" value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : null }}>
                                {{ $category->text }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="name">Nama</label>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        id="name" name="name" type="text" value="{{ old('name') }}" placeholder="name"
                        required>
                    @error('name')
                        <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="price">Harga
                        Standar</label>
                    <input
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        id="price" name="standard_price" type="number" value="{{ old('standard_price') }}"
                        placeholder="price" required>
                    @error('standard_price')
                        <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5 flex w-full flex-col justify-center">
                    <label class="mb-2 block text-sm font-medium text-gray-900" for="dropzone-file">Upload Photo</label>
                    <label
                        class="flex h-64 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100"
                        id="dropzone-label" for="dropzone-file">
                        <div class="flex flex-col items-center justify-center pb-6 pt-5">
                            <svg class="mb-4 h-8 w-8 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500" id="file-name"><span class="font-semibold">Click to
                                    upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500">PNG, JPG, JPEG, or WEBP (MAX. 2 MB).</p>
                        </div>
                        <input class="hidden" id="dropzone-file" name="image" type="file"
                            accept=".jpg, .jpeg, .png, .webp" />
                    </label>
                    @error('image')
                        <p class="mt-2 text-sm font-semibold text-rose-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4" id="image-container">
                    </div>
                </div>

                <button
                    class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="submit">Tambah Produk</button>
            </form>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const dt = new DataTransfer();

        function deleteImagePre(el) {
            $("#image-container").html('');
            dt.items.clear();
            $('#dropzone-file').val('');

            handleFileCount();
        }

        function handleFileCount() {
            const fileCount = dt.files.length;

            if (fileCount > 0) {
                $('#file-name').text(dt.items[0].getAsFile().name);
            } else {
                $('#file-name').html(
                    `<span class="font-semibold">Click to upload</span> or drag and drop`
                );
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            const dropzoneLabel = $('#dropzone-label');
            const dropzoneFileInput = $('#dropzone-file');
            const allowedExtensionsDesign = ["jpg", "jpeg", "png", "webp"];

            dropzoneLabel.on('dragover', function(e) {
                e.preventDefault();
                $(this).addClass('border-primary-500');
            });

            dropzoneLabel.on('dragleave', function() {
                $(this).removeClass('border-primary-500');
            });

            dropzoneLabel.on('drop', function(e) {
                e.preventDefault();
                $(this).removeClass('border-primary-500');

                const droppedFiles = e.originalEvent.dataTransfer.files;
                handleFiles(droppedFiles);
            });

            dropzoneFileInput.change(function() {
                const selectedFiles = this.files;
                handleFiles(selectedFiles);
            });

            function handleFiles(files) {
                const imageContainer = $("#image-container");

                if (files.length > 0) {
                    const file = files[0];

                    // Validate file extension
                    const fileExtension = file.name.split(".").pop().toLowerCase();
                    if (!allowedExtensionsDesign.includes(fileExtension)) {
                        const validationHtml =
                            `<p id="validationFile" class="mt-2 text-sm font-semibold text-rose-500">Hanya file dengan format yang diizinkan.</p>`
                        dropzoneLabel.next("#validationFile").remove().end().val("").after(validationHtml);
                    } else {
                        dropzoneLabel.next("#validationFile").remove();

                        dt.items.add(file);

                        const blob = URL.createObjectURL(file);
                        const imageHTML = `
                           <div class="relative" id="image-pre">
                                 <button type="button" onclick="deleteImagePre(this)"
                                    class="absolute left-0 px-1 m-4 text-white rounded-full delete-button -top-2 bg-gray-100/80 focus:border-blue-300 focus:outline-none focus:ring-bg-gray-100/80">
                                    <svg class="w-8 fill-current" viewBox="0 0 24 24" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                       <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                       <g id="SVGRepo_iconCarrier">
                                          <path d="M16 8L8 16M8 8L16 16" stroke="#000000" stroke-width="2" stroke-linecap="round">
                                          </path>
                                       </g>
                                    </svg>
                                 </button>
                                 <img class="w-full border rounded-md shadow-sm h-60"
                                    src="${blob}"
                                    data-name="${file.name}"
                                    alt="preview-image">
                           </div>
                        `;
                        imageContainer.html(imageHTML);
                    }
                }

                dropzoneFileInput[0].files = dt.files;
                handleFileCount();
            }
        })
    </script>
@endpush
