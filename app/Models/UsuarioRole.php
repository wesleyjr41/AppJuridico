<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UsuarioRole extends Model
{
    use HasFactory;

    protected $table      = "usuarioRol";
    protected $primaryKey = "usuariorolid";
    protected $guarded    = ['usuariorolid'];

    public static function getPermisosAsignados($usuarioId, $moduloId, $permisoId = null)
    {
        $query =  DB::table('role_user as uR')
            ->select('p.permisoid')
            ->leftJoin('roles as r', 'r.rolid', 'uR.role_id')
            ->leftJoin('rolModuloPermiso as rMP', 'r.rolid', 'rMP.rolid')
            ->leftJoin('moduloPermiso as mP', 'mP.modulopermisoid', 'rMP.modulopermisoid')
            ->leftJoin('permisos as p', 'mP.permisoid', 'p.permisoid')
            ->where('uR.user_id', $usuarioId)
            ->where('mP.moduloid', $moduloId)
            ->groupBy('mP.moduloid', 'p.permisoid');

        $query = !empty($permisoId) ?  
            $query->whereIn('p.nombreLaravel', $permisoId)->exists() : 
            $query->get();
        
        return $query;
    }

    public static function getModuloPermisoID($usuarioId, $nombreLaravel) 
    {
        return DB::table('role_user as uR')
            ->select('mP.modulopermisoid', 'mP.moduloid', 'r.nombre' )
            ->leftJoin('roles as r', 'r.rolid', 'uR.role_id')
            ->leftJoin('rolModuloPermiso as rMP', 'r.rolid', 'rMP.rolid')
            ->leftJoin('moduloPermiso as mP', 'mP.modulopermisoid', 'rMP.modulopermisoid')
            ->leftJoin('permisos as p', 'mP.permisoid', 'p.permisoid')
            ->where('uR.user_id', $usuarioId)
            ->where('p.nombreLaravel', $nombreLaravel)
            /* ->orderBy('r.nombre', 'mP.modulopermisoid' ) */
            ->groupBy('r.nombre', 'mP.modulopermisoid')
            ->get();        
    }
    public static function getModulos($moduloid){
        return DB::table('modulos as m')->select('m.nombre', 'm.ruta')->where('m.moduloid', $moduloid)->get();

    }

    public function modulos()
    {
        return $this->hasMany(RoleModuloPermiso::class, 'rolid', 'rolid');
    }

   
}
