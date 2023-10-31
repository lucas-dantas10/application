<?php 

namespace app\controllers;

use app\models\CriarPessoaForm;
use app\models\EditarPessoaForm;
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

        $request = Yii::$app->request->get();

        $search = $request['search'] ?? '';

        $pagination = new Pagination([
            'defaultPageSize' => 4,
            'totalCount' => Pessoas::find()->count(),
        ]);

        $peoples = $query
            ->orderBy('id')
            ->where(['like', 'pessoas.nome', $search])
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
        $model = new EditarPessoaForm();
        return $this->render('view', [
            'people' => $people,
            'model' => $model
        ]);
    }

    public function actionUpdate()
    {
        $request = Yii::$app->request->post();

        $people = Pessoas::findOne($request['id']);

        $people->nome = $request['EditarPessoaForm']['nome'];

        $people->update();

        return $this->redirect('http://localhost:8000/index.php');
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
