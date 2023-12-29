<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TableKeterampilan;

class KeterampilanController extends Controller
{
    public function create(Request $request)
	{
		TableKeterampilan::create($request->except(['_token','submit']));
		return redirect('/keterampilan');
	}

	public function update($NISN, Request $request)
	{
		$siswa = TableKeterampilan::find($NISN);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/keterampilan');
	}

	public function destroy($NISN)
	{
		$siswa = TableKeterampilan::find($NISN);
		$siswa->delete();
		return redirect('/keterampilan');
	}
}
