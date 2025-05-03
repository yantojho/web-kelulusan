<?php

namespace App\Imports;

use App\Models\nilai;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NilaiImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new nilai([
            'nis'         => $row['nis'],
            'mapel_id'    => $row['mapel_id'],
            'nilai'       => $row['nilai'],
        ]);
    }
}
