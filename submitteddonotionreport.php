<?php

require_once 'submitteddonotionreport.civix.php';
use CRM_Submitteddonotionreport_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function submitteddonotionreport_civicrm_config(&$config) {
  _submitteddonotionreport_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function submitteddonotionreport_civicrm_xmlMenu(&$files) {
  _submitteddonotionreport_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function submitteddonotionreport_civicrm_install() {
  _submitteddonotionreport_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function submitteddonotionreport_civicrm_postInstall() {
  _submitteddonotionreport_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function submitteddonotionreport_civicrm_uninstall() {
  _submitteddonotionreport_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function submitteddonotionreport_civicrm_enable() {
  _submitteddonotionreport_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function submitteddonotionreport_civicrm_disable() {
  _submitteddonotionreport_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function submitteddonotionreport_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _submitteddonotionreport_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function submitteddonotionreport_civicrm_managed(&$entities) {
  _submitteddonotionreport_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function submitteddonotionreport_civicrm_caseTypes(&$caseTypes) {
  _submitteddonotionreport_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function submitteddonotionreport_civicrm_angularModules(&$angularModules) {
  _submitteddonotionreport_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function submitteddonotionreport_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _submitteddonotionreport_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function submitteddonotionreport_civicrm_entityTypes(&$entityTypes) {
  _submitteddonotionreport_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_alterReportVar().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterReportVar
 */
function submitteddonotionreport_civicrm_alterReportVar(
  $varType,
  &$var,
  &$object
) {
  if ('CRM_Report_Form_Contribute_Detail' != get_class($object)) {
    return;
  }

  if ($varType == 'columns') {
    $var['civicrm_contribution']['fields']['source_contact_name'] = [
      'title' => ts('Source Name'),
      'dbAlias' => "source_contact_table.sort_name",
    ];
    $var['civicrm_contribution']['fields']['contribution_created_date'] = [
      'title' => ts('Contribution Created Date'),
      'dbAlias' => "source_activity_table.created_date",
    ];
    $var['civicrm_contribution']['fields']['source_contact_id'] = [
      'title' => ts('Source Contact Id'),
      'no_display' => TRUE,
      'required' => TRUE,
      'dbAlias' => "source_contact_table.id",
    ];
    $var['civicrm_contribution']['filters']['contribution_created_date'] = [
      'title' => ts('Contribution Created Date'),
      'dbAlias' => "source_activity_table.created_date",
      'type' => CRM_Utils_Type::T_DATE,
    ];
    $var['civicrm_contribution']['filters']['source_contact_name'] = [
      'title' => ts('Source Name'),
      'dbAlias' => "source_contact_table.sort_name",
      'type' => CRM_Utils_Type::T_STRING,
    ];
    $var['civicrm_contribution']['filters']['source_contact_group'] = [
      'title' => ts('Source Contact Group'),
      'type' => CRM_Utils_Type::T_INT,
      'operatorType' => CRM_Report_Form::OP_MULTISELECT,
      'dbAlias' => "source_contact_group.group_id",
      'options' => CRM_Core_PseudoConstant::nestedGroup(),
    ];
  }
  elseif ($varType == 'sql') {
    $object->_originVar = NULL;
    $params = $object->getVar('_params');
    $aliases = $object->getVar('_aliases');
    if (empty($params['source_contact_group_value'])
      && empty($params['source_contact_name_value'])
      && empty($params['fields']['source_contact_name'])
      && empty($params['contribution_created_date_value'])
      && empty($params['fields']['contribution_created_date'])
    ) {
      $fromClause = "
        INNER JOIN civicrm_contribution source_contact_table
         ON {$aliases['civicrm_contribution']}.id = source_contact_table.id
      ";
    }
    else {

      $results = civicrm_api3('OptionValue', 'get', [
        'return' => ["value", 'name'],
        'option_group_id' => "activity_type",
        'name' => ['IN' => [
          "Contribution",
          "Event Registration",
          "Membership Signup",
          "Membership Renewal"
          ]
        ],
      ])['values'];
      foreach ($results as $result) {
        $activityTypeIds[$result['name']] = $result['value'];
      }

      $recordTypeId = civicrm_api3('OptionValue', 'getvalue', [
        'return' => "value",
        'option_group_id' => "activity_contacts",
        'name' => "Activity Source",
      ]);

      $fromClause = "
        LEFT JOIN (
          SELECT ca.source_record_id, cac.contact_id, ca.id activity_id
          FROM civicrm_activity ca
            INNER JOIN civicrm_activity_contact cac ON ca.id = cac.activity_id
              AND ca.activity_type_id = {$activityTypeIds['Contribution']}
              AND cac.record_type_id = {$recordTypeId}
            UNION
            SELECT cpp.contribution_id, cac.contact_id, ca.id
            FROM civicrm_activity ca
            INNER JOIN civicrm_activity_contact cac ON ca.id = cac.activity_id
              AND ca.activity_type_id = {$activityTypeIds['Event Registration']}
              AND cac.record_type_id = {$recordTypeId}
            INNER JOIN civicrm_participant_payment cpp
              ON cpp.participant_id  = ca.source_record_id
            UNION
            SELECT cmp.contribution_id, cac.contact_id, ca.id
            FROM civicrm_activity ca
            INNER JOIN civicrm_activity_contact cac ON ca.id = cac.activity_id
              AND ca.activity_type_id IN ({$activityTypeIds['Membership Signup']}, {$activityTypeIds['Membership Renewal']})
              AND cac.record_type_id = {$recordTypeId}
            INNER JOIN civicrm_membership_payment cmp
              ON cmp.membership_id  = ca.source_record_id
        ) AS contribution_activity_table
          ON {$aliases['civicrm_contribution']}.id = contribution_activity_table.source_record_id
        LEFT JOIN civicrm_contact source_contact_table
          ON source_contact_table.id = contribution_activity_table.contact_id
        LEFT JOIN civicrm_activity source_activity_table
          ON source_activity_table.id = contribution_activity_table.activity_id
      ";

      if (!empty($params['source_contact_group_value'])) {
        $filteredGroups = $params['source_contact_group_value'];
        $fromClause .= " LEFT JOIN (
            SELECT DISTINCT contact_id, group_id
            FROM civicrm_group_contact
            WHERE group_id IN (" . implode(', ', $filteredGroups) . ")
              AND status = 'Added'
            UNION DISTINCT
            SELECT contact_id, group_id
            FROM civicrm_group_contact_cache
            WHERE group_id IN (" . implode(', ', $filteredGroups) . ")
          ) AS source_contact_group
            ON source_contact_group.contact_id = source_contact_table.id
        ";
      }
    }

    $from = $object->getVar('_from') . $fromClause;
    $object->_originVar = $from;
    $object->setVar('_from', $from);
  }
  elseif ($varType == 'rows') {
    if (!empty($object->_originVar)) {
      $object->setVar('_from', $object->_originVar);
    }

    $entryFound = 0;
    foreach ($var as $id => $row) {
      if (array_key_exists('civicrm_contribution_source_contact_name', $row) &&
        !empty($var[$id]['civicrm_contribution_source_contact_name']) &&
        array_key_exists('civicrm_contribution_source_contact_id', $row)
      ) {
        $url = CRM_Utils_System::url("civicrm/contact/view",
          'reset=1&cid=' . $row['civicrm_contribution_source_contact_id'],
          TRUE,
          NULL,
          FALSE
        );
        $var[$id]['civicrm_contribution_source_contact_name_link'] = $url;
        $var[$id]['civicrm_contribution_source_contact_name_hover'] = ts("View Contact Summary for this Contact.");
        $entryFound = TRUE;
      }

      // skip looking further in rows, if first row itself doesn't
      // have the column we need
      if (!$entryFound) {
        break;
      }
    }
  }
}
