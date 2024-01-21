<?php

namespace App\Http\Controllers;

use App\Models\PenPjok;
use Illuminate\Http\Request;

class PenPjokController extends Controller
{
    public function create(Request $request)
	{
		PenPjok::create($request->except(['_token','submit']));
		return redirect('/pengetahuan');
	}

	public function update($NISN, Request $request)
	{
		$siswa = PenPjok::find($NISN);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/pengetahuan');
	}

	public function destroy($NISN)
	{
		$siswa = PenPjok::find($NISN);
		$siswa->delete();
		return redirect('/pengetahuan');
	}
}
