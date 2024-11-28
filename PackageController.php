<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Packages;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Daftar Package";
    //     $author=[(object)[
    //         'author_id'=>'A001',
    //         'author_name'=>'Moona',
    //         'author_desc'=>'hy',
    //         'author_contact'=>'081911807924'
    //     ], (object)[
    //         'author_id'=>'A002',
    //         'author_name'=>'Soona',
    //         'author_desc'=>'heyppppppp',
    //         'author_contact'=>'081911807924'
    //     ]
    // ];
        // $authors=Author::all();
        $packages=Packages::paginate(2);
        return view('admin.daftarPackage', compact('title', 'packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Input Package";
        $authors=Author::all();
        return view('admin.inputPackage', compact('title', 'authors'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Kolom : Atribut harus lengkap',
            'numeric' => 'Kolom : Atribut harus angka',
            'file' => 'Perhatikan format dan ukuran file' 
        ];

        $validasi=$request->validate([
            'package_id' => 'required',
            'package_code'=> 'required',
            'package_name' => 'required',
            'package_desc' => 'required',
            'author_id' => 'required',
            'status' => ''
        ], $messages);
        try{
            $response=Packages::create($validasi);
            return redirect('admin');
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title="Input Package";
        $authors=Author::all();
        $packages=Packages::find($id);
        if($packages != NULL){
            $title="Edit Data".$packages->package_id;
            return view('admin.inputPackage', compact('title', 'authors', 'packages'));
        }
        else{
            return view('admin.inputPackage', compact('title', 'authors'));
        }
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi=$request->validate([
            'package_id' => 'required',
            'package_code'=> 'required',
            'package_name' => 'required',
            'package_desc' => 'required',
            'author_id' => 'required',
            'status' => ''
        ]);
        try{
            $response=Packages::updated($validasi);
            return redirect('admin');
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $packages=Packages::find($id);
            if($packages != NULL){
                $packages->delete();
                return redirect('admin');
            }
            else{
                echo "Package tidak ditemukan";
            }
            // $packages->delete();
        }
        catch(\Exception $e){
            echo $e->getMessage();
        }
        
    }
}
