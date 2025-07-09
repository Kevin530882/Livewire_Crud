<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Index extends Component
{
    public function render()
    {
        return view('livewire.index', [
            'products' => Product::paginate(5)
        ]);
    }
}
