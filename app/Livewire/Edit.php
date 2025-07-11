<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $product;
    public $code = '';
    public $name = '';
    public $quantity = '';
    public $price = '';
    public $description = '';
    public $image;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->code = $product->code;
        $this->name = $product->name;
        $this->quantity = $product->quantity;
        $this->price = $product->price;
        $this->description = $product->description ?? '';
        $this->image = $product->image;
    }

    public function save()
    {
        $validated = $this->validate([
            'code' => 'required|string|max:50|unique:products,code,' . $this->product->id,
            'name' => 'required|string|max:250',
            'quantity' => 'required|integer|min:1|max:10000',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
        ]);
        if ($this->image === null) {
            $this->product->update($validated);
        } else {
            $path = $this->image->storePublicly(path: 'photos', options: 'public');
            $path = Storage::url($path);
            $this->product->update(array_merge($validated, ['image' => $path]));
        }
        
        session()->flash('success', 'Product updated successfully.');
        return $this->redirect(route('products.show', $this->product->id), navigate: true);
    }

    public function render()
    {
        return view('livewire.edit')->layout('components.layouts.app');
    }
}