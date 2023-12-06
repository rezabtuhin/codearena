@extends('layout.master')
@section('content')
    @include('admin.components.base')

    <div class="px-5 pt-24 pb-5 sm:ml-64">
        @include('admin.components.alerts')
        <form method="post" enctype="multipart/form-data" id="contestForm" action={{ route('super-admin.dashboard.store') }}>
            @csrf
            @method('POST')
            <div class="grid grid-cols-3 gap-2">
                <div class="mb-2 sm:col-span-1">
                    <label for="contest-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contest Name</label>
                    <input type="text" id="contest-name" name="contest-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Test name" required>
                </div>
                <div class="mb-2 sm:col-span-1">
                    <label for="start-time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Time</label>
                    <input type="datetime-local" id="start-time" name="start-time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Test name" required>
                </div>
                <div class="mb-2 sm:col-span-1">
                    <label for="end-time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Time</label>
                    <input type="datetime-local" id="end-time" name="end-time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Test name" required>
                </div>
                <div class="mb-2 col-span-3">
                    <div class="grid lg:grid-cols-2 gap-3">
                        <div class="sm:col-span-1">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea name="description" id="description"  rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-sm" placeholder="Write your description here..." required></textarea>
                        </div>
                        <div class="sm:col-span-1">
                            <label for="rules" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rules & Point Distribution</label>
                            <textarea name="rules" id="rules" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-sm" placeholder="Write your rules here..." required></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Attachments</label>
                    <input name="banner" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-sm cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none" aria-describedby="file_input_help" id="file_input">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG or JPG.</p>
                </div>
                <button type="submit" class="col-span-3 mt-1 p-2 text-white accent-color flex-none" >Create</button>
            </div>
        </form>
        <script>
            $('#description').summernote({
                styleWithSpan: false,
                placeholder: 'Write problem description',
                tabsize: 2,
                height: 100,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
            $('#rules').summernote({
                placeholder: 'Write rules here',
                tabsize: 2,
                height: 100,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        </script>
    </div>
@endsection
