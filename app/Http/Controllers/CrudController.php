<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds =Crud::latest()->simplePaginate(5);
        return view('crud/index', compact('cruds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            $rules = [
                'name'          => 'required',
                'address'       => 'required',
                'namefile'      => 'required',
                'file'          => 'required|mimetypes:application/pdf|max:10000',
                'date'          => 'required',
            ];

            $message = [
                'name.required'          => 'Nama wajib diisi.',
                'address.required'       => 'alamat wajib diisi.',
                'namefile.required'      => 'nama File yang akan di upload tidak boleh kosong',
                'file.required'          => 'file yang akan di upload tidak boleh kosong',
                'file.mimetypes'         => 'Jenis file yang di izinkan hanya pdf',
                'file.max'               => 'Maksimal Ukuran file hanyalan 10mb',
                'date.required'          => 'tanggal wajib di isi',
            ];

            $validator = Validator::make($request->all(), $rules, $message);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $file = $request->file('file');
            $new_file = rand().'.'. $file->getClientOriginalExtension();

            $crud = array(
                'name' => $request->name,
                'address'=> $request->address,
                'namefile' => $request->namefile,
                'date'  => $request->date,
                'file'  => $request->$new_file,
            );

            $file->move(public_path('file'),$new_file);
            Crud::create($crud);



            return redirect('crud/index')->with('success','data berhasil disimpan');


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
        $cruds = Crud::find($id);
        // dd($cruds);
        return view('crud/update', compact('cruds'));
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
        $old_file= $request->hiden_image;
        $file = $request->file('file');

        if ($file != ''){

            $rules = [
                'name'          => 'required',
                'address'       => 'required',
                'namefile'      => 'required',
                'file'          => 'required|mimetypes:application/pdf|max:10000',
                'date'          => 'required',
            ];

            $message = [
                'name.required'          => 'Nama wajib diisi.',
                'address.required'       => 'alamat wajib diisi.',
                'namefile.required'      => 'nama File yang akan di upload tidak boleh kosong',
                'file.required'          => 'file yang akan di upload tidak boleh kosong',
                'file.mimetypes'         => 'Jenis file yang di izinkan hanya pdf',
                'file.max'               => 'Maksimal Ukuran file hanyalan 10mb',
                'date.required'          => 'tanggal wajib di isi',
            ];

            $validator = Validator::make($request->all(), $rules, $message);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
            }

            $file_name=$old_file;
            $file->move(public_path('file'),$file_name);
        }else{
            $rules = [
                'name'          => 'required',
                'address'       => 'required',
                'namefile'      => 'required',
                'date'          => 'required',
            ];

            $message = [
                'name.required'          => 'Nama wajib diisi.',
                'address.required'       => 'alamat wajib diisi.',
                'namefile.required'      => 'nama File yang akan di upload tidak boleh kosong',
                'date.required'          => 'tanggal wajib di isi',
            ];

            $validator = Validator::make($request->all(), $rules, $message);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $file_name=$old_file;
    }
        $crud = array(
            'name' => $request->name,
            'address'=> $request->address,
            'namefile' => $request->namefile,
            'date'  => $request->date,
            'file'  => $request->$file_name,
        );
        // dd($crud); berfungsi untuk mengecek data yang kita inputkan terbaca atau tidak
        $cruds = Crud::find($id);
        $cruds->update($crud);

        return redirect('crud/index')->with('success','data berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crud=Crud::find($id);
        File::delete('file/' .$crud->file);
        $crud->delete($crud);
        return redirect('crud/index')->with('success','data berhasil dihapus');
    }

}
