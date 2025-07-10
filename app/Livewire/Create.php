<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Create extends Component
{
    public $code = '';
    public $name = '';
    public $quantity = '';
    public $price = '';
    public $description = '';

    public function save()
    {
        $validated = $this->validate([
            'code' => 'required|string|max:50|unique:products,code',
            'name' => 'required|string|max:250',
            'quantity' => 'required|integer|min:1|max:10000',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        Product::create($validated);

        session()->flash('success', 'Product created successfully!');
        return $this->redirect(route('products.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.create')->layout('components.layouts.app');
    }
}