<?php

namespace yii\widgets;

use yii;
use yii\base\Widget;
use yii\helpers\Html;

class DisplayContactGroupsWidget extends widget
{
	public $groups = [];
	
	public $tag = 'ul';

	public function init()
	{

		parent::init();
        if ($this->groups === null) {
            $this->groups = 'WTF';
        }
	}

	public function run()
	{
		$template = '<li><a href="http://localhost:8216/index.php?r=contacts/group/view&id={id}">{group}</a></li>';
		$value = [];
		foreach ($this->groups as $group) {
			
			$value[] = $this->renderItem($group,$template);

		}
		


		echo Html::tag($this->tag, implode('', $value) );
	}

	public function renderItem($group, $template){
		$arr = array(
			"{id}" => $group['id'],
			"{group}" => $group['name']
			);


		return strtr($template, $arr);
	}
}

