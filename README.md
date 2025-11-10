# 🎨 Sistema Paints

Sistema de gestión integral para cadena de tiendas de pinturas desarrollado en Laravel 11. Proyecto final del curso de Programación Web - Universidad Mesoamericana Quetzaltenango.

## 📖 Descripción

Sistema web completo para la administración de ventas, inventario, cotizaciones y facturación de una cadena de pinturas con múltiples sucursales en Guatemala. Permite gestionar productos con historial de precios, clientes, proveedores, y todo lo necesario para operar una tienda de pinturas profesional.

---

## ✨ Características

### Fase 1 - Módulos CRUD Completados ✅

#### **1. Gestión de Clientes**
- Registro completo con NIT, nombre, teléfono, email
- Control de promociones activas
- Estado activo/inactivo
- Validación de datos

#### **2. Gestión de Proveedores**
- Información de empresa proveedora
- Datos de contacto (persona, teléfono, email)
- Dirección completa
- Estado activo/inactivo

#### **3. Gestión de Sucursales**
- 6 sucursales distribuidas en Guatemala
- Coordenadas GPS (latitud/longitud)
- Información de contacto por sucursal
- Preparado para módulo de localización

#### **4. Gestión de Productos** ⭐
- CRUD completo de productos
- **Gestión de imágenes** con vista previa
- **Historial automático de precios**
- Cálculo de margen de ganancia
- Relaciones con:
  - Categorías
  - Marcas
  - Colores
  - Unidades de medida
- Control de stock mínimo
- Porcentaje de descuento
- Datos técnicos (duración, cobertura)

#### **5. Gestión de Categorías**
- Organización de productos por categoría
- Descripción de cada categoría
- Estado activo/inactivo

#### **6. Gestión de Marcas**
- Registro de marcas de pinturas
- País de origen
- Descripción
- Estado activo/inactivo

#### **7. Gestión de Tipos de Pago**
- Efectivo, tarjeta, cheque, etc.
- Preparado para módulo de facturación
- Descripción de cada tipo

#### **8. Gestión de Usuarios**
- Registro de usuarios del sistema
- 3 perfiles de acceso:
  - **Digitador:** Alimentar el sistema
  - **Cajero:** Autorizar ventas
  - **Gerente:** Acceso completo y reportes
- Control de último acceso
- Intentos de login
- Estado activo/inactivo

---

### Próximas Fases 🚧

#### **Fase 2 - Sistema de Autenticación**
- Login con username/password
- Control de sesiones
- Middleware de protección de rutas
- Permisos por perfil de usuario

#### **Fase 3 - Módulo de Facturación**
- Crear facturas con múltiples productos
- Series de facturas por sucursal
- Cálculo automático de IVA
- Medios de pago múltiples
- Descuentos por producto y por factura

#### **Fase 4 - Cotizaciones**
- Crear cotizaciones
- Generar PDF con logo de empresa
- Convertir cotización a factura
- Envío por email

#### **Fase 5 - Reportes** (10 tipos)
- Ventas por periodo
- Productos más vendidos
- Inventario actual
- Clientes frecuentes
- Proveedores activos
- Movimientos de stock
- Utilidades por producto
- Ventas por sucursal
- Exportación a Excel y PDF

#### **Fase 6 - Módulo Web Público**
- Catálogo de productos en línea
- Carrito de compras
- Registro de clientes
- Localización GPS de sucursales
- Cotizaciones en línea

---

## 🛠️ Tecnologías Utilizadas

### Backend
- **Laravel 11** - Framework PHP
- **PHP 8.2** - Lenguaje de programación
- **MySQL** - Base de datos relacional
- **Eloquent ORM** - Manejo de base de datos

### Frontend
- **Bootstrap 5** - Framework CSS
- **Bootstrap Icons** - Iconografía
- **JavaScript Vanilla** - Interactividad
- **Blade Templates** - Motor de plantillas

### Herramientas
- **Composer** - Gestor de dependencias PHP
- **Git & GitHub** - Control de versiones
- **XAMPP** - Servidor local de desarrollo

---

## 📊 Estructura de Base de Datos

### Tablas Principales
- `productos` - Catálogo de productos
- `historial_precios` - Control de cambios de precio
- `categorias_productos` - Categorías
- `marcas` - Marcas de pinturas
- `colores` - Colores disponibles
- `unidades_medida` - Galón, litro, cuarto, etc.
- `clientes` - Base de clientes
- `proveedores` - Proveedores de productos
- `sucursales` - Sucursales de la cadena
- `bodegas` - Bodegas por sucursal
- `usuarios` - Usuarios del sistema
- `tipos_pago` - Métodos de pago

