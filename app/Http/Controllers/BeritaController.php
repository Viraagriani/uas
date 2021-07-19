<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //$data = Berita::all();
      $data = Berita::with('kategor')->get();
      return response()->json($data);
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
        $validator = Validator::make($request->all(), [ 
            'nama_berita' => 'required',
           'headline' => 'required',
           'isi_berita' => 'required',
           'id_berita' => 'required'

           
           
       ]);
       if($validator->passes()){
           return Berita::create($request->all());
       }
       return response()->json(['message' => 'Data Gagal Di Tambahkan!!']);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show($berita)
    {
        $data = Berita::with('kategor')->where('id',$berita)->first();
        if(!empty($data)){
            return $data;
        
        }
        return response()->json(['message'=> "data tidak ditemukan"],404);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$berita)
    {
        $data = Berita::where('id',$berita)->first();
        if(!empty($data)){
            $validator = Validator::make($request->all(), [ 
            'nama_berita' => 'required',
            'headline' => 'required',
            'isi_berita' => 'required',
            'id_berita' => 'required'

            

            ]);
            
            if($validator->passes()){
                $data->update($request->all());
                return response()->json([
                    'message' => 'Data Berhasil Di Ubah',
                    'data' => $data
                ]);
            }else{
                return response()->json([
                    'message' => 'Data gagal di Ubah',
                    'data' => $validator->errors()->all()
                ]);
            }
        }
        return response()->json(['message' => 'Data Tidak di temukan!'], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($berita)
    {
        $data = Berita::where('id', $berita)->first();
        if(empty($data)){
            return response()->json([
                'message' => 'Data Tidak Ditemukan'
            ]);
        }
        $data->delete();
        return response()->json([
            'message' => 'Data berhasil di hapus'
        ]);

    }
}
