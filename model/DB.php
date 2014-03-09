<?php
/***************************************************************************
 * 
 * Copyright (c) 2013 Baidu.com, Inc. All Rights Reserved
 * 
 **************************************************************************/
 
 
 
/**
 * @file db.php
 * @author tanguobin(tanguobin@baidu.com)
 * @date 2013/07/16 14:02:32
 * @brief
 *  
 **/

class DB {
    
    protected static $connection = null;
    /*
     * 单例模式
     */
    public static function get_conn() {
        if (isset(self::$connection)) {
            return  self::$connection;
        }
        self::$connection = self::get_connection();
        return self::$connection;
    }
    /**
     * 获得数据库句柄
     */
    public static function get_connection() {
        $conn = mysqli_init();
        $conn->options(MYSQLI_OPT_CONNECT_TIMEOUT, 1);
        $conn->real_connect('127.0.0.1', 'root', 'notebook@189', '52piano', 3306);
        if ($conn->connect_errno) {
            return false;
        }
        $conn->query("set names utf8,character_set_client=binary");
        return $conn;
        return -1;
    }
    /*
     * 查询
     * @param $sql
     * @param 
     */
    public static function get_data($sqlComm, $sqlData = array()){
        
        $sqlComm = self::bind_value($sqlComm, $sqlData);
        $result = self::get_conn()->query($sqlComm, MYSQLI_USE_RESULT);
        $ret = array();
        while ($row = $result->fetch_assoc()) {
            $ret[] = $row;
        }
        return $ret;
    }
    /*
     * 写数据
     * @param $sqlComm: sql语句
     * @param $sqlData：待绑定的变量
     * 
     */
     public static function write($sqlComm, $sqlData) {
        $sqlComm = self::bind_value($sqlComm, $sqlData);
        self::get_conn()->query($sqlComm);
        return self::get_conn()->affected_rows;
     }
     /**
      * get_last_id
      */
     public static function get_last_id() {
		return self::get_conn()->insert_id;
     }
     
    /*
     * 处理绑定变量
     */
    public static function bind_value($sqlComm, $sqlData) {
        
        if (empty($sqlData)) {
            return $sqlComm;
        }
        $tmp = "";
        foreach($sqlData as $key => $value) {
            $tmp = "'" . addslashes($value) . "'"; 
            $pattrn = ":$key";
            $sqlComm = str_replace($pattrn , $tmp, $sqlComm); 
        }
        return $sqlComm;
    }
}





/* vim: set expandtab ts=4 sw=4 sts=4 tw=100: */
?>
