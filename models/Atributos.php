<?php 

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Pessoas
 * @package app/models
 * @property int $id
 * @property string $nome
 * @property int $pessoa_id
 * @property Pessoas $pessoas
 */

class Atributos extends ActiveRecord
{

    public static function tableName()
    {
        return 'atributos';
    }

    public function rules()
    {
        return [
            [['nome', 'pessoa_id'], 'required'],
            ['nome', 'string', 'max' => 60],
            [['pessoa_id' => 'integer']]
        ];
    }

    // public function fields()
    // {
    //     return [
    //         'nome'
    //     ];
    // }


    public function getPessoa()
    {
        return $this->hasOne(Pessoas::class, ['id' => 'pessoa_id']);
    }
}
