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

    <div id="kanban-canvas">

    </div>
        <script>function KanbanAdd(){ kanban.addElement('column-id-1',salope); }
            function KanbanRemove(){ kanban.removeElement('item-id-6'); }</script>


        <button type="button" onclick="KanbanAdd();" >Allez viens</button>
        <button type="button" onclick="KanbanRemove();" >Dégage</button>


    </main>



</x-app-layout>


