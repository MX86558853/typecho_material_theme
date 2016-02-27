<?php

function themeConfig($form) {
	$billboard = new Typecho_Widget_Helper_Form_Element_Text('billboard', NULL, NULL, _t('../img/billboard.jpg'), _t('在这里填入一个图片URL, 作为首页图片'));
	$form->addInput($billboard);

	$slogan = new Typecho_Widget_Helper_Form_Element_Text('slogan', NULL, NULL, _t('首页图片标语'), _t('在这里填入一段文字，作为首页图片中的标语文字'));
	$form->addInput($slogan);

	$siteIcon = new Typecho_Widget_Helper_Form_Element_Text('siteIcon', NULL, NULL, _t('标题栏和书签栏 Icon'), _t('在这里填入一个图片URL, 作为标题栏和书签栏 Icon, 默认不显示'));
	$form->addInput($siteIcon);

	$miibeian = new Typecho_Widget_Helper_Form_Element_Text('miibeian', NULL, _t('粤ICP备14072384号-2'), _t('备案号'), _t('在这里填入天朝备案号，留空则不显示'));
	$form->addInput($miibeian);

	$misc = new Typecho_Widget_Helper_Form_Element_Checkbox('misc', array(
		'ShowLogin' => _t('前台显示登录入口'),
		'ShowThemeCopyRight' => _t('页脚显示模板版权'),
		'ShowLoadTime' => _t('页脚显示加载耗时'),
	),
		array('ShowLogin'), _t('杂项'));
	$form->addInput($misc->multiMode());
}

function timer_start() {
	global $timestart;
	$mtime = explode(' ', microtime());
	$timestart = $mtime[1] + $mtime[0];
	return true;
}
timer_start();

function timer_stop($display = 0, $precision = 3) {
	global $timestart, $timeend;
	$mtime = explode(' ', microtime());
	$timeend = $mtime[1] + $mtime[0];
	$timetotal = $timeend - $timestart;
	$r = number_format($timetotal, $precision);
	if ($display) {
		echo $r;
	}

	return $r;
}
