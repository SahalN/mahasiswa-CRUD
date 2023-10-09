<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 20;
        if(strlen($katakunci)){
            $data = mahasiswa::where("npm", "LIKE", "%" . $katakunci . "%")
                ->orWhere("nama", "LIKE", "%" . $katakunci . "%")
                ->orWhere("nama", "LIKE", "%" . $katakunci . "%")
                ->paginate($jumlahbaris);
        } else{
            $data = mahasiswa::orderBy('npm', 'desc')->paginate(2);
        }
        return view("mahasiswa.index")->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("mahasiswa.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('npm', $request->npm);
        Session::flash('nama', $request->nama);
        Session::flash('kelas', $request->kelas);
        Session::flash('jurusan', $request->jurusan);
        Session::flash('nohp', $request->nohp);

        $request->validate([
            'npm' => 'required|numeric|unique:mahasiswa,npm',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'nohp' => 'required',
        ],[
            'npm.required' =>'Kolom npm wajib diisi',
            'npm.numeric' =>'Kolom npm wajib dalam angka',
            'npm.unique' =>'Kolom npm yang diisikan sudah ada',
            'nama.required' =>'Kolom Warna wajib diisi',
            'kelas.required' =>'Kolom kelas wajib diisi',
            'jurusan.required' =>'Kolom jurusan wajib diisi',
            'nohp.required' =>'Kolom No. HP wajib diisi',
        ]);
        $data = [
            'npm' => $request->npm,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'nohp' => $request->nohp,
        ];
        mahasiswa::create($data);
        return redirect()->to("mahasiswa")->with("success", "Berhasil Menambahkan Data");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = mahasiswa::where('npm', $id)->first();
        return view("mahasiswa.edit")->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'nohp' => 'required',
        ],[
            'nama.required' =>'Kolom Warna wajib diisi',
            'kelas.required' =>'Kolom kelas wajib diisi',
            'jurusan.required' =>'Kolom jurusan wajib diisi',
            'nohp.required' =>'Kolom No. HP wajib diisi',
        ]);
        $data = [
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'nohp' => $request->nohp,
        ];
        mahasiswa::where("npm", $id)->update($data);
        return redirect()->to("mahasiswa")->with("success", "Berhasil Melakukan Update Data");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        mahasiswa::where("npm", $id)->delete();
        return redirect()->to("mahasiswa")->with("success", "Berhasil melakukan delete data");
    }
}
