<?php

namespace Database\Seeders;

use App\Models\CJGA;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CJGASeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $universidad = ["\"Casa de la Mujer y la Familia Dolores Intriago y Defensa de los Derechos Humanos\" Gobierno Autónomo Descentralizado Municipal Tena", "CEFAS - Patronato del GAPMS", "Universidad Técnica Particular de Loja sede Cuenca \"CENARC\"", "Universidad Técnica Particular de Loja sede Quito \"CENARC\"", "Universidad de Las Américas \"Centro Integral de Asesoría Legal CIAL\"", "Universidad Nacional de Chimborazo \"Centro de privación de la libertad\"", "Universidad Metropolitana. Sede Quito \"Colinas del Norte\"", "Universidad Nacional de Chimborazo \"UNACH-CONAGOPARE\"", "Universidad Católica de Cuenca \"Dr. Alberto Cordero Tamariz\"", "Universidad Católica Santiago de Guayaquil \"Dra. Mariana Argudo Chejin\"", "Universidad de Guayaquil \"Dra. Ketty Romoleroux Girón\"", "Universidad de Guayaquil \"Dr. Edmundo Durán Díaz\"", "Universidad de Cuenca \"Gerardo Cordero y León\"", "Pontificia Universidad Católica del Ecuador", "Pontificia Universidad Católica del Ecuador. Sede Ambato", "Pontificia Universidad Católica del Ecuador. Sede Ibarra", "\"Servicio Integral de atención en casos de violencia de genero e intrafamiliar\" Coordinadora de Mujeres Urbanas Cotacachi", "\"Sucumbíos Solidario\" del Gobierno Autónomo Descentralizado de la Provincia de Sucumbíos", "Universidad Internacional SEK", "Universidad Nacional de Chimborazo \"UNACH\"", "Universidad Regional Autónoma de los Andes \"UNIANDES-AMBATO\"", "\"UNIANDES-BABAHOYO\" Universidad Regional Autónoma de los Andes, Sede Babahoyo", "Universidad Regional Autónoma de los Andes\"UNIANDES-IBARRA\"", "Universidad Regional Autónoma de los Andes\"UNIANDES-LATACUNGA\"", "Universidad Regional Autónoma de los Andes \"UNIANDES-PUYO\"", "Universidad Regional Autónoma de los Andes \"UNIANDES-QUEVEDO\"", "\"UNIANDES-RIOBAMBA\" Universidad Regional Autónoma de los Andes, Sede Riobamba", "Universidad Regional Autónoma de los Andes \"UNIANDES-SALASACA\"", "Universidad Regional Autónoma de los Andes\"UNIANDES-SANTO DOMINGO\"", "Universidad Regional Autónoma de los Andes \"UNIANDES-TULCÁN\"", "Universidad Metropolitana. Sede Quito \"VOZANDES\"", "Fundación de Asistencia Jurídica, Social y Económica del \"Migrante Ecuatoriano\"", "Gobierno Autónomo Descentralizado Municipal de Valencia", "Universidad  de Especialidades Espíritu Santo", "Universidad Católica de Cuenca, Sede Azogues", "Universidad Católica de Cuenca, Sede Cañar", "Universidad Católica de Cuenca. Sede La Troncal", "Universidad Central del Ecuador", "Universidad Hemisferios", "Universidad de Otavalo", "Universidad del Azuay", "Universidad del Pacífico", "Universidad Estatal de Bolívar extensión San Miguel", "Universidad Estatal de Bolívar", "Universidad Estatal Península de Santa Elena", "Universidad Internacional del Ecuador. Sede Loja", "Universidad Internacional del Ecuador. Sede Quito", "Universidad Laica Eloy Alfaro de Manabí", "Universidad Laica Vicente Rocafuerte \"Ab. Alfonso Leónidas Aguilar Álava\"", "Universidad Metropolitana. matriz Guayaquil", "Universidad Metropolitana. Sede Machala", "Universidad Nacional de Loja", "Universidad San Francisco de Quito", "Universidad San Gregorio de Portoviejo", "Universidad Técnica  Estatal de Quevedo", "Universidad Técnica de Ambato", "Universidad Técnica de Machala", "Universidad Técnica Luis Vargas Torres", "Universidad Técnica Particular de Loja", "Universidad Tecnológica ECOTEC", "Universidad Tecnológica Indoamérica, Sede  Ambato", "Universidad Tecnológica Indoamérica sede  Quito", "Universidad Técnica del Norte", "Universidad Católica de Cuenca, sede Quito", "Universidad Central del Ecuador, sede Mitad del Mundo", "Universidad Central del Ecuador, sede Guajalo", "Universidad Tecnológica ECOTEC sede Samborondón", "Abogados Patrocinadores de la EP EMSEGURIDAD", "Gobierno Autónomo Descentralizado Municipal Tena \"Casa de la mujer y la familia Dolores Intriago \"", "Gobierno Autónomo Descentralizado Municipal del Cantón Macará", "Universidad Técnica Luis Vargas Torres", "Universidad UTE", "Universidad Técnica  Particular de Loja sede Guayaquil \"CENARC\"", "\"STRICTO SENSU AEQUITAS \"de la Fundación Jurídica Stricto Sensu Aequitas", "CCPD-SD del Consejo Cantonal para la protección de Derechos de Santo Domingo", "Gobierno Autónomo Descentralizado Municipal de Catamayo", "Universidad Técnica de Manabí"];

        foreach ($universidad as $item) {
            CJGA::create([
                'name' => $item
            ]);
        }
    }
}
