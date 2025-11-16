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
        // Crear Facultad de Ingeniería
        $ingenieria = Tenant::create([
            'nombre' => 'Facultad de Ingeniería',
            'subdomain' => 'ingenieria',
            'color_primario' => '#3b82f6',
            'color_secundario' => '#1e40af',
            'color_acento' => '#60a5fa',
            'presentacion_titulo' => 'Bienvenidos a la Facultad de Ingeniería',
            'presentacion_texto' => 'Somos una facultad comprometida con la excelencia académica y la formación de profesionales altamente capacitados en las áreas de ingeniería. Nuestra misión es contribuir al desarrollo tecnológico y científico del país mediante la investigación, innovación y el servicio a la comunidad.',
            'historia' => 'Fundada en 1985, la Facultad de Ingeniería ha sido pionera en la formación de profesionales en diversas ramas de la ingeniería. Con más de 35 años de trayectoria, hemos graduado a miles de ingenieros que hoy contribuyen al desarrollo del país y el mundo.',
            'mision' => 'Formar profesionales íntegros y competentes en ingeniería, con sólidos conocimientos científicos, tecnológicos y humanísticos, capaces de contribuir al desarrollo sostenible de la sociedad mediante la investigación, innovación y el servicio.',
            'vision' => 'Ser una facultad líder a nivel nacional e internacional, reconocida por la excelencia académica, la investigación de calidad y la formación de profesionales competitivos que impulsen el desarrollo tecnológico y científico.',
            'email' => 'ingenieria@universidad.edu',
            'telefono' => '+591 3 1234567',
            'direccion' => 'Av. Principal 123, Campus Universitario',
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
            'redes_sociales' => [
                'facebook' => 'https://facebook.com/facultad.ingenieria',
                'instagram' => 'https://instagram.com/facultad.ingenieria',
                'twitter' => 'https://twitter.com/fac_ingenieria',
                'linkedin' => 'https://linkedin.com/company/facultad-ingenieria'
            ],
            'activo' => true,
        ]);

        // Programas de Ingeniería
        $ingenieria->programas()->createMany([
            [
                'nombre' => 'Ingeniería de Sistemas',
                'descripcion' => 'Programa enfocado en el desarrollo de sistemas de información, software y soluciones tecnológicas innovadoras.',
                'perfil_egresado' => 'Profesional capaz de diseñar, desarrollar e implementar sistemas de información, aplicaciones web y móviles, así como gestionar proyectos tecnológicos.',
                'campo_laboral' => 'Empresas de desarrollo de software, departamentos de TI, consultoría tecnológica, emprendimientos digitales.',
                'duracion' => '5 años',
                'orden' => 1
            ],
            [
                'nombre' => 'Ingeniería Civil',
                'descripcion' => 'Formación integral en diseño, construcción y gestión de obras civiles e infraestructura.',
                'perfil_egresado' => 'Profesional capacitado para diseñar, ejecutar y supervisar proyectos de infraestructura, construcción y obras civiles.',
                'campo_laboral' => 'Empresas constructoras, consultorías de ingeniería, organismos públicos, gestión de proyectos.',
                'duracion' => '5 años',
                'orden' => 2
            ],
            [
                'nombre' => 'Ingeniería Industrial',
                'descripcion' => 'Programa orientado a la optimización de procesos, gestión de operaciones y mejora continua.',
                'perfil_egresado' => 'Profesional capaz de optimizar procesos productivos, gestionar la calidad y dirigir proyectos industriales.',
                'campo_laboral' => 'Industrias manufactureras, empresas de servicios, logística, consultoría en procesos.',
                'duracion' => '5 años',
                'orden' => 3
            ]
        ]);

        // Autoridades de Ingeniería
        $ingenieria->autoridades()->createMany([
            [
                'cargo' => 'Decano',
                'nombre' => 'Dr. Carlos Méndez Salazar',
                'email' => 'decano.ingenieria@universidad.edu',
                'telefono' => '+591 3 1234568',
                'oficina' => 'Edificio Central - Oficina 301',
                'orden' => 1
            ],
            [
                'cargo' => 'Vicedecano Académico',
                'nombre' => 'Mg. Ana Patricia Rivas',
                'email' => 'vicedecano.academico@universidad.edu',
                'telefono' => '+591 3 1234569',
                'oficina' => 'Edificio Central - Oficina 302',
                'orden' => 2
            ],
            [
                'cargo' => 'Director de Investigación',
                'nombre' => 'PhD. Roberto Gutiérrez',
                'email' => 'investigacion.ingenieria@universidad.edu',
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
