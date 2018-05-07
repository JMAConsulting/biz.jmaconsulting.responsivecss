<?php
define('HELP_KIDS_PAGE', 3);
define('MEMBERSHIP_ONLINE_PAGE', 6);

require_once 'responsivecss.civix.php';

/**
 * Implementation of hook_civicrm_config
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function responsivecss_civicrm_config(&$config) {
  _responsivecss_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function responsivecss_civicrm_xmlMenu(&$files) {
  _responsivecss_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function responsivecss_civicrm_install() {
  _responsivecss_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_uninstall
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function responsivecss_civicrm_uninstall() {
  _responsivecss_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_enable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function responsivecss_civicrm_enable() {
  _responsivecss_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_disable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function responsivecss_civicrm_disable() {
  _responsivecss_civix_civicrm_disable();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function responsivecss_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _responsivecss_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function responsivecss_civicrm_managed(&$entities) {
  _responsivecss_civix_civicrm_managed($entities);
}

/**
 * Implementation of hook_civicrm_caseTypes
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function responsivecss_civicrm_caseTypes(&$caseTypes) {
  _responsivecss_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implementation of hook_civicrm_alterSettingsFolders
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function responsivecss_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _responsivecss_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

function responsivecss_civicrm_buildForm( $formName, &$form ) {
  if ($formName == "CRM_Contribute_Form_Contribution_Main"
    && in_array($form->_id, array(HELP_KIDS_PAGE, MEMBERSHIP_ONLINE_PAGE))
  ) {
    require_once '/home/bcadopt/domains/bcadoptcivi.jmaconsulting.ca/public_html/sites/all/modules/custom/bca_commons/Mobile_Detect.php';
    $detect = new Mobile_Detect;

    // Any mobile device (phones or tablets).
    if ( $detect->isMobile() ) {
      CRM_Core_Resources::singleton()->addStyleFile('biz.jmaconsulting.responsivecss', 'css/custom-civicrm.css', -50, 'html-header');
      $civicrm_css = CRM_Core_Resources::singleton()->getUrl('civicrm', 'css/civicrm.css', TRUE);
      CRM_Core_Region::instance('html-header')->update($civicrm_css, array('disabled' => TRUE));
      CRM_Core_Resources::singleton()->addStyleFile('biz.jmaconsulting.responsivecss', 'css/responsive.css', -60, 'html-header');
    }
  }
}
