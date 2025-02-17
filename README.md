# <div align="center"> ✧ Proyecto Laravel - CRUD de Artículos ✧ <br>
### <div align="center"> - Belén Ruiz Morales - </div>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## 📝 Descripción del Proyecto
Este proyecto esta diseñado para la gestión de artículos y etiquetas, desarrollada con Laravel y Jetstream. Permite a los usuarios crear, editar y eliminar sus propios artículo. Inplementa autenticación, autorización con políticas, CRUD con Livewire y sistema de contacto con Mailtrap.

#### RELACIONES
- Relacion 1:N entre users y artículos -> Un usuario puede tener varios artículos pero un mismo artículo pertenece a un solo usuario.
- Relacion 1:N entre tags y artículos -> Un artículo pertenece a una única etiqueta pero una misma etiqueta puede tener muchos artículos.
<br><br>
![Captura de pantalla 2025-02-16 190932](https://github.com/user-attachments/assets/754a9c0e-2c8e-40ad-9e5b-ae1e8c2e3685)
<br>

## 💻 Desarrollo del Proyecto 
1. Laravel Jetstream con Livewire para la estructura y lógica.
2. SQLite como base de datos por defecto en el entorno de desarrollo.
3. Factories y Seeders con Faker para la generación de datos de prueba.
4. Blade y Livewire para la gestión de vistas dinámicas.

### 🛠️ Lenguajes y Tecnologías
- **PHP:** Lenguaje principal.
- **Laravel:** Framework de desarrollo.
- **SQLite:** Base de Datos.
- **Livewire:** Componentes dinámicos en Laravel.
- **Blade:** Plantillas para las vistas.
- **Tailwind CSS:** Encargado de diseño visual y estilos responsivos.
- **SweetAlert:** Notificaciones.
- **Font Awesome:** Iconos.
<br><br>

##  📂 Estructura del proyecto
```
├── app/
│   ├── Http/
|   |    ├── Controllers/        # Controladores
|   |    └── Middleware/
|   ├── Livewire/                # Componentes livewire
|   |    └── Forms               # Formularios para update y create
|   ├── Mail/
│   ├── Models/                  # Modelos de base de datos
|   └── Polices/
|
├── database/
│   ├── migrations/              # Migraciones de base de datos
│   ├── seeders/                 # Generación de datos
│   └── factories/
|
├── resources/
│   ├── views/
│       ├── tags/          # Vistas relacionadas con tags
│       │   ├── create.blade.php 
│       │   ├── edit.blade.php   
│       │   └── index.blade.php  
│       ├── livewire/            # Vistas relacionadas con articles
│       │   ├── create-articles.blade.php 
│       │   └── show-users-articles.blade.php
│       ├── formcorreo/            # Vistas del formulario de contacto
│       │   └── fcontacto.blade.php
│       ├── vistasmails/            # Vistas del correo de contacto
│       │   └── vistacontacto.blade.php 
|       
├── routes/
│   ├── web.php                  # Rutas web
```

## 📖 Instalación y Configuración
```
# Clonar el repositorio
git clone https://github.com/beelenruiz/gestionDeArticulos.git

# Ingresar al directorio del proyecto
cd gestionDeArticulos

#Instalar dependencias
npm install
composer install

# Configurar variables de entorno
cp .env.example .env

# Ejecutar migraciones y seeders para generar datos iniciales
php artisan migrate --seed

#Iniciar el servidor
composer dev  (->  ejecuta a la vez php artisan serve y npm run dev)
```
Accede al proyecto en tu navegador en la dirección http://localhost:8000/.
<br><br>

## 📸 Imágenes
![image](https://github.com/user-attachments/assets/ff34c867-8071-4c6b-bb16-68521d2351a1)
![image](https://github.com/user-attachments/assets/9273e4b3-33ef-42eb-a357-bd6c3a35a4bc)

<img src="https://github.com/user-attachments/assets/80f946aa-ad68-461d-a2b7-50ef623db351" style="width: 49%; margin: 0 auto;">
<img src="https://github.com/user-attachments/assets/c9adbc44-16b8-4f07-a6dd-232f4a4dbe6f" style="width: 49%; margin: 0 auto;">
<br><br>

## 📋 Adicional
- Policy para garantizar que los usuarios solo pueden editar y borrar sus artículos.
- Middleware para restringir acceso a administradores al CRUD de tags.
- Búsqueda y ordenamiento dinámico en tablas.
- Uso de Mailtrap para probar la seccion de contacto del proyecto.

## 👥 Autora
**Belén Ruiz Morales**,  Estudiante de 2º DAW.

### ✉ Contacto
- belenrumo2005@gmail.com
- [mi perfil de linkedin](https://www.linkedin.com/in/belen-ruiz-499b8b275/)
