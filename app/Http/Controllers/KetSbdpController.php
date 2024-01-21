<?php

namespace App\Http\Controllers;

use App\Models\KetSbdp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KetSbdpController extends Controller
{
    public function get()
    {
        $keterampilan = DB::table('k_sbdp')->get();
        return view('formketerampilan.sbdp', ['keterampilan' => $keterampilan]);
    }

    public function create(Request $request)
	{
		KetSbdp::create($request->except(['_token','submit']));
		return redirect('/keterampilan');
	}

	public function update($id, Request $request)
	{
		$siswa = KetSbdp::find($id);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/keterampilan');
	}

	public function destroy($id)
	{
		$siswa = KetSbdp::find($id);
		$siswa->delete();
		return redirect('/keterampilan');
	}
}
