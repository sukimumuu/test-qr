<?php

namespace App\Http\Controllers;

use Exception;
use setasign\Fpdi\Fpdi;
use Illuminate\Http\Request;
use setasign\Fpdi\PdfReader;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpWord\TemplateProcessor;

class CertificateController extends Controller
{
    public function generateCertificate($name){
        try {
            // Path to your .rtf template file
            $templateFile = public_path('sertif.rtf');

            // Pastikan file template ada
            if (!file_exists($templateFile)) {
                abort(404, 'Template .rtf tidak ditemukan');
            }

            // Load the template
            $templateProcessor = new TemplateProcessor($templateFile);

            // Replace placeholder with user's name
            $templateProcessor->setValue('USERNAME_PLACEHOLDER', $name);

            // Path untuk menyimpan sertifikat yang dihasilkan
            $outputFile = public_path('generated_certificate.rtf');

            // Save the generated certificate
            $templateProcessor->saveAs($outputFile);

            // Download atau tampilkan sertifikat kepada user
            return response()->download($outputFile, 'certificate.rtf');
        } catch (Exception $e) {
            abort(500, 'Gagal menghasilkan sertifikat: ' . $e->getMessage());
        }
    }


    public function reg(Request $request){
        $name = $request->name;
        return redirect()->route('generate-certificate', ['name' => $name]);
    }
}
