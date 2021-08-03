<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	[@css@]
</head>
<body>
	<div id="border">
		<table id="header">
			<tr>
		        <td align="left">
					<h3><?= App\Views\Site::sentence('titlu') ?></h3>
				</td>
				<td align="right">
					<a target="_blank" href="<?= App\Core\Web::site() ?>">
						<img src="<?= (new App\Core\Table\Files\Image('App\Tables\Logo', App\Tables\Logo::field('id_logo', "visible = 1"), 'useful'))->url('medium') ?>" />
					</a>
				</td>
			</tr>
		</table>

		<p><?= App\Views\Site::content('conținut') ?></p>

		<div class="table-responsive">
			<table border="1" cellpadding="5" cellspacing="0">
				<tr>
					<th><?= App\Views\Site::sentence('tabel.coloană.id') ?></th>
					<th><?= App\Views\Site::sentence('tabel.coloană.nume') ?></th>
					<th><?= App\Views\Site::sentence('tabel.coloană.telefon') ?></th>
					<th><?= App\Views\Site::sentence('tabel.coloană.adăugat') ?></th>
				</tr>
				<?php
				foreach ($mail['appointments'] as $appointment) { ?>
	                <tr>
						<th><?= $appointment->id() ?></th>
						<td><?= $appointment->firstname ?> <?= $appointment->lastname ?></td>
						<td><?= $appointment->phone ?></td>
						<td><?= date('d/m/Y H:i', $appointment->inserted_at) ?></td>
					</tr>
				<?php } ?>
			</table>
		</div>

		<p><?= App\Views\Site::content('programări', array(
			'link' => '<a target="_blank" href="'. App\Core\Web::url('cms.forms.appointment') .'">'.
				App\Views\Site::sentence('programări.link.text') .
			'</a>'
		)) ?></p>

		<div id="footer">
            <a target="_blank" href="<?= App\Core\Web::site() ?>">
				Melena Therapy
			</a>
        </div>
	</div>
</body>
</html>
