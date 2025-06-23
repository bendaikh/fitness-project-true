<?php

namespace App\Services;

use App\Models\Award;

class AwardService
{
    public function __construct(private Award $award) {}
    public function all()
    {
        $awards = $this->award;

        if (request('keyword')) {
            $awards = $awards->where('name', 'like', '%' . request('keyword') . '%');
        }

        if (request()->has('order_by')) {
            $order_by = request('order_by');
            $awards = $awards->orderBy('id', $order_by == 1 ? 'asc' : 'desc');
        }

        return $awards;
    }

    public function store(array $data)
    {
        $data['created_by'] = auth('admin')->user()->id;
        return $this->award->create($data);
    }
}
