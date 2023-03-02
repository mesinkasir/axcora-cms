<div class="container">
<div class="row bg-dark p-3 mt-5 rounded">
<?php Theme::plugins('siteSidebar') ?>
<nav class="navbar p-3">
<?php foreach (Theme::socialNetworks() as $key=>$label): ?>
<a class="nav-link" href="<?php echo $site->{$key}(); ?>" target="_blank"><?php echo $label; ?></a><?php endforeach; ?>
	<?php if (Theme::rssUrl()): ?>
					<a class="nav-link" href="<?php echo Theme::rssUrl() ?>" target="_blank">
					RSS
					</a>
				</li>
				<?php endif; ?>
</nav>
</div>
</div>
<footer class="footer mt-5">
	<div class="container-fluid">
		<p class="m-0 text-center p-1">
		<?php echo $site->footer(); ?><br/><small><a href="https://axcora.com"><img class="img-fluid" src="<?php echo DOMAIN_THEME_IMG.'favicon.png'; ?>"/> BLUGER</a> develope by <a target="_blank" href="https://www.fiverr.com/creativitas/design-your-website-with-phyton-django">Creativitas</a>
		</small></p>
	</div>
</footer>
