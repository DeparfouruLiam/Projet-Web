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

    <main>

        @foreach($columns as $column)
            <script>  ColumnAdd(<?php $column->id, $column->title ?>) </script>
            @foreach($contents as $content)
                <script>  KanbanAdd(<?php $content->id, $content->title ?>) </script>
            @endforeach
        @endforeach
        <div id="kanban-canvas">

        </div>

        <button id="AddKanban" type="button" >Allez viens</button>
        <button id="RemoveKanban" type="button" >Dégage</button>


    </main>



</x-app-layout>


