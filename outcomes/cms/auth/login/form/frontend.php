<div class="container padding-4th-4th">
    <?= \Arshwell\Monolith\Piece::html("header-logo", [
        'logo' => [
            'file' => $_GLOBAL['logos']->get('header'),
            'text' => $_CMS_CONFIG['content']['title'],
        ],
        'appEnv' => $_GLOBAL['appEnv'],
    ]) ?>
	<form method="POST" action="<?= Arshwell\Monolith\Web::url('cms.auth.login.submit') ?>" class="border border-primary rounded p-4">
		<?= Arshwell\Monolith\HTML::formToken() ?>
		<?php
		if (!empty($_GET['url']) && Arshwell\Monolith\Filter::isURL($_GET['url'])) { ?>
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

    <div class="padding-2nd-1st">
        <?= \Arshwell\Monolith\Piece::html('cms/copyright') ?>
    </div>
</div>
