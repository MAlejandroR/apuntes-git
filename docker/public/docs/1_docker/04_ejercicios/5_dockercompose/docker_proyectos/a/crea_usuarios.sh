while IFS= read -r line
do
  useradd -m $line  -p $line
done < usuarios.txt