#!/bin/bash
for filen in `cat fp.jk`; do
state=`echo $filen |cut -f1 -d"|"`
price=`echo $filen |cut -f2 -d"|"`
echo "INSERT INTO |driverly_dev|.|tbl_average_fuel_price| (|id|, |state|, |average_fuel_price|, |date_of_price|, |fuel_type|) VALUES (NULL, '$state', '$price', CURRENT_TIMESTAMP, 'G')";
done
