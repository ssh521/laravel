<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class Books extends Component
{
    use WithPagination;
    

    public $search;
    public $item;
    public $confirmingItemAdd = false;
    public $confirmingItemDeletion = false;


    protected $paginationTheme = 'tailwind';


    public function render()
    {
        $query = Book::query();
        
        $items = $query->latest()->paginate(10);

        return view('livewire.books', ['items' => $items]);
    }

    public function confirmItemEdit(Book $item)
    {
        $this->resetErrorBag();
        $this->item = $item;
        $this->confirmingItemAdd = true;
    }    
}
