<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Prestasi;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index() {
        if (Auth::check()) {

            $user = Auth::user();
            $studentData = Student::where('user_id', $user->id)->first();
            // $prestasiId = $studentData->prestasi_id;
            // $prestasiData = Prestasi::where('id', $prestasiId)->first(); 

            if($studentData) {

                $prestasiId = $studentData->prestasi_id;
                $prestasiData = Prestasi::where('id', $prestasiId)->first();

                if ($prestasiData) {               
                    $sertifikat = asset('storage/'.$prestasiData->sertifikat);  
                } else {
                    $sertifikat = null;
                }

                if ($prestasiData) {
                    return Inertia::render("Dashboard", [
                    'user_id' => $user->id,
                    'name' => $studentData->name,
                    'birthplace' => $studentData->birthplace,
                    'birthdate' => $studentData->birthdate,
                    'address' => $studentData->address,
                    'phone' => $studentData->phone,
                    'email' => $studentData->email,
                    'parent' => $studentData->parent,
                    'parentjob' => $studentData->parentjob,
                    'quran' => $studentData->quran,
                    'pendapatan' => $studentData->pendapatan,
                    'jenisPrestasi' => $prestasiData->jenisPrestasi,
                    'namaPrestasi' => $prestasiData->namaPrestasi,
                    'tingkatPrestasi' => $prestasiData->tingkatPrestasi,
                    'penyelenggara' => $prestasiData->penyelenggara,
                    'sertifikat' => $sertifikat,
                    ]);
                }

                return Inertia::render("Dashboard", [
                    'user_id' => $user->id,
                    'name' => $studentData->name,
                    'birthplace' => $studentData->birthplace,
                    'birthdate' => $studentData->birthdate,
                    'address' => $studentData->address,
                    'phone' => $studentData->phone,
                    'email' => $studentData->email,
                    'parent' => $studentData->parent,
                    'parentjob' => $studentData->parentjob,
                    'quran' => $studentData->quran,
                    'pendapatan' => $studentData->pendapatan,
                ]);
            }

            return Inertia::render("Dashboard", [
                'user_id' => $user->id,
                'role' => $user->role,
            ]);

            // return Inertia::render("Dashboard");
        }

        return redirect('/')->with('failed', "daftar dulu yaa");
    }

    public function pengumuman() {
        if (Auth::check()) {
            $user = Auth::user();
            $studentData = Student::where('user_id', $user->id)->first();

            if ($studentData) {

                return Inertia::render('Pengumuman', [
                    'status' => $studentData->status,
                    'name' => $studentData->name,
                ]);
            } else {
                return Inertia::render('Pengumuman', [
                    'status' => 'Data not found',
                    'name' => $user->name,
                ]);
            }
        } else {
            return redirect('/')->with('failed', "Error Hubungi Admin"); 
        }
    }

    public function jadwal() {
        return Inertia::render("Jadwal");
    }
}
