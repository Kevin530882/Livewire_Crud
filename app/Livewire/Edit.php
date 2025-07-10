<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Edit extends Component
{
    public $product;
    public $code = '';
    public $name = '';
    public $quantity;
    public $price;
    public $description = '';

    protected $rules = [
        'code' => 'required|string|max:50|unique:products,code',
        'name' => 'required|string|max:250',
        'quantity' => 'required|integer|min:1|max:10000',
        'price' => 'required|numeric',
        'description' => 'nullable|string',
        // 'image'=> 'nullable|image',
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->code = $product->code;
        $this->name = $product->name;
        $this->quantity = $product->quantity;
        $this->price = $product->price;
        $this->description = $product->description;
    }

    public function save()
    {
        $validated = $this->validate();

        $this->product->update($validated);
        
        return redirect()->route('products.show', $this->product->id);
    }

    public function render()
    {
        return view('livewire.edit');
    }
}
