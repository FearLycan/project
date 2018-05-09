<?php

namespace app\models\forms;

use app\models\Image;
use app\models\User;

class SettingsForm extends User
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    public $facebook;
    public $instagram;

    public $myFile;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['about'], 'string', 'max' => $this->aboutLength],
            [['facebook', 'instagram'], 'url', 'defaultScheme' => ['http', 'https']],
            [['myFile'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1024 * 1024],
            [['myFile'], 'required', 'on' => static::SCENARIO_CREATE],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'real_name' => 'Imię',
            'real_last_name' => 'Nazwisko',
            'city' => 'Miasto',
            'country' => 'Państwo',
            'about' => 'O mnie',
            'link_fb' => 'Facebook',
            'link_instagram' => 'Instagram',
            'myFile' => 'Avatar',
        ];
    }

    public function getLinksSettings()
    {
        return [
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
        ];
    }

    public function upload()
    {
        $url = Image::URL_AVATAR . $this->avatar;
        if (!$this->myFile->saveAs($url)) {
            $this->addError('myFile', 'Unable to save the uploaded file');
            return false;
        }
        $this->myFile = $url;

        Image::changeSize($url, Image::IMAGE_AVATAR_MAX_WIDTH, Image::IMAGE_AVATAR_MAX_HEIGHT);
    }
}