<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TableSiswa;

class SiswaController extends Controller
{
	public function create(Request $request)
	{
		TableSiswa::create($request->except(['_token','submit']));
		return redirect('/dashboard');
	}

	public function update($NISN, Request $request)
	{
		$siswa = TableSiswa::find($NISN);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/dashboard');
	}

	public function destroy($NISN)
	{
		$siswa = TableSiswa::find($NISN);
		$siswa->delete();
		return redirect('/dashboard');
	}
}