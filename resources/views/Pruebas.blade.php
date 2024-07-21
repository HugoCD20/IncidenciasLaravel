<x-app-layout>
<div class="py-12">
    <div class="mt-6 bg-white shadow-sm rounded-lg divide-y" style="margin-left:10%; margin-right:10%;background-color: rgb(31 41 55 / var(--tw-bg-opacity));color:white; border:1px solid white;">
        <div class="p-6 flex space-x-2">
        <div class="centrar">
            <h1 style="font-size:30px;font-weight: bold;">PRUEBAS</h1>
            <div class="contenedor-2">
                <h2 class="titulos">Título:</h2>
                <p style="margin-bottom: 20px;">este es el titulo</p>
                <h3 class="titulos">Descripción:</h3>
                <p style="margin-bottom: 20px;">esta es una descripcion</p>
                <h4 class="titulos">Resultados de pruebas:</h4>
                <form action="{{route('Pruebas.store')}}" method="POST">
                    @csrf
                    <div class="mt-4" style=" padding-bottom:15px;border:1px solid white; border-style:none; border-bottom-color: white;border-bottom-style: dotted;">
                        <x-input-label for="resultados"/>
                        <textarea  id="resultados" style="background-color: rgb(17 24 39 / var(--tw-bg-opacity));color:white;height: 100px;" class="block mt-1 w-full" name="resultados" required autocomplete="resultados" > {{old('resultados')}}</textarea>
                        <x-input-error :messages="$errors->get('resultados')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                    {{$id_incidencia=null}}
                    @foreach ($datos as $dato)
                                <?php $id_incidencia=$dato->incidencia_id; ?>
                                <div class="p-6 flex space-x-2" >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                </svg>
                                    <div class="flex-1">
                                       <div class="flex justify-between items-center">
                                            <div>
                                            <span class="text-gray-800" style="color:white;">Técnico :{{ $dato->usuario_nombre }} - </span>
                                            <span class="text-gray-800" style="color:white;"> Título: {{ $dato->titulo }}</span>
                                                <small class="ml-2 text-sm text-gray-600" style="color:white;">{{ $dato->created_at->format('j M Y, g:i a') }}</small>
                                            </div>
                                            </div>
                                            <p class="mt-4 text-lg text-gray-900" style="color:white;">{{ $dato->descripcion }}</p>
                                        </div>
                                    </div>
                    @endforeach 
                    <input type="hidden" name="incidenciaID" id="incidenciaID" value="{{$id_incidencia}}">
                    <input type="hidden" name="estado" id="estado" value="no pasa">
                    </div>
                    <div class="botones" style="display:flex;flex-direction:row; justify-content: space-evenly; width:100%;">
                        <button class="boton" style="width:25%;" name="accion" id="accion" value="cancelar">Cancelar</button>
                        <button class="boton" style="width:25%;" name="accion" id="accion" value="no pasa">No pasa</button>
                        <button class="boton" style="width:25%;" name="accion" id="accion" value="pasa">Pasa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>