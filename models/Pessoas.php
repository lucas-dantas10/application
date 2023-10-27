<?php 

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Pessoas
 * @package app/models
 * @property int $id
 * @property string $nome
 */

class Pessoas extends ActiveRecord
{

    public static function tableName()
    {
        return 'pessoas';
    }

    public function rules()
    {
        return [
            ['nome', 'required'],
            ['nome', 'string', 'max' => 60],
        ];
    }

    public function fields()
    {
        return [
            'id',
            'nome',
            'atributos' => function ($model) {
                return $model['atributos'];
            },
            'created_at',
        ];
    }

    public function getAtributos()
    {
        return $this->hasMany(Atributos::class, ['pessoa_id' => 'id']);
    }
}
