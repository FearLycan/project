<?php
namespace app\components;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
class Controller extends \yii\web\Controller
{
    /**
     * Throws NotFoundHttpException.
     *
     * @param string|null $message
     * @throws NotFoundHttpException
     */
    public function notFound($message = null) {
        if ($message === null) {
            $message = 'Page not found';
        }
        throw new NotFoundHttpException($message);
    }
    /**
     * Throws ForbiddenHttpException.
     *
     * @param string|null $message
     * @throws ForbiddenHttpException
     */
    public function accessDenied($message = null) {
        if ($message === null) {
            //$message = 'Nie jesteś uprawniony do przeglądania tej strony.';
            $message = 'Page not found';
        }
        throw new ForbiddenHttpException($message);
    }
}