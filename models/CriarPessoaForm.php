<?php

namespace app\models;

use Yii;
use yii\base\Model;

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
