<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sample') }}
        </h2>
    </x-slot>
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">    

        <div>
            <h2>Add New Sample</h2>
        </div>
        <div>
            <a href="{{ route('samples.index') }}"> Back</a>
        </div>

       
    @if ($errors->any())
        <div>
            <strong>에러발생</strong> 입력내용을 다시한번 확인해주세요.!!<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
       
    <form action="{{ route('samples.store') }}" method="POST">
        @csrf
      
         <div>
            <div>
                <div>
                    <strong>Name:</strong>
                    <input type="text" name="name" placeholder="Name">
                </div>
            </div>
            <div>
                <div>
                    <strong>Detail:</strong>
                    <textarea name="detail" placeholder="Detail"></textarea>
                </div>
            </div>
            <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
       
    </form>

    </div>

</x-app-layout>