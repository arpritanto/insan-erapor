<?php

namespace App\Http\Controllers;

use App\Models\KetPjok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KetPjokController extends Controller
{
    public function get()
    {
        $keterampilan = DB::table('k_pjok')->get();
        return view('formketerampilan.pjok', ['keterampilan' => $keterampilan]);
    }

    public function create(Request $request)
	{
		KetPjok::create($request->except(['_token','submit']));
		return redirect('/keterampilan');
	}

	public function update($id, Request $request)
	{
		$siswa = KetPjok::find($id);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/keterampilan');
	}

	public function destroy($id)
	{
		$siswa = KetPjok::find($id);
		$siswa->delete();
		return redirect('/keterampilan');
	}
}
