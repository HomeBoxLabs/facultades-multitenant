# 🚀 GUÍA RÁPIDA - Multi-Tenant

## ▶️ INICIAR PROYECTO (2 Terminales)

### Terminal 1 - Backend

```bash
cd backend-mtenant
php artisan serve
```

**Estará en:** http://localhost:8000

### Terminal 2 - Frontend

```bash
cd frontend-mtenant
npm run dev
```

**Estará en:** http://localhost:5173

---

## 🌐 ACCEDER A LAS FACULTADES

### Facultad de Ingeniería Electrónica (ID: 1)

```
http://localhost:5173?facultad=ingenieria
```

O por ID:

```
http://localhost:5173?tenant_id=1
```

### Facultad de Economía (ID: 2)

```
http://localhost:5173?facultad=economia
```

O por ID:

```
http://localhost:5173?tenant_id=2
```

### Sin parámetros (Tenant por defecto)

```
http://localhost:5173
```

---

## 📊 QUÉ VERÁS AL CAMBIAR DE FACULTAD

- ✅ Colores diferentes (Azul para Ingeniería, Verde para Economía)
- ✅ Nombre y descripción de la facultad
- ✅ Programas académicos diferentes
- ✅ Autoridades diferentes
- ✅ Documentos diferentes
- ✅ Datos de contacto en footer diferentes
- ✅ Redes sociales diferentes

---

## 🔧 COMANDOS ÚTILES

### Resetear Base de Datos

```bash
cd backend-mtenant
php artisan migrate:fresh --seed
```

### Ver Tenants en BD

```bash
cd backend-mtenant
php artisan tinker
>>> App\Models\Tenant::all(['id', 'nombre', 'subdomain'])
```

### Ver Rutas API

```bash
cd backend-mtenant
php artisan route:list --path=api
```

---

## 📝 ESTRUCTURA DE URLs MULTI-TENANT

| Método         | URL                                | Descripción            |
| -------------- | ---------------------------------- | ---------------------- |
| Por Facultad   | `?facultad=ingenieria`             | Más legible y amigable |
| Por ID         | `?tenant_id=1`                     | Más directo y rápido   |
| Por Subdominio | `http://ingenieria.localhost:5173` | Para producción        |
| Sin parámetros | `http://localhost:5173`            | Primer tenant activo   |

---

## ✅ CHECKLIST ANTES DE PROBAR

- [ ] Backend corriendo en puerto 8000
- [ ] Frontend corriendo en puerto 5173
- [ ] Base de datos migrada con seeders
- [ ] Abrir navegador con URL + parámetro facultad

---

## 🎯 EJEMPLO DE PRUEBA RÁPIDA

1. **Abrir 2 terminales**
2. **Terminal 1:** `cd backend-mtenant && php artisan serve`
3. **Terminal 2:** `cd frontend-mtenant && npm run dev`
4. **Navegador:** http://localhost:5173?facultad=ingenieria
5. **Cambiar a:** http://localhost:5173?facultad=economia
6. **Ver cómo cambian:** colores, contenido, programas, etc.

---

## 🆘 PROBLEMAS COMUNES

### Puerto ocupado

```bash
# Si dice "port already in use", mata el proceso:
# Windows:
netstat -ano | findstr :5173
taskkill /PID <numero> /F

# O cambia el puerto en vite.config.js
```

### API no responde

```bash
# Verifica que backend esté corriendo:
curl http://localhost:8000/api/tenant

# Debe retornar JSON con datos del tenant
```

### No se ven cambios al cambiar de facultad

```bash
# Limpia caché del navegador:
Ctrl + Shift + R (Chrome/Firefox)
Cmd + Shift + R (Mac)

# O abre en modo incógnito
```

---

¡Listo para trabajar! 🎉
