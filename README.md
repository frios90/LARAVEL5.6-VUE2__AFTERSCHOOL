Plataforma de Gestión de Horas y Reuniones (Laravel + Vue SPA)
Descripción del Proyecto

Sistema de gestión diseñado para administrar usuarios y reuniones en el contexto de clases online. El proyecto permite a un administrador generar bloques de "horas" y compartirlas/asignarlas a diferentes usuarios dentro de la plataforma.

Los usuarios receptores pueden visualizar y estar al tanto de la agenda de sus reuniones, los horarios asignados y el estado de cada sesión.
Arquitectura Técnica

    Backend: Laravel 5.6 (MVC). Maneja la lógica de negocio, autenticación, API REST y sesiones.

    Frontend: SPA (Single Page Application) construida con Vue.js 2, manejando la interfaz posterior al inicio de sesión.

    Ruteo: Las rutas protegidas (dashboard, gestión de horas, reuniones) son controladas por Vue Router.

    Autenticación: Manejada por Laravel (sesiones tradicionales vía web.php). Una vez autenticado, Laravel sirve la vista principal que carga la SPA de Vue.

    Comunicación: El frontend Vue consume los endpoints de la API de Laravel (api.php) para todas las operaciones (CRUD de usuarios, horas, reuniones).

Requisitos del Sistema

    PHP >= 7.1.3

    Composer

    Node.js & NPM

    MySQL / MariaDB / PostgreSQL

    Servidor web (Apache/Nginx) o Laravel Valet/Homestead

Tecnologías Utilizadas
Backend (Laravel 5.6)

    laravel/framework: 5.6.*

    predis/predis (Manejo de caché/colas)

    barryvdh/laravel-debugbar (Debug en desarrollo)

    rap2hpoutre/laravel-log-viewer (Visor de logs)

Frontend (Vue 2 SPA)

    vue: ^2.5.7

    vue-router: ^3.1.3 (Enrutamiento SPA)

    vuex: ^3.3.0 (Estado global)

    axios: ^0.18 (Cliente HTTP)

    bootstrap-vue: ^2.1.0 (Componentes UI)

    vee-validate: ^3.0.11 (Validación de formularios)

    sweetalert2 / vue-sweetalert2 (Alertas)

    vue-notification / vue-toasted (Notificaciones)

    vue-moment (Formato de fechas)

    vue-js-modal (Modales)

    font-awesome: ^4.7.0 (Iconos)

    vue-tables-2 (Tablas dinámicas)

Instalación y Configuración
1. Clonar el repositorio
bash

git clone https://github.com/tu-usuario/proyecto_titulo.git
cd proyecto_titulo

2. Instalar dependencias de PHP
bash

composer install

3. Configurar entorno
bash

cp .env.example .env
php artisan key:generate

Editar el archivo .env con tus credenciales de base de datos y otras configuraciones.
4. Instalar dependencias de Node.js
bash

npm install

5. Compilar assets (frontend)
bash

# Para desarrollo (con hot-reload)
npm run hot

# Para producción
npm run production

6. Migrar y seedear la base de datos
bash

php artisan migrate --seed

7. Iniciar el servidor
bash

php artisan serve

El proyecto estará disponible en http://localhost:8000.

Control de Sesiones

    Laravel maneja la autenticación inicial mediante sesiones tradicionales (middleware web).

    Una vez que el usuario inicia sesión, Laravel devuelve la vista app.blade.php que contiene el punto de montaje de la SPA Vue (<div id="app"></div>).

    A partir de ese momento, Vue Router toma el control de la navegación interna (SPA), mientras que las peticiones a la API utilizan la sesión iniciada (gracias a que el frontend y backend comparten el mismo dominio y las cookies de sesión).

Scripts Disponibles (NPM)

    npm run dev → Desarrollo estándar.

    npm run watch → Watch de cambios en assets.

    npm run hot → Hot Module Replacement (HMR) para desarrollo rápido.

    npm run production → Compilación para producción (minificado).

Licencia

MIT
Autor(es)

[frios]

Notas Adicionales

    El proyecto hace uso de laravel-mix (Webpack) para la compilación de assets de Vue.

    Dependencias como vue-resource están presentes pero se recomienda migrar completamente a axios (ya incluido).

    bootstrap-vue permite usar componentes estilizados con Bootstrap 4 sin jQuery.

    Para entornos productivos, configurar correctamente el archivo .env (APP_ENV=production, APP_DEBUG=false) y optimizar el autoload de Composer (composer install --optimize-autoloader --no-dev).