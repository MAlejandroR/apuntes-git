#!/bin/bash

# 1. Generar el sitio estático con Hugo
echo "Generando el sitio con Hugo..."
hugo

# 2. Navegar al directorio 'public', que contiene los archivos estáticos generados
cd public

# 3. Inicializar un repositorio Git en la carpeta 'public'
echo "Inicializando repositorio Git..."
git init

# 4. Añadir el repositorio remoto (sustituir 'usuario' y 'nombre-del-repositorio' por los correctos)
git remote add origin git@github.com:MAlejandroR/dwes.git

# 5. Crear y cambiar a la rama 'gh-pages'
git checkout -b gh-pages

# 6. Añadir los archivos generados
git add .

# 7. Hacer commit de los cambios
git commit -m "Desplegando sitio con Hugo"

# 8. Subir los cambios a la rama 'gh-pages' en GitHub
git push origin gh-pages --force

# 9. Volver al directorio del proyecto
cd ..
