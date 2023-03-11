<div id="dashboard" class="container">
	<div class="row">
		<div class="col-md-12">

			<!-- Good message -->
			<div>
			<h1><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
  <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
</svg> Github Blog</h1>
			<h2>Built fast website without database with flatfile cms</h2>
			<h3 id="hello-message" class="pt-0">
				<?php
					$username = $login->username();
					$user = new User($username);
					$name = '';
					if ($user->nickname()) {
						$name = $user->nickname();
					} elseif ($user->firstName()) {
						$name = $user->firstName();
					}
				?>
				<span class="fa fa-hand-spock-o"></span><span><?php echo $L->g('hello').' '.$name ?></span>
			</h3>
			<script>
			$( document ).ready(function() {
				$("#hello-message").fadeOut(2400, function() {
					var date = new Date()
					var hours = date.getHours()
					if (hours > 6 && hours < 12) {
						$(this).html('<span class="fa fa-sun-o"></span><?php echo $L->g('good-morning') ?>');
					} else if (hours > 12 && hours < 18) {
						$(this).html('<span class="fa fa-sun-o"></span><?php echo $L->g('good-afternoon') ?>');
					} else if (hours > 18 && hours < 22) {
						$(this).html('<span class="fa fa-moon-o"></span><?php echo $L->g('good-evening') ?>');
					} else {
						$(this).html('<span class="fa fa-moon-o"></span><span><?php echo $L->g('good-night') ?></span>');
					}
				}).fadeIn(1000);
			});
			</script>
			</div>

			<!-- Quick Links -->
			<div class="container" id="jsclippyContainer">

				<div class="row">
					<div class="col">
						<div class="form-group">
						<select id="jsclippy" class="clippy" name="state"></select>
						</div>
					</div>
				</div>

			<script>
			$(document).ready(function() {

				var clippy = $("#jsclippy").select2({
					placeholder: "<?php $L->p('Start typing to see a list of suggestions') ?>",
					allowClear: true,
					width: "100%",
					theme: "bootstrap4",
					minimumInputLength: 2,
					dropdownParent: "#jsclippyContainer",
					language: {
						inputTooShort: function () { return ''; }
					},
					ajax: {
						url: HTML_PATH_ADMIN_ROOT+"ajax/clippy",
						data: function (params) {
							var query = { query: params.term }
							return query;
						},
						processResults: function (data) {
							return data;
						}
					},
					templateResult: function(data) {
						// console.log(data);
						var html = '';
						if (data.type=='menu') {
							html += '<a href="'+data.url+'"><div class="search-suggestion">';
							html += '<span class="fa fa-'+data.icon+'"></span>'+data.text+'</div></a>';
						} else {
							if (typeof data.id === 'undefined') {
								return '';
							}
							html += '<div class="search-suggestion">';
							html += '<div class="search-suggestion-item">'+data.text+' <span class="badge badge-pill badge-light">'+data.type+'</span></div>';
							html += '<div class="search-suggestion-options">';
							html += '<a target="_blank" href="'+DOMAIN_PAGES+data.id+'"><?php $L->p('view') ?></a>';
							html += '<a class="ml-2" href="'+DOMAIN_ADMIN+'edit-content/'+data.id+'"><?php $L->p('edit') ?></a>';
							html += '</div></div>';
						}

						return html;
					},
					escapeMarkup: function(markup) {
						return markup;
					}
				}).on("select2:closing", function(e) {
					e.preventDefault();
				}).on("select2:closed", function(e) {
					clippy.select2("open");
				});
				clippy.select2("open");

			});
			</script>
			<ul class="list-group list-group-striped p-3">
			<li class="list-group-item pt-0"><h4 class="m-0"><?php $L->p('Notifications') ?></h4></li>
			<?php
			$logs = array_slice($syslog->db, 0, NOTIFICATIONS_AMOUNT);
			foreach ($logs as $log) {
				$phrase = $L->g($log['dictionaryKey']);
				echo '<li class="list-group-item">';
				echo $phrase;
				if (!empty($log['notes'])) {
					echo ' « <b>'.$log['notes'].'</b> »';
				}
				echo '<br><span class="notification-date"><small>';
				echo Date::format($log['date'], DB_DATE_FORMAT, NOTIFICATIONS_DATE_FORMAT);
				echo ' [ '.$log['username'] .' ]';
				echo '</small></span>';
				echo '</li>';
			}
			?>
			</ul>
			</div>

			<?php Theme::plugins('dashboard') ?>
		</div>
		
	</div>
</div>
