<?php

namespace App\Http\Controllers;

use App\Models\PenPai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenPaiController extends Controller
{
    public function get()
    {
        $pengetahuan = DB::table('p_pai')->get();
        return view('formpengetahuan.pai', ['pengetahuan' => $pengetahuan]);
    }

    public function create(Request $request)
	{
		PenPai::create($request->except(['_token','submit']));
		return redirect('/pengetahuan');
	}

	public function update($NISN, Request $request)
	{
		$siswa = PenPai::find($NISN);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/pengetahuan');
	}

	public function destroy($NISN)
	{
		$siswa = PenPai::find($NISN);
		$siswa->delete();
		return redirect('/pengetahuan');
	}
}
