@extends('layout.master')
@section('content')
    @include('admin.components.base')
    <div class="px-5 pt-24 pb-5 sm:ml-64">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">Problem Name</th>
                    <th scope="col" class="px-6 py-3">Before 30 mins</th>
                    <th scope="col" class="px-6 py-3">After 30 mins</th>
                    <th scope="col" class="px-6 py-3">After 60 mins</th>
                    <th scope="col" class="px-6 py-3">After 90 mins</th>
                    <th scope="col" class="px-6 py-3">Unsuccessful hack</th>
                </tr>
                </thead>
                <tbody>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Problem 1</th>
                    <td class="px-6 py-4">250</td>
                    <td class="px-6 py-4">230</td>
                    <td class="px-6 py-4">200</td>
                    <td class="px-6 py-4">160</td>
                    <td class="px-6 py-4">-50</td>
                </tr>
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Problem 2</th>
                    <td class="px-6 py-4">300</td>
                    <td class="px-6 py-4">280</td>
                    <td class="px-6 py-4">250</td>
                    <td class="px-6 py-4">240</td>
                    <td class="px-6 py-4">-80</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
