<x-layout-admin>
    <x-slot name='utilisateurs'>
        <style>
            #utilisateurs {
                background-color: rgba(229, 231, 235, var(--tw-bg-opacity));
                --tw-text-opacity: 1;
                color: rgba(17, 24, 39, var(--tw-text-opacity));
            }

            ;
        </style>
    </x-slot>
    <x-slot name='panel'>
        <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
            <div class="mb-4 flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Gestion Admins</h3>
                    <span class="text-base font-normal text-gray-500">Vous pouvez ici ajouter et supprimer les admins par leur nom d'utilisateur UL</span>
                </div>
            </div>
        </div>
        <div class="bg-white mt-4 shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
            <h1 class="text-gray-600 text-sm font-semibold mb-2">Liste des administrateurs du site</h1>
            @foreach($admins as $admin)
            <div>
                {{$admin->uid}}
                <form action="{{route('deleteadmin')}}" class="inline" method="POST">
                    @csrf
                    <input type="hidden" name="uid" value="{{$admin->uid}}">
                    <button type="submit" class="items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium">Supprimer</button>
                </form>
            </div>
            @endforeach
            <div class="mt-4 ">
                <form action="{{route('addadmin')}}" method="POST">
                    @csrf
                    <label for="uid">Ajouter un admin par identifiant UL : </label><br>
                    <input class="p-2 m-2" type="text" name="uid" placeholder="Identifiant">
                    <button type="submit" class="items-center hover:bg-blue-700 hover:text-white bg-white text-blue-700 px-3 py-2 rounded-md text-sm font-medium">Ajouter</button>
                </form>
            </div>
        </div>
    </x-slot>
</x-layout-admin>