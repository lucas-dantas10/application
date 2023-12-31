<?php

namespace app\controllers;

use app\models\Atributos;
use app\models\CriarAtributoForm;
use app\models\EditarAtributoForm;
use app\models\Pessoas;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;

class AtributosController extends Controller
{
    public function actionIndex()
    {
        $query = Atributos::find()
                ->joinWith('pessoas');
        
        $request = Yii::$app->request->get();

        $search = $request['search'] ?? '';

        $pagination = new Pagination([
            'defaultPageSize' => 4,
            'totalCount' => Atributos::find()->count()
        ]);

        $attributes = $query
            ->orderBy('pessoa_id')
            ->where(['like', 'atributos.nome', $search])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        Yii::$app->response->format = Response::FORMAT_JSON;

        return [
            'attributes' => $attributes,
            'pagination' => $pagination,
        ];
    }

    public function actionCreate()
    {
        $model = new CriarAtributoForm();

        $peoples = Pessoas::find()->all();

        $peoplesFormated = [];

        for ($i = 0; $i < count($peoples); $i++) {
            $peoplesFormated += [
                $peoples[$i]['id'] => $peoples[$i]['nome'],
            ];
        }

        return $this->render('create', [
            'model' => $model,
            'peoples' => $peoplesFormated
        ]);
    }

    public function actionStore()
    {
        $request = Yii::$app->request->post();

        $nameAttr = $request['CriarAtributoForm']['nome'];
        $peopleId = $request['CriarAtributoForm']['pessoa'];

        $attributes = new Atributos();

        $attributes->nome = $nameAttr;
        $attributes->pessoa_id = $peopleId;
        $attributes->created_at = date('Y-m-d H:i:s');

        $attributes->save();

        return $this->redirect("http://localhost:8000/index.php?r=site%2Fabout");
    }

    public function actionView($id)
    {
        $attribute = Atributos::findOne($id);
        $model = new EditarAtributoForm();

        return $this->render('edit', [
            'attribute' => $attribute,
            'model' => $model,
        ]);
    }

    public function actionUpdate()
    {
        $request =  Yii::$app->request->post();

        $name = $request['EditarAtributoForm']['nome'];
        $idAttribute = $request['id'];

        $attribute = Atributos::findOne($idAttribute);

        $attribute->nome = $name;

        $attribute->update();

        return $this->redirect("http://localhost:8000/index.php?r=site%2Fabout");
    }

    public function actionDestroy($id)
    {
        $attribute = Atributos::findOne($id);

        return $this->render('destroy', [
            'attribute' => $attribute,
        ]);
    }

    public function actionDelete($id)
    {
        $attribute = Atributos::findOne($id);

        $attribute->delete();

        return $this->redirect("http://localhost:8000/index.php?r=site%2Fabout");
    }
}
