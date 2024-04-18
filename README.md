# Prueba Técnica Xalok

## Tecnologías Usadas

Este proyecto ha sido desarrollado utilizando Symfony 7 y PHP 8.2. A pesar de ser el framework con el que tengo menos experiencia, decidí utilizarlo con el propósito de mostrar las fortalezas y debilidades que tendría desde el primer día en caso de ser contratado. Durante el desarrollo, he consultado la documentación oficial de Symfony y he recurrido a ChatGPT para resolver las dudas que han surgido a lo largo del proyecto.

Para el frontend, se ha empleado Bootstrap con el fin de agilizar el proceso de maquetación. Lamento el aspecto visual, ya que no tengo habilidades en diseño.

## Funcionalidades Realizadas

Se ha implementado un CRUD completo para vehículos y conductores, así como un listado de viajes. Se han creado tres controladores encargados de gestionar todas las acciones relacionadas con la creación, edición, borrado y listado de dichas entidades. Además, se ha desarrollado la funcionalidad para realizar reservas de viajes, mediante un formulario de pasos gestionado con JavaScript y peticiones para obtener la información necesaria. Para esta funcionalidad adicional, se ha creado un nuevo controlador que gestiona las peticiones requeridas.

## Funcionalidades Pendientes

Aunque se solicitaba un CRUD también para los viajes, debido a limitaciones de tiempo, no ha sido posible implementar la página de edición. Por este motivo, se ha optado por eliminar el botón de edición del listado.

Asimismo, no se ha podido llevar a cabo ningún tipo de test automatizado (aunque sí pruebas manuales) debido a mi falta de familiaridad con el proceso. No he tenido el tiempo suficiente para investigar y realizar estas pruebas correctamente.
