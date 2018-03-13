<?php

namespace app\models\forms;

use app\models\User;

class SettingsForm extends User
{
    public $facebook;
    public $instagram;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['real_name', 'real_last_name', 'country', 'city'], 'string', 'max' => 35],
            [['about'], 'string', 'max' => $this->aboutLength],
            [['facebook', 'instagram'], 'url', 'defaultScheme' => ['http', 'https']],
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
        ];
    }

    public function getLinksSettings()
    {
        return [
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
        ];
    }
}