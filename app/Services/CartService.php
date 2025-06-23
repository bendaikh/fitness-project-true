<?php

namespace App\Services;


class CartService
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function addToCart($request)
    {
        $product = $this->productService->getActiveProductById($request->product_id);

        $attributes = '';
        $options = collect([]);

        $sku = $request->variant_sku ? $request->variant_sku : $product->sku;

        if ($product->has_variant) {
            if (!$request->variant_sku) {
                $prodVar = $this->productService->getFirstVariant($product->id);
            } else {
                $prodVar = $this->productService->getVariantBySku($request->variant_sku);
            }
            $sku = $prodVar->sku;
            $attributes = $prodVar->attributes();
            $options = $prodVar->attribute_and_value_ids;
        }

        $cart_contents = session()->get('cart');
        $cart_contents = $cart_contents ? $cart_contents : [];

        // check if item already exist in cart
        $item_exist = false;

        if (count($cart_contents) > 0) {
            foreach ($cart_contents as $index => $cart_content) {
                if ($cart_content['sku'] == $sku) {
                    $item_exist = true;
                }
            }
        }

        if ($item_exist) {
            return response()->json(['status' => 'error', 'message' => 'Item already exist in cart']);
        }

        $cart_contents[] = [
            'product_id' => $product->id,
            'sku' => $sku,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'attributes' => $attributes,
            'options' => $options,
        ];

        session()->put('cart', $cart_contents);

        return response()->json(['status' => 'success', 'message' => 'Item added to cart']);
    }

    public function removeFromCart($rowId)
    {
        $cart_contents = session()->get('cart');
        $cart_contents = $cart_contents ? $cart_contents : [];

        $cart_contents = $cart_contents ? $cart_contents : [];
        unset($cart_contents[$rowId]);
        
        session()->put('cart', $cart_contents);

        $cart = session()->get('cart');
        return $cart;
    }

    public function updateCart($request)
    {
        $cart_contents = session()->get('cart');
        $cart_contents = $cart_contents ? $cart_contents : [];

        $item = $cart_contents[$request->rowid];
        
        $item['qty'] = $request->quantity;
        $item['sub_total'] = $item['price'] * $request->quantity;

        $cart_contents[$request->rowid] = $item;

        session()->put('cart', $cart_contents);

        $cart = session()->get('cart');
        return $cart;
    }
}