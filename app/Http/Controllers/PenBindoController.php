<?php

namespace App\Http\Controllers;

use App\Models\PenBindo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenBindoController extends Controller
{
    public function get()
    {
        $pengetahuan = DB::table('p_indo')->get();
        return view('formpengetahuan.bindo', ['pengetahuan' => $pengetahuan]);
    }

    public function create(Request $request)
	{
		PenBindo::create($request->except(['_token','submit']));
		return redirect('/pengetahuan_bindo');
	}

	public function update($id, Request $request)
	{
		$siswa = PenBindo::find($id);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/pengetahuan_bindo');
	}

	public function destroy($id)
	{
		$siswa = PenBindo::find($id);
		$siswa->delete();
		return redirect('/pengetahuan_bindo');
	}
}
