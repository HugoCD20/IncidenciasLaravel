<x-guest-layout>
    <form method="POST" action="{{ route('agregar.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- titulo -->
        <div>
            <x-input-label for="titulo" :value="__('Título')" />
            <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')" required autofocus autocomplete="titulo" />
            <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
        </div>

        <!-- Descripcion -->
        <div class="mt-4">
            <x-input-label for="descripcion" :value="__('Descripción')" />
            <textarea  id="descripcion" style="background-color: rgb(17 24 39 / var(--tw-bg-opacity));color:white;" class="block mt-1 w-full" name="descripcion" required autocomplete="username" > {{old('descripcion')}}</textarea>
            <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
        </div>
        
        <!-- Evidencias-->
        <div class="mt-4">
            <x-input-label for="evidencia" :value="__('Evidencias')" />

            <x-text-input id="evidencia" class="block mt-1 w-full"
                            type="file"
                            name="evidencia" accept="image/*"/>

            <x-input-error :messages="$errors->get('evidencia')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
