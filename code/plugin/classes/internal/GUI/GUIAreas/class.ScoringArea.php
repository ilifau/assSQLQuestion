<?php
require_once __DIR__.'/../class.GUIArea.php';

require_once __DIR__.'/../GUIElements/ScoringArea/class.ScoringInfo.php';
require_once __DIR__.'/../GUIElements/ScoringArea/ScoringMetrics/class.ResultLines.php';

/**
 * Represents the scoring area used in assSQLQuestionGUI
 *
 * @author Dominik Probst <dominik.probst@studium.fau.de>
 */
class ScoringArea extends GUIArea
{
  /**
  * Constructor
  *
  * @param ilassSQLQuestionPlugin $plugin The plugin object
  * @param assSQLQuestion $object The question object
  * @access public
  */
  public function __construct($plugin, $object)
  {
    // Use the GUIArea constructor
		parent::__construct($plugin,
												$object);

		// Set the subelements

		// Info area
		$this->addSubElement(new ScoringInfo(
			$plugin, // Plugin
			$object // Object
		));

		// Output area
		$this->addSubElement(new ResultLines(
			$plugin, // Plugin
			$object // Object
		));

    // Set Title, Information and Required
    $this->setTitle($this->plugin->txt('ai_sca_eo_name'));
    $this->setRequired(true);
    $this->setHTML($this->getEditOutput());
  }

	 /*
	 	* Functions originaly implemented in ilCustomInputGUI that need to be overwritten
    */

   /**
 		* Checks the input of the edit page
 		*
 		* (This is an override of the ilCustomInputGUI:checkInput() to be tailored
 		* for the sequences input area of editQuestion)
 		*
 		* @return boolean True if input is ok, False if it is not
		* @access public
 		*/
   public function checkInput()
 	 {
 		 if(isset($_POST["points_result_lines"]) && $_POST["points_result_lines"] > 0)
 		 {
 			 // $this->setAlert($this->plugin->txt('ai_sca_eo_error'));
 			 return false;
 		 }

 		 return true;
 	 }
}
?>
