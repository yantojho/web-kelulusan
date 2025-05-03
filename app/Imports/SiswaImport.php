<?php

namespace App\Imports;

use App\Models\siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use File;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new siswa([
            'nis'               => $row['nis'],
            'nisn'              => $row['nisn'],
            'nm_siswa'          => $row['nm_siswa'],
            'ttl'               => $row['ttl'],
            'jen_konsentrasi'   => $row['jen_konsentrasi'],
            'kls'               => $row['kls'],
            'status_lulus'      => $row['status_lulus'],
            'status_bayar'      => $row['status_bayar'],
        ]);
    }
}
