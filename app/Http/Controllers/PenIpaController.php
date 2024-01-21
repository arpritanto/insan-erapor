<?php

namespace App\Http\Controllers;

use App\Models\PenIpa;
use Illuminate\Http\Request;

class PenIpaController extends Controller
{
    public function create(Request $request)
	{
		PenIpa::create($request->except(['_token','submit']));
		return redirect('/pengetahuan');
	}

	public function update($NISN, Request $request)
	{
		$siswa = PenIpa::find($NISN);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/pengetahuan');
	}

	public function destroy($NISN)
	{
		$siswa = PenIpa::find($NISN);
		$siswa->delete();
		return redirect('/pengetahuan');
	}
}
