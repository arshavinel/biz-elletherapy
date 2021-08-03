<div class="container padding-4th-4th">
	<h6>
		<?= $cms_config['content']['title'] ?>
		<?php
		if ($cms_config['content']['demo']) { ?>
			<sup class="badge badge-danger text-monospace font-weight-light text-capitalize" title="Te afli în varianta demo">DEMO</sup>
		<?php } ?>
	</h6>
	<form method="POST" action="<?= App\Core\Web::url('cms.auth.login.submit') ?>" class="border border-primary rounded p-4">
		<?= App\Core\HTML::formToken() ?>
		<?php
		if (!empty($_GET['url']) && App\Core\Filter::isURL($_GET['url'])) { ?>
			<input type="hidden" name="url" value="<?= $_GET['url'] ?>" />
		<?php } ?>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" id="email" placeholder="email"
			name="<?= $container ?>[email]" value="<?= $form->value("$container.email") ?>" />
			<span class="text-danger" form-error="email"><?= $form->error("$container.email") ?></span>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" placeholder="parolă"
			name="<?= $container ?>[password]" />
			<span class="text-danger" form-error="password"><?= $form->error("$container.password") ?></span>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

	<?php
	if ($cms_config['content']['copyright']) { ?>
		<div id="cms-copyright" class="padding-2nd-1st">
			<span class="text-danger">
				<span class="text-muted">©</span> <b>CMS</b> dezvoltat de echipa
				<a class="text-color-7" target="_blank" href="https://iscreambrands.ro">iscreambrands</a>.
			</span>
			<span class="text-muted nowrap">Toate drepturile rezervate.</span>
		</div>
	<?php } ?>
</div>
