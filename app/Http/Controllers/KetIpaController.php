<?php

namespace App\Http\Controllers;

use App\Models\KetIpa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KetIpaController extends Controller
{
    public function get()
    {
        $keterampilan = DB::table('k_ipa')->get();
        return view('formketerampilan.ipa', ['keterampilan' => $keterampilan]);
    }

    public function create(Request $request)
	{
		KetIpa::create($request->except(['_token','submit']));
		return redirect('/keterampilan');
	}

	public function update($id, Request $request)
	{
		$siswa = KetIpa::find($id);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/keterampilan');
	}

	public function destroy($id)
	{
		$siswa = KetIpa::find($id);
		$siswa->delete();
		return redirect('/keterampilan');
	}
}
