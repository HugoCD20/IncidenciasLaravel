<x-guest-layout>
    <form method="POST" action="{{ route('Asignacion.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- titulo -->
        <div>
            <x-input-label for="titulo" :value="__('Título')" />
            <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" value="{{$incidencia->titulo}}" required autofocus autocomplete="titulo" readonly/>
            <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
        </div>

        <!-- Descripcion -->
        <div class="mt-4">
            <x-input-label for="descripcion" :value="__('Descripción')" />
            <textarea  id="descripcion" style="background-color: rgb(17 24 39 / var(--tw-bg-opacity));color:white;" class="block mt-1 w-full" name="descripcion" required autocomplete="username" readonly> {{$incidencia->descripcion}}</textarea>
            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
        </div>
        <!--envia el id de la incidencia-->
        <input type="hidden" name="incidencia" id="incidencia" value="{{$incidencia->id}}">
        
        <!-- trabajadores-->
        <div class="mt-4">
            <x-input-label for="tecnico" :value="__('Tecnico')" />
            <select id="tecnico" style="background-color: rgb(17 24 39 / var(--tw-bg-opacity));color:white;" class="block mt-1 w-full" name="tecnico" :value="old('tecnico')" required autofocus autocomplete="tecnico">
                @foreach ($Tecnicos as $tecnico)
                    @if ($tecnico->role == "Tecnico")
                        <option value="{{$tecnico->id}}">{{$tecnico->name}}</option>
                    @endif
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('tecnico')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-4">
                {{ __('asignar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>