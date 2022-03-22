<?php
use App\Candidature;
$candidatures=Candidature::all();
?>
<x-layout-admin>
    <x-slot name='fiches'>
		<style>
            #fiches {
                background-color: rgba(229, 231, 235, var(--tw-bg-opacity));
                --tw-text-opacity: 1;
                color: rgba(17, 24, 39, var(--tw-text-opacity));
            };
        </style>
	</x-slot>
    <x-slot name='panel'>
    <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
            <div class="mb-4 flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Fiches de Candidature</h3>
                    <span class="text-base font-normal text-gray-500">Vous pouvez içi visualiser et bloquer ou débloquer la modification des fiches de candidature soumises par les étudiants souhaitant partir en mobilité</span>
                </div>
            </div>
            <form id="exportExcel" method="POST" action="{{ action('FastExcelController@exportCandidature') }}">
                @csrf
                <input type="hidden" name="candidatures" value="{{$candidatures}}"/>
                <button form="exportExcel" class="items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium"> Exporter sous format Excel </button>
            </form>
            <a href="#" class="hover:bg-blue-700 hover:text-white px-3 py-2 mt-4 rounded-md text-sm font-medium">Bouton Utile</a>
                <div class="flex flex-col mt-4 border-2 border-gray-300 rounded-lg">
                <div class="overflow-x-auto rounded-lg">
                    <div class="align-middle inline-block min-w-full">
                        <div class="shadow overflow-hidden sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nom Etudiant
                                    </th>
                                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date Création Fiche
                                    </th>
                                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date dernière modification
                                    </th>
                                    <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions Administrateur
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach($candidatures as $candidature)
                                <tr>
                                    <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                        <a href="/admin/fiche/{{$candidature->email}}" class="underline text-blue-700">
                                            {{$candidature->nom}} {{$candidature->prenom}}
                                        </a>
                                    </td>
                                    <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                        {{$candidature->created_at}}
                                    </td>
                                    <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">
                                        {{$candidature->updated_at}}
                                    </td>
                                    <td class="flex flex-row m-2">
                                        <form id="block" method="POST" action="{{ action('CandidatureController@bloquer') }}">
                                            @csrf
                                            <input type="hidden" name="email" value="{{$candidature->email}}"/>
                                            <button form="block" class="items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium">
                                            @if($candidature->blocked)
                                                Débloquer
                                            @else
                                                Bloquer
                                            @endif
                                            </button>
                                        </form>
                                        <form id="mail" method="post" action="{{ action('CandidatureController@mail') }}">
                                            @csrf
                                            <input type="hidden" name="email" value="{{$candidature->email}}"/>
                                            <button form="mail" class="items-center hover:bg-blue-700 hover:text-white bg-white text-blue-700 px-3 py-2 rounded-md text-sm font-medium">Contacter</button>
                                        </form>
                                        <form id="excel" method="post" action="">
                                            @csrf
                                            <input type="hidden" name="email" value="{{$candidature->email}}"/>
                                            <button form="excel" class="items-center hover:bg-green-700 hover:text-white bg-white text-green-700 px-3 py-2 rounded-md text-sm font-medium">To Excel</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout-admin>