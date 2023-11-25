@extends('layout.master')
@section('content')
    @include('admin.components.base')
    <div class="px-5 pt-24 pb-5 sm:ml-64">
        @include('admin.components.alerts')
        <h1 class="font-bold mb-2 text-center text-2xl">@if($contestsNotStarted->isEmpty()) Create a Contest first @endif</h1>
        @if(!$contestsNotStarted->isEmpty())
            <form action={{ route('super-admin.question.store') }} method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                        <select name="contest" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            <option selected disabled>Choose a contest</option>
                            @foreach($contestsNotStarted as $contest) @endforeach
                            <option value={{ $contest->id }}>{{ $contest->name }}</option>
                        </select>
                    </div>
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                        <input type="text" name="title" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Problem Name" required>
                    </div>
                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea name="description" id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-sm" placeholder="Write your rules here..." required></textarea>
                    </div>
                    <div>
                        <label for="hint" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hint</label>
                        <textarea name="hint" id="hint" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-sm" placeholder="Write your rules here..."></textarea>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Sample Input</label>
                        <input name="sample_input" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-sm cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none" aria-describedby="file_input_help" id="file_input" accept="text/plain" required>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">.txt</p>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Sample Output</label>
                        <input name="sample_output" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-sm cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none" aria-describedby="file_input_help" id="file_input" accept="text/plain" required>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">.txt</p>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Full Input</label>
                        <input name="full_input" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-sm cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none" aria-describedby="file_input_help" id="file_input" accept="text/plain" required>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">.txt</p>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Full Output</label>
                        <input name="full_output" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-sm cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none" aria-describedby="file_input_help" id="file_input" accept="text/plain" required>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">.txt</p>
                    </div>

                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Memory Limit (Megabytes)</label>
                        <input type="number" name="memory" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="eg: 512" required>
                    </div>

                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Time Limit (Seconds)</label>
                        <input type="number" name="time" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="eg: 2" required>
                    </div>
                    <div class="flex items-center ps-4 mb-2 border border-gray-200">
                        <input id="bordered-checkbox-1" type="checkbox" name="visibility_after_contest" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="bordered-checkbox-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Public visibility after contest ends?</label>
                    </div>

                    <button type="submit" class="col-span-2 mt-1 p-2 text-white accent-color flex-none" >Create</button>
                </div>
            </form>

            <script>
                $('#description').summernote({
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

                $('#hint').summernote({
                    placeholder: 'Add hint if have any',
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
        @endif
    </div>
@endsection
