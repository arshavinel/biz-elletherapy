<?php

namespace Arshavinel\ElleTherapy\Unit;

final class Video {
    /**
     * Youtube functions.
     */
    static function is_yt ($url) {
        return preg_match('/^(https?:\/\/(w{0,3}.?youtube+\.\w{2,3})\/watch\?v=[\w\-\_]{11}([^\/\.])*$|^http:\/\/(w{0,3}.?youtu\.be\/[\w\-\_]{11}([^\/\.])*$))/', $url);
    }

    static function get_yt_id ($url) {
        if (preg_match("/v=[a-zA-Z0-9_\-]+/", $url, $matches, PREG_OFFSET_CAPTURE)) {
            return str_replace('v=','',$matches[0][0]);
        }
        else {
            preg_match('/^.*youtu.be\/([a-zA-Z0-9_\-]+)$/', $url, $matches, PREG_OFFSET_CAPTURE);
            return $matches[1][0];
        }
    }

    static function get_yt_thumb ($url) {
        return "https://i3.ytimg.com/vi/". get_yt_id($url) ."/hqdefault.jpg";
    }


    /**
     * Vimeo functions.
     */
    static function is_vimeo ($url) {
        return preg_match('/^https?:\/\/(www\.|player\.)?vimeo\.com(\/video)?\/(\d+).*$/', $url);
    }

    static function get_vimeo_id ($url) {
        preg_match('/^https?:\/\/(www\.|player\.)?vimeo\.com(\/video)?\/(\d+).*$/', $url, $matches);

        return $matches[3];
    }

    static function get_vimeo_thumb ($url) {
        $data = json_decode(file_get_contents('https://vimeo.com/api/v2/video/'. get_vimeo_id($url) .'.json'));

        return $data[0]->thumbnail_large;
    }



    /**
     * General video functions
     */
    static function valid_video ($url) {
        return is_yt($url) || is_vimeo($url);
    }

    static function get_video_id ($url) {
        if (is_yt($url)) {
            return get_yt_id($url);
        }

        if (is_vimeo($url)) {
            return get_vimeo_id($url);
        }
    }

    static function get_video_thumb ($url) {
        if (is_yt($url)) {
            return get_yt_thumb($url);
        }

        if (is_vimeo($url)) {
            return get_vimeo_thumb($url);
        }
    }

    static function get_video_code ($url, $width = '560', $height = '315', $autoplay = false, $mute = false) {
        if (is_yt($url)) {
            return '<iframe width="'.$width.'" height="'.$height.'" src="//www.youtube.com/embed/'.get_yt_id($url).''.($autoplay ? '?autoplay=1' : '').'" '.($mute ? 'volume="0"' : '').' frameborder="0" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>';
        }

        if (is_vimeo($url)) {
            return '<iframe width="'.$width.'" height="'.$height.'" src="//player.vimeo.com/video/'.get_vimeo_id($url).'" frameborder="0" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>';
        }
    }

    static function get_video_embed ($url, $width = '560', $height = '315', $autoplay = false) {
    	if (preg_match('#<iframe(.*?)></iframe>#is', $url, $matches)) {
    		return preg_replace(
       			array('/width="\d+"/i', '/height="\d+"/i'),
       			array(sprintf('width="%d"', $width), sprintf('height="%d"', $height)),
                stripslashes($matches[0])
            );
    	}
        else {
    		return get_video_code($url, $width, $height, $autoplay);
    	}
    }
}
