<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Show extends Component
{
    public $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.show')->layout('components.layouts.app');
    }
}