### Tablas de Transacciones (Preparadas para Fase 2)
- `facturas` - Facturas de venta
- `detalle_facturas` - Productos por factura
- `cotizaciones` - Cotizaciones
- `detalle_cotizaciones` - Productos por cotización
- `movimientos_inventario` - Control de stock
- `stock_bodega` - Existencias por bodega

**Total:** 33 tablas completamente relacionadas

---

## 🚀 Instalación

### Requisitos Previos
- PHP >= 8.2
- Composer
- MySQL >= 5.7
- XAMPP (recomendado) o servidor Apache/Nginx
- Git

### Paso 1: Clonar el Repositorio

```bash
git clone https://github.com/AlexP3rez/sistema-paints.git
cd sistema-paints
```

### Paso 2: Instalar Dependencias

```bash
composer install
```

### Paso 3: Configurar Variables de Entorno

```bash
# Copiar archivo de ejemplo
copy .env.example .env

# Generar clave de aplicación
php artisan key:generate
```

### Paso 4: Configurar Base de Datos

Edita el archivo `.env` con tus credenciales:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistema_paints_final
DB_USERNAME=root
DB_PASSWORD=
```

### Paso 5: Crear Base de Datos

Desde phpMyAdmin o MySQL:

```sql
CREATE DATABASE sistema_paints_final CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### Paso 6: Ejecutar Migraciones y Seeders

```bash
# Ejecutar todas las migraciones
php artisan migrate

# Cargar datos de prueba
php artisan db:seed

# O todo en un solo comando
php artisan migrate:fresh --seed
```

### Paso 7: Crear Enlace de Storage (Para imágenes)

```bash
php artisan storage:link
```

### Paso 8: Iniciar Servidor

```bash
php artisan serve
```

### Paso 9: Acceder al Sistema

Abre tu navegador en:
```
http://127.0.0.1:8000
```

---

## 👥 Usuarios de Prueba

El sistema carga estos usuarios por defecto:

| Username | Password | Perfil | Descripción |
|----------|----------|--------|-------------|
| admin | admin123 | Gerente | Acceso completo |
| digitador | digitador123 | Digitador | Ingreso de datos |
| cajero | cajero123 | Cajero | Ventas y facturas |

---

## 📁 Estructura del Proyecto

```
sistema-paints/
├── app/
│   ├── Http/
│   │   └── Controllers/          # 8 Controladores CRUD
│   │       ├── ClienteController.php
│   │       ├── ProveedorController.php
│   │       ├── SucursalController.php
│   │       ├── ProductoController.php
│   │       ├── CategoriaController.php
│   │       ├── MarcaController.php
│   │       ├── TipoPagoController.php
│   │       └── UsuarioController.php
│   │
│   └── Models/                    # 12 Modelos Eloquent
│       ├── Cliente.php
│       ├── Proveedor.php
│       ├── Sucursal.php
│       ├── Producto.php
│       ├── HistorialPrecio.php
│       ├── Categoria.php
│       ├── Marca.php
│       ├── Color.php
│       ├── UnidadMedida.php
│       ├── TipoPago.php
│       └── Usuario.php
│
├── database/
│   ├── migrations/               # 33 Migraciones
│   └── seeders/                  # 11 Seeders (67 registros)
│       ├── UnidadMedidaSeeder.php
│       ├── CategoriaSeeder.php
│       ├── ColorSeeder.php
│       ├── MarcaSeeder.php
│       ├── TipoPagoSeeder.php
│       ├── ClienteSeeder.php
│       ├── ProveedorSeeder.php
│       ├── SucursalSeeder.php
│       ├── UsuarioSeeder.php
│       └── ProductoSeeder.php
│
├── resources/
│   └── views/                    # 32 Vistas Blade
│       ├── layouts/
│       │   └── app.blade.php     # Layout principal
│       ├── clientes/             # 4 vistas (index, create, edit, show)
│       ├── proveedores/          # 4 vistas
│       ├── sucursales/           # 4 vistas
│       ├── productos/            # 4 vistas
│       ├── categorias/           # 4 vistas
│       ├── marcas/               # 4 vistas
│       ├── tipos-pago/           # 4 vistas
│       └── usuarios/             # 4 vistas
│
├── routes/
│   └── web.php                   # Rutas del sistema
│
├── storage/
│   └── app/
│       └── public/
│           └── productos/        # Imágenes de productos
│
└── public/
    └── storage/                  # Enlace simbólico (storage:link)
```

