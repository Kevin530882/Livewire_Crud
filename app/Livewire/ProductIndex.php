<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    public function delete($productId)
    {
        $product = Product::findOrFail($productId);
        $product->delete();
        
        session()->flash('success', 'Product deleted successfully.');

        return $this->redirect(route('products.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.index', [
            'products' => Product::paginate(5)
        ])->layout('components.layouts.app');
    }
}
