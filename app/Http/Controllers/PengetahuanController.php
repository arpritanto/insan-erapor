<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TablePengetahuan;

class PengetahuanController extends Controller
{
    public function create(Request $request)
	{
		TablePengetahuan::create($request->except(['_token','submit']));
		return redirect('/pengetahuan');
	}

	public function update($NISN, Request $request)
	{
		$siswa = TablePengetahuan::find($NISN);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/pengetahuan');
	}

	public function destroy($NISN)
	{
		$siswa = TablePengetahuan::find($NISN);
		$siswa->delete();
		return redirect('/pengetahuan');
	}
}
