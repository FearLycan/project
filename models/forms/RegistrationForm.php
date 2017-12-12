<?php

namespace app\models\forms;

use app\models\User;
use Yii;


class RegistrationForm extends User
{
    public $password_first;
    public $password_second;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['name', 'unique'],
            [['name'], 'required', 'message' => 'Jaki będzie Twój pseudonim?'],
            ['email', 'unique'],
            [['email'], 'required', 'message' => 'Adres e-mail jest wymagany'],
            ['email', 'email', 'message' => 'Błędny adres e-mail'],
            [['password_first'], 'required', 'message' => 'Hasło jest wymagane'],
            [['password_second'], 'required', 'message' => 'Wpisz hasło jeszcze raz'],
            [['password_first', 'password_second'], 'string', 'length' => [4, 30]],
            ['password_second', 'confirmPassword'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'name' => 'Pseudonim',
            'email' => 'Adres e-mail',
            'password_first' => 'Hasło',
            'password_second' => 'Powtórz hasło',
        ];
    }


    public function confirmPassword($attribute)
    {
        if ($this->password_first != $this->password_second) {
            $this->addError($attribute, 'Podane hasła są różne');
        }
    }

    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

}
