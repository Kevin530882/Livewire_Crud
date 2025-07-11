<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;

    public $code = '';
    public $name = '';
    public $quantity = '';
    public $price = '';
    public $description = '';
    public $image;

    public function save()
    {
        $validated = $this->validate([
            'code' => 'required|string|max:50|unique:products,code',
            'name' => 'required|string|max:250',
            'quantity' => 'required|integer|min:1|max:10000',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image',
        ]);
        if ($this->image === null) {
            Product::create($validated);
        } else {
            $path = $this->image->storePublicly(path: 'photos', options: 'public');
            $path = Storage::url($path);
            Product::create(array_merge($validated, ['image' => $path]));
        }
        
        session()->flash('success', 'Product created successfully!');
        return $this->redirect(route('products.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.create')->layout('components.layouts.app');
    }
}