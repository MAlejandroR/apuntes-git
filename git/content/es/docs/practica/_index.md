---
title: "Git Instalación "
linkTitle: "practica"
draft: true
weight: 10
icon: fab fa-git
---
# **Práctica: Introducción a Git con Proyecto Web**

En esta práctica aprenderemos a usar Git desde cero con un proyecto web sencillo. Seguiremos los pasos básicos para trabajar con Git en local, incluyendo inicialización, seguimiento de cambios, confirmaciones y reversión de commits.

## **📌 1. Verificar la instalación de Git**
Abre la terminal y ejecuta:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git --version
{{< /highlight >}}

Si Git está instalado correctamente, verás la versión actual de Git en tu sistema.

---

## **📌 2. Configurar Git**
Para verificar la configuración de Git, ejecuta:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git config --list
{{< /highlight >}}

Si no tienes configurado tu usuario y correo, configúralos con:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git config --global user.name "Tu Nombre"
git config --global user.email "tu@email.com"
{{< /highlight >}}

Vuelve a ejecutar `git config --list` para confirmar que la configuración ha sido guardada.

---

## **📌 3. Preparar el entorno de trabajo**
1️⃣ Crea el directorio donde trabajaremos:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
mkdir -p ~/LosEnlaces2425/Despliegue/GIT/ejercicio1
cd ~/LosEnlaces2425/Despliegue/GIT/ejercicio1
{{< /highlight >}}

2️⃣ Descarga y descomprime el archivo de la práctica:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
unzip /ruta/al/archivo/practica1A.zip -d ~/LosEnlaces2425/Despliegue/GIT/ejercicio1
{{< /highlight >}}

---

## **📌 4. Inicializar Git en el proyecto**
Inicia un repositorio Git en el directorio del proyecto:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git init
{{< /highlight >}}

Para verificar el estado del repositorio:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git status
{{< /highlight >}}

Si Git indica que el directorio no es seguro, puedes configurarlo como tal:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git config --global --add safe.directory ~/LosEnlaces2425/Despliegue/GIT/ejercicio1
{{< /highlight >}}

---

## **📌 5. Primer commit**
Agrega todos los archivos al área de preparación:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git add .
{{< /highlight >}}

Verifica nuevamente el estado:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git status
{{< /highlight >}}

Confirma los cambios con el siguiente mensaje:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git commit -m "Primera versión del ejercicio"
{{< /highlight >}}

Revisa el estado actual de Git:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git status
{{< /highlight >}}

---

## **📌 6. Verificar la web en el navegador**
Abre `ejercicio1.html` en tu navegador para ver cómo se visualiza la página.

---

## **📌 7. Realizar cambios en los archivos**
1️⃣ Abre `ejercicio1.html` en tu editor y envuelve todo el contenido dentro de un `<div>` en el `<body>`.

2️⃣ Guarda los cambios y revisa el estado de Git:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git status
{{< /highlight >}}

3️⃣ Descarga y reemplaza el archivo `estilos.css` con el de `practica1B.zip`, luego revisa el estado de Git nuevamente.

---

## **📌 8. Confirmar los cambios**
Añade todos los cambios al área de preparación y haz un nuevo commit:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git commit -am "Segunda versión con cambios en HTML y CSS"
{{< /highlight >}}

Verifica el estado:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git status
{{< /highlight >}}

Muestra el historial de commits en una única línea:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git log --oneline
{{< /highlight >}}

---


## **📌 9. Modificación y reversión**

1️⃣ Agrega la siguiente línea a `ejercicio1.html` dentro del `<head>`:

{{< highlight html "linenos=table, hl_lines=1" >}}
<meta name="author" content="Teresa Martínez" />
{{< /highlight >}}

2️⃣ Verifica el estado:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git status
{{< /highlight >}}

3️⃣ Añade solo ese archivo al área de preparación:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git add ejercicio1.html
{{< /highlight >}}

4️⃣ Estado de Git:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git status
{{< /highlight >}}

5️⃣ Confirma los cambios con un commit:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git commit -m "Tercera versión: añadido meta author"
{{< /highlight >}}

