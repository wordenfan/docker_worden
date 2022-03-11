# 准备工作
删除data下的所有目录，避免旧数据的干扰冲突。

# 主库
create user 'repl'@'%' identified by 'repl';
grant replication slave on *.* to 'repl'@'%';
# 锁住，避免position改变，解锁 unlock talbes；
flush table with read lock; 
show master status;

# 从库，其中master_log_file，master_log_pos由上面master执行后获得
change master to master_host='172.20.0.2',master_port=3306, master_user='repl',master_password='repl',master_log_file='replicas-mysql-bin.000003',master_log_pos=710;
start slave;
show slave status \G;

# 查错
mysql -h 127.0.0.1:3306 -u root -p 
show grants for 'repl'@'127.0.0.1:3306';