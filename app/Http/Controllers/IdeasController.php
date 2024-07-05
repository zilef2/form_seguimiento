<?php

namespace App\Http\Controllers;

use App\helpers\Myhelp;
use App\helpers\MyModels;
use App\Models\Formulario;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Inertia\Inertia;

class IdeasController extends Controller
{

    public $thisAtributos, $FromController = 'Idea';

    public function __construct()
    {
//        $this->thisAtributos = (new formulario())->getFillable(); //not using
    }

    function compareStrings($str1, $str2)
    {
        // Convertir ambos strings a minúsculas para comparación case-insensitive
        $str1 = strtolower($str1);
        $str2 = strtolower($str2);

        // Calcular el porcentaje de similitud usando similar_text
        $percent = 0;
        similar_text($str1, $str2, $percent);

        // Establecer un umbral de similitud, por ejemplo, 60%
        $thresholdPercent = 60;

        // Calcular la distancia de Levenshtein
        $levDistance = levenshtein($str1, $str2);

        // Establecer un umbral de distancia de Levenshtein, por ejemplo, 3
        $thresholdLevDistance = 3;

        // Verificar si los strings son suficientemente similares
        if ($percent >= $thresholdPercent || $levDistance <= $thresholdLevDistance) {
            return true;
        }

        return false;
    }
    public function index(Request $request)
    {
        $numberPermissions = MyModels::getPermissionToNumber(
            Myhelp::WriteAuthLog($this, ' --formularios index-- ')
        );

        $CategoriasTodas = Formulario::select('categoria')->distinct()->get();
        //compara las que se parescan
        foreach ($CategoriasTodas as $item) {
            foreach ($CategoriasTodas as $item2) {
                if($this->compareStrings($item,$item2)){
                    $fromController[] = [$item => $item2];
                }
            }
        }
//        $this->Filtros($fromController, $request);
//        $losSelect = $this->Dependencias();

        $perPage = $request->has('perPage') ? $request->perPage : 100;
        $total = $fromController->count();
        $page = request('page', 1); // Current page number
        $fromController = new LengthAwarePaginator(
            $fromController->forPage($page, $perPage),
            $total,
            $perPage,
            $page,
            ['path' => request()->url()]
        );

        return Inertia::render($this->FromController . '/CategoriasSimilares', [
            'fromController' => $fromController->paginate($perPage),
            'total' => $fromController->count(),
            'title' => __('app.label.' . $this->FromController),
            'filters' => $request->all(['search', 'field', 'order']),
            'perPage' => (int)$perPage,
            'numberPermissions' => $numberPermissions,
//            'losSelect' => $losSelect,
        ]);
    }
}
