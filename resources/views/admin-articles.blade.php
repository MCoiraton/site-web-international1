<x-layout-admin>
    <x-slot name='tableau'>
		<style>
            #gestion {
                background-color: rgba(229, 231, 235, var(--tw-bg-opacity));
                --tw-text-opacity: 1;
                color: rgba(17, 24, 39, var(--tw-text-opacity));
            };
        </style>
	</x-slot>
    <x-slot name='panel'>
        Ajouter un article :
        <a href="/admin/nouvelarticle">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Ajouter
        </button></a>
        <div>Liste des articles en ligne :</div>
        <table class="w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                    <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de création</th>
                    <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dernière modification</th>
                    <th class="p-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($articles as $article)
                <tr>
                    <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">{{ $article->titre }}</td>
                    <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">{{ $article->created_at }}</td>
                    <td class="p-4 whitespace-nowrap text-sm font-normal text-gray-900">{{ $article->updated_at }}</td>
                    <td class="flex flex-row m-2">
                        <a href="/admin/article/{{$article->id}}" class="items-center hover:bg-blue-700 hover:text-white bg-white text-blue-700 px-3 py-2 rounded-md text-sm font-medium">Modifier</a>
                        <form action="/admin/deletearticle/{{$article->id}}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="items-center hover:bg-red-700 hover:text-white bg-white text-red-700 px-3 py-2 rounded-md text-sm font-medium">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </x-slot>
</x-layout-admin>