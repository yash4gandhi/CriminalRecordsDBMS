TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` TRIGGER `adminentry` BEFORE INSERT ON `admin`\n FOR EACH ROW SIGNAL SQLSTATE \'01000\'\n      SET MESSAGE_TEXT = \'A warning occurred\', MYSQL_ERRNO = 1000'
sql_modes=1342177280
definers='root@localhost'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_unicode_ci'
db_cl_names='latin1_swedish_ci'
