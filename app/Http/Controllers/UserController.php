<?php

namespace App\Http\Controllers;

use App\Imports\UserImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use JeroenNoten\LaravelAdminLte\View\Components\Tool\Datatable;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
// use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::paginate(10);
        return view('user',  ['user'=> User::get()]);
        // return DataTables::of(User::query())->make(true)->get();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    // public function showUser(Request $request)
    // {
    //     $user = User::all();
    //     if ($request->keyword != ''){
    //         $user = User::where('name', 'LIKE', '%' .$request->keyword.'%')->get();
    //     }
    //     return response()->json([
    //         'user' => $user
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //
        $user = User::findOrFail($id);

        if ($user->foto) {
            $gambarPath = public_path('image/profile/') . $user->foto;
    
            if (File::exists($gambarPath)) {
                // Hapus file gambar
                File::delete($gambarPath);
            }
        }

        $user->delete();


        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }

    public function importexcel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // menangkap file excel
        $file = $request->file('file');
        // membuat nama file unik 
        $nama_file = rand().$file->getClientOriginalName();
        // upload ke folder file_siswa di dalam folder public
        $file->move('file_siswa',$nama_file);
        // import data
        Excel::import(new UserImport, public_path('/file_siswa/'.$nama_file));
        return redirect()->route('user.index');
        // $data = $request->file('file');

        // $namafile = $data->getClientOriginalName();
        // $data->move('UserData', $namafile);

        // Excel::import(new UserImport, \public_path('/UserData/' . $namafile));
        // return redirect()->route('importexcel');
    }
}
