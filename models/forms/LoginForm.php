<?php


namespace app\models\forms;


use app\models\User;
use Yii;

class LoginForm extends User
{
    private $_user = false;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'name'], 'required'],
            ['email', 'email', 'message' => 'Błędny adres e-mail.'],
            [['password'], 'required'],
            ['password', 'validatePasswordData']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => 'E-mail',
            'password' => 'Hasło',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     * @return bool|void
     */
    public function validatePasswordData($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Błędny adres e-mail lub hasło');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), 3600 * 24 * 30);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return array|bool|\yii\db\ActiveRecord
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::find()->where(['email' => $this->email])->one();
        }

        return $this->_user;
    }
}