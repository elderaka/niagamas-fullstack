@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="max-w-lg mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-900">{{ $product->name }}</h1>
            <a href="{{ route('products.index') }}" class="text-sm text-gray-500 hover:text-gray-700">← Back to list</a>
        </div>

        <div class="card p-6 space-y-4">
            <div>
                <span class="text-xs uppercase tracking-wide text-gray-500">Price</span>
                <p class="text-lg font-semibold text-gray-900">${{ number_format($product->price, 2) }}</p>
            </div>
            <div>
                <span class="text-xs uppercase tracking-wide text-gray-500">Stock</span>
                <p class="text-gray-900">{{ $product->stock }} units</p>
            </div>
            <div>
                <span class="text-xs uppercase tracking-wide text-gray-500">Description</span>
                <p class="text-gray-700 text-sm leading-relaxed">{{ $product->description ?: '—' }}</p>
            </div>
            <div class="text-xs text-gray-400 pt-2 border-t border-gray-100">
                Created {{ $product->created_at->format('M d, Y \a\t H:i') }}
                · Updated {{ $product->updated_at->format('M d, Y \a\t H:i') }}
            </div>
        </div>

        <div class="flex gap-2 mt-4">
            <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">
                Edit
            </a>
            <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    Delete
                </button>
            </form>
        </div>
    </div>
@endsection
