---
title: "Git Instalación "
linkTitle: "Funcionamiento"
weight: 10
icon: fab fa-git
---

# **Instalación y configuración básica de Git en Ubuntu**

Para comenzar a trabajar con Git en Ubuntu, necesitamos instalarlo y configurarlo correctamente.

## **1. Instalación de Git**

Para instalar Git en Ubuntu, ejecuta los siguientes comandos en la terminal:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
sudo apt update
sudo apt install git
{{< /highlight >}}

Una vez instalado, verifica la versión con:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git --version
{{< /highlight >}}

✅ **Si ves un número de versión como `git version 2.x.x`, Git se ha instalado correctamente.**

{{% line %}}

## **2. Configuración inicial de Git**

Lo primero que debes hacer es configurar tu identidad.  
Esto es necesario porque Git usa esta información en cada commit que hagas.

Ejecuta los siguientes comandos, reemplazando `"Tu Nombre"` y `"tu@email.com"`:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git config --global user.name "Tu Nombre"
git config --global user.email "tu@email.com"
{{< /highlight >}}

Para comprobar la configuración actual:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git config --list
{{< /highlight >}}

Esta configuración se guarda en el archivo `~/.gitconfig`.

Si deseas cambiar el editor por defecto de Git, puedes hacerlo con:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git config --global core.editor "nano"
git config --global core.editor "gedit"
git config --global core.editor "code --wait"  # Para Visual Studio Code
{{< /highlight >}}

{{% line %}}

## **3. Obtener ayuda en Git**

Si necesitas ayuda sobre un comando específico, usa:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git help <comando>
{{< /highlight >}}

Ejemplo:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git help commit
{{< /highlight >}}

Esto abrirá la documentación oficial de Git para ese comando.

{{% line %}}

# **Trabajando con Git en local**

## **📌 Ciclo de vida de los archivos en Git**

En un repositorio Git, los archivos pueden estar en uno de estos estados siguientes:

![img_1.png](img_1.png)

{{< alert title="Estados en Git" color="blue" >}}
✅ **Untracked (Sin seguimiento):** Archivos nuevos que Git aún no rastrea.  
✅ **Tracked (En seguimiento):** Archivos añadidos a Git y monitorizados para cambios.  
✅ **Modified (Modificado):** Archivos editados pero aún no preparados para commit.  
✅ **Staged (Preparado):** Archivos listos para ser confirmados.  
✅ **Committed (Confirmado):** Archivos guardados en el historial del repositorio.  
{{< /alert >}}

### **📌 Las tres áreas en Git**
Para gestionar estos estados, Git usa tres áreas principales:

![img.png](img.png)

1️⃣ **Directorio de trabajo (Working Directory)** → Donde editas los archivos.  
2️⃣ **Área de preparación (Staging Area)** → Zona intermedia antes de confirmar cambios.  
3️⃣ **Repositorio de Git (Git Directory)** → Base de datos donde se almacenan las versiones confirmadas.

{{% line %}}

# **Comandos esenciales en Git**

## **1️⃣ Inicializar un repositorio Git**
Para empezar a usar Git en un proyecto, ejecuta:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git init
{{< /highlight >}}

Esto creará una carpeta `.git` en tu proyecto, donde se almacenará la información del repositorio.

{{% line %}}

## **2️⃣ Agregar archivos a Git**
Cuando creas un nuevo archivo, Git **no lo sigue automáticamente**. Para rastrear un archivo:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git add nombre_archivo
{{< /highlight >}}

Para agregar **todos los archivos**:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git add .
{{< /highlight >}}

{{% line %}}

## **3️⃣ Ver el estado del repositorio**
Para ver el estado actual de los archivos:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git status
{{< /highlight >}}

Esto te dirá qué archivos están sin seguimiento, modificados o listos para confirmarse.

{{% line %}}

## **4️⃣ Confirmar cambios**
Para guardar los cambios en el historial de Git:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git commit -m "Mensaje descriptivo del cambio"
{{< /highlight >}}

Si quieres **evitar usar `git add` manualmente**, usa:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git commit -a -m "Mensaje descriptivo del cambio"
{{< /highlight >}}

Esto **agrega y confirma** los archivos en un solo paso.

{{% line %}}

## **5️⃣ Ignorar archivos en Git**
Si hay archivos que **no quieres versionar** (logs, configuraciones locales, etc.), usa un archivo **.gitignore**.

Ejemplo de `.gitignore`:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
*.log
node_modules/
.env
{{< /highlight >}}

Esto hará que Git **ignore esos archivos** y no los agregue al repositorio.

{{% line %}}

## **6️⃣ Comparar diferencias entre versiones**
Si quieres ver qué ha cambiado en tu código antes de confirmar:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git diff
{{< /highlight >}}

Si ya agregaste los cambios a la **staging area** y quieres ver las diferencias antes del commit:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
git diff --staged
{{< /highlight >}}

---

## **🌟 Conclusión**
🚀 **Git es una herramienta esencial para cualquier desarrollador.**  
Hemos aprendido cómo instalarlo, configurarlo y usarlo localmente.

Próximamente exploraremos cómo **subir repositorios a GitHub y colaborar en equipo**. 💻🎯
