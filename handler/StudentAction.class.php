<?php
/**
 * Created by gbtan.
 * User: tanguobin
 * Date: 2012-4-1
 * Time: 上午10:13
 * 学生风采Action类
 */

class StudentAction extends BaseAction {

	// 构造函数
	public function __construct() {
		BaseAction::__construct();
	}

	public function execute ($context) {
		$this->setTplName('web/student.tpl');
		$this->render();
	}
}