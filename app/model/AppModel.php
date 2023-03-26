<?php

class AppModel {

    static function summarize(array $object, int $limit, string $key, string $separator = ' ') {
        // Convert the object $best_companies to an array
        $object = json_decode(json_encode($object), true);
        foreach ($object as $i => $value) {
            if (strlen($value["$key"]) > $limit) {
                $object[$i]["$key"] = substr($value["$key"], 0, $limit);
                $object[$i]["$key"] = substr($object[$i]["$key"], -$limit, strrpos($object[$i]["$key"], $separator));
                $object[$i]["$key"] .= '...';
            }
        }
        // Convert the array $best_companies to an object
        $object = json_decode(json_encode($object));
        return (array)$object;
    }

    static function getEllapsedTime($object, $key) {
        $object = json_decode(json_encode($object), true);
        $tab = array(
            'y' => 'an',
            'm' => 'mois',
            'd' => 'jour',
            'h' => 'heure',
            'i' => 'minute',
            's' => 'seconde'
        );
        foreach ($object as $i => $value) {
            $now = new DateTime();
            $ago = new DateTime($object[$i][$key]);
            $diff = $now->diff($ago);
            foreach ($tab as $j => $value2) {
                if ($diff->$j > 0) {
                    if ($diff->$j > 1 && $j != 'm') {
                        $value2 .= 's';
                    }
                    $object[$i][$key] = 'Il y a ' . $diff->$j . ' ' . $value2;
                    break;
                }
            }
        }
        $object = json_decode(json_encode($object));
        return (array)$object;
    }

    static function random($length) {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_#$%&*+';
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $str;
    }

    static function escapeElement($element) {
        $element = htmlspecialchars($element);
        $element = str_replace("'", "\'", $element);
        return $element;
    }
}
