<?php

namespace rusbeldoor\yii2General\common\helpers;

class AppHelper
{
    /**********************************
     *** *** *** Завершения *** *** ***
     **********************************/

    /**
     * Завершение, если не ajax запрос
     *
     * @return void
     */
    public static function exitIfNotAjaxRequest()
    { if (!Yii::$app->request->isAjaxRequest) { exit; } }

    /**
     * Завершение, если не post запрос
     *
     * @return void
     */
    public static function exitIfNotPostRequest()
    { if (!Yii::$app->request->isPostRequest) { exit; } }

    /**
     * Завершение с выводом
     *
     * @param $string string
     * @return void
     */
    public static function exitWithEcho($string)
    { echo $string; exit; }

    /**
     * Завершение с выводом сообщения
     *
     * @param $type string
     * @param $text string
     * @param $close bool
     * @return void
     */
    public static function exitWithEchoMessage($type, $text, $close = false)
    { self::exitWithEcho(AlertHelper::alert($type, $text, $close)); }

    /**
     * Завершение с выводом json
     *
     * @param $data array
     * @return void
     */
    public static function exitWithJson($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    /**
     * Завершение с выводом json ['result' => $result, 'data' => $data]
     *
     * @param $result mixed
     * @param $data mixed
     * @return void
     */
    public static function exitWithJsonResultData($result, $data = null)
    {
        $array = [];
        $array['result'] = $result;
        if ($data) { $array['data'] = $data; }
        self::exitWithJson($array);
    }

    /**
     * Завершение с выводом json ['result' => $result]
     *
     * @param $result mixed
     * @return void
     */
    public static function exitWithJsonResult($result)
    { self::exitWithJsonResultData($result); }

    /**
     * ...
     *
     * @param array $params
     * @return void
     */
    public static function redirectWitchFlash($url, $flasType, $flasahText)
    {
        Yii::app()->user->setFlash($flasType, $flasahText);
        Yii::app()->controller->redirect($url);
    }

    /****************************************
     *** *** *** Работа с файлами *** *** ***
     ****************************************/

    /**
     * Логирование данных в файл
     *
     * @param $file string
     * @param $string string
     * @return void
     */
    public static function log($file, $string, $n = true)
    {
        $filename = '@runtime/' . $file . '.log';
        @error_log('[' . date('H:i:s d.m.Y') . ']    ' . $string . ($n ? "\n" : ''), 3, $filename);
        @chmod($filename, 0777);
    }
}