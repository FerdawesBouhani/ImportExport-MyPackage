<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
class UsersImport implements ToModel
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
    
        return new User([
            'name'     => $row[0],
            'email'    => $row[1], 
            'password' => Hash::make($row[2]),
            'telef'=> $row[3],
            'pays'=> $row[4],
            'ville'=> $row[5],
            'region'=> $row[6],
            'origine'=> $row[7],
            'type'=> $row[8],
            'code_postale'=> $row[9],
            'poste'=> $row[10],
            'date_naissance'=> $row[11],
            'site_web'=> $row[12],
            'skype'=> $row[13],
            'twitter'=> $row[14],
            'note_interne'=> $row[15],
            'tva'=> $row[16],
            'propriétaire'=> $row[17],
            'statut'=> $row[18],
         ]);
    }
}
