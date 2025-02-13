<?php

namespace App\Imports;

use App\Models\Entreprise;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
class EntrepriseImport implements ToModel
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
    
        return new Entreprise([
               'nom_entreprise' => $row[0],
               'rue'=>$row[1],
               'ville' =>$row[2],
               'pays' =>$row[3],
               'code_postale' =>$row[4],
               'tva' =>$row[5],
               'telephone_fix' =>$row[6],
               'telephone_portable' =>$row[7],
               'email' =>$row[8],
               'site_web' =>$row[9], 
               'twitter'=>$row[10],
               'facebook' =>$row[11],
               'linkedin'=>$row[12],
               'gestionnaire_contact'=>$row[13],
               'ville_facturation'=>$row[14],
               'région_facturation'=>$row[15],
               'code_postale_facturation'=>$row[16],
               'pays_facturation'=>$row[17],
               'ville_livraison'=>$row[18],
               'région_livraison'=>$row[19],
               'code_postale_livraison'=>$row[20],
               'propriétaire'=>$row[21],
               'nombre_personnelle'=>$row[22],
               'type'=>$row[23],
           
        ]);
    }
}
