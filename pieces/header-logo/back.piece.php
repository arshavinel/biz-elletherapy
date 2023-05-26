<?php

use Arshwell\Monolith\Table\Files\Image;

/**
 * @var array $logo {
 *      @param ?Image $file
 *      @param ?string $text
 * }
 */
$logo = [
    'file' => ($piece['logo']['file'] instanceof Image ? $piece['logo']['file']->url('small') : null),
    'text' => $piece['logo']['text'] ?? 'Logo text not found'
];

$appEnv = $piece['appEnv'];
