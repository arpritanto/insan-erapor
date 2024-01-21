<?php

namespace App\Http\Controllers;

use App\Models\PenBindo;
use Illuminate\Http\Request;

class PenBindoController extends Controller
{
    public function create(Request $request)
	{
		PenBindo::create($request->except(['_token','submit']));
		return redirect('/pengetahuan');
	}

	public function update($NISN, Request $request)
	{
		$siswa = PenBindo::find($NISN);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/pengetahuan');
	}

	public function destroy($NISN)
	{
		$siswa = PenBindo::find($NISN);
		$siswa->delete();
		return redirect('/pengetahuan');
	}
}
