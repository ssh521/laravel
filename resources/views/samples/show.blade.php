<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sample') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">    
    
        <div>
            <h2> Show sample</h2>
        </div>
        <div>
            <a href="{{ route('samples.index') }}"> Back</a>
        </div>
   
    <div>
        <div>
            <div>
                <strong>Name:</strong>
                {{ $sample->name }}
            </div>
        </div>
        <div>
            <div>
                <strong>Details:</strong>
                {{ $sample->detail }}
            </div>
        </div>
    </div>

    </div>

</x-app-layout>