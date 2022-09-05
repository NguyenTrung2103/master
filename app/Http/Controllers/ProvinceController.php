<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\City;
use App\Models\Country;

class ProvinceController extends Controller
{
    public function showCitiesInCountry(Request $request)
	{
		if ($request->ajax()) {
			$provinces = \App\Models\Country::where('code', $request->country_code)->firstOrFail()->provinces;

			return response()->json($provinces);
		}
	}

	public function getCitiesInProvince(Request $request)
    {
        if ($request->ajax()) {
            $cities = \App\Models\Province::findOrFail($request->province_id)->cities;

            return response()->json($cities);
        }

        return response()->json([]);
    }

    public function getDistrictsInCity(Request $request)
    {
        if ($request->ajax()) {
            $districts = \App\Models\City::findOrFail($request->city_id)->districts;

            return response()->json($districts);
        }

        return response()->json([]);
    }
}
