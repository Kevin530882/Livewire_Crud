<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Create extends Component
{
    public $product;
    public $code = '';
    public $name = '';
    public $quantity;
    public $price;

    public function save()
    {
        $validated = $this->validate([
            'code' => 'required|string|max:50|unique:products,code',
            'name' => 'required|string|max:250',
            'quantity' => 'required|integer|min:1|max:10000',
            'price' => 'required',
            'description' => 'nullable|string',
            // 'image'=> 'nullable|image',
        ]);

        Product::create(array_merge($validated));
    }

    public function render()
    {
        return view('livewire.create');
    }
}
