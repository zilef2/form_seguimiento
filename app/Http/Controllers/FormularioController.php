<?php

namespace App\Http\Controllers;

use App\helpers\MyModels;
use App\Http\Requests\FormularioStoreRequest;
use App\Models\Formulario;
use App\Models\User;
use Illuminate\Database\Schema\Builder;
use Illuminate\Http\Request;
use App\helpers\Myhelp;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Illuminate\Foundation\Application;

class FormularioController extends Controller
{
    public $thisAtributos, $FromController = 'formulario';

    //<editor-fold desc="Construc | mapea | filtro and dependencia">
    public function __construct()
    {
//        $this->middleware('permission:create formulario', ['only' => ['create', 'store']]);
//        $this->middleware('permission:read formulario', ['only' => ['index', 'show']]);
//        $this->middleware('permission:update formulario', ['only' => ['edit', 'update']]);
//        $this->middleware('permission:delete formulario', ['only' => ['destroy', 'destroyBulk']]);
        $this->thisAtributos = (new formulario())->getFillable(); //not using
    }

    public function Mapear()
    {
        //$formularios = formulario::with('no_nada');
        return formulario::Where('id', '>', 0);
    }


    public function Filtros(&$formularios, $request)
    {
        if ($request->has('search')) {
            $formularios = $formularios->where(function ($query) use ($request) {
                $query->where('nombre', 'LIKE', "%" . $request->search . "%")
                    //                    ->orWhere('codigo', 'LIKE', "%" . $request->search . "%")
                    //                    ->orWhere('identificacion', 'LIKE', "%" . $request->search . "%")
                ;
            });
        }

        if ($request->has(['field', 'order'])) {
            $formularios = $formularios->orderBy($request->field, $request->order);
        } else
            $formularios = $formularios->orderBy('updated_at', 'DESC');
    }

    public function nombreYvalue($tipo)
    {
        $objeto = DB::table('selecsForm')->Where('tipo', $tipo)->pluck('nombre');
        $returningObject = [];
        foreach ($objeto as $index => $gen) {
            $returningObject[$index]['value'] = $gen;
            $returningObject[$index]['label'] = $gen;
        }
        return $returningObject;
    }

    public function Dependencias()
    {
        $Selects['unidad_de_medida'] = $this->nombreYvalue('unidad_de_medida');
        $Selects['periodo_de_inicio_de_ejecucion'] = $this->nombreYvalue('periodo_de_inicio_de_ejecucion');
        $Selects['vigencias_anteriores'] = $this->nombreYvalue('vigencias_anteriores');
        $Selects['frecuencia_de_uso'] = $this->nombreYvalue('frecuencia_de_uso');
        $Selects['mantenimientos_requeridos'] = $this->nombreYvalue('mantenimientos_requeridos');
        $Selects['capacidad_instalada'] = $this->nombreYvalue('capacidad_instalada');
        $Selects['riesgo_de_la_inversion'] = $this->nombreYvalue('riesgo_de_la_inversion');
        return $Selects;
    }

    //</editor-fold>

