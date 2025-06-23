<?php
namespace App\Services;

use App\Models\ShippingMethod;

class ShippingMethodService
{
    protected $shippingMethod;
    public function __construct(ShippingMethod $shippingMethod)
    {
        $this->shippingMethod = $shippingMethod;
    }
    public function getAll()
    {
        return $this->shippingMethod->all();
    }
    public function getActive()
    {
        return $this->shippingMethod->where('status', 1)->get();
    }
    public function create($request)
    {
        $data = $request->except('_token');
        $data['is_free'] = $request->fee == 0 ? 1 : 0;
        $shipping = $this->shippingMethod->create($data);
        
        return $shipping;
    }
    public function find($id)
    {
        return $this->shippingMethod->find($id);
    }
    public function update($request, $shipping)
    {
        $data = $request->except('_token');
        $data['is_free'] = $request->fee == 0 ? 1 : 0;
        $shipping->update($data);
        
        return $shipping;
    }

}
