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


    <main>

        <div id="kanban-canvas">

        </div>

            @can('create', App\Models\Retros::class)
                <form action="{{ route('retros.AddColumnDB',[$cohort,$retros]) }}" method="POST">
                    {{ csrf_field() }}
                    <input id="NewColumn" name="NewColumn" style="background-color: darkgrey; margin: 5px" placeholder="Nom de la colonne" type="text" required>
                    <button id="AddKanban" type="submit">Ajouter Colonne</button>
                </form>
            @endcan



    </main>

    <script>
        window.allajax = "{{ route('retros.GetRetrosJson',[$cohort,$retros]) }}"</script>

</x-app-layout>


