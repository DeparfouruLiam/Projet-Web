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
    <script> window.allajax = "{{ route('retros.GetRetrosJson',[$cohort,$retros]) }}";</script>

    <main>

        @foreach($columns as $column)
            <script>
                kanban.addBoards([{
                    "id": {{ $column->id }},
                    "title": {{ $column->title }},
                    "item": []
                }])
            </script>


            @foreach($contents as $content)

            @endforeach
        @endforeach
        <div id="kanban-canvas">

        </div>

        <button id="AddKanban" type="button" >Allez viens</button>
        <button id="RemoveKanban" type="button" >Dégage</button>


    </main>



</x-app-layout>


