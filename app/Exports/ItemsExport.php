<?php
namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ItemsExport implements FromQuery, WithHeadings
{
    protected $search;

    public function __construct($search = null)
    {
        $this->search = $search;
    }

    public function query()
    {
        $items = Item::query()->with(['place', 'subplace', 'category', 'subcategory', 'department', 'agent', 'supplier']);

        if ($this->search) {
            $search = $this->search;
            $items = $items->where(function($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('SN', 'like', "%{$search}%")
                    ->orWhere('BOS', 'like', "%{$search}%")
                    ->orWhereHas('place', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('subplace', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('subcategory', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('department', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('agent', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('supplier', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            });
        }

        return $items;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Description',
            'SN',
            'BOS',
            'Place',
            'Subplace',
            'Category',
            'Subcategory',
            'Department',
            'Agent',
            'Supplier',
        ];
    }
}
