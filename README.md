# Prueba Técnica Xalok

## Tecnologías Usadas

Este proyecto ha sido desarrollado utilizando Symfony 7 y PHP 8.2. A pesar de ser el framework con el que tengo menos experiencia, decidí utilizarlo con el propósito de mostrar las fortalezas y debilidades que tendría desde el primer día en caso de ser contratado. Durante el desarrollo, he consultado la documentación oficial de Symfony y he recurrido a ChatGPT para resolver las dudas que han surgido a lo largo del proyecto.

Para el frontend, se ha empleado Bootstrap con el fin de agilizar el proceso de maquetación. Lamento el aspecto visual, ya que no tengo habilidades en diseño.

## Funcionalidades Realizadas

Se ha implementado un CRUD completo para vehículos y conductores, así como un listado de viajes. Se han creado tres controladores encargados de gestionar todas las acciones relacionadas con la creación, edición, borrado y listado de dichas entidades. Además, se ha desarrollado la funcionalidad para realizar reservas de viajes, mediante un formulario de pasos gestionado con JavaScript y peticiones para obtener la información necesaria. Para esta funcionalidad adicional, se ha creado un nuevo controlador que gestiona las peticiones requeridas.

## Funcionalidades Pendientes

Aunque se solicitaba un CRUD también para los viajes, debido a limitaciones de tiempo, no ha sido posible implementar la página de edición. Por este motivo, se ha optado por eliminar el botón de edición del listado.

Asimismo, no se ha podido llevar a cabo ningún tipo de test automatizado (aunque sí pruebas manuales), ni la creación del docker debido a mi falta de familiaridad con el proceso. No he tenido el tiempo suficiente para investigar y realizar estas pruebas correctamente.

## ¿Cómo ejecutar el proyecto? 

Los pasos para hacer funcionar el proyecto serían los siguientes:
- Instalar PHP 8.2 o superior (usando Xampp o similar)
- Instalar Scoop ejecutando estos comandos en la terminal:
    - `Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser`
    - `Invoke-RestMethod -Uri https://get.scoop.sh | Invoke-Expression`
- Tras eso instalar Symfony CLI mediante el siguiente comando en la terminal: `scoop install symfony-cli`
- Después de descargar el proyecto, ir hasta la ruta donde se encuentren todos los ficheros y abrir una terminal
- En la terminal ejecutar `symfony server:start` esto iniciará el servidor. 
- Tras esto, solo queda crear la base de datos, para ello debe iniciar el proceso y ejecutar en consola:
    - `php bin/console doctrine:database:create`
    - `php bin/console doctrine:migrations:migrate` 

- Una vez has completado todos los pasos el proyecto quedará instalado y listo para las pruebas.
- Las rutas son las siguientes:
    - ./trip/
    - ./drivers/
    - ./vehicles/