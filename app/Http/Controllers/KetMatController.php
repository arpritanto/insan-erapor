<?php

namespace App\Http\Controllers;

use App\Models\KetMat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KetMatController extends Controller
{
    public function get()
    {
        $keterampilan = DB::table('k_mat')->get();
        return view('formketerampilan.mat', ['keterampilan' => $keterampilan]);
    }

    public function create(Request $request)
	{
		KetMat::create($request->except(['_token','submit']));
		return redirect('/keterampilan');
	}

	public function update($id, Request $request)
	{
		$siswa = KetMat::find($id);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/keterampilan');
	}

	public function destroy($id)
	{
		$siswa = KetMat::find($id);
		$siswa->delete();
		return redirect('/keterampilan');
	}
}
