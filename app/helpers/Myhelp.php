<?php

namespace App\helpers;

use App\Models\User;
use Carbon\Carbon;
use Carbon\Translator;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

//JUSTthisPROJECT
//SHOULDBESHARED
//STRING S
//LARAVELFunctions
//dateFunctions
//arrayFunctions

class Myhelp {

    public static function AuthU(): Authenticatable
    {
        $TheUser = Auth::user();
        if($TheUser){
            return $TheUser;
        }
        return redirect()->to('/');
    }

     public static function nombreYvalue($tipo){
        $objeto = DB::table('selecsForm')->Where('tipo', $tipo)->pluck('nombre');
        $returningObject = [];
        foreach ($objeto as $index => $gen) {
            $returningObject[$index]['value'] = $gen;
            $returningObject[$index]['label'] = $gen;
        }
        return $returningObject;
    }

    //<editor-fold desc="SHOULD BE SHARED with the other zilef proyects">
    public static function nombreYvalueNew($tableName){
        $objeto = DB::table($tableName)->pluck('label');
        $returningObject = [];
        foreach ($objeto as $index => $gen) {
            $returningObject[$index]['value'] = $gen;
            $returningObject[$index]['label'] = $gen;
        }
        return $returningObject;
    }
    
    public static function TheIdAndLabel($tipo){
        $objeto = DB::table('selecsForm')->Where('tipo', $tipo)->get();
        $returningObject = [];
        foreach ($objeto as $index => $gen) {
            $returningObject[$index]['value'] = $gen->id;
            $returningObject[$index]['label'] = $gen->nombre;
        }
        return $returningObject;
    }
    
    
    public static function vSelect($tableName,$thename = 'name'): array
    {
        $objeto = DB::table($tableName)->select('id','label as '.$thename)->get()->toArray();
        $returningObject = [];
        foreach ($objeto as $index => $gen) {
            $returningObject[$index]['id'] = $gen->id;
            $returningObject[$index][$thename] = $gen->name;
        }
        return $returningObject;
    }
    //</editor-fold>



    //<editor-fold desc="STRING S">
    public function EncontrarEnString($frase, $busqueda): array {
            $Resultado = [];
            $NuevaPos = strlen($frase);
            $ResultOnce = strpos($frase, $busqueda);

            // if($busqueda == '[tema]')
            // dd($ResultOnce);
            //ResultOnce,  = 2
            //frase,  = a [tema]
            //busqueda,  = [tema]
            //strlen($frase)  =  8

            while ($ResultOnce !== false && $ResultOnce < $NuevaPos) {
                $Resultado[] = $ResultOnce;
                $NuevaPos = $ResultOnce + strlen($busqueda);
                $ResultOnce = strpos($frase, $busqueda, $NuevaPos);
            }
            return $Resultado;
        }

        function cortarFrase($frase, $maxPalabras = 3) {
            $noTerminales = [
                "de", "a", "para",
                "of", "by", "for"
            ];

            $palabras = explode(" ", $frase);
            $numPalabras = count($palabras);
            if ($numPalabras > $maxPalabras) {
                $offset = $maxPalabras - 1;
                while (in_array($palabras[$offset], $noTerminales) && $offset < $numPalabras) {
                    $offset++;
                }
                $ultimaPalabra = $palabras[$offset];
                if ((intval($ultimaPalabra)) != 0) {
                    session(['ultimaPalabra' => $ultimaPalabra]);
                }
                return implode(" ", array_slice($palabras, 0, $offset + 1));
            }
            return $frase;
        }

        public static function ArrayInString($Elarray, $limite = 3)
        {
            $Elarray = $Elarray->toArray();
            // dd($Elarray instanceof Collection);
            if (count($Elarray) > $limite) {
                $result = [];
                $result[] = $Elarray[0];
                $result[] = $Elarray[1];
                $result[] = $Elarray[2];

                return implode(", ", $result)  . '...';
            } else {
                if (count($Elarray) > 0) {
                    return implode(",", $Elarray);
                } else {
                    return 'Sin resultados';
                }
            }
        }
    //</editor-fold>

    //fin strings



    //<editor-fold desc="LARAVELFunctions">
    public function mensajesErrorBD($e,$clasePrincipal,$elid,$elnombre) {
            $errorCode = $e->getCode();
            $arrayCodes = [
                23000 => ' No se puede eliminar porque está relacionado con otros registros.',
                1451 => ' Hay otros campos que necesitan este registro',
                1062 => ' Ya existe un registro con esa información.',
                1048 => ' Campo obligatorio, por favor completa la información.',
                1216 => ' Este registro no se puede eliminar, hay dependencias pendientes.'
            ];

            if(isset($arrayCodes[$errorCode])){
                $errorMessage = $arrayCodes[$errorCode];
            }else{
                $errorMessage = "Ocurrió un error de base de datos.";
            }

            Myhelp::EscribirEnLog(
                $this,
                'DELETE:'.$clasePrincipal.', QueryException',
                $clasePrincipal.' id:' . $elid . ' | ' . $elnombre . ' fallo en el borrado:: ' . $errorMessage,
                false,
                true
            );
            return $errorMessage;

        }
        public function redirect($ruta, $seconds = 14) {
            sleep($seconds);
            return redirect()->to($ruta);
        }

