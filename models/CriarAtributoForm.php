<?php

namespace app\models;

use Yii;
use yii\base\Model;

class CriarAtributoForm extends Model
{
    public $nome;
    public $pessoa;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['nome','required', 'message' => 'Nome não pode estar em branco'],
            ['nome', 'string'],
            ['pessoa', 'required', 'message' => 'Pessoa não pode estar em branco'],
            ['pessoa', 'string']
        ];
    }
}
