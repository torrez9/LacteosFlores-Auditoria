#  Bitácora de Auditoría — Sistema Lácteos Flores
**Proyecto:** Sistema de Facturación e Inventario — Lácteos Flores  
**Auditores:** Jeysson Stanley Alcántara Rizo, Emelly Mercedez Arauz Dávila, Kebin Aníbal Baldizón  
**Rama:** auditoria  
**Fecha de inicio:** 21/10/2025  

---

## Fase 0 — Preparación
| Fecha | Acción | Resultado | Evidencia |
|--------|--------|------------|-----------|
| 21/10/25 | Creación de rama `auditoria` | Rama creada correctamente y sincronizada con remoto | — |
| 21/10/25 | Creación de carpetas `/audit/...` | Estructura lista: notes, screens, reports, scripts | Captura PowerShell ok |

---

## Fase 1 — Reconocimiento
| Fecha | Acción | Herramienta/Comando | Resultado | Evidencia |
|--------|--------|---------------------|------------|-----------|
| 21/10/25 | Levantar servidor Laravel | `php artisan serve` | Servidor activo en http://127.0.0.1:8000 | `audit/screens/login_ok.png` |
| 21/10/25 | Listado de rutas del sistema | `php artisan route:list` | Rutas listadas correctamente | `audit/reports/route-list.txt` |
| 21/10/25 | Escaneo de secretos y claves | `gitleaks detect` | Sin hallazgos críticos (pendiente revisión manual) | `audit/reports/gitleaks.json` |
| 23/10/25 | Auditoría de dependencias PHP | Composer Audit | Reporte JSON generado con o sin hallazgos | composer-audit.json |
| 23/10/25 | Auditoría de dependencias PHP | Composer Audit | Se detectaron múltiples vulnerabilidades en dependencias del sistema Laravel. | composer-audit.json |

---

## Observaciones generales
- El entorno local funciona correctamente.  
- El proyecto arranca sin errores de dependencias.  
- Se completó la estructura inicial de auditoría.  
- Pendiente iniciar fase SAST (CodeQL y DevSkim).
