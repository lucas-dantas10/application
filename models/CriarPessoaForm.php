<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class CriarPessoaForm extends Model
{
    public $nome;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['nome', 'required'],
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return true;
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    // public function getUser()
    // {
    //     if ($this->_user === false) {
    //         $this->_user = User::findByUsername($this->username);
    //     }

    //     return $this->_user;
    // }
}