        public function erroresExcel($errorFeo) {
            // $fila = session('ultimaPalabra');
            $error1 = "PDOException: SQLSTATE[22007]: Invalid datetime format: 1292 Incorrect date";
            if ($errorFeo == $error1) {
                return 'Existe una fecha invalida';
            }
            return 'Error desconocido';
        }
        public static function EscribirEnLog($thiis, $clase = '', $mensaje = '', $returnPermission = true, $critico = false) {
//            $permissions = $returnPermission ? auth()->user()->roles->pluck('name')[0] : null;
            $ListaControladoresYnombreClase = (explode('\\', get_class($thiis)));
            $nombreC = end($ListaControladoresYnombreClase);
            if (!$critico) {

                $Elpapa = (explode('\\', get_parent_class($thiis)));
                $nombreP = end($Elpapa);

//                if ($permissions == 'admin' || $permissions == 'superadmin') {
//                    $ElMensaje = $mensaje != '' ? ' Mensaje: ' . $mensaje : '';
//                    Log::channel('soloadmin')->info('Vista:' . $nombreC . ' Padre: ' . $nombreP . '|  U:' . Auth::user()->name . $ElMensaje);
//                } else {
                    Log::info('Vista: ' . $nombreC . ' Padre: ' . $nombreP .' | '. $clase . '| ' . ' Mensaje: ' . $mensaje);
//                }
//                return $permissions;
            } else {
                Log::critical('Vista: ' . $nombreC . 'U:' . $clase . '|| ' . ' Mensaje: ' . $mensaje);
//                Log::critical('Vista: ' . $nombreC . 'U:' . Auth::user()->name . ' ||' . $clase . '|| ' . ' Mensaje: ' . $mensaje);
            }

        }

        public static function WriteAuthLog($thiis, $clase = '', $mensaje = '', $returnPermission = true, $critico = false) {
            $authU = auth()->user();
            $permissions = $returnPermission ? $authU->roles->pluck('name')[0] : null;
            $ListaControladoresYnombreClase = (explode('\\', get_class($thiis)));
            $nombreC = end($ListaControladoresYnombreClase);
            //nombre controller
            $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
            $controllerFile = $trace[1]['file'];
            $controllerName = basename($controllerFile, '.php');
            $Elpapa = (explode('\\', get_parent_class($thiis)));
            $nombreP = end($Elpapa);

            $ElMensaje = $mensaje != '' ? ' Mensaje: ' . $mensaje : '';
            $ElMensaje = 'Controlador: '.$controllerName.'Vista:' . $nombreC . ' Padre: ' . $nombreP . '|  User:' . Auth::user()->name . $ElMensaje;
            if (!$critico) {
                if ($permissions == 'admin' || $permissions == 'superadmin') {
                    Log::channel('soloadmin')->info($ElMensaje);
                } else {
                    Log::info($ElMensaje);
                }
                return $permissions;
            } else {
                Log::critical('Vista_Critica:::' . $ElMensaje);
            }
            return $permissions;
        }
    //</editor-fold>

    //fin LARAVEL



    //<editor-fold desc="dateFunctions">
    public static function validateDate($dateString, $format = 'd/m/Y'){
            $dateString = date_create_from_format('d/m/Y', $dateString);
            return $dateString;
        }
        public static function updatingDate($date){
            if ($date === null || $date === '1969-12-31') {
                return null;
            }
            return date("Y-m-d", strtotime($date));
        }

        public static function FechaCarbon($date) {
            try {
                // $translator = Translator::get('es_CO');
                Carbon::setLocale('es');
                $carbonDate = Carbon::createFromFormat('d/m/Y',$date);
                $anioActual = Carbon::now()->year;
                if($anioActual == $carbonDate->year){
                    $result = $carbonDate->format('d \d\e M');
                }else{
                    $result = $carbonDate->format('d \d\e M \d\e Y');
                }
                return $result;
            } catch (Throwable $th) {
                return $th->getMessage();
            }
        }
        public function ValidarFecha($laFecha) {
            if (strtotime($laFecha)) {
                return $laFecha;
            }
            return '';
        }
    //fin dates
    //</editor-fold>




    //IN: { intelu::HelpGPT.php}
    public static function filtrar_solo_id($ARRAY_with_attributes) {
        $Result = [];
        foreach ($ARRAY_with_attributes as $key => $value) {
            $buscarid = strpos(trim($value),'_id');
            if($buscarid !== false){
                $Result[] = substr($value,0,$buscarid);
            }
        }
        return $Result;
    }

    public static function NEW_turnInSelectID($theArrayofStrings,$selecc,$theName = null) {
        if($theName == null) $theName = 'nombre';
        if(count($theArrayofStrings) == 0)
            return [
              [  'title' => 'No hay registros ', 'value' => 0,]
                // 'filtro' => 'General'
            ];

        $result = [
            [
                'title' => 'Selecciona un '.$selecc,
                'value' => 0,
                // 'filtro' => 'General'
            ]
        ];
        foreach ($theArrayofStrings as $value) {
            $result[] =
            [
                'title' => $value->{$theName},
                'value' => $value->id,
                // 'filtro' => $value->teoricaOpractica
            ];
        }
        return $result;
    }



//arrayFunctions
    public static function ImplodeSinNulos($theArrayofStrings,$index) {
        if (isset($theArrayofStrings[$index])) {
            $arraySinNulos = array_filter($theArrayofStrings[$index], function ($value) {
                return !is_null($value);
            });
            return implode(',', $arraySinNulos);
        }
        return null;
    }

}?>

