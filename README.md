# End Points




### Obtner la version de api que esta trabajando
```/info```

___
# Loguearse
```/login```
  
#### body
```json
    {
        "correo":
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

``/update-user/id``
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
``/delete-user/id``

## - obtener usuario
``/get-user/id``
___
# Permisos plan

## obtner los permisos
``/show-permisos-plan/id``

## actualizar los permisos
``/update-permisos-plan/id``
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
``/get-permisos-subusuario/id``

## actualizar los permisos
``/update-permisos-subusuario/id``
#### body
```json
{
    "ver"
    "vender"
    "editar"
    "crear"
}
```
___
# Plan servicio
## obtner un plan
``/get-plan-servicio/id``

## actualizar los permisos
``/update-plan-servicio/id``
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
``/get-sucursal/id``


## actualizar sucursal
``/update-sucursal/id``
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
``/list-sucursal/id_usuario``


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
``/delete-sucursal/id``
___

# Clientes

## listar clientes
``/list-clientes/{id_usuario}``





