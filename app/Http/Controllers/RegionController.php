<?php

namespace App\Http\Controllers;

use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function getKabupaten($provId){
        $regencies = Regency::where('province_id', $provId)->get();
        return response()->json($regencies);
    }

    public function getKecamatan($kecId){
        $district = District::where('regency_id', $kecId)->get();
        return response()->json($district);
    }
    public function getDesa($desaId){
        $village = Village::where('district_id', $desaId)->get();
        return response()->json($village);
    }
}
