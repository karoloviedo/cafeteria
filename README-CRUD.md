EN ESTE DESARROLLO SE REALIZO UN SISTEMA DE VENTAS CRUD DE UNA CAFETERIA EN LARAVEL 

Laravel Framework 9.38.0 -- VERSION
Node v18.12.1 -- VERSION NODE
npm install admin-lte@^3.0 --save 
npm i admin-lte--- PLANTILLA ADMINLTE
npm install -- Dependencias

<!-- CORRER PROYECTO: -->
npm run dev

<!-- GESTOR DE BASE DE DATOS MYSQL: -->
mysql 5.7.33

<!-- BASE DE DATOS:  -->
cafeteria

<!-- CREDENCIALES INGRESO AL SISTEMA: -->
usuario: karol@gmail.com
contraseña: 12345678

PUEDE CREAR UN NUEVO USUARIO REGISTRANDOSE SI DESEA

<!-- URL DEL SISTEMA: -->
http://cafeteria-crud.test/login --> ESTA SE CORRE EN LARAGON QUE ES UN GESTOR DE BASE DE DATOS PERO SI DESEA PUEDE HACERLO EN LOCALHOST


<!-- CONSULTAS A BD: -->

SELECT ventas.num_venta, Sum(ventas.total) AS Expr1
FROM ventas
GROUP BY ventas.num_venta;

SELECT MAX(productos.cantidad) max_list_price
FROM productos;

SELECT MAX(productos.nombre) max_list_price
FROM productos;


<!-- REPOSITORIO GITHUD -->