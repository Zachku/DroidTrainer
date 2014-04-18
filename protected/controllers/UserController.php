<?php

class UserController extends Controller {

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
                'actions' => array('index', 'view', 'create', 'view_user_as_a_quest'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('update', 'my_profile', 'chart', 'updateChart', 'updateWeight'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
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
        $criteria = new CDbCriteria;
        $criteria->addSearchCondition('user_id', $id);
        $days = Day::model()->findAll($criteria);
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'days' => $days,
        ));
    }

    /**
     * User's own profile
     * 
     */
    public function actionMy_profile() {
        $user_id = Yii::app()->user->getId();
        $condition = "user_id=" . $user_id;
        $user = User::model()->find(array(
            'condition' => $condition));

        $criteria = new CDbCriteria;
        $criteria->addSearchCondition('user_id', $user_id);
        $criteria->order = 'date';
        $days = Day::model()->findAll($criteria);
        $this->render('my_profile', array(
            'days' => $days,
            'user' => $user,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new User;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save())
                $this->redirect(array('site/login'));
        }

        $this->render('create', array(
            'model' => $model,
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

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->save())
                $this->redirect(array('my_profile'));
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
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        //$dataProvider=new CActiveDataProvider('User');
        $users = User::model()->findAll();
        $this->render('index', array(
            'users' => $users,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionView_user_as_a_quest($id) {
        $user = User::model()->findByPk($id);
        $this->render('view_user_as_a_quest', array(
            'user' => $user,
        ));
    }

    public function actionChart() {
        $exercises = CHtml::listData(Exercise::model()->findAll(array(
                            'condition' => 'user_id IS NULL OR user_id=' . Yii::app()->user->id)), 'exercise_id', 'name');
        $set_model = new Set;
        if (isset($_POST['Set']['exercise_id'])) {
            $exercise = $_POST['Set']['exercise_id'];
        } else {
            $exercise = 3;
        }

        $weights = CHtml::listData(Set::model()->findAll(array(
                            'condition' => 'user_id=' . Yii::app()->user->id . ' AND exercise_id=' . $exercise)), 'weight', 'weight');
        if (isset($_POST['Set']['weight'])) {
            $weight = $_POST['Set']['weight'];
        } else {
            $weight = 10;
        }

        $id = Yii::app()->user->id;
        $raw_data = Set::model()->with('day')->findAll(array(
            'condition' => 'day.user_id=' . $id . ' AND exercise_id=' . $exercise,
            'select' => 'reps,weight',
        ));

        $data[] = array('weight', 'reps');
        foreach ($raw_data as $raw) {
            $data[] = array('', intval($raw->reps));
        }
        $this->render('chart', array(
            'data' => $data,
            'exercises' => $exercises,
            'set_model' => $set_model,
            'weights' => $weights,
        ));
    }
    public function actionUpdateWeight(){
        $set_model = new Set;
        $exercise = $_POST['Set']['exercise_id'];
        $weights = CHtml::listData(Set::model()->findAll(array(
                            'condition' => 'user_id=' . Yii::app()->user->id . ' AND exercise_id=' . $exercise)), 'weight', 'weight');
        $this->renderPartial('_weight', array(
            'weights' => $weights,
            'set_model' => $set_model,)
                , false, false);
        
    }
    public function actionUpdateChart() {

        if (isset($_POST['Set']['exercise_id'])) {
            $exercise = $_POST['Set']['exercise_id'];
        } else {
            $exercise = 3;
        }
        if (isset($_POST['Set']['weight'])) {
            $weight = $_POST['Set']['weight'];
        } else {
            $weight = 10;
        }

        $id = Yii::app()->user->id;

        $raw_data = Set::model()->with('day')->findAll(array(
            'condition' => 'day.user_id=' . $id . ' AND exercise_id=' . $exercise,
            'select' => 'reps,weight',
        ));
        $data[] = array('weight', 'reps');
        foreach ($raw_data as $raw) {
            $data[] = array('', intval($raw->reps));
        }
        $this->renderPartial('_chart', array(
            'data' => $data), false, false);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return User the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
