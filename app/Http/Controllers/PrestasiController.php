<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;


class PrestasiController extends Controller
{

    public function index(){

        if (Auth::check()) {

            $user = Auth::user();
            $userid = Auth::user()->id;
            $studentData = Student::where('user_id', $user->id)->first();

            $prestasiId = $studentData->prestasi_id;
            $prestasiData = Prestasi::where('id', $prestasiId)->first();

            if ($studentData  && $studentData -> has_submitted ) {
                return redirect('/dashboard')->with('failed', 'Anda sudah mengisi form ini');  
            }

            return Inertia::render("Pendaftaran3", [
                'id' => $studentData->id ?? null,
                'user_id' => $userid,
                'jenisPrestasi' => $prestasiData->jenisPrestasi ?? null,
                'namaPrestasi' => $prestasiData->namaPrestasi ?? null,
                'tingkatPrestasi' => $prestasiData->tingkatPrestasi ?? null,
                'penyelenggara' => $prestasiData->penyelenggara ?? null,
                'sertifikat' => $prestasiData->sertifikat ?? null,
            ]);
        }
        
        return redirect("/");
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'jenisPrestasi' => 'required|string',
            'namaPrestasi' => 'required|string',
            'tingkatPrestasi' => 'required|string',
            'penyelenggara' => 'required|string',
            'sertifikat' => 'nullable|file|mimes:pdf,jpeg,jpg,png|max:10240', // 10MB max file size
            'user_id' => ''
        ]);

        // Handle file upload
        $sertifikat = null;
        if ($request->hasFile('sertifikat')) {
            $file = $request->file('sertifikat');
        $filename = time() . '_' . $file->getClientOriginalName(); 
        $filePath = 'prestasi_sertifikat/' . $filename; 
        $file->move(public_path('prestasi_sertifikat'), $filename);
        $sertifikat = $filePath;
        }


        $prestasi = Prestasi::create([
            'user_id' => Auth::user()->id,  
            'jenisPrestasi' => $request->jenisPrestasi,
            'namaPrestasi' => $request->namaPrestasi,
            'tingkatPrestasi' => $request->tingkatPrestasi,
            'penyelenggara' => $request->penyelenggara,
            'sertifikat' => $sertifikat,  
        ]);

        $score = 0;
        if ($request->tingkatPrestasi === 'Internasional') {
            $score = 100;
        } elseif ($request->tingkatPrestasi === 'Nasional') {
            $score = 80;
        } elseif ($request->tingkatPrestasi === 'Provinsi') {
            $score = 60;
        } elseif ($request->tingkatPrestasi === 'Kabupaten/Kota') {
            $score = 40;
        } elseif ($request->tingkatPrestasi === 'Kecamatan') {
            $score = 20;
        }

        $student = Student::where('user_id', Auth::user()->id)->first();  

        if ($student) {
            $student->prestasi_id = $prestasi->id;
            // $student->score = $student->score + $score;  
            $student->score_prestasi = $score;
            $student->has_submitted = true;
            $student->save();
        }

        return redirect('/dashboard');

    }
}
