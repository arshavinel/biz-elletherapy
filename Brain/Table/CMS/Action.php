<?php

namespace Brain\Table\CMS;

use Arsh\Core\Table;
use Arsh\Core\Web;
use Brain\Table\CMS\Admin;

final class Action extends Table {
    const TABLE       = 'cms_actions';
    const PRIMARY_KEY = 'id_cms_action';

    static function save (array $get, array $post, array $files = array()): int {
        if (!empty($files)) {
            $setfiles = function (&$value, bool $content = false) use (&$setfiles) {
                if (is_array($value)) {
                    if (isset($value['name']) && isset($value['type']) && isset($value['tmp_name'])
                    && isset($value['error']) && isset($value['size'])) {
                        $value['content'] = $value['tmp_name'];

                        unset($value['tmp_name'], $value['error']);
                        $setfiles($value['content'], true);
                    }
                    else {
                        foreach ($value as &$v) {
                            $setfiles($v, $content);
                        }
                    }
                }
                else if ($content) {
                    $value = addslashes(file_get_contents($value));
                }
            };

            $setfiles($files);
        }

        unset($post['ajax_token']);
        unset($post['form_token']);

        $params = array(
            'get'   => $get,
            'post'  => $post,
            'files' => $files
        );

        return self::insert(
            "id_admin_session, route, request, params, inserted_at",
            "?, ?, ?, ?, UNIX_TIMESTAMP()",
            array(Admin::auth('id_admin_session'), Web::key(), Web::request(), json_encode($params, JSON_INVALID_UTF8_IGNORE))
        );
    }
}

// $curl = curl_init();
//
// $url = "https://www.ladygaga.com";
// // $url = Arsh\Core\Web::url('site.ajax.workforce.offer');
//
// // Set the url
// curl_setopt($curl, CURLOPT_URL, $url);
// // curl_setopt($curl, CURLOPT_POST, 1);
// curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
//     'form_token' => Arsh\Core\Session::token('form'),
//     'ajax_token' => Arsh\Core\Session::token('ajax'),
//     'ana' => 'mere'
// )));
// // Set the result output to be a string.
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//
// $output = curl_exec($curl);
//
// curl_close($curl);
//
// echo $output;
// exit;
//
// $curl = curl_init(Arsh\Core\Web::url('site.ajax.workforce.offer'));
//
// // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
// // curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
// // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
// // curl_setopt($curl, CURLOPT_POSTFIELDS, file_get_contents(__FILE__));
// // curl_setopt($curl, CURLOPT_POSTREDIR, 3);
//
// curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
// curl_setopt($curl, CURLOPT_POST, 1);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
//     'form_token' => Arsh\Core\Session::token('form'),
//     'ajax_token' => Arsh\Core\Session::token('ajax'),
//     'ana' => 'mere'
// )));
// // curl_setopt($curl, CURLOPT_SSLVERSION, 6);
// // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
// // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
// // curl_setopt($curl, CURLOPT_FORBID_REUSE, 1);
// curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
// // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Connection: Close'));
//
// $response = curl_exec($curl);
//
// if (!$response) {
//     $errno = curl_errno($curl);
//     $errstr = curl_error($curl);
//     curl_close($curl);
//     throw new Exception("cURL error: [$errno] $errstr");
// }
//
// curl_close($curl);
// exit;
