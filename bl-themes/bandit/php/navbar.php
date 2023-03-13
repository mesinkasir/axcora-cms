<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
  <div class="container">
		<a class="navbar-brand" href="<?php echo Theme::siteUrl(); ?>"><img class="img-fluid" width="20" height="20" alt="<?php echo $site->title(); ?>" loading="lazy" src="<?php echo DOMAIN_THEME_IMG.'favicon.png'; ?>"/> 
			<strong><?php echo $site->title(); ?></strong>
		</a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			     <small>Menu</small>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter-left" viewBox="0 0 16 16">
  <path d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
</svg>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
		<ul class="navbar-nav bg-white">
			
				
				<?php foreach ($staticContent as $staticPage): ?>
				<li class="nav-item">
					<a class="nav-link text-dark" href="<?php echo $staticPage->permalink(); ?>"><?php echo $staticPage->title(); ?></a>
				</li>
				<?php endforeach ?>
			</ul>
		</div>
	</div>
</nav>
