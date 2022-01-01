<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\My_Parent;
use Maatwebsite\Excel\Concerns\Exportable;

class my_parent_Excel implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function collection()
    {
        return My_Parent::all();
    }
}
