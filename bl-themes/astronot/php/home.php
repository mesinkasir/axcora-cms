<header class="cardes">
<div class="carde">
<div class="card-content"><img alt="<?php echo $site->title(); ?>" width="40" height="40" src="<?php echo $site->logo(); ?>"/>
<h1><strong><a class="asteroid" href="<?php echo Theme::siteUrl(); ?>"><?php echo $site->title(); ?> </a></strong></h1>
<h2><?php echo $site->description(); ?></h2>
</div>
</div>
</header>
<?php if (empty($content)): ?>
<div class="cardes">
<div class="carde">
<div class="card-content">
<div class="text-center p-4">
<?php $language->p('No pages found') ?>
</div>
</div>
</div>
<?php endif ?>
<div class="cards">
<?php foreach ($content as $page): ?>
<?php Theme::plugins('pageBegin'); ?>
<div class="card">
<?php if ($page->coverImage()): ?>
<a title="<?php echo $page->title(); ?>" href="<?php echo $page->permalink(); ?>">
<img class="img-fluid rounded-circle" src="<?php echo $page->coverImage(); ?>"/>
</a>
<?php endif ?>
<div class="card-content">
<h3><strong>
<a href="<?php echo $page->permalink(); ?>" class="astronot"><?php echo $page->title(); ?></a></strong></h3>
<?php if ($page->description()): ?><p><?php echo $page->description(); ?></p><?php endif ?>
<?php echo $page->contentBreak(); ?> <?php if ($page->readMore()): ?><button><a class="link" href="<?php echo $page->permalink(); ?>"><?php echo $L->get('Read more'); ?></a></button><?php endif ?>
</div>
</div>
<?php Theme::plugins('pageEnd'); ?>
<?php endforeach ?>
</div>
<?php if (Paginator::numberOfPages()>1): ?>
<div class="cardes">
<div class="carde">
<div class="card-content">
<ul class="center">
<?php if (Paginator::showPrev()): ?>
<a class="page-link bg-dark" href="<?php echo Paginator::previousPageUrl() ?>" tabindex="-1">	&nbsp; ← 	&nbsp;<!--<?php echo $L->get('Previous'); ?>--></a>
<?php endif; ?>
<a class="page-link bg-dark text-white" href="<?php echo Theme::siteUrl() ?>">	&nbsp; <?php echo $L->get('Home'); ?> 	&nbsp;</a>
<?php if (Paginator::showNext()): ?>
<a class="page-link bg-dark" href="<?php echo Paginator::nextPageUrl() ?>">	&nbsp; <!--<?php echo $L->get('Next'); ?>--> → 	&nbsp;</a>
<?php endif; ?>
</ul>
</div>
</div>
</div>
<?php endif ?>
</div>
</div>