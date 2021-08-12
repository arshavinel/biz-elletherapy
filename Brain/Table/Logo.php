<?php

namespace Brain\Table;

use Arsh\Core\Table;

final class Logo extends Table {
    const TABLE       = 'logos';
    const PRIMARY_KEY = 'id_logo';

    const FILES = array(
        'favicon_cms' => array(
            'sizes' => array(
                'tinny' => array(
                    'width' => 64,
                    'height' => 64
                )
            )
        ),
        'favicon_site' => array(
            'sizes' => array(
                'tinny' => array(
                    'width' => 64,
                    'height' => 64
                )
            )
        ),
        'header' => array(
            'sizes' => array(
                'small' => array(
                    'width' => NULL,
                    'height' => 55
                )
            )
        ),
        'useful' => array(
            'sizes' => array(
                'medium' => array(
                    'width' => NULL,
                    'height' => 200
                )
            )
        )
    );
}
