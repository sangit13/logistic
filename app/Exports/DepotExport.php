<?php

namespace App\Exports;

use App\Master_depot;
use Maatwebsite\Excel\Concerns\FromCollection;

class DepotExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Master_depot::all();
    }
}