    //toinfo: SE VALIDAN si el doc ya evaluó o no
    public function welcome(Request $request)
    {
//        dd($request->identUser);
        $UIDformulariosYaDiligenciados = Formulario::Where('enviado', 1)->pluck('user_id')->unique();
        $UIDformulariosGuardados = Formulario::Where('enviado', 0)->pluck('user_id')->unique();
        $losSelect = $this->Dependencias();


//dd($request->identUser);
        $cedLideresDiligenciados = User::Where('esLider', 1)
            ->WhereIn('id', $UIDformulariosYaDiligenciados)
            ->get()->mapWithKeys(function ($user) {
                return [
                    $user->identificacion => [
                        'name' => $user->name,
                        'email' => 'YaDiligenciado',
                    ],
                ];
            }
            )->toArray();
//        $TodosDiligenciados = count($cedLideres) === 0 && count($cedLideresGuardados) === 0;
        $cedlideres = $this->getcedLideres($request);

//        $cedLideresGuardados = $cedlideres === [] ? $this->getcedLideresGuardados($request) : [];
        
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'losSelect' => $losSelect,
            'TodosDiligenciados' => false,

            'cedLideresDiligenciados' => $cedLideresDiligenciados,

//            'cedLideresGuardados' => $cedLideresGuardados,
//            'cedLideres' => $cedLideres,
            //lazy loads
            'cedLideres' => Inertia::lazy(fn() => $cedlideres),
            'cedLideresGuardados' => Inertia::lazy(fn() => $this->getcedLideresGuardados($request)),
//            'identifi_user' => Inertia::lazy(fn() => $request->identUser),
        ]);
    }

    private function getcedLideres($req){
        if (isset($req->identUser)) {
            $UIDformulariosYaDiligenciados = Formulario::Where('enviado', 1)->pluck('user_id')->unique();
            $UIDformulariosGuardados = Formulario::Where('enviado', 0)->pluck('user_id')->unique();
//            $UIDformulariosGuardados = User::Where('identificacion', $req->identUser)->first();
            if($UIDformulariosGuardados){
//                $UIDformulariosGuardados = [$UIDformulariosGuardados->id];
                $cedLideres = User::Where('esLider', 1)
                    ->WhereNotIn('id', $UIDformulariosYaDiligenciados)
                    ->WhereNotIn('id', $UIDformulariosGuardados)
                    ->get()->mapWithKeys(function ($user) {
                        return [
                            $user->identificacion => [
                                'name' => $user->name,
                                'email' => $user->email,
                            ],
                        ];
                    })->toArray();
                return $cedLideres;
            }
        }
        return [];
    }

    private function getcedLideresGuardados($req){
        if (isset($req->identUser)) {
//            $UIDformulariosGuardados = Formulario::Where('enviado', 0)->pluck('user_id')->unique();
            $UIDformulariosGuardados = User::Where('identificacion', $req->identUser)->first();
            if($UIDformulariosGuardados){
                $UIDformulariosGuardados = [$UIDformulariosGuardados->id];
                $cedLideresGuardados = User::Where('esLider', 1)
                    ->WhereIn('id', $UIDformulariosGuardados)
                    ->get()->mapWithKeys(function ($user) {
                        $form = Formulario::Where('user_id', $user->id)
                            ->Where('enviado', 0)
                            ->orderby('updated_at', 'desc')->first();
                        if ($form) {
                            $forms = Formulario::Where('user_id', $user->id)
                                ->Where('enviado', 0)
                                ->Where('updated_at', $form->updated_at)->get();
                            if($forms){
                                foreach ($forms as $form) {
                                    $form->procesos_involucrados = explode(',', $form->procesos_involucrados);
                                    $form->plan_de_mejoramiento_al_que_apunta_la_necesidad = explode(',', $form->plan_de_mejoramiento_al_que_apunta_la_necesidad);
                                    $form->linea_del_plan_desarrollo_al_que_apunta_la_necesidad = explode(',', $form->linea_del_plan_desarrollo_al_que_apunta_la_necesidad);
                                }
                                return [
                                    $user->identificacion => [
                                        'name' => $user->name,
                                        'email' => $user->email,
                                        'Formulario' => $forms
                                    ],
                                ];
                            }
                        }
                        return [];
                    })->filter()->toArray();
//                if (in_array($req->identUser, $cedLideresGuardados)) {
                    return $cedLideresGuardados;
//                }
            }
        }
        return [];
    }


    public function index(Request $request)
    {
        $numberPermissions = MyModels::getPermissionToNumber(Myhelp::EscribirEnLog($this, ' formularios '));
        $formularios = $this->Mapear();
        $this->Filtros($formularios, $request);
        $losSelect = $this->Dependencias();
        //TODO: las dependencias multiples estan hardcode en el welcome
        
        $perPage = $request->has('perPage') ? $request->perPage : 10;

        return Inertia::render($this->FromController . '/Index', [
            'fromController' => $formularios->paginate($perPage),
            'total' => $formularios->count(),
            'breadcrumbs' => [['label' => __('app.label.' . $this->FromController), 'href' => route($this->FromController . '.index')]],
            'title' => __('app.label.' . $this->FromController),
            'filters' => $request->all(['search', 'field', 'order']),
            'perPage' => (int)$perPage,
            'numberPermissions' => $numberPermissions,
            'losSelect' => $losSelect,
        ]);
    }

