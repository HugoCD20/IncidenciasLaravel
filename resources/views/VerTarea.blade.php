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
                <a href="{{route('Solucion.show',$incidencia->id)}}" class="centrar" style="width:25%; margin-top:15px;"><button class="boton">Añadir Solucion</button></a>
                @if (isset($tareas) && $tareas->isEmpty())
                    <p style="margin-top:30px;">No hay soluciones</p>
                @elseif (isset($tareas))
                    <table>
                        <thead>
                            <tr>
                                <th>Titulo:</th>
                                <th>Descripcion:</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tareas as $tarea)
                            <tr>
                                <td style="max-width: 200px;">{{ strtoupper($tarea->titulo) }}</td>
                                <td style="max-width: 400px;">{{ $tarea->descripcion }}</td>
                                <td><a href="" class="centrar"><button class="boton">Finalizar</button></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>
</div>
</x-app-layout>