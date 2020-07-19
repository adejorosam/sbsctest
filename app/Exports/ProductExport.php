<?php
namespace App\Exports;
use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductExport implements FromCollection
{
  public function collection()
  {
    return Product::all();
  }
}