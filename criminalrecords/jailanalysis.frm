TYPE=VIEW
query=select `criminalrecords`.`jail`.`jail_reg_id` AS `jail_reg_id`,`criminalrecords`.`jail`.`name` AS `name` from `criminalrecords`.`jail`
md5=5e531eeaa3506cea70cb9779e2e30095
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2019-04-16 06:03:02
create-version=2
source=select jail_reg_id,name from jail
client_cs_name=latin1
connection_cl_name=latin1_swedish_ci
view_body_utf8=select `criminalrecords`.`jail`.`jail_reg_id` AS `jail_reg_id`,`criminalrecords`.`jail`.`name` AS `name` from `criminalrecords`.`jail`
mariadb-version=100137
