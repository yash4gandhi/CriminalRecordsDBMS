TYPE=VIEW
query=select `criminalrecords`.`complainant`.`complain_id` AS `complain_id`,`criminalrecords`.`complainant`.`location` AS `location` from `criminalrecords`.`complainant`
md5=e2c322693aa13f2daf394a1a435e0298
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2019-04-16 06:19:27
create-version=2
source=select complain_id,location from complainant
client_cs_name=latin1
connection_cl_name=latin1_swedish_ci
view_body_utf8=select `criminalrecords`.`complainant`.`complain_id` AS `complain_id`,`criminalrecords`.`complainant`.`location` AS `location` from `criminalrecords`.`complainant`
mariadb-version=100137