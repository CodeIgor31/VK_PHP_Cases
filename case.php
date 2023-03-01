<?php

interface TimeToWordConvertingInterface
{
    public function convert(int $hours, int $minutes);
}

class TimeToWordConvert implements TimeToWordConvertingInterface
{

    public function convert(int $hours, int $minutes)
    {
        static $min_dic = array(
            1 => 'Одна минута после',
            2 => 'Две минуты после',
            3 => 'Три минуты после',
            4 => 'Четыре минуты после',
            5 => 'Пять минут после',
            6 => 'Шесть минут после',
            7 => 'Семь минут после',
            8 => 'Восемь минут после',
            9 => 'Девять минут после',
            10 => 'Десять минут после',
            11 => 'Одиннадцать минут после',
            12 => 'Двенадцать минут после',
            13 => 'Тринадцать минут после',
            14 => 'Четырнадцать минут после',

            16 => 'Шестнадцать минут после',
            17 => 'Семнадцать минут после',
            18 => 'Восемнадцать минут после',
            19 => 'Девятнадцать минут после',
            20 => 'Двадцать минут после',
            21 => 'Двадцать одна минута после',
            22 => 'Двадцать две минуты после',
            23 => 'Двадцать три минуты после',
            24 => 'Двадцать четыре минуты после',
            25 => 'Двадцать пять минут после',
            26 => 'Двадцать шесть минут после',
            27 => 'Двадцать семь минут после',
            28 => 'Двадцать восемь минут после',
            29 => 'Двадцать девять минут после',

            31 => 'Двадцать девять минут до',
            32 => 'Двадцать восемь минут до',
            33 => 'Двадцать семь минут до',
            34 => 'Двадцать шесть минут до',
            35 => 'Двадцать пять минут до',
            36 => 'Двадцать четыре минуты до',
            37 => 'Двадцать три минуты до',
            38 => 'Двадцать две минуты до',
            39 => 'Двадцать одна минута до',
            40 => 'Двадцать минут до',
            41 => 'Девятнадцать минут до',
            42 => 'Восемнадцать минут до',
            43 => 'Семнадцать минут до',
            44 => 'Шестнадцать минут до',
            45 => 'Пятнадцать минут до',
            46 => 'Четырнадцать минут до',
            47 => 'Тринадцать минут до',
            48 => 'Двенадцать минут до',
            49 => 'Одиннадцать минут до',
            50 => 'Десять минут до',
            51 => 'Девять минут до',
            52 => 'Восемь минут до',
            53 => 'Семь минут до',
            54 => 'Шесть минут до',
            55 => 'Пять минут до',
            56 => 'Четыре минуты до',
            57 => 'Три минуты до',
            58 => 'Две минуты до',
            59 => 'Одна минута до',
        );
        static $hours_dic = array(
            1 => 'Один час',
            2 => 'Два часа',
            3 => 'Три часа',
            4 => 'Четыре часа',
            5 => 'Пять часов',
            6 => 'Шесть часов',
            7 => 'Семь часов',
            8 => 'Восемь часов',
            9 => 'Девять часов',
            10 => 'Десять часов',
            11 => 'Одиннадцать часов',
            12 => 'Двенадцать часов',
        );
        static $after_dic = array(
            1 => 'часа',
            2 => 'двух',
            3 => 'трех',
            4 => 'четырех',
            5 => 'пяти',
            6 => 'шести',
            7 => 'семи',
            8 => 'восьми',
            9 => 'девяти',
            10 => 'десяти',
            11 => 'одиннадцати',
            12 => 'двенадцати',
        );
        static $fifthteen_crat_dic = array(
            1 => 'первого',
            2 => 'второго',
            3 => 'третьего',
            4 => 'четвертого',
            5 => 'пятого',
            6 => 'шестого',
            7 => 'седьмого',
            8 => 'восьмого',
            9 => 'девятого',
            10 => 'десятого',
            11 => 'одиннадцатого',
            12 => 'двенадцатого',
        );

        $mins = ($minutes - 10 < 0) ? "0$minutes" : "$minutes";
        $time = "$hours:$mins";
        if ($minutes == 0) {
            $res = "$hours_dic[$hours]";
        } elseif ($minutes == 15) {
            $next_hour = ($hours + 1 > 12) ? 1 : $hours + 1;
            $res = "Четверть $fifthteen_crat_dic[$next_hour]";
        } elseif ($minutes == 30) {
            $next_hour = ($hours + 1 > 12) ? 1 : $hours + 1;
            $res = "Половина $fifthteen_crat_dic[$next_hour]";
        } elseif ($minutes < 30) {
            $res = "$min_dic[$minutes] $after_dic[$hours]";
        } elseif ($minutes > 30) {
            $next_hour = ($hours + 1 > 12) ? 1 : $hours + 1;
            $res = "$min_dic[$minutes] $after_dic[$next_hour]";
        }
        $res_time = "$time $res.";
        return $res_time;
    }
}
