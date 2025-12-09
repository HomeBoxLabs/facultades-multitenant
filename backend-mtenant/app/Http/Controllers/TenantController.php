<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TenantController extends Controller
{
    /**
     * Obtener datos del tenant actual
     * Por defecto retorna el primer tenant, pero puede ser modificado
     * para obtener según subdominio, parámetro, sesión, etc.
     */
    public function getCurrent(Request $request): JsonResponse
    {
        // Opción 1: Obtener tenant por ID desde query string
        if ($request->has('tenant_id')) {
            $tenant = Tenant::with(['programas', 'autoridades', 'documentos'])
                ->where('activo', true)
                ->findOrFail($request->tenant_id);
        }
        // Opción 2: Obtener por subdominio
        elseif ($request->has('subdomain')) {
            $tenant = Tenant::with(['programas', 'autoridades', 'documentos'])
                ->where('subdomain', $request->subdomain)
                ->where('activo', true)
                ->firstOrFail();
        }
        // Por defecto: obtener el primer tenant activo
        else {
            $tenant = Tenant::with(['programas', 'autoridades', 'documentos'])
                ->where('activo', true)
                ->firstOrFail();
        }

        return response()->json([
            'data' => $this->formatTenantData($tenant)
        ]);
    }

    /**
     * Obtener un tenant específico por ID
     */
    public function show($id): JsonResponse
    {
        $tenant = Tenant::with(['programas', 'autoridades', 'documentos'])
            ->where('activo', true)
            ->findOrFail($id);

        return response()->json([
            'data' => $this->formatTenantData($tenant)
        ]);
    }

    /**
     * Listar todos los tenants activos
     */
    public function index(): JsonResponse
    {
        $tenants = Tenant::where('activo', true)
            ->orderBy('nombre')
            ->get();

        return response()->json([
            'data' => $tenants->map(function ($tenant) {
                return [
                    'id' => $tenant->id,
                    'nombre' => $tenant->nombre,
                    'subdomain' => $tenant->subdomain,
                    'logo' => $tenant->logo_url,
                ];
            })
        ]);
    }

    /**
     * Formatear datos del tenant para el frontend
     */
    private function formatTenantData(Tenant $tenant): array
    {
        return [
            'id' => $tenant->id,
            'nombre' => $tenant->nombre,
            'subdomain' => $tenant->subdomain,
            'logo' => $tenant->logo_url,
            'banner' => $tenant->banner_url,
            'color_primario' => $tenant->color_primario,
            'color_secundario' => $tenant->color_secundario,
            'color_acento' => $tenant->color_acento,
            'menu' => $tenant->menu ?? $this->getDefaultMenu(),
            'presentacion_titulo' => $tenant->presentacion_titulo,
            'presentacion_texto' => $tenant->presentacion_texto,
            'ofrecemos' => $tenant->ofrecemos ?? [],
            'cifras' => $tenant->cifras ?? [],
            'historia' => $tenant->historia,
            'mision' => $tenant->mision,
            'vision' => $tenant->vision,
            'propositos' => $tenant->propositos,
            'plan_estudios' => $tenant->plan_estudios ?? [],
            'lineas_investigacion' => $tenant->lineas_investigacion ?? [],
            'organigrama' => $tenant->organigrama_url,
            'programas' => $tenant->programas->map(function ($programa) {
                return [
                    'id' => $programa->id,
                    'nombre' => $programa->nombre,
                    'descripcion' => $programa->descripcion,
                    'perfil_egresado' => $programa->perfil_egresado,
                    'campo_laboral' => $programa->campo_laboral,
                    'duracion' => $programa->duracion,
                    'malla_curricular' => $programa->malla_curricular_url ?? $programa->malla_curricular,
                ];
            }),
            'autoridades' => $tenant->autoridades->map(function ($autoridad) {
                return [
                    'id' => $autoridad->id,
                    'cargo' => $autoridad->cargo,
                    'nombre' => $autoridad->nombre,
                    'email' => $autoridad->email,
                    'telefono' => $autoridad->telefono,
                    'foto' => $autoridad->foto_url,
                    'oficina' => $autoridad->oficina,
                ];
            }),
            'documentos' => $tenant->documentos->map(function ($documento) {
                return [
                    'id' => $documento->id,
                    'titulo' => $documento->titulo,
                    'descripcion' => $documento->descripcion,
                    'url' => $documento->archivo_url ?? $documento->url,
                    'categoria' => $documento->categoria,
                    'fecha' => $documento->fecha?->format('Y-m-d'),
                ];
            }),
            'email' => $tenant->email,
            'telefono' => $tenant->telefono,
            'direccion' => $tenant->direccion,
            'redes_sociales' => $tenant->redes_sociales ?? new \stdClass(),
        ];
    }

    /**
     * Menú por defecto
     */
    private function getDefaultMenu(): array
    {
        return [
            ['label' => 'Inicio', 'path' => '/'],
            ['label' => 'Sobre Nosotros', 'path' => '/sobre'],
            ['label' => 'Programas', 'path' => '/programas'],
            ['label' => 'Autoridades', 'path' => '/autoridades'],
            ['label' => 'Documentos', 'path' => '/documentos'],
        ];
    }
}
