<?php

namespace app\controllers;

use app\models\Category;
use app\models\Children;
use app\models\Comment;
use app\models\Records;
use app\models\RegisterForm;
use app\models\Schedule;
use app\models\Section;
use app\models\Teacher;
use app\models\User;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if(Yii::$app->user->identity->isAdmin()){
                return $this->redirect(['/admin']);
            }
            return $this->redirect(['/site/kabinet']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            return $this->goHome();
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        if(isset($_GET['id']) && $_GET['id']!=""){
            $categories = Category::find()->where(['id'=>$_GET['id']])->asArray()->one();
            $sections = Section::find()->where(['id'=>$_GET['id']])->asArray()->all();

            //$teachers = Teacher::find()->all();

            $comments = Comment::find()->all();

            $model = new Comment();
            if ($model->load(Yii::$app->request->post())) {
                Yii::$app->session->setFlash('success', 'Ваш комментарий отправлен');
                $model->save();
                return $this->refresh();
            }

            return $this->render('contact', [
                'categories'=>$categories,
                'sections'=>$sections,
                //'teachers'=>$teachers,
                'model' => $model,
                'comments' => $comments,
            ]);

        }
        else
            return $this->redirect(['site/index']);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $query = Section::find();
        $count = clone $query;
        $pages = new Pagination(['totalCount'=>$count->count(), 'pageSize'=>3]);
        $sections = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $categories = Category::find()->all();
        return $this->render('about', ['sections'=>$sections, 'categories'=>$categories, 'pages'=>$pages]);
    }


    public function actionSection()
    {
        if (isset($_GET['id']) && $_GET['id']!="")
        {
            $categories = Category::find()->where(['id'=>$_GET['id']])-> asArray()->one();

            $sections = Section::find()->where(['category_id'=>$_GET['id']])-> asArray()->all();

            //$sect = Section::find()->where(['id'=>$_GET['id']])->asArray()->all();
            //return $this->render('section', compact('categories', 'sections'));

            return $this->render('section', [
                'sections' => $sections,
                //'sect' => $sect,
                'categories' => $categories,
            ]);
        }
        else
            return $this->redirect(['site/about']);
    }


    public function actionRecord()
    {
        $model = new Records();
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->session->setFlash('success', 'Ваша заявка отправлена');
                $model->save();
            return $this->refresh();
        }
        return $this->render('record', [
            'model' => $model,
        ]);

        /*$form = new Records();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $child = new Children();
            $child->attributes = $form->childAttributes;
            $child->save(false);

            $profile = new Records();
            $profile->attributes = $form->profileAttributes;
            //$profile->children_id = $children->id;
            $profile->save(false);

            return $this->redirect(['record']);
        }

        return $this->render('record', ['model' => $form]);*/
    }

    public function actionKabinet()
    {
        $user = User::findOne(Yii::$app->user->id);
        $records = $user->record;
        return $this->render('kabinet', ['records'=>$records]);
    }

    public function actionSchedule()
    {
        $goodstatus = Schedule::find()->all();
        $schedules = Schedule::find()->all();
        return $this->render('schedule', ['schedules'=>$schedules, 'goodstatus'=>$goodstatus]);
    }

    public function actionStaff()
    {
        $sections = Section::find()->all();
        return $this->render('staff', ['sections'=>$sections]);
    }

}
