<?php
/**
 * Created by gbtan.
 * User: tanguobin
 * Date: 2012-4-1
 * Time: 上午10:13
 * 钢琴知识Action类
 */

class KnowAction extends BaseAction {

	// 构造函数
	public function __construct() {
		BaseAction::__construct();
	}

	public function execute ($context) {
		$this->setTplName('web/know.tpl');
		$this->render();
	}
}