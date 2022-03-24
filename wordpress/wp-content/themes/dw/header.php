<?php?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= get_bloginfo('name');?></title>
</head>
<body>
<header>
    <h1 class="header__title"><?= get_bloginfo('name');?></h1>
    <p class="header__placeholder"><?= get_bloginfo('description');?></p>
    <nav class="header__nav">
        <h2 class="nav__title">Navigation de mon <?= get_bloginfo('name')?></h2>
        <p class="nav__placeholder">Voici mon contenu</p>
		<ul class="nav__liste">
			<?php foreach (dw_get_menu_items('primary') as $link): ?>
				<li class="<?=$link->getBemClasses('nav__item');?>">
					<a href="<?= $link->url; ?>"
							<?= $link ->title? 'title = "' . $link->title . '"' : '';?>
					   class="nav__link"><?= $link->label; ?></a>
					<?php if ($link-> hasSubItems()):?>
						<ul class="nav__subcontainer">
							<?php foreach ($link->subitems as $sub): ?>
								<li class="<?=$link -> getBemClasses('nav__item')?>">
									<a href="<?= $sub->url; ?>"
											<?= $sub ->title? 'title = "' . $sub->title . '"' : '';?>
									   class="nav__link"><?= $sub->label; ?></a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif;?>
				</li>
			<?php endforeach; ?>
		</ul>
    </nav>
</header>

