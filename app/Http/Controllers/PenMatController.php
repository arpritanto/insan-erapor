<?php

namespace App\Http\Controllers;

use App\Models\PenMat;
use Illuminate\Http\Request;

class PenMatController extends Controller
{
    public function create(Request $request)
	{
		PenMat::create($request->except(['_token','submit']));
		return redirect('/pengetahuan');
	}

	public function update($NISN, Request $request)
	{
		$siswa = PenMat::find($NISN);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/pengetahuan');
	}

	public function destroy($NISN)
	{
		$siswa = PenMat::find($NISN);
		$siswa->delete();
		return redirect('/pengetahuan');
	}
}
