<?php

namespace App\Http\Controllers;

use App\Models\KetPai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KetPaiController extends Controller
{
    public function get()
    {
        $keterampilan = DB::table('k_pai')->get();
        return view('formketerampilan.pai', ['keterampilan' => $keterampilan]);
    }

    public function create(Request $request)
	{
		KetPai::create($request->except(['_token','submit']));
		return redirect('/keterampilan');
	}

	public function update($id, Request $request)
	{
		$siswa = KetPai::find($id);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/keterampilan');
	}

	public function destroy($id)
	{
		$siswa = KetPai::find($id);
		$siswa->delete();
		return redirect('/keterampilan');
	}
}
