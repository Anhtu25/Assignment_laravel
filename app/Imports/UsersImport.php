<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class UsersImport implements ToModel,WithHeadingRow
{
    public function model(array $row)
    {
        $dataExport = array();
        $i = 0;
        foreach ($row as $key => $value) {
            $dataExport[$i++] = $value;
        }


        Sentinel::register(array(
            'email'    => $dataExport[1] != null ? $dataExport[1] : "",
            'password' => $dataExport[2] != null ? $dataExport[2] : "",
            // 'address'   => $dataExport[3] != null ? $dataExport[3] : "",
            // 'gender'    => $dataExport[4] != null ? $dataExport[4] : "",
        ));
    }
}
