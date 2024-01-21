<?php

namespace App\Http\Controllers;

use App\Models\KetIps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KetIpsController extends Controller
{
    public function get()
    {
        $keterampilan = DB::table('k_ips')->get();
        return view('formketerampilan.ips', ['keterampilan' => $keterampilan]);
    }

    public function create(Request $request)
	{
		KetIps::create($request->except(['_token','submit']));
		return redirect('/keterampilan');
	}

	public function update($id, Request $request)
	{
		$siswa = KetIps::find($id);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/keterampilan');
	}

	public function destroy($id)
	{
		$siswa = KetIps::find($id);
		$siswa->delete();
		return redirect('/keterampilan');
	}
}
