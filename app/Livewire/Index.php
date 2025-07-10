<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class Index extends Component
{
    public $product;
    public function delete()
    {
        $this->authorize('delete', $this->product); // Ensure authorization
        $this->product->delete();
        return redirect()->route('products.index');
    }

    public function render()
    {
        return view('livewire.index', [
            'products' => Product::paginate(5)
        ]);
    }
}
