<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
public function viewExport(){
    return view('admins.excel.viewExcel');
}
public function exportFile(){
    return Excel::download(new UsersExport, 'Danh sách User Mẫu.xlsx');
}
public function importExcelFile(Request $req){
    $req->validate([
        'file' => 'required|mimes:xlsx',
    ]);

    Excel::import(new UsersImport, $req->file('file'));

}
}
