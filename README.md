# sistema institucional X Ejemplo PHP

# Funcionalidades del sistema
Sistema de control de notas y noticias para un curso de la Institución educativa X (Similar a Territorium)
# Debe permitir: 
Registrar profesores, estudiantes y administradores
# El administrador: 
	Crea grupos, crea estudiantes, crear profesores
	Asocia estudiantes y profesores a grupos
	Modifica las imágenes del carrusel inicial
# El profesor:
	Asigna noticias y actividades evaluativas, califica actividades evaluativas
# El estudiante:
	Responde actividades evaluativas, visualizar las noticias y notas

# Base de datos
Usuarios (cedula, nombre, apellido, password, tipoUsuario)\
TipoUsuarios(idTipoUsuario, descripcion)\
Grupos(idGrupo, descripcion) \
RegistroGrupo(idGrupo, cedula)\
Carrusel(idCarrusel, imagen)\
Noticias(idNoticia, idGrupo, titular, descripcion, fecha, imagen)\
Evaluaciones(idEvaluacion, idGrupo, descripción, adjuntoInstrucciones,fechaLimite)\
Notas(idNota, idEvaluacion, cedula, valornota, adjuntoSolucion)\

![Base de datos](https://raw.githubusercontent.com/dwn84/sistemaEjemploPHP/main/sistemaX/BaseDeDatos.png)





	
