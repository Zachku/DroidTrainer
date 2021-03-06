<?php

class SetController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('update', 'createForADay', 'delete'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'create',),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreateForADay($day_id) {
        $model = new Set;
        $day = Day::model()->findByPk($day_id);
        if (Yii::app()->user->id == $day->user_id) {
            $model->user_id = Yii::app()->user->id;
            if (isset($_POST['Set'])) {
                $model->attributes = $_POST['Set'];
                if ($model->save())
                    $this->redirect(array('day/view', 'id' => $day_id));
            }
            $this->redirect(array('day/view', 'id' => $day_id));
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Set;
        $model->user_id = Yii::app()->user->id;

        $exercises = CHtml::listData(Exercise::model()->findAll(), 'exercise_id', 'name');
        $days = CHtml::listData(Day::model()->findAll(), 'day_id', 'date');
        $users = CHtml::listData(User::model()->findAll(), 'user_id', 'name');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Set'])) {

            $model->attributes = $_POST['Set'];
            if ($model->save())
                $this->redirect(array('day/view', 'id' => $model->day_id));
        }

        $this->render('create', array(
            'model' => $model,
            'exercises' => $exercises,
            'days' => $days,
            'users' => $users,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Set'])) {
            $model->attributes = $_POST['Set'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->set_id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        $day_id = $model->day_id;
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(array('day/view', 'id' => $day_id));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Set');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Set('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Set']))
            $model->attributes = $_GET['Set'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Set the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Set::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Set $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'set-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
