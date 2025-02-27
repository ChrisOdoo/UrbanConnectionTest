Ing. Christian Padilla Muñiz
Agradecido por la oportunidad ... paz y bien.

Este repositorio contiene la implementación de la prueba técnica solicitada como parte del proceso de selección. He dedicado tiempo y esfuerzo para asegurar que el código sea limpio, eficiente y escalable, reflejando mi compromiso con la calidad y las mejores prácticas de desarrollo.

Objetivo
Demostrar mis habilidades técnicas, capacidad para resolver problemas y adaptabilidad para integrarme rápidamente a nuevos equipos y proyectos.

Estado
La prueba ha sido completada y estoy listo para discutir cualquier aspecto del código o realizar ajustes adicionales si es necesario.

Disponibilidad
Estoy entusiasmado por la oportunidad de unirme a su equipo y contribuir al éxito de sus proyectos. ¡Contácteme para seguir adelante!

Gracias por su consideración.
Chris Padilla
3330544762
christianpadillasistemas@gmail.com
linkeid: https://www.linkedin.com/in/christian-mu%C3%B1iz-9a412770/

INSTALACION
XAMP pre install, si necesitas mi ENV te lo pase por whats
1- php artisan migrate
2- php artisan serve
3- consumir API en local 127.0.0.1:8000/api/el_recurso

API REFERENCE************************************************************

LOGIN ANG REGISTER 

POST - JSON api/register
{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123"
}
POST - JSON api/login
{
    "email": "john@example.com",
    "password": "password123"
}
GET - Bearer <<Token>> api/user

ALL RESOURSES
GET - Bearer <<Token>> JSON api/productos

POST - Bearer <<Token>> JSON api/productos
{
  "nombre": "Producto 33 000",
  "descripcion": "Descripción del producto 33 000",
  "precio": 345,
  "stock": 66,
  "tienda_id": 7 
}

PUT - Bearer <<Token>> JSON api/productos
{
  "nombre": "Producto 33 000",
  "descripcion": "Descripción del producto 33 000",
  "precio": 345,
  "stock": 66,
  "tienda_id": 7 
}

DELETE - Bearer <<Token>> JSON api/productos/9


GET - Bearer <<Token>> JSON api/tiendas

POST - Bearer <<Token>> JSON /api/tiendas
{
    "nombre": "Tienda Prueba",
    "direccion": "Av. Test 123",
    "vendedor_id": 1
}

PUT - Bearer <<Token>> JSON /api/tiendas/7
{
    "nombre": "Tienda Prueba",
    "direccion": "Av. Test 123",
    "vendedor_id": 1
}

DELETE - Bearer <<Token>> JSON api/tiendas/7

Etc, con todos los recursos


***** NUEVA CARACTERISTICA
Implementacion de Soket y Vue para notificaciones en tiempo real con PUSHER!!
Ahora al actualizar un producto se genera un evento Broadcasting para notificar y reflejar
el cambio en tiempo real.
Además se implementa vue y una vista Stock.balde.php y componente Vue StockUpdate
para reflejar cambios en tiempo real.

- VUE.js
- PUSHER
- Soket

tiene mis llaves api, te comparti el .env con las llaves para probarlo.

SERVICIO API que ejecuta el evento 
PUT - Bearer <<Token>> JSON api/productos
{
  "nombre": "Producto 33 000",
  "descripcion": "Descripción del producto 33 000",
  "precio": 345,
  "stock": 66,
  "tienda_id": 7 
}