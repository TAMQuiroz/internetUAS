<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
	        'nombre'            => 'Plataforma computacional de análisis automático de imágenes micrográficas para la evaluación de la fertilidad masculina.',
	        'descripcion'      	=> 'El presente proyecto desarrollará una plataforma  computacional para el procesamiento automático de micrografías digitales de muestras vivas de semen, con el fin de determinar la capacidad de fertilidad masculina, para ello se desarrollarán algoritmos computacionales que permitan de forma automática la detección de las células espermáticas con lo que se busca diferenciar a estas, de posibles artefactos presentes en la muestra, determinando las características morfológicas y de motilidad de los espermatozoides para, de acuerdo a los estándares definidos por la OMS, se diagnostique la capacidad de fertilización del paciente en análisis. Los sistemas CASA existentes en el mercado son de tipo semi-automático, además de su alto costo, poseen tecnología computacional cerrada que no permite modificación alguna del código en el cual fueron desarrollados, por ello, con el presente proyecto, se busca desarrollar la tecnología propia que permita adecuar la plataforma de análisis de semen a las diferentes condiciones que pueda presentar una muestra. Al finalizar el proyecto, este know how podrá ser extendido para el análisis de otros tipos de muestras de semen, que pueden provenir de animales, lo cual es útil para la conservación y mejoramiento genético de animales de producción con registros numéricos, como es el caso de vacunos y alpacas. Además también se formará personal especializado en la aplicación de algoritmos de visión computacional a diferentes problemas del país.',
	        'num_entregables' 	=> 4,
	        'fecha_ini'        	=> '2017-10-05',
	        'fecha_fin'        	=> '2017-10-15',
	        'id_grupo'         	=> 1,
	        'id_area'         	=> 1,
	        'id_status'         => 1,
        ]);

        DB::table('projects')->insert([
            'nombre'            => 'Análisis automático mediante procesamiento de imágenes digitales para determinar el grado de severidad de la “Roya Amarilla” en hojas de cafe.',
            'descripcion'       => 'La Roya del Cafeto es una enfermedad que atacó fuertemente estos dos últimos años a zonas de producción de café. Para determinar la severidad del ataque, el evaluador debe establecer el grado de afección de la plaga en las hojas, mediante la observación directa. Siendo este personal entrenado, para que pueda calcular el grado de severidad, el análisis que realiza se basa es determinar las regiones infectadas, que presentan un color amarillento y las regiones necrosadas. Esta evaluación sigue una metodología de muestreo para la roya visible. El problema se presenta al momento de determinar estos grados, en vista que se debe confiar en el  criterio subjetivo de quien realiza la evaluación, y éste a su vez haber tenido un entrenamiento. Por otro lado, el deterioro de los plantíos de cafeto podrían ser causados por otros tipos de plagas, que no necesariamente siempre es la roya amarilla, y se requiere diferenciar el tipo de daño que sufre la planta. El presente proyecto desarrollará un sistema automático para la determinación cuantificable del grado de severidad de infección de la Roya Amarilla en hojas de cafeto, ello se realizará mediante el análisis algorítmico y técnicas de visión computacional en imágenes de hojas de cafeto. La propuesta podrá ser implementada en dispositivos PDA, o dispositivos móviles, para levantar la información en tiempo real, y permitir que el agricultor tome la decisión de aplicar fungicida en forma inmediata.',
            'num_entregables'   => 4,
            'fecha_ini'         => '2017-10-05',
            'fecha_fin'         => '2017-10-15',
            'id_grupo'          => 1,
            'id_area'           => 2,
            'id_status'         => 1,
        ]);

        DB::table('projects')->insert([
            'nombre'            => 'Aplicación de visión computacional en la generación de un catálogo para la conservación de la biodiversidad de plantas endémicas.',
            'descripcion'       => 'Para la conservación de nuestra biodiversidad y ayudar en el desarrollo de la agricultura es esencial conseguir un conocimiento preciso de la identidad, distribución geográfica y usos de las plantas. Desafortunadamente, esta información básica no se encuentra disponible o sólo se tiene acceso a parte de ella, lo que demuestra que la información es incompleta para ecosistemas, como nuestro país, cuya mayor riqueza es su biodiversidad, especialmente de plantas, que son muy utilizadas para la generación de medicamentos. El simple problema de identificar las especies de plantas es generalmente una tarea muy difícil, aún para los profesionales especializados en botánica. El presente proyecto propone desarrollar una plataforma de recuperación de imágenes por contenido basado en la aplicación de técnicas de visión computacional que permitan caracterizar a las plantas endémicas de la Amazonía peruana y de esta manera apoyar en la conservación de la biodiversidad. Para ello será necesario desarrollar una investigación transdisciplinar que integre el conocimiento de la Ciencia de la Computación con Botánica, lo que permitirá crear una gran base de datos (tecnología Big Data), conocimiento en visión computacional, morfología de plantas, anatomía de plantas, biogeografía, entre otros. Finalmente, la plataforma propuesta será diseñada para soportar procesos de supercomputación, y además estará disponible en la nube (cloud computing) para acceso público.',
            'num_entregables'   => 4,
            'fecha_ini'         => '2017-10-05',
            'fecha_fin'         => '2017-10-15',
            'id_grupo'          => 1,
            'id_area'           => 3,
            'id_status'         => 1,
        ]);

        DB::table('projects')->insert([
            'nombre'            => 'Diseño y desarrollo de un algoritmo de reorganización de rutas de transporte público.',
            'descripcion'       => 'Como es sabido, el tráfico en Lima genera muchos inconvenientes a la ciudad. Por citar sólo algunos, está el estrés causado a choferes y peatones, las horas hombres pedidas en los viajes a horas punta, la contaminación ambiental y sonora por el uso indiscriminado del claxon, etc. Un componente importante para solucionar este problema es abordar el reordenamiento del transporte público. El presente proyecto busca generar un sistema óptimo de rutas que atienda la demanda de transporte de la población de la ciudad de Lima. Este sistema consiste en tener un conjunto de líneas de transporte público que permita cubrir la necesidad de movilización de la población de cada par origen-destino de la ciudad reduciendo la congestión vehicular. Para resolver este problema se intentará minimizar el tiempo promedio de viaje por persona tomando en cuenta algunas restricciones como la capacidad de las vías (cantidad de carriles de calles y avenidas) y la distribución de paraderos asignados por línea. Para ello se creará un algoritmo metaheurístico (proveniente de las técnicas de inteligencia artificial para resolver problemas complejos) que nos permita reorganizar las rutas de transporte público, generando nuevas o modificando actuales. Además, se diseñará la estructura de información que permita, con los beneficios del Big Data, analizar y tomar decisiones sobre el tránsito en Lima.',
            'num_entregables'   => 4,
            'fecha_ini'         => '2017-10-05',
            'fecha_fin'         => '2017-10-15',
            'id_grupo'          => 1,
            'id_area'           => 4,
            'id_status'         => 1,
        ]);

        DB::table('projects')->insert([
            'nombre'            => 'Desarrollo de algoritmos paralelos para la recuperación por contenido en imágenes médicas.',
            'descripcion'       => 'Los sistemas de recuperación de imágenes basadas en el contenido (Content-based image retrieval – CBIR) se refieren a la capacidad de recuperar imágenes considerando el contenido de las mismas. Dada una imagen de consulta, el objetivo de un sistema CBIR es buscar dentro de una base de datos y recuperar las “n” imágenes más similares a aquella dada en la consulta, basado en algún criterio definido. El presente trabajo de investigación está orientado a la generación de vectores de características de un sistema CBIR orientando la aplicación final para base de datos de imágenes médicas. Un vector de características es una representación numérica de una imagen, o de una porción de ella, sobre sus características más representativas. Este vector de características es un vector n-dimensional que contiene elementos cuyos valores describen en forma sucinta el contenido de una imagen. Esta nueva representación de la imagen puede ser almacenada en una base de datos y así permitir una rápida recuperación de imágenes. Una alternativa para facilitar este proceso es utilizar técnicas de transformación de dominio. La principal ventaja de una transformación, es su efectiva caracterización de las propiedades locales de la imagen. Hace pocos años atrás que investigadores de las áreas de matemática aplicada y de procesamiento de señales desarrollaron una técnica de transformación de señales, denominada de wavelet para la representación multi-escala y análisis de señales. Las transformadas de wavelets, a diferencia de la tradicional técnica de Fourier, localizan la información en el espacio de tiempo-frecuencia, en forma particular, tienen una capacidad para intercambiar una resolución por otra, lo cual hace de ellas especialmente indicadas para el análisis de señales en distintas bandas de frecuencia, donde cada resolución tiene su correspondiente escala. Estas transformadas fueron aplicadas con mucho éxito en aplicaciones como compresión de imágenes, mejoramiento, análisis, clasificación y recuperación. Una de las privilegiadas áreas de aplicación donde estas propiedades fueron encontradas como relevantes es el área médica. En este proyecto se describe una estrategia CBIR para base de datos de imágenes médicas a fin de extraer características basadas en descomposición multi-resolución, bajo plataforma GPU aplicando algoritmos paralelos. Aspecto importante de la presente investigación está en cómo hacer para caracterizar (indexar) las imágenes de forma que el proceso de recuperación pueda retornar las imágenes visualmente más similares en el dominio de interés y en forma eficiente, en términos de recurso computacional.',
            'num_entregables'   => 4,
            'fecha_ini'         => '2017-10-05',
            'fecha_fin'         => '2017-10-15',
            'id_grupo'          => 1,
            'id_area'           => 5,
            'id_status'         => 1,
        ]);

        DB::table('projects')->insert([
            'nombre'            => 'Analysis of spatio-temporal data to extract complex patterns.',
            'descripcion'       => 'In everyday life, we can observe many phenomena occurring in space and time simultaneously. For example, the movements of a person associate spatial information (e.g. the departure and arrival coordinates) and temporal information (e.g. the departure and arrival dates). Other applications, with more complex dynamics, are much more difficult to analyze. It is the case of  spread of infectious disease, which associates spatial and temporal information such as the number of patients, environmental or entomological data.  Yuang describes this concept of dynamics as a “set of dynamic forces impacting the behavior of a system and components, individually and collectively”. In this project, we focus on spatio-temporal data mining methods to better understand the dynamics of complex systems for epidemiological surveillance. In the case of dengue or malaria epidemics, public health experts know that the evolution of the disease depends on environmental factors (e.g. climate, areas with water points, mangroves…) and  interactions between human and vector transmission (e.g. the mosquito that carries the disease). However, the impact of environmental factors and their interactions remain unclear. To address these issues, spatio-temporal data mining provides highly relevant solutions through the identification of relationships among variables and events, characterized in space and time without a priori hypothesis. For example, in our context, we will discover combinations of changes in environmental factors that lead epidemic peaks in specific spatial configurations. However, we know that existing methods are not completely adapted to our problem. For this reason, we will propose, in this project, new algorithms to extract spatio-temporal patterns. These algorithms can be used for analysis by health care professionals, to better understand how environmental factors influence the development of epidemics.',
            'num_entregables'   => 4,
            'fecha_ini'         => '2017-10-05',
            'fecha_fin'         => '2017-10-15',
            'id_grupo'          => 1,
            'id_area'           => 6,
            'id_status'         => 1,
        ]);
    }
}
