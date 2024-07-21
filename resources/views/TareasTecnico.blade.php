<x-app-layout>
<div class="py-12"></div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mt-6 bg-white shadow-sm rounded-lg divide-y" style="margin-left:10%; margin-right:10%;background-color: rgb(31 41 55 / var(--tw-bg-opacity));color:white; display: flex; flex-direction:column; align-items:center;">
                        <h1 style="font-family: 'Arial', serif; font-weight: 700; font-size: 35px;color: white;font-style: normal;">Tareas:</h1>
                        @php
                        $count=0;                        
                        @endphp
                        @foreach ($tareas as $tarea)
                            @if($tarea->etapa !="Finalizado") 
                            <?php $count++;?>
                            @endif
                        @endforeach
                        @if (isset($tareas) && empty($tareas) || $count==0)
                            <p style="margin-top:60px;border-top-width:0px;">No hay tareas asignadas</p>
                        @else
                        <table>
                            <thead>
                                <tr>
                                    <th>ID-Incidencia</th>
                                    <th>Titulo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tareas as $tarea)                                
                                    <tr>
                                        <td>{{$tarea->id}}</td>
                                        <td>{{$tarea->titulo}}</td>
                                        <td><a class="centrar" href="{{route('Tarea.show',$tarea->id)}}"><button class="boton">Ver</button></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>                          

</x-app-layout>