<?php

namespace App\Http\Controllers;

use App\Models\PenPpkn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenPpknController extends Controller
{
    public function get()
    {
        $pengetahuan = DB::table('p_pkn')->get();
        return view('formpengetahuan.ppkn', ['pengetahuan' => $pengetahuan]);
    }

    public function create(Request $request)
	{
		PenPpkn::create($request->except(['_token','submit']));
		return redirect('/pengetahuan_ppkn');
	}

	public function update($id, Request $request)
	{
		$siswa = PenPpkn::find($id);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/pengetahuan_ppkn');
	}

	public function destroy($id)
	{
		$siswa = PenPpkn::find($id);
		$siswa->delete();
		return redirect('/pengetahuan_ppkn');
	}
}
