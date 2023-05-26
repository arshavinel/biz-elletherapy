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
					<h3><?= Arshavinel\ElleTherapy\View\Site::sentence('titlu') ?></h3>
				</td>
				<td align="right">
					<a target="_blank" href="<?= Arshwell\Monolith\Web::site() ?>">
						<img src="<?= (new Arshwell\Monolith\Table\Files\Image('Arshavinel\ElleTherapy\Table\Identity\Logo', Arshavinel\ElleTherapy\Table\Identity\Logo::field('id_logo', "visible = 1"), 'useful'))->url('medium') ?>" />
					</a>
				</td>
			</tr>
		</table>

		<p><?= Arshavinel\ElleTherapy\View\Site::content('conținut') ?></p>

		<div class="table-responsive">
			<table border="1" cellpadding="5" cellspacing="0">
				<tr>
					<th><?= Arshavinel\ElleTherapy\View\Site::sentence('tabel.coloană.id') ?></th>
					<th><?= Arshavinel\ElleTherapy\View\Site::sentence('tabel.coloană.nume') ?></th>
					<th><?= Arshavinel\ElleTherapy\View\Site::sentence('tabel.coloană.email') ?></th>
					<th><?= Arshavinel\ElleTherapy\View\Site::sentence('tabel.coloană.telefon') ?></th>
					<th><?= Arshavinel\ElleTherapy\View\Site::sentence('tabel.coloană.adăugat') ?></th>
				</tr>
				<?php
				foreach ($mail['contacts'] as $contact) { ?>
	                <tr>
						<th><?= $contact->id() ?></th>
						<td><?= $contact->name ?></td>
						<td><?= $contact->email ?></td>
						<td><?= $contact->phone ?></td>
						<td><?= date('d/m/Y H:i', $contact->inserted_at) ?></td>
					</tr>
				<?php } ?>
			</table>
		</div>

		<p><?= Arshavinel\ElleTherapy\View\Site::content('contacte', array(
			'link' => '<a target="_blank" href="'. Arshwell\Monolith\Web::url('cms.forms.contact') .'">'.
				Arshavinel\ElleTherapy\View\Site::sentence('contacte.link.text') .
			'</a>'
		)) ?></p>

		<div id="footer">
            <a target="_blank" href="<?= Arshwell\Monolith\Web::site() ?>">
				Elle Therapy
			</a>
        </div>
	</div>
</body>
</html>
