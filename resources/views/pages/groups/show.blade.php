<x-app-layout>
    <x-slot name="header">
        <h1 class="flex items-center gap-1 text-sm font-normal">
            <span class="text-gray-700">{{ $cohort->name }}</span>
        </h1>
    </x-slot>

    <!-- begin: grid -->
    <div class="grid lg:grid-cols-3 gap-5 lg:gap-7.5 items-stretch">
        <div class="lg:col-span-2">
            <div class="grid">
                <div class="card card-grid h-full min-w-full">
                    <div class="card-header">
                        <h3 class="card-title">Groupes</h3>
                    </div>
                    <div class="card-body">
                        <div data-datatable="true" data-datatable-page-size="30">
                            <div class="scrollable-x-auto">
                                <table class="table table-border" data-datatable-table="true">
                                    <thead>
                                    <tr>
                                        <th class="min-w-[135px]">
                                            <span class="sort asc">
                                                 <span class="sort-label">Nom du groupe</span>
                                                 <span class="sort-icon"></span>
                                            </span>
                                        </th>
                                        <th class="min-w-[270px]">
                                            <span class="sort">
                                                <span class="sort-label">Membres du groupe</span>
                                                <span class="sort-icon"></span>
                                            </span>
                                        </th>
                                        <th class="max-w-[50px]"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($groups as $group)
                                        <tr>
                                        <td>{{ $group->group_name }}</td>
                                        <td>-
                                            @foreach($group->getUsersGroups() as $Member)
                                                {{ $Member->getUsers()->first_name  }} -
                                            @endforeach
                                        </td>
                                        <td class="cursor-pointer pointer">
                                            <i class="ki-filled ki-trash"></i>
                                        </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer justify-center md:justify-between flex-col md:flex-row gap-5 text-gray-600 text-2sm font-medium">
                                <div class="flex items-center gap-2 order-2 md:order-1">
                                    Show
                                    <select class="select select-sm w-16" data-datatable-size="true" name="perpage"></select>
                                    per page
                                </div>
                                <div class="flex items-center gap-4 order-1 md:order-2">
                                    <span data-datatable-info="true"></span>
                                    <div class="pagination" data-datatable-pagination="true"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @can('create', App\Models\Groups::class)
            <div class="lg:col-span-1">
                <div class="card h-full">
                    <div class="card-header">
                        <h3 class="card-title">
                            Créer de nouveaux groupes aléatoires
                        </h3>
                    </div>
                    <div class="card-body flex flex-col gap-5">
                        <form action="{{ route('GenerateGroups',1) }}" method="POST">
                            @csrf
                            <x-forms.dropdown name="nb_per_group" :label="__('Étudiants par groupes')" required>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </x-forms.dropdown>

                            <x-forms.primary-button type="submit">
                                {{ __('Valider') }}
                            </x-forms.primary-button>
                        </form>
                    </div>
                </div>
            </div>
        @endcan
    </div>
    <!-- end: grid -->
</x-app-layout>
