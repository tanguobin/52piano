<?php
/***************************************************************************
 * 
 * Copyright (c) 2013 Baidu.com, Inc. All Rights Reserved
 * 
 **************************************************************************/
 
 
 
/**
 * @file KnowModel.php
 * @author tanguobin(tanguobin@baidu.com)
 * @date 2013/07/16 14:02:32
 * @brief
 *  
 **/

class KnowModel {
    
	public static function get_ct_know() {
		$sqlComm = 'select count(id) as cnt from knowledge';
		$sqlData = array();
		$data = DB::get_data($sqlComm, $sqlData);
		return (int)($data[0]['cnt']);
	}
	
	public static function get_knows($offset, $size) {
		$sqlComm = 'select id, title, content from knowledge limit ' . $offset . ', ' . $size;
		$sqlData = array();
		$data = DB::get_data($sqlComm, $sqlData);
		return $data;
	}
	
	public static function get_know($qid) {
		$sqlComm = 'select id, title, content from knowledge where id=' . $qid;
		$sqlData = array();
		$data = DB::get_data($sqlComm, $sqlData);
		return $data[0];
	}
	
}

/* vim: set expandtab ts=4 sw=4 sts=4 tw=100: */
?>
