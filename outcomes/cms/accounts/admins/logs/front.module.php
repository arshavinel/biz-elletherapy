<?php

return array(
    'breadcrumbs' => array(
        'Admins',
        'Logs'
    ),

    'actions' => array(
        'select' => array(
            'HTML' => array(
                'icon'      => 'arrow-alt-circle-left',
                'text'      => "Back to all",
                'class'     => "btn btn-sm btn-info",
                'hidden'    => (empty($_GET['ftr']) && (empty($_GET['ctn']) || $_GET['ctn'] == 'select')) // hide if SELECT page is active
            )
        ),
    ),

    'features' => array(

    ),

    'fields' => array(
        'id_profile' => array(
            'HTML' => array(
                'icon'          => 'users-cog',
                'label'         => "Admin",
                'type'          => 'select'
            )
        ),

        'logged_in_at' => array(
            'HTML' => array(
                'icon'          => 'calendar-check',
                'label'         => "Logged at",
                'type'          => 'date'
            )
        ),

        'from_cookie' => array(
            'HTML' => array(
                'label'     => "From Cookies",
                'icon'      => 'cookie-bite',
                'type'      => 'checkbox',
                'notes'     => array("Logged in from cookies data"),
                'value'     => 1
            )
        ),

        'last_activity_at' => array(
            'HTML' => array(
                'icon'          => 'calendar-check',
                'label'         => "Last activity at",
                'type'          => 'date'
            )
        ),

        'logged_out_at' => array(
            'HTML' => array(
                'icon'          => 'calendar-check',
                'label'         => "Logged at",
                'type'          => 'date'
            )
        ),

        'browser' => array(
            'HTML' => array(
                'icon'      => 'users-cog',
                'label'     => "Browser",
                'type'      => 'select',
                'values'    => array(
                    0           => 'undefined',
                    'safari'    => "Safari",
                    'edge'      => "Microsoft Edge",
                    'ie'        => "Internet Explorer",
                    'firefox'   => "Firefox",
                    'chrome'    => "Google Chrome",
                    'opera'     => "Opera",
                )
            )
        ),

        'os' => array(
            'HTML' => array(
                'icon'      => 'users-cog',
                'label'     => "OS",
                'type'      => 'select',
                'values'    => array(
                    0           => 'undefined',
                    'nix'       => "Windows 11",
                    'win10'     => "Windows 10",
                    'mac'       => "Mac",
                    'linux'     => "Linux",
                    'win8'      => "Windows 8",
                    'win7'      => "Windows 7",
                    'winxp'     => "Windows XP",
                    'winnt'     => "Windows NT",
                    'winvista'  => "Windows Vista",
                )
            )
        ),

        'touch' => array(
            'HTML' => array(
                'label'     => "Touch screen",
                'icon'      => 'eye',
                'type'      => 'checkbox',
                'notes'     => array("Device had touch screen"),
                'value'     => 1
            )
        ),

        'mobile' => array(
            'HTML' => array(
                'icon'      => 'users-cog',
                'label'     => "Mobile",
                'type'      => 'select',
                'values'    => array(
                    0           => 'undefined',
                    'android'   => "Android",
                    'ios'       => "iOS",
                    'windows'   => "Windows",
                    'blackberry'=> "Blackberry",
                )
            )
        ),

        'tablet' => array(
            'HTML' => array(
                'label'     => "Tablet",
                'icon'      => 'eye',
                'type'      => 'checkbox',
                'notes'     => array("Device was a tablet"),
                'value'     => 1
            )
        ),
    )
);
