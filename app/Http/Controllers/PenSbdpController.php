<?php

namespace App\Http\Controllers;

use App\Models\PenSbdp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenSbdpController extends Controller
{
    public function get()
    {
        $pengetahuan = DB::table('p_sbdp')->get();
        return view('formpengetahuan.sbdp', ['pengetahuan' => $pengetahuan]);
    }

    public function create(Request $request)
	{
		PenSbdp::create($request->except(['_token','submit']));
		return redirect('/pengetahuan_sbdp');
	}

	public function update($id, Request $request)
	{
		$siswa = PenSbdp::find($id);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/pengetahuan_sbdp');
	}

	public function destroy($id)
	{
		$siswa = PenSbdp::find($id);
		$siswa->delete();
		return redirect('/pengetahuan_sbdp');
	}
}
