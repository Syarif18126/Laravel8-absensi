<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $data)
    {
        return new User([

            'name' => $data[1],
            'email' => $data[2],
            'password' => bcrypt($data[3]),
            'foto' => $data[4],
            'role_id' => $data[5],
        ]);
    }
}
