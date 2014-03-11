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
		$qid_slash = $context[1];
		if (isset($qid_slash)) {
			$qid = substr($qid_slash, 1);
			$question = KnowModel::get_know($qid);
			$this->setTplParam('question', $question);
			$this->setTplName('web/know_detail.tpl');
			$this->render();
		} else {
			$pn = $_GET['pn'];
			$size = 20;
                        $max = 200;
			if (isset($pn)) {
				$pn = (int)($pn);
			} else {
				$pn = 0;
			}
			$questions = self::get_know_list($pn, $size);
			$total = KnowModel::get_ct_know();
                        if ($total >= $max) {
                                $total = $max;
                        }
			$this->setTplParam('questions', $questions);
			$this->setTplParam('currentPn', $pn);
			$this->setTplParam('rn', $size);
			$this->setTplParam('total', $total);
			$this->setTplName('web/know.tpl');
			$this->render();
		}
	}
	
	private function get_know_list($pn, $size) {
		$questions = KnowModel::get_knows($pn, $size);
		return $questions;
	}
}
