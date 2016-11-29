<?

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Team;
use app\models\AddTeamForm;
use app\models\EditTeamForm;

class TeamController extends Controller
{ 
	
	public function actionIndex()
    {	
		$teamModel = new Team();
		
		$teams = $teamModel::find()->asArray()->all();

		return $this->render('team', ['teams' => $teams]);
	}

	
	
	public function actionDeleteTeam($del = null){
		if( is_numeric($del) ){
			if( Team::deleteAll("id=".abs($del)) ){
				Yii::$app->session->setFlash("success", "Команда видалена.");
				$this->goBack();
			}
		}
		
		return $this->redirect(Yii::$app->request->referrer);
	}
	
	
	
	public function actionAddTeam()
	{
		
		$add = new AddTeamForm();
		$teamModel = new Team();
	
		if ( $add->load(Yii::$app->request->post()) && $add->validate() ) {
			$teamModel->name = $add->name;
			$teamModel->year = $add->year;
			$teamModel->budget = $add->budget;
			$teamModel->trainer = $add->trainer;
			$teamModel->save();
			Yii::$app->session->setFlash("success", "Команда додана.");
			return $this->refresh();
		}
		
		return $this->render('addTeam', ['add' => $add]);
	}
	
	
	
	public function actionEditTeam($ed = null)
	{
		$edit = new EditTeamForm();
		$teamModel = new Team();
		
		if( is_numeric( $ed )  ){
			$team = $teamModel::find()->where('id='.abs($ed))->limit(1)->one();
			if( $team ){
				$edit->name = $team->name;
				$edit->year = $team->year;
				$edit->budget = $team->budget;
				$edit->trainer = $team->trainer;
			}
		}
		else{
			return $this->redirect('team');
		}
		
		if( $edit->load(Yii::$app->request->post()) && $edit->validate() ){
			$team->name = $edit->name;
			$team->year = $edit->year;
			$team->budget = $edit->budget;
			$team->trainer = $edit->trainer;
			$team->save();
			Yii::$app->session->setFlash("success", "Дані відредаговано");
			return $this->refresh();
		}
		
		return $this->render('editTeam', ['edit' => $edit]);
	}
	
	
	
	
	
	
}