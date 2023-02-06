<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UsersImport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\PayUService\Exception;


class ImportExcelController extends Controller
{
    function index()
  {
   $data = User::get();
   return view('import_excel', compact('data'));
  }

  function import(Request $request)
  {
   $this->validate($request, [
    'select_file'  => 'required'
   ]);
 
    $file = $request->file('select_file');

        $import = new UsersImport;
        $import->import($file);



  if ($import->failures()->isNotEmpty()) {

            $rows = $import->failures();

            $result = array();
            foreach ($rows as $element) {
                $result[$element->row()][] = $element;
            }
            ksort($result);
            // dd($result);
           return back()->withFailures($result);
        }


        
       



    return back()->with('success', 'Excel Data Imported successfully.');
  
  }

}
