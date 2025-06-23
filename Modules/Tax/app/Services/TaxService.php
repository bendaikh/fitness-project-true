<?php

namespace Modules\Tax\app\Services;

use Illuminate\Database\Eloquent\Collection;
use Modules\Tax\app\Models\Tax;

class TaxService
{
    protected Tax $tax;
    public function __construct(Tax $tax)
    {
        $this->tax = $tax;
    }

    public function all() : Collection
    {
        return $this->tax->all();
    }

    public function getActiveTax() : Collection
    {
        return $this->tax->where('status', 1)->get();
    }
    public function find(int $id): Tax
    {
        return $this->tax->findOrFail($id);
    }
    public function store(array $data): Tax
    {
        return $this->tax->create($data);
    }

    public function update(Tax $tax, array $data): Tax
    {
        $tax->update($data);

        return $tax;
    }

    public function delete(Tax $tax): void
    {
        $tax->delete();
    }
}