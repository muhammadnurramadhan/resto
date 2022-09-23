<?php

namespace App\Exports;

use App\Models\AntrianReservasi;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersReservasiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AntrianReservasi::all();
    }
}
