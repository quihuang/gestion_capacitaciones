# Guía de Despliegue - Proyecto Gestión de Capacitaciones

Este documento proporciona una guía paso a paso para desplegar el proyecto **Gestión de Capacitaciones** en un entorno local.

## Repositorio del Proyecto

El código fuente del proyecto se encuentra en el siguiente repositorio de GitHub:
[https://github.com/quihuang/gestion_capacitaciones.git](https://github.com/quihuang/gestion_capacitaciones.git)

## Precondiciones

Asegúrate de que tu equipo cumpla con las siguientes precondiciones antes de comenzar el despliegue:

1. **XAMPP**: Debes tener **XAMPP** instalado, incluyendo:
   - **Apache**: Servidor web necesario para ejecutar la aplicación.
   - **MySQL**: Sistema de base de datos para almacenar los datos del proyecto.
   
   Puedes descargar XAMPP desde [https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html).

2. **Git**: Necesitarás **Git** para clonar el repositorio del proyecto en tu máquina local.
   - [Instalar Git](https://git-scm.com/downloads)

## Pasos de Instalación y Configuración

Sigue los pasos a continuación para desplegar el proyecto en tu entorno local.

### 1. Clonar el Repositorio

Abre una terminal y navega hasta el directorio donde deseas clonar el proyecto. Luego, ejecuta el siguiente comando para clonar el repositorio:

```bash
git clone https://github.com/quihuang/gestion_capacitaciones.git
```

### 2. Mover el Proyecto a la Carpeta de XAMPP

Una vez clonado, mueve la carpeta `gestion_capacitaciones` a la carpeta `htdocs` de XAMPP para que Apache pueda acceder al proyecto. Esto puede variar según tu sistema operativo:

- En **Windows**: Mueve la carpeta a `C:\xampp\htdocs\gestion_capacitaciones`.
- En **macOS** o **Linux**: Mueve la carpeta a `/opt/lampp/htdocs/gestion_capacitaciones`.

### 3. Crear la Base de Datos en MySQL

1. Abre **phpMyAdmin** en tu navegador: [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
2. Crea una nueva base de datos llamada `gestion_capacitaciones`.
3. Selecciona la base de datos recién creada.

### 4. Importar el Archivo de Respaldo de la Base de Datos

Una vez que hayas creado la base de datos, importa el archivo de respaldo para configurar las tablas y datos iniciales.

1. En **phpMyAdmin**, selecciona la base de datos `gestion_capacitaciones`.
2. Haz clic en la pestaña **Importar**.
3. Haz clic en **Elegir archivo** y selecciona el archivo de respaldo:
   - `sistema_gestion/config/SQL_DB_BACKUP.sql`
4. Haz clic en **Continuar** para iniciar la importación.

### 5. Configurar la Conexión a la Base de Datos

Configura la conexión a la base de datos en el archivo de configuración del proyecto.

1. Abre el archivo `config/database.php` en un editor de texto.
2. Asegúrate de que la configuración sea la correcta:

   ```php
   <?php
   class Database {
       private $host = "localhost";
       private $db_name = "gestion_capacitaciones";
       private $username = "root";
       private $password = ""; // Asegúrate de que coincida con tu configuración de MySQL
       public $conn;

       public function getConnection() {
           $this->conn = null;
           try {
               $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
               $this->conn->exec("set names utf8");
           } catch(PDOException $exception) {
               echo "Connection error: " . $exception->getMessage();
           }

           return $this->conn;
       }
   }
   ```
Cambia los valores de username y password según tu configuración local de MySQL.
Guarda el archivo después de realizar los cambios.

### 6. Iniciar Apache y MySQL

Abre el **Panel de Control de XAMPP** y haz clic en **Start** para ambos servicios:

- **Apache**: Necesario para acceder al proyecto desde el navegador.
- **MySQL**: Necesario para la conexión con la base de datos.

### 7. Acceder al Proyecto en el Navegador

Abre tu navegador y accede al proyecto usando la siguiente URL:

```plaintext
http://localhost/gestion_capacitaciones/public/index.php

