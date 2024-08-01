<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Incidencias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y" style="margin-left:10%; margin-right:10%;background-color: rgb(31 41 55 / var(--tw-bg-opacity));color:white; border:1px solid white;">
                        @if (isset($Incidencia) && $Incidencia->isEmpty())
                        <p style="margin-top:30px; margin-bottom:30px;" class="centrar">No hay Incidencias</p>
                        @else
                        @foreach ($Incidencia as $incidencia)
                            <div class="p-6 flex space-x-2" style="border: 1px solid white;border-style: none;border-bottom-color: white;border-bottom-style: dashed;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                                <div class="flex-1">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <span class="text-gray-800" style="color:white;">{{ $incidencia->user->name }}</span>
                                            <small class="ml-2 text-sm text-gray-600" style="color:white;">{{ $incidencia->created_at->format('j M Y, g:i a') }}</small>
                                            <small class="ml-2 text-sm text-gray-600" style="color:white;">{{ $incidencia->etapa}} 
                                                @if ($incidencia->etapa == "Sin Asignar")
                                                🔴
                                                @elseif($incidencia->etapa == "Finalizado")
                                                🔵
                                                @else
                                                🟢
                                                @endif
                                            </small>
                                        </div>
                                        <x-dropdown>
                                            <x-slot name="trigger">
                                                <button>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                            </x-slot>
                                                <x-slot name="content">
                                                <x-dropdown-link :href="route('Incidencia.show',$incidencia->id)">
                                                    {{ __('Ver') }}
                                                </x-dropdown-link>
                                                    @if(auth()->user()->role =="Operador" && $incidencia->etapa == "Sin Asignar")
                                                        <x-dropdown-link :href="route('asignar.show',$incidencia->id)">
                                                            {{ __('Asignar') }}
                                                        </x-dropdown-link>
                                                    @endif
                                                </x-slot>
                                            </x-dropdown>
                                        </div>
                                        <p class="mt-4 text-lg text-gray-900" style="color:white;">{{ $incidencia->titulo }}</p>
                                    </div>
                                </div>
                                    @endforeach
                                    @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
