<?php

namespace App\Http\Controllers;

use App\Models\PenPpkn;
use Illuminate\Http\Request;

class PenPpknController extends Controller
{
    public function create(Request $request)
	{
		PenPpkn::create($request->except(['_token','submit']));
		return redirect('/pengetahuan');
	}

	public function update($NISN, Request $request)
	{
		$siswa = PenPpkn::find($NISN);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/pengetahuan');
	}

	public function destroy($NISN)
	{
		$siswa = PenPpkn::find($NISN);
		$siswa->delete();
		return redirect('/pengetahuan');
	}
}
