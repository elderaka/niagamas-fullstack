<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Http;

class SyncController extends Controller
{
    public function sync()
    {
        try {
            $response = Http::get('https://fakestoreapi.com/products');

            if ($response->failed()) {
                return redirect()->route('products.index')->with('error', 'Failed to fetch products from external API.');
            }

            $externalProducts = $response->json();
            $count = 0;

            foreach ($externalProducts as $item) {
                Product::updateOrCreate(
                    ['name' => $item['title']],
                    [
                        'price' => $item['price'],
                        'stock' => $item['rating']['count'] ?? 0,
                        'description' => $item['description'] ?? '',
                    ]
                );
                $count++;
            }

            return redirect()->route('products.index')->with('success', "Successfully synced {$count} products from external API.");
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'Error syncing products: ' . $e->getMessage());
        }
    }
}
