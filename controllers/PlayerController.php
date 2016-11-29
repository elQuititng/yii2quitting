<?

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Player;
use app\models\Team;
use app\models\AddPlayerForm;
use app\models\RedactionPlayerForm;
use app\models\Position;

class PlayerController extends Controller
{ 


	public function actionIndex($pl = null)
	{
		
		$playersModel = new Player();
		
		if( is_numeric($pl) ){
			$teamModel = new Team();
			$team = $teamModel::find()->where(['id' => $pl])->limit(1)->one();
			
			if( !is_null($team) ){
				$players = $playersModel::find()->where(['team_id' => $team->id])->all();
				if( $players ){
					return $this->render('player', ['players' => $players]);
				}
				else{
					Yii::$app->session->setFlash("success", "Гравці відсутні");
					return $this->render('player');					
				}
			}
		}
		
		return $this->goHome();
		
	}

	
	
	public function actionDeletePlayer($del = null)
	{
		
		if( is_numeric($del) ){
			if( Player::deleteAll("id=".abs($del)) ){
				Yii::$app->session->setFlash("success", "Дані про гравця видалені.");
				$this->goBack();
			}
		}
		
		return $this->redirect(Yii::$app->request->referrer);
	}

	
	
	public function actionAddPlayer()
	{
		$playersModel = new Player();
		$add = new AddPlayerForm();
		
		
		if ( $add->load(Yii::$app->request->post()) && $add->validate() ) {
			$playersModel->name = $add->name;
			$playersModel->last_name = $add->last_name;
			$playersModel->dob = $add->dob;
			$playersModel->position_id = $add->position_id;
			$playersModel->team_id = $add->team_id;
			$playersModel->save();
			Yii::$app->session->setFlash("success", "Гравця додано.");
			return $this->refresh();
		}
		
		
		$teams = Team::find()->all();
		
		$selectTeam = array();
		foreach( $teams as $team ){
			$selectTeam[$team->id] = $team->name;
		}
		
		$positionModel = new Position();
		$position = $positionModel->getPositionSelectFormat();
		
		return $this->render('addPlayer', ['add' => $add, 'selectTeam' => $selectTeam, 'position' => $position]);	
	}
	
	
	public function actionRedactionPlayer($red = null)
	{
		$redaction = new RedactionPlayerForm();
		$playerModel = new Player();
		
		if( is_numeric( $red )  ){
			$team = $playerModel::find()->where('id='.abs($red))->limit(1)->one();
			if( $team ){
				$redaction->name = $team->name;
				$redaction->last_name = $team->last_name;
				$redaction->dob = $team->dob;
				$redaction->position_id = $team->position_id;
				$redaction->team_id = $team->team_id;
			}
			else{
				return $this->goHome();
			}
		}
		else{
			return $this->goHome();
		}
		
		if( $redaction->load(Yii::$app->request->post()) && $redaction->validate() ){
			$team->name = $redaction->name;
			$team->last_name = $redaction->last_name;
			$team->dob = $redaction->dob;
			$team->position_id = $redaction->position_id;
			$team->team_id = $redaction->team_id;
			$team->save();
			Yii::$app->session->setFlash("success", "Дані відредаговано");
			return $this->refresh();
		}
		
		
		$teams = Team::find()->all();
		
		$selectTeam = array();
		foreach( $teams as $team ){
			$selectTeam[$team->id] = $team->name;
		}
		
		$positionModel = new Position();
		$position = $positionModel->getPositionSelectFormat();
		
		return $this->render('redactionPlayer', ['redaction' => $redaction, 'position' => $position, 'selectTeam' => $selectTeam]);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}