<!DOCTYPE HTML>
<html lang="zh-CN">
	<head>
		<meta charset="<?php $this->options->charset(); ?>">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    	<meta name="renderer" content="webkit">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    	<title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
        <?php if ($this->options->siteIcon): ?>
        <link rel="Shortcut Icon" href="<?php $this->options->siteIcon() ?>" />
        <link rel="Bootmark" href="<?php $this->options->siteIcon() ?>" />
        <?php endif; ?>
        <?php $this->header(); ?>
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/material.min.css'); ?>">
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/ripples.min.css'); ?>">
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/roboto.min.css'); ?>">
        <link rel="stylesheet" href="<?php $this->options->themeUrl('css/customs.css'); ?>">
	</head>

	<header>
		<div class="navbar navbar-fixed-top navbar-inverse">
			<div class="container">
				<div class="navbar-collapse collapse navbar-responsive-collapse">
				    <ul class="nav navbar-nav">
				    	<li<?php if($this->is('index')): ?> class="active"<?php endif; ?>><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></li>

				    	<?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
				      	<?php while($category->next()): ?>
							<li<?php if ($this->is('category', $category->slug)): ?> class="active"<?php endif; ?>><a href="<?php $category->permalink(); ?>" title="<?php $category->name(); ?>"><?php $category->name(); ?></a></li>
				      	<?php endwhile; ?>

				        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
				      	<?php while($pages->next()): ?>
							<li<?php if($this->is('page', $pages->slug)): ?> class="active"<?php endif; ?>><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
				      	<?php endwhile; ?>
				    </ul>
                    <?php if ( !empty($this->options->misc) && in_array('ShowLogin', $this->options->misc) ) : ?>
				    <ul class="nav navbar-nav navbar-right">
				    	<?php if($this->user->hasLogin()): ?>
				    		<li><a href="<?php $this->options->adminUrl(); ?>"><?php $this->user->screenName(); ?></a></li>
				    		<li><a href="<?php $this->options->logoutUrl(); ?>">Logout</a></li>
				    	<?php else: ?>
				      		<li><a href="<?php $this->options->adminUrl('login.php'); ?>">登录</a></li>
				      	<?php endif; ?>
				    </ul>
                    <?php endif; ?>
			  	</div>
			</div>
		</div>
	</header>

