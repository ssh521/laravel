<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sample') }}
        </h2>
    </x-slot>
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">    

        <div>
            <h2>Sample CRUD</h2>
        </div>
        <div>
            <a href="{{ route('samples.create') }}">Create New sample</a>
        </div>
   
    @if ($message = Session::get('success'))
        <div>
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th>Action</th>
        </tr>

        @foreach ($samples as $sample)
        @if ($loop->odd)
        <tr style="background-color: rgb(175, 194, 231)">
        @else
        <tr>
        @endif

            <td>{{ ++$i }}</td>
            <td>{{ $sample->name }}</td>
            <td>{{ $sample->detail }}</td>
            <td>
                <form action="{{ route('samples.destroy',$sample->id) }}" method="POST">
                    <a href="{{ route('samples.show',$sample->id) }}">Show</a>
                    <a href="{{ route('samples.edit',$sample->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
  
    {!! $samples->links() !!}

    </div>

</x-app-layout>