<?php

class DayController extends Controller {

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
                'actions' => array('update', 'create_new', 'delete'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'create'),
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
        $model = $this->loadModel($id);
        if ($model->user_id == $user_id = Yii::app()->user->id) {
            $exercises = CHtml::listData(Exercise::model()->findAll(array('condition'=>'user_id IS NULL OR user_id='.Yii::app()->user->id)), 'exercise_id', 'name');
            $days = CHtml::listData(Day::model()->findAll(), 'day_id', 'date');
            $set_model = new Set;

            $username = User::model()->find();

            $criteria = new CDbCriteria;
            $criteria->addSearchCondition('day_id', $id);
            $criteria->order = 'exercise.name';
            $sets = Set::model()->with('exercise')->findAll($criteria);

            $criteria = new CDbCriteria;
            $criteria->addSearchCondition('user_id', $model->user_id);
            $criteria->select = 'name';
            $username = User::model()->find($criteria);

            $this->render('view', array(
                'model' => $model,
                'sets' => $sets,
                'exercises' => $exercises,
                'days' => $days,
                'set_model' => $set_model,
                'this_day' => $id,
                'username' => $username,
            ));
        }
        else throw new CHttpException(404,'Sorry, page could not be found...');
    }

    /**
     * Create new day from users own profile. 
     */
    public function actionCreate_new() {
        $date = date("Y-m-d");
        $user_id = Yii::app()->user->id;

        $model = new Day;
        $model->date = date("Y-m-d");
        $model->user_id = Yii::app()->user->getId();
        if (!$model->validate()) {
            echo $model->date;
            echo $model->user_id;
        } else if ($model->save())
            $this->redirect(array('view', 'id' => $model->day_id));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Day;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Day'])) {
            $model->attributes = $_POST['Day'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->day_id));
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

        if (isset($_POST['Day'])) {
            $model->attributes = $_POST['Day'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->day_id));
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
        $set_model = $this->loadModel($id);
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('user/my_profile'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $days = Day::model()->findAll("user_id=".Yii::app()->user->id);
        $this->render('index', array(
            'days' => $days,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Day('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Day']))
            $model->attributes = $_GET['Day'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Day the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Day::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Day $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'day-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
