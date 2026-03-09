@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
    <div class="max-w-lg mx-auto">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Add Product</h1>

        <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="label-text">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="input-field" required>
                @error('name')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="price" class="label-text">Price ($)</label>
                    <input type="number" name="price" id="price" value="{{ old('price') }}" step="0.01" min="0" class="input-field" required>
                    @error('price')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="stock" class="label-text">Stock</label>
                    <input type="number" name="stock" id="stock" value="{{ old('stock', 0) }}" min="0" class="input-field" required>
                    @error('stock')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="description" class="label-text">Description</label>
                <textarea name="description" id="description" rows="4" class="input-field">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-2 pt-2">
                <button type="submit" class="btn btn-primary">
                    Save Product
                </button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
