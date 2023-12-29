

<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">        

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    title
                </th>
                <th scope="col">
                    author
                </th>
                <th scope="col">
                    editor
                </th>
                <th scope="col">
                    price
                </th>
                <th scope="col">
                    action
                </th>
            </tr>
        </thead>

        <tbody>        

            @foreach ($items as $item )

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                <td scope="row" class="px-2 font-xs text-gray-900 whitespace-nowrap dark:text-white w-5/12">
                    {{ $item->title}}
                </td>
                <td class="w-3/12 whitespace-nowrap">
                    {{ $item->author}}
                </td>
                <td class="w-2/12 whitespace-nowrap">
                    {{ $item->editor}}
                </td>
                <td class="w-1/12 whitespace-nowrap">
                    {{ $item->price}}
                </td>
                <td>
                    <button wire:click="confirmItemEdit({{ $item->id }})">
                        {{ __('수정') }}
                    </button>
                </td>
            </tr>
            @endforeach    

        </tbody>
    </table>

    <div>
        {!! $items->links() !!}
    </div>
</div>