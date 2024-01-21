<?php

namespace App\Http\Controllers;

use App\Models\PenIpa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenIpaController extends Controller
{
    public function get()
    {
        $pengetahuan = DB::table('p_ipa')->get();
        return view('formpengetahuan.ipa', ['pengetahuan' => $pengetahuan]);
    }

    public function create(Request $request)
	{
		PenIpa::create($request->except(['_token','submit']));
		return redirect('/pengetahuan_ipa');
	}

	public function update($id, Request $request)
	{
		$siswa = PenIpa::find($id);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/pengetahuan_ipa');
	}

	public function destroy($id)
	{
		$siswa = PenIpa::find($id);
		$siswa->delete();
		return redirect('/pengetahuan_ipa');
	}
}
