<?php

namespace App\Services;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeService
{
    private $attribute;
    private $attributeValue;
    private $product;
    public function __construct(Attribute $attribute, AttributeValue $attributeValue, ProductService $product)
    {
        $this->attribute = $attribute;
        $this->attributeValue = $attributeValue;
        $this->product = $product;
    }

    // get all attributes

    public function getAllAttributes()
    {
        return $this->attribute->with('values')->paginate(20);
    }

    // get all attributes for select

    public function getAllAttributesForSelect()
    {
        return $this->attribute->with('values')->where('status', 1)->get();
    }

    // store attribute and attribute values

    public function storeAttribute($request)
    {
        $attribute = $this->attribute->create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        if ($request->has('values')) {
            foreach ($request->values as $value) {
                $this->attributeValue->create([
                    'name' => $value,
                    'attribute_id' => $attribute->id,
                ]);
            }
        }

        return $attribute;
    }

    public function getById($id)
    {
        return $this->attribute->with('values')->find($id);
    }

    public function updateAttribute(Request $request, $attribute)
    {

        $values = $request->values;

        $attribute->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        if ($request->has('values')) {

            foreach ($request->values as $key => $value) {
                // Check if the value already exists
                $existingValue = $this->attributeValue->where('id', $key)->where('attribute_id', $attribute->id)->first();

                // If the value doesn't exist, create it
                if (!$existingValue) {
                    $this->attributeValue->create([
                        'name' => $value,
                        'attribute_id' => $attribute->id,
                    ]);
                } else {
                    $existingValue->update([
                        'name' => $value,
                    ]);
                }
            }
        }
    }

    public function deleteAttribute($id)
    {
        $attribute = $this->attribute->find($id);
        if ($attribute) {
            if ($attribute->values) {
                foreach ($attribute->values as $value) {
                    $value->delete();
                }
                $attribute->delete();
            }
            return ['message' => 'Attribute deleted successfully', 'status' => true];
        } else {
            return ['message' => 'Attribute not found', 'status' => false];
        }
    }

    public function deleteValue($data)
    {
        $value = $this->attributeValue->where('id', $data['id'])->where('attribute_id', $data['attribute_id'])->first();
        if ($value) {
            $value->delete();
        }
    }
    public function getValues($request)
    {
        return $this->attribute->whereIn('id', $request->attribute)->with('values')->get();
    }
}
