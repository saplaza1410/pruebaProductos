# pruebaProductos

#Para utilizar Bootstrap
se baja y se configura segun esta pagina 
https://es.stackoverflow.com/questions/358148/como-usar-bootstrap-en-laravel-7
El andamiaje Bootstrap proporcionado por Laravel se encuentra en el paquete laravel/ui, que puede instalarse usando Composer:

composer require laravel/ui
Una vez que se haya instalado el paquete laravel/ui, puedes instalar el andamiaje frontend utilizando el comando Artisan ui:

// Generar andamiaje básicos para Bootstrap ...
php artisan ui bootstrap
Instala las dependencias frontend de tu proyecto utilizando el administrador de paquetes de node (NPM):

npm install
Una vez que las dependencias se han instalado usando npm install, puedes compilar tus archivos usando Laravel Mix. El comando npm run dev procesará las instrucciones en tu archivo webpack.mix.js.

npm run dev

#para utilizar datatables 
Se descarga de acá 
https://github.com/yajra/laravel-datatables#service-provider--facade-optional-on-laravel-55
para un mejor mejor y sencillo manejo de la tablas 