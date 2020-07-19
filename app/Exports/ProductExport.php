<?php

namespace App\Exports;
use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ProductExport implements FromCollection, WithHeadings
{
    use Exportable;
    public function collection()
    {
      return Product::all();
    }

    public function headings():array
      {
          return ["id","name","description","image","price","quantity","size","category_id", "date-created"];
      }
}

