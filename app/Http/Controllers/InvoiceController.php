<?php

namespace App\Http\Controllers;

use App\Constants\GlobalConstant;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all(['id', 'item_type']);

        return view('invoices.index', compact('products'));
    }

    /**
     * Store a newly created products in storage.
     */
    public function store(StoreProductRequest $request)
    {

        $checkDiscount = true;
        $productsIds = $request->input('products');

        $subtotal = $this->calculateSubtotal($productsIds);
        $shipping = $this->calculateShipping($productsIds);
        $vat = $subtotal * GlobalConstant::VAT;
        $calculatedProductsPriceAndDiscount = $this->calculateDiscount($productsIds, $shipping);

        if ($calculatedProductsPriceAndDiscount == 0) {
            $calculatedProductsPriceAndDiscount = $subtotal + $shipping;
            $checkDiscount = false;
        }

        $total = $this->calculateTotal($calculatedProductsPriceAndDiscount, $vat);

        return view('invoices.show', compact('productsIds', 'subtotal', 'shipping', 'vat', 'total', 'checkDiscount'));

    }


    // Calculate subtotal of products
    protected function calculateSubtotal($productsIds)
    {
        $subtotal = 0;
        foreach ($productsIds as $id) {
            $product = Product::find($id);
            $subtotal += $product->item_price;
        }
        return $subtotal;
    }

    // Calculate products shipping fee
    protected function calculateShipping($productsIds)
    {
        $shipping = 0;
        foreach ($productsIds as $id) {
            $product = Product::find($id);
            $shipping += ($product->weight * $product->country->rate) / 100;

        }
        return $shipping;
    }

    // Calculate products shipping fee
    protected function calculateDiscount($productsIds, $shipping)
    {
        //declare discount variable to handle sum of discounted and non-discounted products with shipping fee
        $discount = 0;
        // Check if products array has more than one product
        if (count($productsIds) > 1) {

            $shippingDiscount = $shipping - 10;

            $discount += $shippingDiscount;
            // Check if products array has shoes
            if (in_array(6, $productsIds)) {
                $product = Product::find(6);
                $shoesDiscount = $product->item_price * GlobalConstant::SHOES_DISCOUNT;
                $shoesPrice = $product->item_price - $shoesDiscount;
                // Remove item that has discount from the array
                unset($productsIds[array_search(6, $productsIds)]);
                $discount += $shoesPrice;
            }
            // Check if products array has t-shirt & blouse & jacket
            if (in_array(1, $productsIds) && in_array(2, $productsIds) && in_array(5, $productsIds)) {
                $product = Product::find(5);
                $jacketDiscount = $product->item_price * GlobalConstant::JACKET_DISCOUNT;
                $jacketPrice = $product->item_price - $jacketDiscount;
                unset($productsIds[array_search(5, $productsIds)]);
                $discount += $jacketPrice;
            }
            $calculatedProductsPriceAndDiscount = $this->calculateItemsWithoutDiscount($productsIds, $discount);
        } else {
            $calculatedProductsPriceAndDiscount = 0;
        }

        return $calculatedProductsPriceAndDiscount;
    }

    protected function calculateItemsWithoutDiscount($productsIds, $discount)
    {
        foreach ($productsIds as $id) {
            $product = Product::find($id);
            $discount += $product->item_price;
        }
        return $discount;
    }

    protected function calculateTotal($calculatedProductsPriceAndDiscount, $vat)
    {
        return $total = $calculatedProductsPriceAndDiscount + $vat;
    }
}
