<?php

namespace App\Imports;

use App\Models\contact;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
class ContactImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (empty($row[0])) {
   
            \Log::error('Name is missing in row', $row);
            return null;
        }
    
        return new contact([
            'name'     => $row[0],
            'email'    => $row[1], 
            'pays'     => $row[2], 
            'ville'    => $row[3],
        ]);
    }
}
