#!/bin/bash
####### This routine was written by John W. Ketchersid on March 1, 2012 ####
## PURPOSE: Backup of all databases and place in resository
####################

## First we check to see if the user entered the password and path
if test -z "$1"
then
clear
echo "###"
echo "###"
echo "###"
echo "###"
echo "###"
echo "###"
echo "###"
echo "###"
echo "###"
echo "###"
  echo "You must enter the password and the path for storage directory. eg. PassWord /var/www/databackup DONOT ADD / to the end of the line."
  echo "Press Ctrl+C NOW."
else
clear
echo "###"
echo "###"
echo "###"
echo "###"
echo "###"
echo "###"
echo "###"
echo "###"
echo "###"
echo "###"
  echo "########################################################"
  echo "The storage path you entered is $2."
  echo "If the path above is correct press any key to continue."
  echo "Otherwise press Crtl+C"
  echo "########################################################"
fi
read -p "Press any key to continue... " -n1 -s
clear
echo "Backup is underway thank you"
mysqldump -u root -p$1 driverly_dev >$2/driverly_dev.sql
echo "backing up driverly_dev"
mysqldump -u root -p$1 driverly_production >$2/driverly_production.sql
echo "backing up driverly_production"
mysqldump -u root -p$1 driverly_test > $2/driverly_test.sql
echo "backing up driverly_test"
mysqldump -u root -p$1 fat_joes_cars_dev >$2/fat_joes_cars_dev.sql
echo "backing up fat_joes_cars_dev"
mysqldump -u root -p$1 fat_joes_cars_propduction >$2/fat_joes_cars_propduction.sql
echo "backing up fat_joes_cars_propduction"
mysqldump -u root -p$1 fat_joes_cars_test >$2/fat_joes_cars_test.sql
echo "backing up fat_joes_cars_test"
mysqldump -u root -p$1 fat_joes_development > $2/fat_joes_development.sql
echo "backing up fat_joes_development"
mysqldump -u root -p$1 mysql > mysql.sql
echo "backing up mysql"
mysqldump -u root -p$1 phpmyadmin > phpmyadmin.sql
echo "backing up phpmyadmin"
clear
echo "###"
echo "###"
echo "###"
echo "###"
echo "###"
echo "###"
echo "###"
echo "###"
echo "###"
echo "driverly_dev"
echo "driverly_production"
echo "driverly_test"
echo "fat_joes_cars_dev"
echo "fat_joes_cars_propduction"
echo "fat_joes_cars_test"
echo "fat_joes_development"
echo "mysql"
echo "phpmyadmin"
echo "All databases listed above have been backedup. Thank you"
