#!/bin/bash
source development.env
sudo docker exec -i $(sudo docker inspect --format="{{.Id}}" ems_db) mysql -h$MYSQL_HOST -u$MYSQL_USER -p$MYSQL_PASSWORD $MYSQL_DATABASE < ems.sql
sleep 10s
