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

    public function Mapear(): Builder{
        //$formularios = formulario::with('no_nada');
        $formularios = formulario::Where('id', '>', 0);
        return $formularios;
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
        $returningObject =[];
        foreach ($objeto as $index => $gen) {
            $returningObject[$index]['value'] = $gen;
            $returningObject[$index]['label'] = $gen;
        }
        return $returningObject;
    }

    public function Dependencias(){
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

    public function welcome(Request $request){
//        $numberPermissions = MyModels::getPermissionToNumber(Myhelp::EscribirEnLog($this, ' formularios '));
//        $formularios = $this->Mapear();
//        $this->Filtros($formularios, $request);
        $losSelect = $this->Dependencias();

        $UIDformulariosYaDiligenciados = Formulario::Where('enviado',1)->pluck('user_id')->unique();
        $UIDformulariosGuardados = Formulario::Where('enviado',0)->pluck('user_id')->unique();
        $cedLideresGuardados = User::Where('esLider', 1)
            ->WhereIn('id', $UIDformulariosGuardados)
            ->get()->mapWithKeys(function ($user) {
                $form = Formulario::Where('user_id', $user->id)
                    ->Where('enviado', 0)
                    ->orderby('created_at', 'desc')->first();
                if($form){
                    $form = Formulario::Where('user_id', $user->id)
                        ->Where('enviado', 0)
                        ->Where('created_at', $form->created_at)->get();
                    return [
                        $user->identificacion => [
                            'name' => $user->name,
                            'email' => 'YaHaSidoGuardado',
                            'Formulario' => $form
                        ],
                    ];
                }
            }
        )->filter()->toArray();

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

        $TodosDiligenciados = count($cedLideres) === 0 && count($cedLideresGuardados) === 0;

        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'losSelect' => $losSelect,
            'cedLideresGuardados' => $cedLideresGuardados,
            'cedLideresDiligenciados' => $cedLideresDiligenciados,
            'cedLideres' => $cedLideres,
            'TodosDiligenciados' => $TodosDiligenciados
        ]);
    }


    public function index(Request $request)
    {
        $numberPermissions = MyModels::getPermissionToNumber(Myhelp::EscribirEnLog($this, ' formularios '));
        $formularios = $this->Mapear();
        $this->Filtros($formularios, $request);
        $losSelect = $this->Dependencias();


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
    public function create(){}
    public function store(FormularioStoreRequest $request){
        try{
            Myhelp::EscribirEnLog($this, ' Begin STORE:formularios');
            DB::beginTransaction();
            $user = User::Where('identificacion',$request->identificacion_user)->first();

            foreach ($request['necesidad'] as $index => $item) {
                $formulario = formulario::create([
                    'numero_necesidad' => $index,
                    'identificacion_user' => $request['identificacion_user'],
                    'proceso_que_solicita_presupuesto' => $request['proceso_que_solicita_presupuesto'],
                    'valor_total_de_la_solicitud_actual' => $request['valor_total_de_la_solicitud_actual'],
                    'valor_total_asignado_en_vigencia_anterior' => 0,

                    'necesidad' => $item,
                    'justificacion' => $request['justificacion'][$index],
                    'actividad' => $request['actividad'][$index],
                    'categoria' => $request['categoria'][$index],
                    'unidad_de_medida' => $request['unidad_de_medida'][$index],
                    'cantidad' => $request['cantidad'][$index],
                    'valor_unitario' => $request['valor_unitario'][$index],
                    'valor_total_solicitatdo_por_necesidad' => $request['valor_total_solicitatdo_por_necesidad'][$index],
                    'periodo_de_inicio_de_ejecucion' => $request['periodo_de_inicio_de_ejecucion'][$index],
                    'vigencias_anteriores' => $request['vigencias_anteriores'][$index],
                    'valor_asignado_en_la_vigencia_anterior' => $request['valor_asignado_en_la_vigencia_anterior'][$index],
                    'procesos_involucrados' => $request['procesos_involucrados'][$index],
                    'plan_de_mejoramiento_al_que_apunta_la_necesidad' => $request['plan_de_mejoramiento_al_que_apunta_la_necesidad'][$index],
                    'linea_del_plan_desarrollo_al_que_apunta_la_necesidad' => $request['linea_del_plan_desarrollo_al_que_apunta_la_necesidad'][$index],
                    'frecuencia_de_uso' => $request['frecuencia_de_uso'][$index],
                    'mantenimientos_requeridos' => $request['mantenimientos_requeridos'][$index],
                    'capacidad_instalada' => $request['capacidad_instalada'][$index],
                    'riesgo_de_la_inversion' => $request['riesgo_de_la_inversion'][$index],
//                    'anexos' => $this->guardarAnexo($request['anexos'][$index]),
                    'enviado' => $request['enviado'],
//                    'user_id' => 1,
                    'user_id' => $user->id,

                ]);
            }

            DB::commit();

//            Myhelp::EscribirEnLog($this, 'STORE:formularios EXITOSO', 'formulario id:' . $formulario->id . ' | ' . $formulario->nombre, false);
            return back()->with('success', __('app.label.formulario_created_successfully', ['name' => $formulario->nombre]));
        } catch (\Throwable $th) {
            DB::rollback();
            $tempo = 'userid';
            $mensajeErrorCompleto = $th->getMessage() . ' L:' . ' Ubi: ' . $th->getFile() . $th->getLine();
            dd($mensajeErrorCompleto);
//            Myhelp::EscribirEnLog($this, 'STORE:users', 'usuario id:' . $tempo . ' | ' . $tempo . ' fallo en el guardado', false);
            return back()->with('error', __('app.label.created_error', ['name' => __('app.label.user')]) . $mensajeErrorCompleto);
        }
    }

    private function guardarAnexo($anexo){
        if($anexo){
            $nombreContenido = str_replace(" ", "", time() . "_" . $anexo->getClientOriginalName());
            if ($nombreContenido) {
                $anexo->storeAs('public/anexosPrimerForm', $nombreContenido);
                return $nombreContenido;
            }
            return '';
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