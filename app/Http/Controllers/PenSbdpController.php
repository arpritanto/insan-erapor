<?php

namespace App\Http\Controllers;

use App\Models\PenSbdp;
use Illuminate\Http\Request;

class PenSbdpController extends Controller
{
    public function create(Request $request)
	{
		PenSbdp::create($request->except(['_token','submit']));
		return redirect('/pengetahuan');
	}

	public function update($NISN, Request $request)
	{
		$siswa = PenSbdp::find($NISN);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/pengetahuan');
	}

	public function destroy($NISN)
	{
		$siswa = PenSbdp::find($NISN);
		$siswa->delete();
		return redirect('/pengetahuan');
	}
}
