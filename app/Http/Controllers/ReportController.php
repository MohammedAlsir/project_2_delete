<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Pharma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function report_pharma()
    {
        $pharmas = Pharma::all();
        $index = 1;
        return view('reports.pharma', compact('pharmas', 'index'));
    }

    public function report_medicine()
    {

        $pharma_id = Pharma::where('user_id', Auth::user()->id)->first();
        $medicines = Medicine::where('pharma_id', $pharma_id->id)->orderBy('id', 'desc')->get();


        $index = 1;
        return view('reports.medicine', compact('medicines', 'index'));
    }
}