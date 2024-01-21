<?php

namespace App\Http\Controllers;

use App\Models\KetIndo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KetIndoController extends Controller
{
    public function get()
    {
        $keterampilan = DB::table('k_indo')->get();
        return view('formketerampilan.indo', ['keterampilan' => $keterampilan]);
    }

    public function create(Request $request)
	{
		KetIndo::create($request->except(['_token','submit']));
		return redirect('/keterampilan');
	}

	public function update($id, Request $request)
	{
		$siswa = KetIndo::find($id);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/keterampilan');
	}

	public function destroy($id)
	{
		$siswa = KetIndo::find($id);
		$siswa->delete();
		return redirect('/keterampilan');
	}
}
