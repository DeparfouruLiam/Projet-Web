<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">
                {{ __('Retros') }}
            </span>
        </h1>
    </x-slot>
    <link rel="stylesheet" href="{{asset('jkanban/dist/jkanban.css')}}">
    <script src="{{asset("jkanban/dist/jkanban.js")}}"></script>
    <script> window.allajax = "{{ route('retros.GetRetrosJson',[$cohort,$retros]) }}";</script>

    <main>
        <div>{{$retros->id}}</div>

        <div id="kanban-canvas">

        </div>
        <input id="NewColumn" style="background-color: darkgrey; margin: 5px" placeholder="Nom de la colonne" value="text" required>
        <button id="AddKanban" type="button" >Ajouter Colonne</button>
            <br>
        <button id="RemoveKanban" type="button" >Dégage</button>


    </main>



</x-app-layout>


