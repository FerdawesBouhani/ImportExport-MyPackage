<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use Illuminate\Routing\Controller;
use App\Exports\UsersExport;
use App\Exports\EntrepriseExport;
use App\Exports\ContactExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
/**
 * Class ExportpageController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ExportpageController extends Controller
{
    public function index()
    {
        return view('admin.exportpage', [
            'title' => 'Exportpage',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Exportpage' => false,
            ],
            'page' => 'resources/views/admin/exportpage.blade.php',
            'controller' => 'app/Http/Controllers/Admin/ExportpageController.php',
        ]);
    }

    
    // public function showExportForm()
    // {
    //     return view('users_export');
    // }


    public function export(Request $request) 
    {
        if($request->input('model_type')=='1'){
            return  Excel::download(new UsersExport, 'users.xlsx');
        }elseif($request->input('model_type')=='2'){
            return  Excel::download(new ContactExport, 'contacts.xlsx');
        } elseif($request->input('model_type')=='3'){
            return  Excel::download(new EntrepriseExport, 'entreprises.xlsx');
        }
           
    }
}
