<x-app-layout>
    @foreach ($tareas as $tarea)
        <span>{{$tarea->titulo}}</span>    
    @endforeach
</x-app-layout>