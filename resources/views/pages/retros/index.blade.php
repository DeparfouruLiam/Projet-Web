<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Retrospectives') }}
            </span>
        </h1>
    </x-slot>
    <link rel="stylesheet" href="{{asset('jkanban/dist/jkanban.css')}}">

    <script src="{{asset("jkanban/dist/jkanban.js")}}"></script>
</x-app-layout>

<script> var kanban = new jKanban(options) </script>

<main class="kanban-drag">
    <div class="kanban-item" data-eid="item-id-1" data-username="username1">Item 1</div>
    <div class="kanban-item" data-eid="item-id-2" data-username="username2">Item 2</div>
</main>

