<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.15/codemirror.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.15/codemirror.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.15/theme/eclipse.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.15/theme/darcula.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.15/theme/dracula.min.css"  />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.15/theme/monokai.min.css"  />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.15/mode/clike/clike.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.15/mode/python/python.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.15/addon/edit/closebrackets.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.15/addon/edit/matchbrackets.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.15/addon/scroll/simplescrollbars.min.css"  />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.15/addon/scroll/simplescrollbars.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.15/addon/scroll/annotatescrollbar.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.15/addon/fold/foldgutter.min.css"  />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.15/addon/fold/foldgutter.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.15/addon/fold/foldcode.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.15/addon/fold/brace-fold.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.15/addon/fold/xml-fold.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.15/addon/fold/indent-fold.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.15/addon/fold/markdown-fold.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.15/addon/fold/comment-fold.min.js" ></script>
    <script src="https://cdn.tiny.cloud/1/a12cclvryu7wvca5iaf01ag7e77i6ia9egn72ze9c45qpyti/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <title>Home</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>

