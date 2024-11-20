# End Points
### ruta raiz
``https://sawapi.up.railway.app/api``




### Obtner la version de api que esta trabajando
```/info```

___
# Loguearse
```/login```
  
#### body
```json
    {
        "correo": ,
        "password": 
    }
```
___
# usuarios

## - listar usuarios
``/list-users``

## - crear usuario
``/create-user``
#### body
```json
{
    "name":
    "fecha_de_incripcion":
    "fecha_inicio_contrato": 
    "fecha_final_contrato":
    "fecha_nacimiento": 
    "activo":
    "edad": 
    "genero":
    "id_plan_servicio": 
    "nombre_empresa":
    "id_usuario_administrador": 
}
    
```
## - actualizar usuario

``/update-user/id?``
#### body
```json
    {
    "name":
    "fecha_de_incripcion":
    "fecha_inicio_contrato":
    "fecha_final_contrato":
    "fecha_nacimiento":
    "activo":
    "edad":
    "genero":
    "id_plan_servicio":
    "nombre_empresa":
    "id_usuario_administrador":
}

```
## - eliminar usuario
``/delete-user/id?``

## - obtener usuario
``/get-user/id?``
___
# Permisos plan

## obtner los permisos
``/show-permisos-plan/id?``

## actualizar los permisos
``/update-permisos-plan/id?``
#### body
```json
{
    "online"
    "multiusuario"
    "visualizar"
    "vender"
    "grafricar"
}

```
___
# Permisos subusuario
## obtner los permisos
``/get-permisos-subusuario/id?``

## actualizar los permisos
``/update-permisos-subusuario/id?``
#### body
```json
{
    "ver": true,
    "vender"
    "editar"
    "crear"
}
```
___
# Plan servicio
## obtner un plan
``/get-plan-servicio/id?``

## actualizar los permisos
``/update-plan-servicio/id?``
#### body
```json
{
    "nombre"
    "precio"
    "periodo"
    "id_permisos_plan"
}
```
___
# Sucursal
## obtner sucursal
``/get-sucursal/id?``


## actualizar sucursal
``/update-sucursal/id?``
#### body
```json
{
    "nombre"
    "direccion"
    "telefono"
    "id_usuario"
}
```

## listar sucursales
``/list-sucursal/id_usuario?``


## crear sucursales
``/create-sucursal``
#### body
```json
{
    "nombre"
    "direccion"
    "telefono"
    "id_usuario"
}
```

## eliminar sucursal
``/delete-sucursal/id?``
___

# Clientes

## listar clientes
``/list-clientes/id_usuario?``
#### respone
```json

 [
    {
        "id",
        "nombre",
        "telefono",
        "email",
        "id_usuario"
    }
 ]
```
___
# Area Producto
## listar Areas
``list-areas-productos/id_usuario?``
#### respone
```json

[
    {
        "id": 1,
        "nombre": "Área A",
        "id_usuario": 22
    }
]
```
___
# Trabajadores
## listar trabajadores
``list-trbajadores/id_usuario?``
#### respone
```json

{
    datos: [
        {
            "id": 5,
            "nombre": "trabajador1",
            "telefono": "1231231239",
            "email": "el@el.com",
            "id_usuario": 22,
            "id_sucursal": 1,
            "id_area_trabajador": 1,
            "sueldo": 1,
            "periodo_pago": "1",
            "cuenta_bancaria": "1",
            "password": "123",
            "activo": false
        }
    ],
    status: 200
}
```
___


## features
- encriptacion de passwords, email y telefono
- devolver permisos de usario y trabajador
- organizar de mejor manaer ep an api.
- verficar codigo de error para show
- añadir los metodos shows donde sea necesartio
- verificar que en todas las vistas se envien datos formateados
- verficar la estructura general de los metodos
- actualizar datos cuando se cambie la base de datos