6️⃣ Visualiza el historial de commits:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git log --oneline
{{< /highlight >}}

---

## **📌 10. Volver a una versión anterior sin borrar cambios**

1️⃣ Queremos recuperar nuestra versión anterior (antes de añadir la etiqueta `<meta>`). Para ello, usa `checkout` para situarte en el commit anterior:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git checkout HEAD~1
{{< /highlight >}}

2️⃣ Comprueba el log de commits y verifica que **HEAD ahora apunta a la segunda versión**:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git log --all --oneline
{{< /highlight >}}

3️⃣ Visualiza `ejercicio1.html` y notarás que la línea `<meta>` ya no está.

4️⃣ Para volver a la última versión (tercera versión):

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git checkout main
{{< /highlight >}}

---

## **📌 11. Cambio en el título del HTML**

1️⃣ Modifica `ejercicio1.html`, cambia la línea del `<title>`:

Antes:

{{< highlight html "linenos=table, hl_lines=1" >}}
<title>HTML & CSS: Curso práctico avanzado</title>
{{< /highlight >}}

Después:

{{< highlight html "linenos=table, hl_lines=1" >}}
<title>HTML y CSS: Curso práctico avanzado</title>
{{< /highlight >}}

2️⃣ Añade el cambio al área de preparación:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git add ejercicio1.html
{{< /highlight >}}

3️⃣ Verifica el estado de Git:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git status
{{< /highlight >}}

4️⃣ **Revierte la última acción** (saca el archivo del área de preparación):

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git restore --staged ejercicio1.html
{{< /highlight >}}

5️⃣ **Elimina la última modificación** en el archivo (deshace el cambio en el título):

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git checkout -- ejercicio1.html
{{< /highlight >}}

Ahora, abre `ejercicio1.html` en tu editor y verás que ha vuelto a la versión anterior.

6️⃣ **Vuelve a modificar el archivo** (sustituye `&` por `Y` nuevamente) y confirma los cambios:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git commit -am "Cuarta versión: eliminado & del title"
{{< /highlight >}}

---

## **📌 12. Eliminar el último commit**

1️⃣ Si queremos **eliminar el último commit** y volver al commit anterior:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git reset --hard HEAD~1
{{< /highlight >}}

2️⃣ Comprueba con `git log` que **"Cuarta versión" ya no existe**:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git log --oneline
{{< /highlight >}}

3️⃣ Ejecuta `git status` y observa que **el archivo sigue modificado, pero no está en el commit**:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git status
{{< /highlight >}}

4️⃣ **Vuelve a confirmar los cambios**:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git commit -am "Cuarta versión: eliminado & del title"
{{< /highlight >}}

---

## **📌 13. Restaurar a la segunda versión y borrar todo lo posterior**

1️⃣ Para **volver a la segunda versión y borrar los cambios posteriores**:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git reset --hard HEAD~2
{{< /highlight >}}

2️⃣ Verifica el historial de commits:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git log --oneline
{{< /highlight >}}

3️⃣ Abre `ejercicio1.html` en el editor y verifica que el título **ha vuelto a la segunda versión**.

---

## **📌 14. Crear y eliminar un archivo en Git**

1️⃣ Crea un nuevo archivo dentro del proyecto:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
touch ejercicio1/fichero.borrar
{{< /highlight >}}

2️⃣ Añádelo al área de preparación:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git add ejercicio1/fichero.borrar
{{< /highlight >}}

3️⃣ Ahora decidimos eliminar el archivo completamente:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git rm ejercicio1/fichero.borrar
git commit -m "Eliminado fichero innecesario"
{{< /highlight >}}

✅ **Verifica que el archivo ha sido eliminado** con `ls ejercicio1/`.

---

## **🎯 Conclusión**

🚀 En esta práctica hemos aprendido a:
✅ **Modificar, añadir y confirmar cambios en Git**.  
✅ **Revertir cambios y restaurar versiones anteriores**.  
✅ **Eliminar commits y gestionar archivos ignorados en Git**.  
✅ **Comprender el flujo de trabajo en Git y HEAD**.

¡Bien hecho! Ahora estás listo para trabajar con Git de manera eficiente. 😃🔥