//    public function getString(Re)
//    {
//        $param = $request->input('param');
//        // Aquí obtienes el string de la base de datos o lo defines manualmente
//        $string = 'Valor del string desde la base de datos';
//        return response()->json(['string' => $string]);
//    }

    public function EnviarFormulario(Request $request) // FormularioStoreRequest
    {
        Myhelp::EscribirEnLog($this, ' Beginning EnviarFormulario(Enviar):formularios');
        foreach ($request->justificacion as $index => $item) {
            if (($request['necesidad'][$index] === '' || $request['necesidad'][$index] === '') && ($request['justificacion'][$index] === '' || $request['justificacion'][$index] === '')) {
                $fillableFields = (new \App\Models\Formulario)->getFillable();
                foreach ($fillableFields as $field) {
                    $request->request->remove($field);
                }
            }
        }
        $validatedData = $request->validate([
            'numero_necesidad' => 'nullable',
            'identificacion_user' => 'required',
            'proceso_que_solicita_presupuesto' => 'required',
            'valor_total_de_la_solicitud_actual' => 'required',
            'valor_total_asignado_en_vigencia_anterior' => 'nullable',

            'necesidad.*' => 'required',
            'justificacion.*' => 'required',
            'actividad.*' => 'required',
            'categoria.*' => 'required',
            'unidad_de_medida.*' => 'required',
            'cantidad.*' => 'required',
            'valor_unitario.*' => 'required',
            'valor_total_solicitatdo_por_necesidad.*' => 'required',
            'periodo_de_inicio_de_ejecucion.*' => 'required',
            'vigencias_anteriores.*' => 'required',
            'valor_asignado_en_la_vigencia_anterior.*' => 'required',

            'procesos_involucrados.*' => 'nullable',
            'plan_de_mejoramiento_al_que_apunta_la_necesidad.*' => 'required',
            'linea_del_plan_desarrollo_al_que_apunta_la_necesidad.*' => 'required',

            'frecuencia_de_uso.*' => 'required',
            'mantenimientos_requeridos.*' => 'required',
            'capacidad_instalada.*' => 'required',
            'riesgo_de_la_inversion.*' => 'required',
            'anexos.*' => 'nullable|mimes:pdf,doc,docx,xls,xlsx'
        ]);
        
        
        $user = User::Where('identificacion', $request->identificacion_user)->first();
        if (!$user) {return back();}
        
        $formularioGuardados = Formulario::Where('user_id', $user->id)
            ->Where('enviado',0)
            ->get();
        foreach ($formularioGuardados as $formulario) {
            $formulario->delete();
        }

        $this->store($request);
    }

    public function store(Request $request){ //guardar
        try {
            Myhelp::EscribirEnLog($this, ' Beginning store(Guardar):formularios');
            $user = User::Where('identificacion', $request->identificacion_user)->first();
            if(!$user){ // error de autoguardado
                return back();
//                return back()->with('error', __('app.label.created_error', ['name' => 'Formulario: ']) . 'Hay un error de red');
            }
            
            DB::beginTransaction();
            $numeroTotal = count($request['necesidad']);
            $formulario = Formulario::Where('user_id', $user->id)->get();

            if ($formulario) {
                foreach ($request['necesidad'] as $index => $item) {
                    if (($request['necesidad'][$index] === '' || $request['necesidad'][$index] === '') && ($request['justificacion'][$index] === '' || $request['justificacion'][$index] === '')) {
                        $numeroTotal--;
                        
                    } else { //no es un elemento borrado

                        if (isset($formulario[$index])) {
                            $arrayForm = $this->arrayFormulario($request, $index, $user);
                            if ($arrayForm) {
                                $formulario[$index]->update($arrayForm);
                                //updateOrCreate
                            }
                        } else {
                            $arrayForm = $this->arrayFormulario($request, $index, $user);
                            if ($arrayForm) {
                                Formulario::create($arrayForm);
                            }
                        }
                    }
                }
            } else {
                foreach ($request['necesidad'] as $index => $item) {
                    if (($request['necesidad'][$index] === '' || $request['necesidad'][$index] === '') && ($request['justificacion'][$index] === '' || $request['justificacion'][$index] === '')) {
                        $numeroTotal--;
                    } else {
                        $arrayForm = $this->arrayFormulario($request, $index, $user);
                        if ($arrayForm) {
                            Formulario::create($arrayForm);
                        }
                    }
                }
            }
            $formulariosBorrar = Formulario::Where('user_id', $user->id)
                ->where(function ($query) {
                    $query->where('necesidad', '')
                        ->orWhere('necesidad', ' ');
                })
                ->where(function ($query) {
                    $query->where('justificacion', '')
                        ->orWhere('justificacion', ' ');
                })
                ->get();
            foreach ($formulariosBorrar as $formulario) {
                $formulario->delete();
            }
            
            DB::commit();
            return back()->with('success', __('app.label.formulario_created_successfully', ['number' => $numeroTotal]));
        } catch (\Throwable $th) {
            DB::rollback();
            $mensajeErrorCompleto = $th->getMessage() . ' L:' . $th->getLine() . ' | Ubi: ' . $th->getFile();
            return back()->with('error', __('app.label.created_error', ['name' => 'Formulario: ']) . $mensajeErrorCompleto);
        }
    }

    private function arrayFormulario($request, $index, $user){

        if ($request['justificacion'][$index] !== 'Elemento_Borrado') {

            if (isset($request['procesos_involucrados'][$index])) {
                $procesosInvol = implode(',', $request['procesos_involucrados'][$index]);
            } else $procesosInvol = null;

            if (isset($request['plan_de_mejoramiento_al_que_apunta_la_necesidad'][$index])) {
                $planmejor = implode(',', $request['plan_de_mejoramiento_al_que_apunta_la_necesidad'][$index]);
            } else $planmejor = null;

            if (isset($request['linea_del_plan_desarrollo_al_que_apunta_la_necesidad'][$index])) {
                $lineadelplan = implode(',', $request['linea_del_plan_desarrollo_al_que_apunta_la_necesidad'][$index]);
            } else $lineadelplan = null;

            $anexou = '';
            if (isset($request['anexos']))
                $anexou = $request['anexos'][$index] ?? '';

            $categori = $request['categoria'][$index] ?? '';

            //valores de dinero
            $valoruni = 0;
            if (isset($request['valor_unitario'][$index])) $valoruni = str_replace(['.', '$'], '', $request['valor_unitario'][$index]);
            $valorAsigAnterior = 0;
            if (isset($request['valor_asignado_en_la_vigencia_anterior'][$index])) $valorAsigAnterior = str_replace(['.', '$'], '', $request['valor_asignado_en_la_vigencia_anterior'][$index]);
            return [
                'numero_necesidad' => $index,
                'identificacion_user' => $request['identificacion_user'],
                'proceso_que_solicita_presupuesto' => $request['proceso_que_solicita_presupuesto'],
                'valor_total_de_la_solicitud_actual' => $request['valor_total_de_la_solicitud_actual'] ?? '',
                'valor_total_asignado_en_vigencia_anterior' => 0, //TODO: hay que consultar el año pasado

                'necesidad' => $request['necesidad'][$index] ?? '',
                'justificacion' => $request['justificacion'][$index] ?? '',
                'actividad' => $request['actividad'][$index] ?? '',
                'categoria' => $categori ?? '',
                'unidad_de_medida' => $request['unidad_de_medida'][$index] ?? '',
                'cantidad' => $request['cantidad'][$index] ?? 0,
                'valor_unitario' => $valoruni,
                'valor_total_solicitatdo_por_necesidad' => $request['valor_total_solicitatdo_por_necesidad'][$index] ?? 0,
                'periodo_de_inicio_de_ejecucion' => $request['periodo_de_inicio_de_ejecucion'][$index] ?? '',
                'vigencias_anteriores' => $request['vigencias_anteriores'][$index] ?? '',
                'valor_asignado_en_la_vigencia_anterior' => $valorAsigAnterior,

                'procesos_involucrados' => $procesosInvol,
                'plan_de_mejoramiento_al_que_apunta_la_necesidad' => $planmejor,
                'linea_del_plan_desarrollo_al_que_apunta_la_necesidad' => $lineadelplan,

                'frecuencia_de_uso' => $request['frecuencia_de_uso'][$index] ?? '',
                'mantenimientos_requeridos' => $request['mantenimientos_requeridos'][$index] ?? '',
                'capacidad_instalada' => $request['capacidad_instalada'][$index] ?? '',
                'riesgo_de_la_inversion' => $request['riesgo_de_la_inversion'][$index] ?? '',
                'anexos' => $this->guardarAnexo($anexou),
                'enviado' => $request['enviado'],
                'user_id' => $user->id,
            ];
        }
        return null;
    }

    private function guardarAnexo($anexo)
    { //TODO: avisar que el nombre, no se guarda si no se puede obtener getClientOriginalName
        if ($anexo !== '') {
            $originalName = $anexo->getClientOriginalName();
            if ($originalName) {
                $allowedExtensions = ['pdf', 'doc', 'docx', 'xls', 'xlsx'];
                $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
                // Valida la extensión
                if (in_array($extension, $allowedExtensions)) {
                    $nombreContenido = str_replace(" ", "", time() . "_" . $originalName);
                    if ($nombreContenido) {
                        $anexo->storeAs('public/anexosPrimerForm', $nombreContenido);
                        return $nombreContenido;
                    }
                }
            }
        }
        return '';
    }

    //fin store functions

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $permissions = Myhelp::EscribirEnLog($this, ' Begin UPDATE:formularios');
        DB::beginTransaction();
        $formulario = formulario::findOrFail($id);
        $request->merge(['no_nada_id' => $request->no_nada['id']]);
        $formulario->update($request->all());

        DB::commit();
        Myhelp::EscribirEnLog($this, 'UPDATE:formularios EXITOSO', 'formulario id:' . $formulario->id . ' | ' . $formulario->nombre, false);
        return back()->with('success', __('app.label.updated_successfully2', ['nombre' => $formulario->nombre]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy($formularioid)
    {
//        $permissions = Myhelp::EscribirEnLog($this, 'DELETE:formularios');
        $formulario = formulario::find($formularioid);
        $elnombre = $formulario->nombre;
        $formulario->delete();
        Myhelp::EscribirEnLog($this, 'DELETE:formularios', 'formulario id:' . $formulario->id . ' | ' . $formulario->nombre . ' borrado', false);
        return back()->with('success', __('app.label.deleted_successfully', ['name' => $elnombre]));
    }

    public function destroyBulk(Request $request)
    {
        $formulario = formulario::whereIn('id', $request->id);
        $formulario->delete();
        return back()->with('success', __('app.label.deleted_successfully', ['name' => count($request->id) . ' ' . __('app.label.formulario')]));
    }
    //FIN : STORE - UPDATE - DELETE

}
