@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Products</h1>
        <div class="flex gap-2">
            <form action="{{ route('products.sync') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-secondary">
                    Sync Products
                </button>
            </form>
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                + Add Product
            </a>
        </div>
    </div>

    @if($products->isEmpty())
        <div class="text-center py-12 text-gray-500">
            <p class="text-lg">No products yet.</p>
            <p class="text-sm mt-1">Add one manually or sync from the external API.</p>
        </div>
    @else
        <div class="card">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="table-head">
                        <tr>
                            <th class="table-cell">#</th>
                            <th class="table-cell">Name</th>
                            <th class="table-cell">Price</th>
                            <th class="table-cell">Stock</th>
                            <th class="table-cell hidden md:table-cell">Description</th>
                            <th class="table-cell text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($products as $product)
                            <tr class="hover:bg-gray-50">
                                <td class="table-cell text-gray-500">{{ $product->id }}</td>
                                <td class="table-cell font-medium text-gray-900">{{ $product->name }}</td>
                                <td class="table-cell">${{ number_format($product->price, 2) }}</td>
                                <td class="table-cell">{{ $product->stock }}</td>
                                <td class="table-cell text-gray-500 hidden md:table-cell max-w-xs truncate">
                                    {{ Str::limit($product->description, 60) }}
                                </td>
                                <td class="table-cell text-right">
                                    <div class="flex justify-end gap-2 text-xs">
                                        <a href="{{ route('products.show', $product) }}" class="text-gray-500 hover:text-blue-600">View</a>
                                        <a href="{{ route('products.edit', $product) }}" class="text-gray-500 hover:text-yellow-600">Edit</a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-gray-500 hover:text-red-600 cursor-pointer">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-4">
            {{ $products->links() }}
        </div>
    @endif
@endsection
