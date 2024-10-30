<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Traineeform;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $Traineeform = Traineeform::all();
        $data = [
            'title' => 'Trainee details',
            'date' => date('m/d/Y'),
            'Traineeform' => $Traineeform
        ];

        $pdf = Pdf::loadView('pages.traineeform.generate-trainee-pdf', $data);

        return $pdf->download('generate-trainee-details.pdf');
    }
}
