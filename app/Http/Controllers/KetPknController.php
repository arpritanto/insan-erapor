<?php

namespace App\Http\Controllers;

use App\Models\KetPKN;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KetPknController extends Controller
{
    public function get()
    {
        $keterampilan = DB::table('k_pkn')->get();
        return view('formketerampilan.pkn', ['keterampilan' => $keterampilan]);
    }

    public function create(Request $request)
	{
		KetPKN::create($request->except(['_token','submit']));
		return redirect('/keterampilan');
	}

	public function update($id, Request $request)
	{
		$siswa = KetPKN::find($id);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/keterampilan');
	}

	public function destroy($id)
	{
		$siswa = KetPKN::find($id);
		$siswa->delete();
		return redirect('/keterampilan');
	}
}
