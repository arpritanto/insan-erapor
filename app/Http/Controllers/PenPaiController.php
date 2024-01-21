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
		return redirect('/pengetahuan_pai');
	}

	public function update($id, Request $request)
	{
		$siswa = PenPai::find($id);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/pengetahuan_pai');
	}

	public function destroy($id)
	{
		$siswa = PenPai::find($id);
		$siswa->delete();
		return redirect('/pengetahuan_pai');
	}
}
