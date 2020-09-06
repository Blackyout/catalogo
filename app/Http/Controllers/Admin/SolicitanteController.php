<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Solicitante;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Redirect;

class SolicitanteController extends Controller
{	
    public function index()
    {
        $solicitantes = Solicitante::latest()->paginate(8);
        return view('admin.solicitante.index',compact('solicitantes'));
    }

    public function list(){
        return Solicitante::all();
    }
    
    public function create(){
        return view('admin.solicitante.create');
    }
    
    public function store(Request $request){

        /* Validacion del Formulario */
        $request->validate([
            'tipo' => 'required',
            'ubigeo' => 'required',
            'nombre' => 'required',
            'ruc' => 'required',
            'direccion' => 'required',
            'email' => 'required|email',
            'telefono' => 'required'
        ]);

        Solicitante::create([
            'TIPSOLIP_Codigo'  => request('tipo'),
            'UBIGP_Codigo'     => request('ubigeo'),
            'SOLIC_Nombre'     => request('nombre'),
            'SOLIC_Ruc'        => request('ruc'),
            'SOLIC_Direccion'  => request('direccion'),
            'SOLIC_Telefono'   => request('telefono'),
            'SOLIC_Email'      => request('email'),
            'SOLIC_FlagEstado' => request('estado'),
            'SOLIC_Contacto'   => request('contacto')
        ]);
        return Redirect::to("/solicitante");
    }
    
    public function edit($id){
        $solicitante = Solicitante::findOrFail($id);
        return view("admin.solicitante.edit",['solicitante' => $solicitante]);
    }
    
    public function update(Request $request,$id){
        $solicitante = Solicitante::findOrFail($id);
        $solicitante->TIPSOLIP_Codigo = $request->tipo;
        $solicitante->UBIGP_Codigo    = $request->ubigeo;
        $solicitante->SOLIC_Nombre    = $request->nombre;
        $solicitante->SOLIC_Ruc       = $request->ruc;
        $solicitante->SOLIC_Direccion = $request->direccion;
        $solicitante->SOLIC_Telefono  = $request->telefono;
        $solicitante->SOLIC_Email     = $request->email;
        $solicitante->SOLIC_Contacto  = $request->contacto;
        $solicitante->save();
        return redirect::to('/solicitante');
    }

    public function show($id)
    {
        $solicitantes = Solicitante::find($id);
        $view = view('admin.solicitante.show', compact('solicitantes'));
        $pdf = PDF::loadView('admin.solicitante.show', compact('solicitantes'));
        return $pdf->download('reporte_de_solicitantes.pdf');

    }

    public function exportPdf()
    {
        $solicitantes = Solicitante::get();
        $pdf = PDF::loadView('pdf.cotizaciones', compact('solicitantes'));

        return $pdf->download('reporte_de_solicitantes.pdf');
    }
    
    public function destroy($id){
        Solicitante::destroy($id);
        return Redirect::to("/solicitante");
    }
}
