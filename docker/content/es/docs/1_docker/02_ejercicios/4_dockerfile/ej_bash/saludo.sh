#!/bin/bash

contador=1

while [ $contador -le 10 ]; do
    echo "Hola, mundo $contador"
    contador=$((contador + 1))
done
