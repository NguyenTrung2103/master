<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
    public function showCitiesInCountry(Request $request)
	{
		if ($request->ajax()) {
			$cities = \App\Models\Country::where('code', $request->country_code)->firstOrFail()->provinces;

			return response()->json($cities);
		}
	}
}
