<?php


class Middleware {
    //xss prevention from Fred's PHP course
    public static function xssafe($data, $encoding = 'UTF-8') {

        return htmlspecialchars($data, ENT_QUOTES | ENT_HTML401, $encoding);
    }

    public static function xecho($data) {

        echo self::xssafe($data);
    }
}
