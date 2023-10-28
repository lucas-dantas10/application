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
            ['nome','required', 'message' => 'Nome não pode estar em branco'],
            ['nome', 'string']
        ];
    }
}
