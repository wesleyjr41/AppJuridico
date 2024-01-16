<?php

namespace Database\Seeders;

use App\Models\Servicios;
use App\Models\Servicios_vif;
use App\Models\Servicios_civil;
use App\Models\Servicios_penal;
use Illuminate\Database\Seeder;
use App\Models\Servicios_laboral;
use App\Models\Servicios_tierras;
use App\Models\Servicios_tramites;
use App\Models\Servicios_alimentos;
use App\Models\Servicios_ejecucion;
use App\Models\Servicios_garantias;
use App\Models\Servicios_movilidad;
use App\Models\Servicios_inquilinato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alimentos = ["Alimentos", "Alimentos congruos", "Alimentos internacionales", "Alimentos para mujer embarazada", "Incidente de aumento de pensiones alimenticias", "Incidente de rebaja de pensiones alimenticias", "Autorización de salida del país.", "Declaración de adoptabilidad", "Divorcio por mutuo consentimiento", "Medidas de Protección", "Paternidad y alimentos", "Paternidad y alimentos internacionales.", "Recuperación Internacional de niños, niñas y adolescentes", "Régimen de visitas", "Régimen de visitas internacional", "Custodias Familiares", "Acogimiento Institucional", "Restitución de niños, niñas y adolescentes", "Divorcio por mutuo consentimiento", "Detenido por boleta de apremio", "Curadurías especiales", "Divorcio por causal", "Disolución de unión de hecho", "Liquidación de alimentos", "Escrito", "Tenencia"];
        $laboral = ["Audiencias de Oficio", "Conciliación", "Demanda", "Denuncias", "Denuncias MT", "Desahucio", "Escrito", "Visto bueno", "Despido intempestivo", "Investigación integral de las empresas", "Accidentes laborales", "Reclamación de derechos sociales adquiridos", "Despidos intempestivos", "Jubilación patronal", "Impugnación de actas de finiquito", "Cambio de ocupación del trabajo", "Icumplimiento de contratos", "Solicitud de boleta única", "Impugnación  por desahucios"];
        $tierras = ["Legalización de tierras", "Oposición de tierras", "Servidumbre", "Linderos", "Reversión de tierras", "Adjudicación de tierras"];
        $civil = ["Amparos posesorios", "Prescripción adquisitiva de dominio", "Posesión efectiva", "Escrito"];
        $garantias_jurisdiccionales = ["Habeas Corpus", "Habeas Data", "Acción de protección", "Acción extraordinaria de protección", "Medidas cautelares", "Acción por incumplimiento", "Acceso a la Información", "Acciones de control constitucional", "Amicus Curiae", "Acción de incumplimiento", "Acción pública de inconstitucionalidad"];
        $inquilinato = ["Desahucios inquilinato", "Incumplimiento de contratos inquilinato"];
        $movilidad_humana = ["Refugio ", "Regularización del extranjero", "Prevención de casos de apátridia", "Deportación"];
        $vif = ["Violencia intrafamiliar", "Denuncias de VIF"];
        $tramites_administrativos = ["Trámite administrativo", "Proceso Sancionatorio", "Peticiones al Ministerio Coordinador de Desarrollo Social", "Peticiones a la Defensoría del Pueblo", "Peticiones al Instituto Ecuatoriano de Seguridad Social", "Petición a GAD's", "Sanciones Disciplinarias", "Peticiones a EP", "Acceso y manejo de aguas", "Peticiones", "Trámites registral", "Trámites notariales", "Derecho Administrativo", "Procesos institucionales internos en etapa administrativa"];
        $penal = ["Audiencia de Flagrancia", "Acoso sexual", "Inseminación no consentida", "Distribución de material pornográfico a niñas, niños y adolescentes", "Corrupción de niñas, niños y adolescentes", "Utilización de personas para exhibición pública con fines de naturales sexual", "Contacto con finalidad sexual con menores de dieciocho años por medios electrónicos", "Privación forzada de capacidad de reproducción", "Oferta de servicios sexuales con menores de dieciocho años por medios electrónicos", "Violación", "Estupro", "Abuso sexual", "Patrocinio"];
        $ejecucion_pena = ["Cambio de Régimen", "Reducción de Pena", "Libertad Controlada", "Prelibertad", "Revisión de Sentencia", "Otros ejecución de la pena"];


        foreach ($alimentos as $nombre) {
            Servicios::create([
                'nombre' => $nombre,
                'categoria_servicios_id' => 3
            ]);
        }
        foreach ($laboral as $nombre) {
            Servicios::create([
                'nombre' => $nombre,
                'categoria_servicios_id' => 6
            ]);
        }
        foreach ($tierras as $nombre) {
            Servicios::create([
                'nombre' => $nombre,
                'categoria_servicios_id' => 9
            ]);
        }
        foreach ($civil as $nombre) {
            Servicios::create([
                'nombre' => $nombre,
                'categoria_servicios_id' => 2
            ]);
        }
        foreach ($garantias_jurisdiccionales as $nombre) {
            Servicios::create([
                'nombre' => $nombre,
                'categoria_servicios_id' => 1
            ]);
        }
        foreach ($inquilinato as $nombre) {
            Servicios::create([
                'nombre' => $nombre,
                'categoria_servicios_id' => 5
            ]);
        }
        foreach ($movilidad_humana as $nombre) {
            Servicios::create([
                'nombre' => $nombre,
                'categoria_servicios_id' => 7
            ]);
        }
        foreach ($vif as $nombre) {
            Servicios::create([
                'nombre' => $nombre,
                'categoria_servicios_id' => 11
            ]);
        }
        foreach ($tramites_administrativos as $nombre) {
            Servicios::create([
                'nombre' => $nombre,
                'categoria_servicios_id' => 10
            ]);
        }
        foreach ($penal as $nombre) {
            Servicios::create([
                'nombre' => $nombre,
                'categoria_servicios_id' => 8
            ]);
        }
        foreach ($ejecucion_pena as $nombre) {
            Servicios::create([
                'nombre' => $nombre,
                'categoria_servicios_id' => 12
            ]);
        }
    }
}
