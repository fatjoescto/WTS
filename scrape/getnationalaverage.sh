#!/bin/bash
######################################################
### This routine pulls national average fuel prices from the EIA
## After pulling the data. The data is inserted into the tbl_national_average_gas_price table
## The working files are cleaned up at the end of the routine 
## to save disk space
######################### By John W. Ketchersid
######################### for Fat Joes, LLC
######################### Completed on April 30th 2012
##############################################################
## Pull the national average page from EIA
wget -q "http://www.eia.gov/dnav/pet/pet_pri_gnd_dcus_nus_w.htm"
## Set the variable equal to the data in the file
todaysnationalaverage=`grep Current2 /var/www/scrape/pet_pri_gnd_dcus_nus_w.htm |head -1|cut -f2 -d">"|cut -f1 -d"<"`
##
## Set the value for the line we will use to insert the data into the database
insertline="INSERT INTO driverly_dev.tbl_national_average_gas_price (id, average_fuel_price, date_of_price, fuel_type) VALUES (NULL, '$todaysnationalaverage', CURRENT_TIMESTAMP, 'G')";
##
## Pump the insert line into the sql file
echo $insertline>updatenationalaveragegasprice.sql
## Execute the routine that will load the data into the table
mysql -u root -pG0dIsGreat driverly_dev</var/www/scrape/updatenationalaveragegasprice.sql
##
## Clean up the working files.
rm -f /var/www/scrape/pet*
rm -f /var/www/scrape/updatenationalaveragegasprice.sql
#######################################
############   END OF ROUTINE   #######
#######################################

