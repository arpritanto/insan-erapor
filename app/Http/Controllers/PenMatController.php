<?php

namespace App\Http\Controllers;

use App\Models\PenMat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenMatController extends Controller
{
    public function get()
    {
        $pengetahuan = DB::table('p_mat')->get();
        return view('formpengetahuan.mat', ['pengetahuan' => $pengetahuan]);
    }
    
    public function create(Request $request)
	{
		PenMat::create($request->except(['_token','submit']));
		return redirect('/pengetahuan_mat');
	}

	public function update($id, Request $request)
	{
		$siswa = PenMat::find($id);
		$siswa->update($request->except(['_token','submit']));
		return redirect('/pengetahuan_mat');
	}

	public function destroy($id)
	{
		$siswa = PenMat::find($id);
		$siswa->delete();
		return redirect('/pengetahuan_mat');
	}
}
