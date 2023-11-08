<head>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4">Personagens de Harry Potter</h1>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($paginatedCharacters as $character)
            <div class="bg-white rounded-lg shadow-lg p-4">
                <button class="mx-auto flex flex-col items-center character-button"
                    data-target="modal-{{ $character->id }}">
                    <img src="{{ $character->image }}" class="w-32 h-32 object-cover rounded-full mx-auto mb-2">
                    <p class="text-center font-bold">{{ $character->name }}</p>
                    <p>Data de Nascimento: {{ date('d/m/Y', strtotime($character->dateOfBirth)) }}</p>
                    <p>Patrono: {{ $character->patronus ? $character->patronus : 'Não Identificado' }}</p>
                </button>
            </div>
        @endforeach

        {{-- foreach do modal aqui --}}
        @foreach ($paginatedCharacters as $character)
            <div id="modal-{{ $character->id }}" class="modal">
                <div class="modal-content">
                    <span class="close" id="closeModal-{{ $character->id }}">&times;</span>
                    <h2>Detalhes do Personagem</h2>
                    <div id="modalContent-{{ $character->id }}">
                        <div class="mx-auto flex flex-col items-center">
                            <img src="{{ $character->image }}" class="w-32 h-32 object-cover rounded-full mx-auto mb-2">
                            <h2 class="font-semibold text-lg">{{ $character->name }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


    <div class="mt-4 p-8 flex justify-between">
        @if ($page > 1)
        <a href="{{ route('characters', ['page' => $page - 1]) }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Página anterior</a>
        @endif

        @if ($page < $totalPages) <a href="{{ route('characters', ['page' => $page + 1]) }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Próxima página</a>
            @endif
    </div>

</div>