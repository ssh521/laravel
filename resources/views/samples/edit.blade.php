<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sample') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">    

        <div>
            <h2>Edit sample</h2>
        </div>
        <div>
            <a href="{{ route('samples.index') }}"> Back</a>
        </div>
   
    @if ($errors->any())
        <div>
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('samples.update',$sample->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div>
            <div>
                <div>
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $sample->name }}" placeholder="Name">
                </div>
            </div>
            <div>
                <div>
                    <strong>Detail:</strong>
                    <textarea name="detail" placeholder="Detail">{{ $sample->detail }}</textarea>
                </div>
            </div>
            <div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>

</div>

</x-app-layout>