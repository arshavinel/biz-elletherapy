<?php

use Arshwell\Monolith\Table\Files\Image;
use Arshwell\Monolith\Web;

use Arshavinel\ElleTherapy\Table\Form\Appointment;
use Arshavinel\ElleTherapy\Table\ContactForm;
use Arshavinel\ElleTherapy\Table\Identity\Logo;

$_CMS_CONFIG = array(
    'content' => array(
        'favicon'   => (new Image(
            Logo::class,
            Logo::field('id_logo', "visible = 1"),
            'favicon_cms'
        ))->url('tinny'),
        'title'     => "CMS Elle",
        'routes'    => array(
            'site'      => 'site.home',
            'cms'       => 'cms.home',
            'admins'    => 'cms.accounts.admins.profiles',
            'logs'      => 'cms.accounts.admins.logs',
            'logout'    => 'cms.auth.logout'
        ),
    ),
    'menu' => array(
        array(
            'icon'  => 'home',
            'text'  => 'Dashboard',
    		'route' => 'cms.home'
    	),

        array(
            'icon'  => 'calendar-alt',
            'text'  => 'Evenimente',

    		'links' => array(
    			array(
                    'icon'  => 'boxes',
                    'text'  => 'Serii',
                    'route' => 'cms.events.groups'
    			),
                array(
                    'icon'  => 'coffee',
                    'text'  => 'Întâlniri',
                    'route' => 'cms.events.meetings'
    			),
                array(
                    'icon'  => 'grin-stars',
                    'text'  => 'Promo',

            		'links' => array(
            			array(
                            'icon'  => 'random',
                            'text'  => 'Tombole',
                            'route' => 'cms.events.promo.raffles'
            			),
                        array(
                            'icon'  => 'envelope',
                            'text'  => 'Tombole aplicări',
                            'route' => 'cms.events.promo.joins.raffles'
            			),
                        array(
                            'icon'  => 'percent',
                            'text'  => 'Reduceri',
                            'route' => 'cms.events.promo.discounts'
            			),
                        array(
                            'icon'  => 'envelope',
                            'text'  => 'Reduceri aplicări',
                            'route' => 'cms.events.promo.joins.discounts'
            			),
            		)
            	)
    		)
    	),

        array(
            'icon'  => 'clipboard-list',
            'text'  => 'Servicii',
            'route' => 'cms.services'
    	),

        array(
            'icon'  => 'question-circle',
            'text'  => 'FAQ',

    		'links' => array(
    			array(
                    'icon'  => 'grin-stars',
                    'text'  => 'Lucruri interesante',
                    'route' => 'cms.faq.interesting'
    			),
                array(
                    'icon'  => 'spa',
                    'text'  => 'NLP',
                    'route' => 'cms.faq.nlp'
    			)
    		)
    	),

        array(
            'icon'  => 'compress',
            'text'  => 'Comparare industrii',

    		'links' => array(
    			array(
                    'icon'  => 'building',
                    'text'  => 'Industrii',
                    'route' => 'cms.comparison.industries'
    			),
                array(
                    'icon'  => 'list',
                    'text'  => 'Caracteristici',
                    'route' => 'cms.comparison.characteristics'
    			)
    		)
    	),

        array(
            'icon'  => 'address-card',
            'text'  => 'Formulare',

            'badge' => !Web::inGroup('cms.forms') ? array(
                'class' => "warning",
                'text'  => Appointment::count(
                    "inserted_at >= UNIX_TIMESTAMP(CURDATE() + INTERVAL -7 DAY)"
                ) + ContactForm::count(
                    "inserted_at >= UNIX_TIMESTAMP(CURDATE() + INTERVAL -7 DAY)"
                )
            ) : false,

    		'links' => array(
    			array(
                    'icon'  => 'calendar-check',
                    'text'  => 'Programări',
                    'route' => 'cms.forms.appointment',

                    // TODO: remove them at next update
                    'color'     => time() < strtotime('2021-07-31') ? 'success' : false,
                    'tooltip'   => time() < strtotime('2021-07-31') ? 'Nou' : false,

                    'badge' => array(
                        'class' => "info",
                        'text'  => Appointment::count(
                            "inserted_at >= UNIX_TIMESTAMP(CURDATE() + INTERVAL -7 DAY)"
                        )
                    )
    			),
                array(
                    'icon'  => 'file-contract',
                    'text'  => 'Contact',
                    'route' => 'cms.forms.contact',

                    'badge' => array(
                        'class' => "info",
                        'text'  => ContactForm::count(
                            "inserted_at >= UNIX_TIMESTAMP(CURDATE() + INTERVAL -7 DAY)"
                        )
                    )
    			)
    		)
    	),

        array(
            'icon'  => 'newspaper',
            'text'  => 'Blog',

    		'links' => array(
    			array(
                    'icon'  => 'window-maximize',
                    'text'  => 'Categorii',
                    'route' => 'cms.blog.categories'
    			),
                array(
                    'icon'  => 'copy',
                    'text'  => 'Articole',
                    'route' => 'cms.blog.articles'
    			)
    		)
    	),

        array(
            'icon'  => 'window-restore',
            'text'  => 'Conținut',

    		'links' => array(
                array(
                    'icon'  => 'tint',
                    'text'  => 'Logo-uri',
                    'route' => 'cms.content.logos'
    			),
                array(
                    'icon'  => 'copy',
                    'text'  => 'Pagini',
                    'group' => 'cms.content.views.pages',
                    'route' => 'cms.content.views.pages.all'
    			),
                array(
                    'icon'  => 'copy',
                    'text'  => 'Conținut general',
                    'group' => 'cms.content.views.general',
                    'route' => 'cms.content.views.general.all'
    			),
                array(
                    'icon'  => 'comment',
                    'text'  => 'Social media',
                    'route' => 'cms.content.social-media'
    			)
    		)
    	),

        array(
            'icon'  => 'cogs',
            'text'  => 'Setări',

    		'links' => array(
    			array(
                    'icon'  => 'cog',
                    'text'  => 'Setări generale',
                    'route' => 'cms.config.general.form'
    			),
                array(
                    'icon'  => 'th-large',
                    'text'  => 'Elemente site',
                    'route' => 'cms.config.site-elements.form'
    			)
    		)
    	),
    )
);
