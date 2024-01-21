<?php

namespace App\Http\Controllers;

use App\Models\PenIps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenIpsController extends Controller
{
    public function get()
    {
        $pengetahuan = DB::table('p_ips')->get();
        return view('formpengetahuan.ips', ['pengetahuan' => $pengetahuan]);
    }

    public function create(Request $request)
	{
		PenIps::create($request->except(['_token','submit']));
		return redirect('/pengetahuan_ips');
	}

	public function update($id, Request $request)
	{
		$siswa = PenIps::find($id);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/pengetahuan_ips');
	}

	public function destroy($id)
	{
		$siswa = PenIps::find($id);
		$siswa->delete();
		return redirect('/pengetahuan_ips');
	}
}
