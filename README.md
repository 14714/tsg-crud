# TSG Group - Evaluación

Proyecto desarrollado en Laravel 12 para Evaluación de TSG.

## 🚀 Requisitos

- PHP 8.3
- Composer (https://getcomposer.org/download/)
- MySQL
- Laragon (https://laragon.org/download/)
- Postman (https://www.postman.com/downloads/)

## ⚙️ Instalación

1. Clonar el repositorio:
   ```bash
   git clone https://github.com/14714/tsg-crud
   cd nombre-del-proyecto
   composer install
   ```

2. Inicializar Laragon, presionando `Iniciar Todo`. 

3. Luego abrir `Base de Datos` en la cual debera crear una nueva base de datos.

4. Luego copiar archivo .env desde ejemplo, en la terminal puede ejecutar:
   ```bash
      cp .env.example .env
   ```
   Debe modificar los siguientes datos según el paso anterior en la configuración de la base de datos:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=tsg-crud
   DB_USERNAME=root
   DB_PASSWORD=
   ```


5. Luego se deben correr los siguientes comandos:
   ```bash
   php artisan key:generate
   php artisan optimize
   php artisan migrate
   ```

6. Abrir Postman e importar el archivo en la raiz del repositorio `data.postman_collection.json`

7. Ahora ya puedes interactuar con los requests de la API mediante Postman.