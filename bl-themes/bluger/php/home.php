<div class="container">
<div class="row">



		

<?php if (empty($content)): ?>
	<div class="text-center p-4">
	<?php $language->p('No pages found') ?>
	</div>
<?php endif ?>


<div class="col-md-12 p-3 p-md-5">
<div class="row">
<?php foreach ($content as $page): ?>
<div class="col-md-3 p-3">
<?php Theme::plugins('pageBegin'); ?>
<?php if ($page->coverImage()): ?>
<a title="<?php echo $page->title(); ?>" href="<?php echo $page->permalink(); ?>">
<img class="img-fluid rounded-circle" src="<?php echo $page->coverImage(); ?>"/>
</a>
<?php endif ?>
</div>
<div class="col-md-9 p-3">
<h3><strong>
<a href="<?php echo $page->permalink(); ?>"><?php echo $page->title(); ?></a></strong></h2>
<?php if ($page->description()): ?>
<p><?php echo $page->description(); ?></p>
<?php endif ?>
<!-- <?php echo $page->contentBreak(); ?> 
<?php if ($page->readMore()): ?><a class="btn btn-dark" href="<?php echo $page->permalink(); ?>"><?php echo $L->get('Read more'); ?></a><?php endif ?>
-->
<div>
</div>
<?php Theme::plugins('pageEnd'); ?>
</div>
<?php endforeach ?>
</div>
</div>


<?php if (Paginator::numberOfPages()>1): ?>
<nav class="paginator">
	<ul class="pagination flex-wrap justify-content-center">
		<?php if (Paginator::showPrev()): ?>
		<li class="page-item mr-2">
			<a class="page-link bg-dark" href="<?php echo Paginator::previousPageUrl() ?>" tabindex="-1">&#9664; <!--<?php echo $L->get('Previous'); ?>--></a>
		</li>
		<?php endif; ?>
		<li class="page-item <?php if (Paginator::currentPage()==1) echo 'disabled' ?>">
			<a class="page-link bg-dark text-white" href="<?php echo Theme::siteUrl() ?>"><?php echo $L->get('Home'); ?></a>
		</li>
		<?php if (Paginator::showNext()): ?>
		<li class="page-item ml-2">
			<a class="page-link bg-dark" href="<?php echo Paginator::nextPageUrl() ?>"><!--<?php echo $L->get('Next'); ?>--> &#9658;</a>
		</li>
		<?php endif; ?>
	</ul>
</nav>
<?php endif ?>




</div>
</div>