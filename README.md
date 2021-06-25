# Sistema institucional X Ejemplo PHP

## Descripción general
Sistema de control de notas y noticias para grupos de la Institución educativa X.
## Debe permitir: 
Registrar profesores, estudiantes y administradores.
## El administrador: 
* Crea grupos, crea estudiantes, crear profesores
* Asocia estudiantes y profesores a grupos
* Modifica las imágenes del carrusel inicial
## El profesor:
* Asigna noticias y actividades evaluativas
* Califica actividades evaluativas
## El estudiante:
* Responde actividades evaluativas
* Visualiza las noticias y notas

## Base de datos
Usuarios (cedula, nombre, apellido, password, tipoUsuario)\
TipoUsuarios(idTipoUsuario, descripcion)\
Grupos(idGrupo, descripcion) \
RegistroGrupo(idGrupo, cedula)\
Carrusel(idCarrusel, imagen)\
Noticias(idNoticia, idGrupo, titular, descripcion, fecha, imagen)\
Evaluaciones(idEvaluacion, idGrupo, descripción, adjuntoInstrucciones,fechaLimite)\
Notas(idNota, idEvaluacion, cedula, valornota, adjuntoSolucion)

![Base de datos](https://raw.githubusercontent.com/dwn84/sistemaEjemploPHP/main/sistemaX/BaseDeDatos.png)





	
