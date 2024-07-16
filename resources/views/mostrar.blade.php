<x-app-layout>
<div class="py-12">
<div class="mt-6 bg-white shadow-sm rounded-lg divide-y" style="margin-left:10%; margin-right:10%;background-color: rgb(31 41 55 / var(--tw-bg-opacity));color:white; border:1px solid white;">
    <div class="p-6 flex space-x-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
    </svg>
        <div class="flex-1">
            <div class="flex justify-between items-center">
                <div>
                    <span class="text-gray-800" style="color:white;">{{ $incidencia->user->name }}</span>
                    <small class="ml-2 text-sm text-gray-600" style="color:white;">{{ $incidencia->created_at->format('j M Y, g:i a') }}</small>
                </div>
            </div>
            <div class="contenedor2" style="with: 100px;display:flex; flex-direction:column; align-items:center; margin-top:25px;margin-bottom: 25px;">
                <h1 style="color:white;font-size:25px;">TÍTULO: {{ strtoupper($incidencia->titulo )}}</h1>
                <div class="imagen" style="with: 80%;height: 400px; overflow: hidden; margin-top: 25px;">
                    <img src="{{ asset($incidencia->evidencias) }}" class="img-fluid" alt="Evidencias" style="object-fit: cover; width: 100%; height: 100%;">
                </div>
                <div class="descripcion" style="display:flex;flex-direction:column; width: 80%; background-color:rgb(89 102 120);margin-top: 25px;border-radius: 6px;padding: 15px;">
                    <span style="border: 1px solid white;border-style: none;border-bottom-color: white;border-bottom-style: dotted; width:100%;">Descripción:</span>
                    <p>{{nl2br($incidencia->descripcion)}}</p>
                </div>
                <h1 style="font-family: 'Arial', serif; font-weight: 700; font-size: 35px;color: white;font-style: normal; margin-top:50px;">Reporte:</h1>
                <img src="@if ($incidencia->etapa=="Sin Asignar")
                            {{asset('storage/grafo/paso1.png')}}
                        @elseif($incidencia->etapa=="Asignado")
                            {{asset('storage/grafo/paso2.png')}}
                        @elseif($incidencia->etapa=="Atencion")
                            {{asset('storage/grafo/paso3.png')}}
                        @elseif($incidencia->etapa=="Pruebas")
                            {{asset('storage/grafo/paso4.png')}}
                        @elseif($incidencia->etapa=="Finalizado")
                            {{asset('storage/grafo/finalizado.png')}}
                        @endif
                " alt="">
                @foreach ($tareas as $tarea)
                <div class="p-6 flex space-x-2" style="border: 1px solid white;border-style: none;border-bottom-color: white;border-bottom-style: dashed;width:100%;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                    <div class="flex-1">
                                       <div class="flex justify-between items-center">
                                            <div>
                                                <span class="text-gray-800" style="color:white;">Técnico: {{ $tarea->usuario_nombre }}</span>
                                                <span class="text-gray-800" style="color:white;">Título: "{{ $tarea->titulo }}"</span>
                                                <small class="ml-2 text-sm text-gray-600" style="color:white;">{{ $tarea->created_at->format('j M Y, g:i a') }}</small>
                                                <small class="ml-2 text-sm text-gray-600" style="color:white;">{{ $tarea->estado}} 
                                                    @if ($tarea->estado != "iniciado")
                                                    🔴
                                                    @else
                                                    🟢
                                                    @endif
                                                </small>
                                            </div>
                                            </div>
                                            <p class="mt-4 text-lg text-gray-900" style="color:white;">{{ $tarea->descripcion }}</p>
                                        </div>
                                    </div>
                
                @endforeach
            </div>
        </div>
    </div>
</div>
</x-app-layout>