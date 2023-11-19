@extends('layout.master')
@section('content')
    @include('components.navbar')
    <div class="max-w-screen-xl mx-auto p-4">
        <div class="Greetings p-4 bg-white border-t-4 border-[#148ED2] mb-5">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="#"
                           class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                 fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span
                                class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Problem 1</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="p-4 bg-white border-t-4 border-[#148ED2] mb-5 grid xl:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
            <div class="min-h-[70vh] max-h-[80vh] overflow-y-scroll md:mb-2 sm:mb-2">
                <h1 class="text-[20px] text-center font-black mb-2">
                    Problem 1
                </h1>
                <p class="text-center text-[14px] leading-4 mb-3">
                    time limit per test: 1 seconds <br>
                    memory limit per test: 256 megabytes
                </p>
                <p class="text-[14px] leading-4 mb-5 text-justify">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit enim expedita neque eveniet possimus
                    recusandae architecto a id facere repellat saepe voluptatem iste laboriosam veniam consequuntur
                    asperiores, optio facilis nam suscipit blanditiis! Cumque vel ad placeat voluptatem vitae minima
                    fuga.<br><br>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore dicta quas, impedit cum corrupti aut
                    eos voluptas illo sapiente nisi. <br><br>
                    <b>Input</b><br>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo delectus voluptatibus, natus quidem
                    repellendus iusto quo vitae quos recusandae architecto?
                    <br><br>
                    <b>Output</b><br>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque, alias nesciunt ipsam nisi
                    quisquam veniam?
                    <br>
                <div class="grid grid-cols-2 gap-2">
                    <div class="w-full bg-white border border-gray-200">
                        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 "
                            id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                            <h1 class="p-1">Input</h1>
                        </ul>
                        <div id="defaultTabContent">
                            <p class="text-gray-500 leading-5 text-sm p-2">
                                4
                                7 <br>
                                0100010 <br>
                                6 6 6 7 7 6 6 <br>
                                3 3 5 4 7 6 7 <br>
                                5 <br>
                                10111 <br>
                                9 8 5 7 5 <br>
                                4 4 7 8 4 <br>
                                10 <br>
                                0100000000 <br>
                                7 7 6 5 2 2 5 3 8 3 <br>
                                8 6 9 6 6 8 9 7 7 9 <br>
                                8 <br>
                                01010000 <br>
                                8 7 7 7 8 7 7 8 <br>
                                4 4 4 2 1 4 4 4 <br>
                            </p>
                        </div>
                    </div>
                    <div class="w-full bg-white border border-gray-200">
                        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 "
                            id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                            <h1 class="p-1">Output</h1>
                        </ul>
                        <div id="defaultTabContent">
                            <p class="text-gray-500 leading-5 text-sm p-2">
                                43 <br>
                                36 <br>
                                76 <br>
                                52 <br>
                            </p>
                        </div>
                    </div>

                </div>
                <div>
                    <p class="text-[14px] leading-4 mb-5 text-justify mt-2">
                        <b>Hint</b><br>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo delectus voluptatibus, natus
                        quidem repellendus iusto quo vitae quos recusandae architecto?
                        <br><br></p>
                </div>
            </div>
            <div class="min-h-[70vh] max-h-[80vh]">
                <div class="flex justify-between mb-1 accent-color text-white p-2">
                    <div class="flex gap-1 items-center">
                        <h1 class="text-sm">Language</h1>
                        <select name="language" id="language" class="text-sm p-0.5 accent-color focus:border-white focus:ring-0" onchange="changeLanguage()">
                            <option value="java">Java</option>
                            <option value="c">C</option>
                            <option value="cpp">C++</option>
                            <option value="python">Python</option>
                        </select>
                    </div>
                    <div class="flex gap-1 items-center">
                        <h1 class="text-sm">Theme</h1>
                        <select name="theme" id="theme" class="text-sm p-0.5 accent-color focus:border-white focus:ring-0" onchange="changeTheme()">
                            <option value="monokai">Monokai</option>
                            <option value="darcula">Darcula</option>
                            <option value="dracula">Dracula</option>
                            <option value="eclipse">eclipse</option>
                        </select>
                    </div>
                </div>
                <form action="" method="post" class="flex flex-col">
                    <textarea class="codeblocks grow" id="codeblocks"></textarea>
                    <button type="submit" class="mt-1 p-2 text-white accent-color flex-none">Submit</button>
                </form>
                <script>
                        const languageMapping = {
                            "java": "text/x-java",
                            "cpp": "text/x-c++src",
                            "c": "text/x-csrc",
                            "python": "text/x-python",
                        };
                        const editor = CodeMirror.fromTextArea(document.getElementById('codeblocks'), {
                            height: "50%",
                            mode: "text/x-java",
                            theme: "monokai",
                            lineNumbers: true,
                            autoCloseBrackets: true,
                            matchBrackets: true,
                            scrollbarStyle: "overlay",
                            extraKeys: {"Ctrl-Space": "autocomplete"},
                            foldGutter: true,
                            gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
                            smartIndent: true,
                            electricChars: true,
                            indentUnit: 4
                        });
                        const totalDisplayHeightInPixels = window.screen.height;
                        editor.getWrapperElement().style.height = totalDisplayHeightInPixels <= 768 ? "68dvh" : "70vh";


                        function changeLanguage() {
                            const languageSelect = document.getElementById('language');
                            const selectedMode = languageMapping[languageSelect.value];
                            editor.setOption('mode', selectedMode);
                        }

                        function changeTheme() {
                            const themeSelect = document.getElementById('theme');
                            const selectedTheme = themeSelect.options[themeSelect.selectedIndex].value;
                            editor.setOption('theme', selectedTheme);
                        }
                </script>
            </div>
        </div>
    </div>
@endsection

