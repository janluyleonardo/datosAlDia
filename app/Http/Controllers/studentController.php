<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $msj ="";
        return view('students.index',compact('msj'));
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
        if(!$request){
            $msj ="no se pudo obtener el request";
            return redirect()->route('students.index', compact('msj'));
        }
        $newStudent = new student();

        $newStudent->fullName = $request->fullName;
        $newStudent->personalMail = $request->personalMail;
        $newStudent->institutionalMail = $request->institutionalMail;
        $newStudent->tipoDocumento = $request->tipoDocumento;
        $newStudent->numDoc = $request->numDoc;
        $newStudent->numPhone = $request->numPhone;
        $newStudent->anotherNumber = $request->anotherNumber;
        $newStudent->address = $request->callePrincipal." ".$request->numCallePrimaria." ".$request->letraPrincipal." ".$request->cuadrantePrincipal." ".$request->calleSecundaria." ".$request->numSecundaria." ".$request->letraSecundaria." ".$request->numLote." ".$request->cuadranteSecundario;
        $newStudent->state = $request->state;
        $newStudent->city = $request->city;

        try {
            //code...
            $newStudent->save();

            $Content_Type = env('CODE_CONTENT_TYPE', '');
            $apiKey = env('CODE_APIKEY', '');
            $apiSecret = env('CODE_APISECRET', '');
            $locale = env('CODE_LOCALE', '');
            $urlService = env('CODE_URL_SERVICE', '');
            $numPhone = $request->numPhone;

            $response = Http::withHeaders([
                'Content-Type' => $Content_Type,
                'apiKey' => $apiKey,
                'apiSecret' => $apiSecret,
                'locale' => $locale
            ])->post($urlService, [
                'application' => 'registro-CUN',
                'key' => '57'.$numPhone,
                'validMinutes' => '10',
                'maxAttempts' => '20',
            ]);
            $data = $response->status();
            if($data == 201){
                return view('codes.index',compact('numPhone'));
            }else{
                dd($data);
            }
            // $msj ="Registro creado correctamente.";
        } catch (\Throwable $th) {
            return $msj ="no se pudo agregar nuevo registro => ".$th;
            // return redirect()->route('students.index', 'msj');
        }

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
    public function destroy($id)
    {
        //
    }
}
