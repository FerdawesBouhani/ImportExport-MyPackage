<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Imports\ContactImport;
use App\Imports\EntrepriseImport;

/**
 * Class ImportpageController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */

class ImportpageController extends Controller
{



    public function showImportForm(Request $request)
    {
    
        if ($request->input('import') == 'import') {
           return  $this->import($request);
        }
      elseif ($request->input('show') == 'show'){
          return  $this->afficher_csv($request);
      }    
      
    }
    public function afficher_csv(Request $request){

      $file=$request->file('file');
    $filePath = $file->getRealPath();
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
    $reader->setReadDataOnly(TRUE);
    $spreadsheet = $reader->load($filePath  );
    $worksheet = $spreadsheet->getActiveSheet();
      $data = [];
      $rowcount=0;
      foreach ($worksheet->getRowIterator() as $row) {
          if($rowcount>=2){
            break;
          }
        $rowData = [];
      $cellIterator = $row->getCellIterator();
      $cellIterator->setIterateOnlyExistingCells(FALSE);
      foreach ($cellIterator as $cell) {
            $rowData[] = $cell->getValue();
        }
        $data[] = $rowData;
    
        $rowcount= $rowcount;
      }
        $modelType = $request->input('model_type');


      if($modelType==1){
      
        $fillable = (new \App\Models\User)->getFillable();
        return view('admin/importpage', ['data' => $data,'fillable'=>$fillable]);

      }

      elseif($modelType ==2){
       
        $fillable = (new \App\Models\contact)->getFillable();
        return view('admin/importpage', ['data' => $data,'fillable'=>$fillable]);
      }

      elseif($modelType ==3){
        
        $fillable = (new \App\Models\Entreprise)->getFillable();
        return view('admin/importpage', ['data' => $data,'fillable'=>$fillable]);
        return back()->with('success', 'Importation réussie!');
        
      }

     
       
    }



//importer le fichier//

    public function import(Request $request)
    {
        $file = $request->file('file');
        $filePath = $file->getRealPath();
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load($filePath  );
        $worksheet = $spreadsheet->getActiveSheet();
        $rowcount=0;  
        foreach ($worksheet->getRowIterator() as $row) {
      
          $rowcount= $rowcount+1;

        }
        
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);
        $modelType = $request->input('model_type');
        if ($rowcount<=10){

          if($modelType==1){
            Excel::import(new UsersImport, $request->file('file'));
      
            return back()->with('success', 'Importation réussie!');
      
          }elseif($modelType ==2){
            Excel::import(new ContactImport, $request->file('file'));
            return back()->with('success', 'Importation réussie!');
      
          }
      
          elseif($modelType ==3){
            Excel::import(new EntrepriseImport, $request->file('file'));
            return back()->with('success', 'Importation réussie!');
      
          }
        }
    
       
    }
  

    public function index()
    {
        return view('admin.importpage', [
            'title' => 'Importpage',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Importpage' => false,
            ],
            'page' => 'resources/views/admin/importpage.blade.php',
            'controller' => 'app/Http/Controllers/Admin/ImportpageController.php',
        ]);
    }
}
