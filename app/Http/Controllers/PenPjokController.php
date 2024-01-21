<?php

namespace App\Http\Controllers;

use App\Models\PenPjok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenPjokController extends Controller
{
    public function get()
    {
        $pengetahuan = DB::table('p_pjok')->get();
        return view('formpengetahuan.pjok', ['pengetahuan' => $pengetahuan]);
    }

    public function create(Request $request)
	{
		PenPjok::create($request->except(['_token','submit']));
		return redirect('/pengetahuan_pjok');
	}

	public function update($id, Request $request)
	{
		$siswa = PenPjok::find($id);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/pengetahuan_pjok');
	}

	public function destroy($id)
	{
		$siswa = PenPjok::find($id);
		$siswa->delete();
		return redirect('/pengetahuan_pjok');
	}
}
