ACTIVIDADES DESARROLLADAS
Con base al archivo Práctica 04 – Creación de una aplicación web usando PHP y Base de Datos, se pide realizar los siguientes ajustes:
a) Agregar roles a la tabla usuario. Un usuario puede tener un rol de “admin” o “user” 
b) Los usuarios con rol de “admin” pueden únicamente: modificar, eliminar y cambiar la contraseña de cualquier usuario de la base de datos. 
c) Los usuarios con rol de “user” pueden modificar, eliminar y cambiar la contraseña de su usuario

Luego, con base a estos ajustes realizados, se pide desarrollar una aplicación web usando PHP y Base de Datos que permita gestionar (enviar y recibir) mensajes electrónicos entre usuarios de la aplicación. De los mensajes electrónicos se desea conocer la fecha y hora, remitente, destinatario, asunto y mensaje. Para lo cuál, se pide como mínimo los siguientes requerimientos:

Usuario con rol de user:

d) Visualizar en su pagina principal (index.php) el listado de todos los mensajes electrónicos recibidos, ordenados por los más recientes. 
e) Visualizar el listado de todos los mensajes electrónicos enviados, ordenados por los más recientes. 
f) Enviar mensajes electrónicos a otros usuarios de la aplicación web. 
g) Buscar todos los mensajes electrónicos recibidos. La búsqueda se realizará por el correo del usuario remitente y se deberá aplicar Ajax para la búsqueda. 
h) Buscar todos los mensajes electrónicos enviados. La búsqueda se realizará por el correo del usuario destinatario y se deberá aplicar Ajax para la búsqueda.
 i) Modificar los datos del usuario. 
j) Cambiar la contraseña del usuario. 
k) Agregar un avatar (fotografía) a la cuenta del usuario.

Por último, se debe aplicar parámetros de seguridad a través del uso de sesiones. Para lo cuál, se debe tener en cuenta:

p) Un usuario “anónimo”, es decir, un usuario que no ha iniciado sesión puede acceder únicamente a los archivos de la carpeta pública. 
q) Un usuario con rol de “admin” puede acceder únicamente a los archivos de la carpeta admin → vista → admin y admin → controladores → admin 
r) Un usuario con rol de “user” puede acceder únicamente a los archivos de la carpeta admin → vista → user y admin → controladores → user
 
 

1.	Para realizar este proyecto utilizamos el software visual studio. Lo primero que vamos a crear es un archivo html para crea usuario. 
 
Creamos el diseño del formulario. 
Luego el login para que el usuario se loge 
 

1.1	Creamos una carpeta controladora y agregamos nuestros archivos php.
Tenemos el controlador del login
 
Tenemos el controlador de crear usuario
 
Aquí es donde vamos a llenar los datos y va ha mandar a la base phpAdmin.

1.2	Tenemos nuestro archivo AJAX la cual me permitirá buscar por cedula a la persona.
  

1.3	De la siguiente manera podemos conectarnos a nuestra base phpAdmin.
 

1.4	Para cerrar la cesión.
   
1.5	Luego tenemos el enviar correo , aquí conectamos con nuestra base.
 
 
Creamos un pequeño menú para realizar la navegación en la pagina.
1.6	El index es la pagina principal donde podemos ver la información del usuario y también verificamos si es usuario o administrador.
  


1.7	 Para buscar el mensaje electrónico utilizamos ajax. Para realizar la búsqueda utilizamos onkeyup en el input de la página index. Donde utilizamos una función que la hemos llamado buscarPorCorreo. Donde si lo utilizamos nos mandara a la página buscar.php , y donde también utilizaremos el método GET para poder enviar el correo electrónico para que nos pueda buscar mediante el correo.
 

1.8	En la página eliminar.php obtenemos el código del correo electrónico con el método POST , después hacemos un update donde ponemos que este correo esta eliminado, para lo cual la columna correo_eliminado sea igual a S.
 
1.9		En la página cambiarcontraseña.php de controladores obtenemos lo que se encuentra en los campos con el método POST , después hacemos una sentencia sql para obtener todo del usuario que tiene la contraseña actual. Después hacemos un update de este mismo usuario en donde le damos la nueva contraseña obtenida del campo del formulario.
 

1.10	Para que el administrador pueda eliminar el usuario , mandamos los datos del usuario a un formulario, en este formulario que se llama eliminarUsuario.php obtenemos el código del usuario al cual queremos eliminar , donde utilizaremos el método GET para obtener el código del usuario que le hemos pasado en la url . Después obtenemos todos los valores de la tabla usuario donde el código del usuario sea la variable que le hemos asignado al metogo Get.
  
1.11	Para que el administrador pueda modificar el usuario pasamos los datos del usuario a un formulario, en donde utilizamos el método get para poder obtener el código del usuario que hemos mandado mediante la url y cuando demos click en modificar, nos llevara a la página modificar.php del controlador.
 
1.12	Para poder modificar la contraseña del usuario usamos un formulario para poder ingresar la contraseña actual y la nueva contraseña. En donde utilizamos el método GET para poder obtener el codigo de el usuario que hemos enviado mediante la url. Después accedemos a la página cambiar_contraseña.php mediante action y mandamos los valores mediante el método POST.
 
1.13	Para poder verificar que un usuario sea user o admin y pueda ingresar a ciertas páginas de la página web utilizamos la variable $_SESSION en el login.php. En donde si es rol user se cree la variable $_SESSION[‘isAdmin´]= TRUE ; y no es user que se cree la variable $_SESSION[‘isAdmin´]= TRUE ;. De esta manera sabremos si es un administrador o un usuario. 
Eso debemos agregar en cada pagina para que nos permita ingresar en modo user o admin. 


   
