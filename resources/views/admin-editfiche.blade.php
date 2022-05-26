<x-layout-admin>
    <x-slot name='editfiche'>
		<style>
            #editfiche {
                background-color: rgba(229, 231, 235, var(--tw-bg-opacity));
                --tw-text-opacity: 1;
                color: rgba(17, 24, 39, var(--tw-text-opacity));
            };
        </style>
	</x-slot>
    <x-slot name='panel'>
        <script>
        </script>
        <?php /*
        <h1 class="text-gray-700 font-semibold mb-2">Ajouter un champ</h1>
        <form method="post" action="" class="flex">
            @csrf
            <div class="m-2 items-center">
                <label for="nom">Nom :</label>
                <input type="text" class="border-2" name="nom">
            </div>
            <div class="">
                <select name="type" class="form-select py-1.5 text-gray-700bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <option value="">Type</option>
                    <option value="string">Texte</option>
                    <option value="integer">Nombre</option>
                    <option value="float">Nombre décimal</option>
                    <option value="date">Date</option>
                </select>
            </div>                    
            <button type="submit" class="items-center hover:bg-blue-700 hover:text-white bg-white text-blue-700 px-3 py-2 rounded-md text-sm font-medium">Enregistrer</button>
        </form>
        <h1 class="text-gray-700 font-semibold mb-2">Supprimer un champ</h1>
        @foreach($columns as $column)
        <form method="post" action="">
            @csrf
            @method('DELETE')
            <div class="">
                <label for="title">{{$column}}</label>
                <input type="hidden" name="nom" value="{{$column}}">
                <button type="submit" class="items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium">Supprimer</button>
            </div>
        </form>
        @endforeach
        */ ?>
        <h1 class="text-gray-700 font-semibold mb-2">Ajouter une filière</h1>
        <form method="post" action="/admin/filiere">
            @csrf
            <div class="m-2 items-center">
                <label for="nom">Nom :</label>
                <input type="text" class="border-2" name="nom">
            </div>           
            <button type="submit" class="items-center hover:bg-blue-700 hover:text-white bg-white text-blue-700 px-3 py-2 rounded-md text-sm font-medium">Enregistrer</button>
        </form>
        <h1 class="text-gray-700 font-semibold mb-2">Supprimer une filière</h1>
        @foreach($filieres as $filiere)
        <form method="post" action="/admin/filiere">
            @csrf
            @method('DELETE')
            <div class="">
                <label for="title">{{$filiere->nom_filiere}}</label>
                <input type="hidden" name="nom" value="{{$filiere->nom_filiere}}">
                <button type="submit" class="items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium">Supprimer</button>
            </div>
        </form>
        @endforeach
        <h1 class="text-gray-700 font-semibold mb-2">Ajouter une spécialité</h1>
        <form method="post" action="/admin/specialite">
            @csrf
            <div class="m-2 items-center">
                <label for="nom">Nom :</label>
                <input type="text" class="border-2" name="nom">
            </div>
            <div class="">
                <select name="filiere" class="form-select py-1.5 text-gray-700bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                    <option value="">Filière</option>
                    @foreach($filieres as $filiere)
                    <option value="{{$filiere->nom_filiere}}">{{$filiere->nom_filiere}}</option>
                    @endforeach
                </select>
            </div>                    
            <button type="submit" class="items-center hover:bg-blue-700 hover:text-white bg-white text-blue-700 px-3 py-2 rounded-md text-sm font-medium">Enregistrer</button>
        </form>
        <h1 class="text-gray-700 font-semibold mb-2">Supprimer une spécialité</h1>
        @foreach($specialites as $specialite)
        <form method="post" action="/admin/specialite">
            @csrf
            @method('DELETE')
            <div class="">
                <label for="title">{{$specialite->nom_spe}}</label>
                <input type="hidden" name="nom" value="{{$specialite->nom_spe}}">
                <button type="submit" class="items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium">Supprimer</button>
            </div>
        </form>
        @endforeach
    </x-slot>
</x-layout-admin>