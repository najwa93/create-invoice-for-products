@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Generate Invoice
                </div>
                <form method="post" action="{{route('invoice.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <label for="products">Choose Products:</label>
                                <select id="selected-products"  name="products[]" multiple="multiple"
                                        style="width: 75%;">
                                    @forelse($products as $product)
                                        <option value="{{$product->id}}">{{$product->item_type}}</option>
                                    @empty
                                        <option value="AL">No Added Products</option>
                                    @endforelse
                                </select>
                                @error('products')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-3 mb-2">
                            <button type="submit" class="btn btn-success">Generate</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
