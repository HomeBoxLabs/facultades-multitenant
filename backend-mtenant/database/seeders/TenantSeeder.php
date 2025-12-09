<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\Programa;
use App\Models\Autoridad;
use App\Models\Documento;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear Facultad de Ingeniería Electrónica
        $ingenieria = Tenant::create([
            'nombre' => 'Facultad de Ingeniería Electrónica',
            'subdomain' => 'ingenieria',
            'color_primario' => '#3b82f6',
            'color_secundario' => '#1e40af',
            'color_acento' => '#60a5fa',
            'presentacion_titulo' => 'Bienvenidos a la Facultad de Ingeniería Electrónica',
            'presentacion_texto' => 'Somos una facultad comprometida con la excelencia académica y la formación de profesionales altamente capacitados en las áreas de ingeniería electrónica. Nuestra misión es contribuir al desarrollo tecnológico y científico del país mediante la investigación, innovación y el servicio a la comunidad.',
            'historia' => 'Fundada en 1985, la Facultad de Ingeniería Electrónica ha sido pionera en la formación de profesionales en diversas ramas de la ingeniería electrónica. Con más de 35 años de trayectoria, hemos graduado a miles de ingenieros que hoy contribuyen al desarrollo del país y el mundo.',
            'mision' => 'Formar profesionales íntegros y competentes en ingeniería electrónica, con sólidos conocimientos científicos, tecnológicos y humanísticos, capaces de contribuir al desarrollo sostenible de la sociedad mediante la investigación, innovación y el servicio.',
            'vision' => 'Ser una facultad líder a nivel nacional e internacional, reconocida por la excelencia académica, la investigación de calidad y la formación de profesionales competitivos que impulsen el desarrollo tecnológico y científico en el área de ingeniería electrónica.',
            'propositos' => 'Formar profesionales de excelencia en ingeniería electrónica con capacidades para diseñar, implementar y gestionar sistemas tecnológicos innovadores que contribuyan al desarrollo sostenible. Fomentar la investigación científica y tecnológica en áreas estratégicas de la electrónica, promoviendo la generación de conocimiento aplicable a las necesidades del entorno. Establecer vínculos con el sector productivo para facilitar la inserción laboral de nuestros egresados y contribuir al desarrollo regional y nacional.',
            'email' => 'info@facultad.edu',
            'telefono' => '+1234567890',
            'direccion' => 'Av. Universidad 123, Ciudad',
            'ofrecemos' => [
                [
                    'titulo' => 'Educación de Calidad',
                    'descripcion' => 'Programas académicos acreditados con docentes altamente calificados',
                    'imagen' => null
                ],
                [
                    'titulo' => 'Laboratorios Modernos',
                    'descripcion' => 'Equipamiento de última generación para prácticas y proyectos',
                    'imagen' => null
                ],
                [
                    'titulo' => 'Investigación',
                    'descripcion' => 'Grupos de investigación activos en diversas áreas de la ingeniería',
                    'imagen' => null
                ],
                [
                    'titulo' => 'Vinculación Empresarial',
                    'descripcion' => 'Convenios con empresas líderes para prácticas y empleabilidad',
                    'imagen' => null
                ]
            ],
            'cifras' => [
                [
                    'icon' => 'bi bi-person-workspace',
                    'number' => '1,500',
                    'label' => 'Estudiantes'
                ],
                [
                    'icon' => 'bi bi-people-fill',
                    'number' => '47',
                    'label' => 'Docentes'
                ],
                [
                    'icon' => 'bi bi-easel2',
                    'number' => '40',
                    'label' => 'Docentes Investigadores'
                ],
                [
                    'icon' => 'bi bi-journal-text',
                    'number' => '450',
                    'label' => 'Tesis Sustentadas'
                ]
            ],
            'plan_estudios' => [
                [
                    'titulo' => 'Pregrado',
                    'contenido' => 'Nuestros programas de pregrado ofrecen una formación integral en ingeniería electrónica, combinando teoría y práctica mediante laboratorios especializados, proyectos de investigación y vinculación con la industria. Los estudiantes desarrollan competencias en diseño de sistemas electrónicos, programación, automatización y control de procesos.'
                ],
                [
                    'titulo' => 'Posgrado',
                    'contenido' => 'Los programas de posgrado están orientados a la especialización y profundización en áreas específicas de la ingeniería electrónica, incluyendo maestrías en sistemas embebidos, telecomunicaciones avanzadas, y automatización industrial. Nuestros egresados de posgrado lideran proyectos de innovación tecnológica en empresas e instituciones de alto nivel.'
                ]
            ],
            'lineas_investigacion' => [
                [
                    'icon' => 'bi bi-code-slash',
                    'title' => 'Desarrollo de Software',
                    'description' => 'Diseño e implementación de soluciones tecnológicas innovadoras con enfoque en calidad y eficiencia.'
                ],
                [
                    'icon' => 'bi bi-cpu',
                    'title' => 'Modelos Estadísticos y Algoritmos Computacionales',
                    'description' => 'Investigación en algoritmos avanzados y técnicas de modelado para análisis predictivo y toma de decisiones basada en datos.'
                ],
                [
                    'icon' => 'bi bi-diagram-3',
                    'title' => 'Redes y Comunicaciones',
                    'description' => 'Desarrollo e implementación de infraestructuras de redes eficientes y seguras para entornos empresariales y académicos.'
                ],
                [
                    'icon' => 'bi bi-database',
                    'title' => 'Bases de Datos y Analítica',
                    'description' => 'Investigación en gestión eficiente de datos, sistemas de información y tecnologías emergentes para el análisis y visualización de grandes volúmenes de información.'
                ]
            ],
            'menu' => [
                ['label' => 'Inicio', 'path' => '/'],
                ['label' => 'Sobre Nosotros', 'path' => '/sobre-nosotros'],
                ['label' => 'Programas', 'path' => '/programas'],
                ['label' => 'Autoridades', 'path' => '/autoridades'],
                ['label' => 'Documentos', 'path' => '/documentos']
            ],
            'redes_sociales' => [
                'facebook' => 'https://facebook.com/facultad.ingenieria',
                'instagram' => 'https://instagram.com/facultad.ingenieria',
                'twitter' => 'https://twitter.com/fac_ingenieria',
                'linkedin' => 'https://linkedin.com/company/facultad-ingenieria'
            ],
            'activo' => true,
        ]);

        // Programas de Ingeniería Electrónica
        $ingenieria->programas()->createMany([
            [
                'nombre' => 'Bachiller en Electrónica',
                'descripcion' => 'Programa integral que prepara a los estudiantes en teoría electrónica y aplicaciones prácticas en sistemas digitales, analógicos y de potencia.',
                'perfil_egresado' => 'Profesional capaz de analizar, diseñar e implementar sistemas electrónicos para diversos sectores industriales.',
                'campo_laboral' => 'Industrias tecnológicas, empresas de telecomunicaciones, sector automotriz, automatización industrial.',
                'duracion' => '4 años',
                'orden' => 1
            ],
            [
                'nombre' => 'Maestría en Electrónica',
                'descripcion' => 'Programa avanzado enfocado en diseño de sistemas electrónicos complejos, investigación y desarrollo tecnológico.',
                'perfil_egresado' => 'Especialista en diseño y gestión de proyectos de alta complejidad en electrónica avanzada.',
                'campo_laboral' => 'Centros de investigación, empresas de alta tecnología, desarrollo de productos innovadores.',
                'duracion' => '2 años',
                'orden' => 2
            ],
            [
                'nombre' => 'Ingeniería Electrónica',
                'descripcion' => 'Formación integral en sistemas electrónicos, telecomunicaciones y control automático con enfoque en innovación tecnológica.',
                'perfil_egresado' => 'Ingeniero capacitado para diseñar, implementar y mantener sistemas electrónicos complejos, con competencias en programación, automatización y gestión de proyectos tecnológicos.',
                'campo_laboral' => 'Industria tecnológica, telecomunicaciones, automatización industrial, investigación y desarrollo, consultoría técnica.',
                'duracion' => '5 años',
                'orden' => 3
            ]
        ]);

        // Autoridades de Ingeniería Electrónica
        $ingenieria->autoridades()->createMany([
            [
                'cargo' => 'Decano',
                'nombre' => 'Dr. Juan Pérez',
                'email' => 'decano.ingenieria@universidad.edu',
                'telefono' => '+591 3 1234568',
                'oficina' => 'Edificio Central - Oficina 301',
                'orden' => 1
            ],
            [
                'cargo' => 'Dirección de Departamento Académico',
                'nombre' => 'Dra. María García',
                'email' => 'dda.ingenieria@universidad.edu',
                'telefono' => '+591 3 1234569',
                'oficina' => 'Edificio Central - Oficina 302',
                'orden' => 2
            ],
            [
                'cargo' => 'Dirección de Escuela Profesional',
                'nombre' => 'Ing. Carlos López',
                'email' => 'dep.ingenieria@universidad.edu',
                'telefono' => '+591 3 1234570',
                'oficina' => 'Edificio de Investigación - Oficina 101',
                'orden' => 3
            ]
        ]);

        // Documentos de Ingeniería
        $ingenieria->documentos()->createMany([
            [
                'titulo' => 'Reglamento Académico',
                'descripcion' => 'Normativa que regula las actividades académicas de la facultad',
                'url' => 'documentos/reglamento-academico.pdf',
                'categoria' => 'Normativa',
                'fecha' => now()->subMonths(6)
            ],
            [
                'titulo' => 'Plan Estratégico 2024-2028',
                'descripcion' => 'Planificación estratégica de la facultad para el quinquenio',
                'url' => 'documentos/plan-estrategico-2024-2028.pdf',
                'categoria' => 'Planificación',
                'fecha' => now()->subMonths(3)
            ],
            [
                'titulo' => 'Calendario Académico 2024',
                'descripcion' => 'Calendario de actividades académicas del presente año',
                'url' => 'documentos/calendario-academico-2024.pdf',
                'categoria' => 'Académico',
                'fecha' => now()->subMonths(1)
            ]
        ]);

        // Crear Facultad de Ciencias Económicas
        $economia = Tenant::create([
            'nombre' => 'Facultad de Ciencias Económicas y Financieras',
            'subdomain' => 'economia',
            'color_primario' => '#10b981',
            'color_secundario' => '#059669',
            'color_acento' => '#34d399',
            'presentacion_titulo' => 'Facultad de Ciencias Económicas y Financieras',
            'presentacion_texto' => 'Formamos profesionales líderes en economía, finanzas y administración, comprometidos con el desarrollo económico y social del país.',
            'historia' => 'Creada en 1990, nuestra facultad se ha consolidado como referente en la formación de economistas y profesionales financieros de alto nivel.',
            'mision' => 'Formar profesionales competentes en ciencias económicas y financieras, con valores éticos y compromiso social, capaces de contribuir al desarrollo económico sostenible.',
            'vision' => 'Ser una facultad reconocida por su excelencia académica en ciencias económicas y financieras, formando líderes que transformen la economía nacional.',
            'email' => 'economia@universidad.edu',
            'telefono' => '+591 3 7654321',
            'direccion' => 'Av. Económica 456, Campus Universitario',
            'ofrecemos' => [
                [
                    'titulo' => 'Formación Integral',
                    'descripcion' => 'Programas que combinan teoría y práctica empresarial',
                    'imagen' => null
                ],
                [
                    'titulo' => 'Convenios Internacionales',
                    'descripcion' => 'Intercambios con universidades de prestigio mundial',
                    'imagen' => null
                ]
            ],
            'redes_sociales' => [
                'facebook' => 'https://facebook.com/facultad.economia',
                'linkedin' => 'https://linkedin.com/company/facultad-economia'
            ],
            'activo' => true,
        ]);

        // Programas de Economía
        $economia->programas()->createMany([
            [
                'nombre' => 'Economía',
                'descripcion' => 'Formación sólida en teoría económica y análisis de políticas públicas.',
                'perfil_egresado' => 'Profesional capaz de analizar fenómenos económicos y diseñar políticas económicas.',
                'campo_laboral' => 'Ministerios, bancos centrales, organismos internacionales, consultoría económica.',
                'duracion' => '5 años',
                'orden' => 1
            ],
            [
                'nombre' => 'Administración de Empresas',
                'descripcion' => 'Programa enfocado en la gestión empresarial y liderazgo organizacional.',
                'perfil_egresado' => 'Profesional capaz de dirigir empresas y desarrollar estrategias de negocio.',
                'campo_laboral' => 'Empresas privadas, emprendimientos, consultoría de negocios.',
                'duracion' => '5 años',
                'orden' => 2
            ]
        ]);

        // Autoridades de Economía
        $economia->autoridades()->createMany([
            [
                'cargo' => 'Decana',
                'nombre' => 'Dra. María Elena Vargas',
                'email' => 'decana.economia@universidad.edu',
                'telefono' => '+591 3 7654322',
                'orden' => 1
            ],
            [
                'cargo' => 'Vicedecano',
                'nombre' => 'Mg. Luis Fernando Castro',
                'email' => 'vicedecano.economia@universidad.edu',
                'telefono' => '+591 3 7654323',
                'orden' => 2
            ]
        ]);

        // Documentos de Economía
        $economia->documentos()->createMany([
            [
                'titulo' => 'Reglamento de Titulación',
                'descripcion' => 'Normativa para procesos de titulación',
                'url' => 'documentos/reglamento-titulacion.pdf',
                'categoria' => 'Normativa',
                'fecha' => now()->subMonths(4)
            ]
        ]);
    }
}
