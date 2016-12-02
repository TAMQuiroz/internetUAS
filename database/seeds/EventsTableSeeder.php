<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
	        'nombre'            => 'Evento de prueba',
	        'ubicacion'         => 'Auditorio CIA',
	        'descripcion'      	=> 'Evento de prueba en auditorio CIA',
	        'fecha'         	=> '2017-10-07',
	        'hora'         		=> 0,
	        'duracion'         	=> 1,
	        'tipo'         		=> 0,
	        'id_grupo'         	=> 1,
        ]);

        DB::table('events')->insert([
            'nombre'            => 'CAFÉ GRPIAA: IOT BIG DATA STREAM MINING',
            'ubicacion'         => 'Aula A408',
            'descripcion'       => 'Big Data and the Internet of Things (IoT) have the potential to fundamentally shift the way we interact with our surroundings. The challenge of deriving insights from the Internet of Things (IoT) has been recognized as one of the most exciting and key opportunities for both academia and industry. Advanced analysis of big data streams from sensors and devices is bound to become a key area of data mining research as the number of applications requiring such processing increases. Dealing with the evolution over time of such data streams, i.e., with concepts that drift or change completely, is one of the core issues in stream mining. In this talk, I will present an overview of data stream mining, and I will introduce  some popular open source tools for data stream mining.',
            'fecha'             => '2017-08-26',
            'hora'              => '17:30',
            'duracion'          => 1,
            'tipo'              => 0,
            'id_grupo'          => 1,
        ]);

        DB::table('events')->insert([
            'nombre'            => 'CALL FOR PAPERS CIARP 2016',
            'ubicacion'         => 'More information http://www.wikicfp.com/cfp/servlet/event.showcfp?eventid=53154&copyownerid=86727',
            'descripcion'       => 'The call for papers is open !!',
            'fecha'             => '2016-12-31',
            'hora'              => 0,
            'duracion'          => 1,
            'tipo'              => 0,
            'id_grupo'          => 1,
        ]);

        DB::table('events')->insert([
            'nombre'            => 'IMPRESEE: BUSCADOR DE PRODUCTOS POR IMÁGENES Y SKETCHES / EXPERIENCIA DESDE LA ACADEMIA A LA INDUSTRIA',
            'ubicacion'         => 'B101 (1er piso Biblioteca del Complejo de Innovación)',
            'descripcion'       => 'En los últimos años, la masificación de dispositivos móviles junto con la creciente capacidad de procesamiento han hecho que las aplicaciones basadas en aprendizaje de máquina y visión por computador sean, hoy,  no sólo el foco de las grandes empresas tecnológicas sino también el centro de exitosos emprendimientos.  Siguiendo esta línea, en esta charla se presenta Impresee, una novedosa tecnología, basada en algoritmos de visión por computador, que permite a los usuarios buscar eficiente y efectivamente productos en catálogos a través de imágenes y sketches (dibujos). Impresee mezcla dos mundos altamente separados en nuestra región, el mundo académico  y el industrial, y ha recibido importantes reconocimientos en ambos ámbitos. Desde el punto de vista académico, Impresee hace uso de algoritmos de vanguardia, producto de la investigación desarrollada por sus propios fundadores. Desde el punto de vista industrial, Impresee es una solución que permite, potencialmente, aumentar la ventas del sector retail a través de captar oportunamente la necesidad de compra de los clientes.  En esta charla se describe la experiencia de cómo llevamos nuestra  investigación a un resultado tangible para la industria junto con los mecanismos utilizados para sustentar esta aventura. Además, discutiremos algunos aspectos técnicos de los algoritmos más relevantes de Impresee.',
            'fecha'             => '2017-07-22',
            'hora'              => '10:30',
            'duracion'          => 1,
            'tipo'              => 0,
            'id_grupo'          => 1,
        ]);        
    }
}
