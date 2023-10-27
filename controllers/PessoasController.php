<?php 

namespace app\controllers;

use app\models\CriarPessoaForm;
use app\models\Pessoas;
use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\data\Pagination;

class PessoasController extends Controller
{
    public function actionIndex()
    {
        $query = Pessoas::find()
            ->joinWith('atributos');

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => Pessoas::find()->count(),
        ]);

        $peoples = $query->orderBy('nome')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        Yii::$app->response->format = Response::FORMAT_JSON;

        return [
            'peoples' => $peoples,
            'pagination' => $pagination,
        ];
    }   

    public function actionView($id)
    {
        $people = Pessoas::findOne($id);
        return $this->render('view', [
            'people' => $people
        ]);
    }

    public function actionCreate()
    {
        $model = new CriarPessoaForm();
        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionStore()
    {
        $request = Yii::$app->request->post();
        
        $people = new Pessoas();

        $people->nome = $request['CriarPessoaForm']['nome'];
        $people->created_at = date('Y-m-d H:i:s');

        $people->save();

        return $this->redirect('http://localhost:8000/index.php');
    }

    public function actionDestroy($id)
    {
        $people = Pessoas::findOne($id);
        return $this->render('destroy', [
            'people' => $people
        ]);
    }

    public function actionDelete($id)
    {
        $people = Pessoas::findOne($id);

        $people->delete();

        return $this->redirect("http://localhost:8000/index.php");
    }
}
