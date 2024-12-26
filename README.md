# todolist
Pre-assessment By: Jordan PB


#¿Qué necesita?
El software ocupa php en su versión 8.2 junto con MySql como base de datos, todos los demás plugins están definidos mediante CDN por los que no es necesario instalarlos

#¿Cómo montarlo?
- Se puede montar en cualquier servidor que cumpla con los requerimientos
- Crear un nuevo archivo llamado config.php con los accesos al host (para ello se puede basar en el archivo common/config.example.php)

#Uso
1. El primer paso que debemos de hacer es iniciar sesión
2. Una vez iniciada la sesión, entraremos a la pantalla de Home en dónde podremos ver todas nuestras tareas pendientes (propias del uduario), cada tarea puede ser eliminada (borrado permanente, mover a papelera en caso de que no la queramos borrar definitivamente, editar en la que podremos editar el titulo y el contenido) y marcar cómo alternar estatus de concluida la tarea permanecerá hasta que se marque cómo terminada y se refresque la página esto en caso de que el  usuario se arrepienta y quiera desmarcarla
3. En la pantalla de todas mis tareas podremos ver tanto las tareas pendientes cómo las concluidas
4. En la pantalla de papelera podremos ver las tareas que fueron desechadas, dentro de esta pantalla podremos restaurar la tarea para recuperar
5. Cerrar sesión nos mandará al login para así alternar de usuario