---

## 🎯 Funcionalidades por Módulo

### Productos (Módulo Destacado)

#### Características:
- ✅ CRUD completo
- ✅ Upload de imágenes con vista previa
- ✅ Validación de tipos de archivo (JPG, PNG, WEBP)
- ✅ Historial automático de precios
- ✅ Cálculo de margen de ganancia
- ✅ Relaciones con categorías, marcas, colores
- ✅ Control de stock mínimo
- ✅ Datos técnicos (duración, cobertura)

#### Historial de Precios:
El sistema registra automáticamente:
- Precio anterior con fecha de finalización
- Precio nuevo con fecha de inicio
- Motivo del cambio
- Estado (Activo/Inactivo)

Esto permite:
- Auditoría completa de precios
- Análisis de variaciones
- Reportes históricos

---

## 🔧 Comandos Útiles

### Desarrollo

```bash
# Limpiar caché
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Ver rutas
php artisan route:list

# Recargar base de datos
php artisan migrate:fresh --seed

# Crear enlace de storage
php artisan storage:link
```

### Base de Datos

```bash
# Crear migración
php artisan make:migration nombre_migracion

# Crear seeder
php artisan make:seeder NombreSeeder

# Ejecutar seeder específico
php artisan db:seed --class=NombreSeeder
```

### Modelos y Controladores

```bash
# Crear modelo
php artisan make:model NombreModelo

# Crear controlador resource
php artisan make:controller NombreController --resource
```

---


## 🐛 Solución de Problemas

### Error: "SQLSTATE[HY000] [1049] Unknown database"
**Solución:** Crea la base de datos manualmente:
```sql
CREATE DATABASE sistema_paints_final;
```

### Error: "View [layouts.app] not found"
**Solución:** Verifica que existe el archivo:
```
resources/views/layouts/app.blade.php
```

### Error: Las imágenes no se muestran
**Solución:** Ejecuta el comando storage:link:
```bash
php artisan storage:link
```

### Error: "Class 'HistorialPrecio' not found"
**Solución:** Ejecuta:
```bash
composer dump-autoload
```

---

## 📝 Notas de Desarrollo

### Convenciones de Código
- **Nombres de variables:** camelCase
- **Nombres de clases:** PascalCase
- **Nombres de archivos:** snake_case
- **Rutas:** kebab-case

### Validaciones
Todos los formularios tienen validación en dos niveles:
1. **Frontend:** HTML5 + JavaScript
2. **Backend:** Laravel Request Validation

### Base de Datos
- Motor: InnoDB
- Charset: utf8mb4
- Collation: utf8mb4_unicode_ci
- Foreign Keys: ON DELETE CASCADE / SET NULL

---

## 📅 Cronograma del Proyecto

| Fase | Descripción | Estado | Fecha |
|------|-------------|--------|-------|
| **Fase 1** | CRUDs básicos | ✅ Completado | 10/11/2025 |
| Fase 2 | Autenticación | ⏳ Pendiente | - |
| Fase 3 | Facturación | ⏳ Pendiente | - |
| Fase 4 | Cotizaciones | ⏳ Pendiente | - |
| Fase 5 | Reportes | ⏳ Pendiente | - |
| Fase 6 | Web Público | ⏳ Pendiente | - |

---

## 👨‍💻 Autor

**Alex Perez**
- GitHub: [@AlexP3rez](https://github.com/AlexP3rez)
- Proyecto: Sistema Paints
- Universidad: Universidad Mesoamericana
- Curso: Programación Web - 6to Semestre
- Año: 2025

---

## 📄 Licencia

Este es un proyecto académico desarrollado para fines educativos.

---


## 🔄 Actualizaciones

### Versión 1.0.0 (10/11/2025)
- ✅ Implementación de 8 módulos CRUD
- ✅ Sistema de gestión de imágenes
- ✅ Historial automático de precios
- ✅ Base de datos completa (33 tablas)
- ✅ Seeders con datos de prueba
- ✅ Diseño responsive con Bootstrap 5

---

**⭐ Si te gusta este proyecto, dale una estrella en GitHub!**