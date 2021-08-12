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
					<h3><?= Brain\View\Site::sentence('titlu', NULL, true) ?></h3>
				</td>
				<td align="right">
					<a target="_blank" href="<?= Arsh\Core\Web::site() ?>">
						<img src="<?= (new Arsh\Core\Table\Files\Image('Brain\Table\Logo', Brain\Table\Logo::field('id_logo', "visible = 1"), 'useful'))->url('medium') ?>" />
					</a>
				</td>
			</tr>
		</table>

		<p><?= Brain\View\Site::content('conținut', $mail['fields'], true) ?></p>

		<div id="footer">
            <a target="_blank" href="<?= Arsh\Core\Web::site() ?>">
				Melena Therapy
			</a>
        </div>
	</div>
</body>
</html>
