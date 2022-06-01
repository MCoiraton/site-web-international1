<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CandidatureExport;

class FastExcelController extends Controller
{
    public function exportCandidature(Request $request) {
        return Excel::download(new CandidatureExport, 'candidatures.xlsx');
    }
}
