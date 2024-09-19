mysql -u root < user.sql
service mysql start
service apache2 start
while true
do
  sleep 10
done

