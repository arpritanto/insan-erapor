<?php

namespace App\Http\Controllers;

use App\Models\PenIps;
use Illuminate\Http\Request;

class PenIpsController extends Controller
{
    public function create(Request $request)
	{
		PenIps::create($request->except(['_token','submit']));
		return redirect('/pengetahuan');
	}

	public function update($NISN, Request $request)
	{
		$siswa = PenIps::find($NISN);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/pengetahuan');
	}

	public function destroy($NISN)
	{
		$siswa = PenIps::find($NISN);
		$siswa->delete();
		return redirect('/pengetahuan');
	}
}
