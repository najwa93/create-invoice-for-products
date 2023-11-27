@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header bg-black"></div>
        <div class="card-body">

            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <i class="far fa-building text-danger fa-6x float-start"></i>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xl-12">

                        <ul class="list-unstyled float-end">
                            <li style="font-size: 30px; color: red;">Sahel Books</li>
                            <li>sahel.books@mail.com</li>
                        </ul>
                    </div>
                </div>

                <div class="row text-center">
                    <h3 class="text-uppercase text-center mt-3" style="font-size: 40px;">Invoice</h3>
                </div>

                <div class="row mx-3">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productsIds as $productId)
                            <?php $product = \App\Models\Product::find($productId) ?>
                            <tr>

                                <td>{{$product->item_type}}</td>
                                <td><i class="bi bi-currency-dollar"></i></i>{{$product->item_price}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="row">
                    <div class="col-xl-8">
                        <ul class="list-unstyled float-end me-0">
                            <li><span class="me-3 float-start">Subtotal:</span><i class="fas fa-dollar-sign"></i>
                                {{$subtotal}}
                            </li>
                            <li><span class="me-5">Shipping:</span><i class="bi bi-currency-dollar"></i>
                                {{$shipping}}
                            </li>
                            <li><span class="float-start" style="margin-right: 35px;">VAT: </span><i
                                        class="fas fa-dollar-sign"></i> {{$vat}}
                            </li>
                        </ul>
                    </div>
                    @if($checkDiscount)
                        <div class="col-xl-8">
                            <h4>Discounts:</h4>
                            <ul class="list-unstyled float-end me-0">
                                @if (in_array(6, $productsIds))
                                    <li><span class="me-3 float-start">10% off shoes: </span><i
                                                class="fas fa-dollar-sign"></i>
                                        -<i class="bi bi-currency-dollar">7.999</i>
                                    </li>
                                @endif
                                @if (in_array(1, $productsIds) && in_array(2, $productsIds) && in_array(5, $productsIds))
                                    <li><span class="me-5">50% off jacket: </span>
                                        -<i class="bi bi-currency-dollar">99.995</i>
                                    </li>
                                @endif
                                <li><span class="me-5">$10 of shipping:</span>
                                    -<i class="bi bi-currency-dollar">10</i>
                                </li>

                            </ul>
                        </div>
                    @endif
                </div>
                <hr>
                <div class="row">
                    <div class="col-xl-8" style="margin-left:60px">
                        <p class="float-end"
                           style="font-size: 30px; color: red; font-weight: 400;font-family: Arial, Helvetica, sans-serif;">
                            Total:
                            <span><i class="bi bi-currency-dollar"></i>{{$total}}</span></p>
                    </div>
                </div>

            </div>


        </div>
        <div class="card-footer bg-black"></div>
    </div>
@endsection