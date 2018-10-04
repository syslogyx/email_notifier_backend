<?php

return [

	/*
	* Add feed constants
	*/
    'FEED_CONSTANTS' => [
        'PROJECT' => 'project',
		'MILESTONE' => 'milestone',
		'TASK' => 'task',
		'PROJECT_STATUS_UPDATED' => 'project_status_updated'
    ],

    /*
	* Add feed constants
	*/
    'FEED_CONSTANTS_MSGS' => [
        'PROJECT_CREATE' => '%s created by %s.',

        'PROJECT_NAME_CHANGED' => '%s name updated by %s from ',
        'PROJECT_START_DATE_CHANGED' => '%s start date updated by %s from ',
        'PROJECT_END_DATE_CHANGED' => '%s end date updated by %s from ',
        'PROJECT_DESC_CHANGED' => '%s description updated by %s from ',
        'PROJECT_MANAGER_CHANGED' => '%s manager changed by %s from ',
        'PROJECT_STATUS_UPDATED' => '%s status updated by %s from ',
        'PROJECT_RESOURCE_ADDED' => '%s started working on %s for',
        'PROJECT_RESOURCE_UPDATED' => '%s resource removed from the project.',

		'MILESTONE_CREATE' => '%s created by %s.',
		'MILESTONE_TITLE_CHANGED' => '%s title updated by %s from ',
        'MILESTONE_DESC_CHANGED' => 'Milestone description has been changed by %s from ',
        'MILESTONE_START_DATE_CHANGE' => '%s start date updated by %s from ',
        'MILESTONE_END_DATE_CHANGED' => '%s end date updated by %s from ',
        'MILESTONE_STATUS_UPDATED' => '%s status updated by %s from ',

        // 'MILESTONE_INDEX_CHANGES' => 'Milestone index has been changed by %s from ',

        'TASK_CREATE' => '%s created %s for milestone %s.',
        'TASK_TITLE_CHANGED' => '%s changed title from ',
        'TASK_DESC_CHANGED' => '%s changed description from ',
        'TASK_STATUS_UPDATED' => '%s changed status from ',
        'TASK_PRIORITY_UPDATED' => '%s changed priority from ',

        'TASK_START_DATE_CHANGE' => '%s updated start date to ',
        'TASK_COMPLETION_CHANGED' => '%s updated completion date to ',
        // 'TASK_SPENT_TIME' => 'Task spent time has been changed by %s to ',

        'TASK_COMMENT_TIME' => 'Task resolved by %s </br> %s.',

        'TASK_ESTIMATED_TIME' => '%s updated estimated time to ',

        'TASK_ASSIGNED_CREATION' => 'Assigned to %s by %s.',
        'TASK_ASSIGNED_UPDATION' => 'Assignee changed by %s from %s to %s.',

        'TASK_COMMENT_ADDED' => '%s added a new comment %s.',
        'TASK_COMMENT_UPDATE' => '%s updated comment to ',

        // 'MILESTONE_UPDATE' => 'Milestone updated ',
		// 'TASK_CREATE' => 'Task created.',
		'TASK_UPDATE' => 'Task updated '

    ],


    /*
	* Add error messages
	*/
    'ERROR_MESSAGES' => [
        'STATUS_UPDATE' => 'Status updated successfully.',
        'MILESTONE_NOT_FOUND' => 'Milestone could not found.',
        'UNABLE_UPDATE_MILESTONE_API' => 'Unable to update Milestones.',
        'UNABLE_UPDATE_TASK_API' => 'Unable to update Task.',
		'TASK_IS_ALREADY_CLOASED' => 'Task is cloased. You can not update status.',
		'TASK_NOT_FOUND' => 'Task could not found.',
        'INVALID_RESOURCE' => 'Resource not found.',
        'CAN_NOT_ASSIGN_TASK' => 'The resource has been already assign to another task.',
        'EOD_NOT_FOUND' => 'EOD not found.',
        'SOMETHING_WENT_WRONG' => 'Something went wrong.',
        'UNREGISTERED_MAIL_ADDREE' => 'Invalid mail address or mail address is not registered.',
        'MAIL_ADDRESS_EXPIRED' => 'Your token is expired please re-login again.',
        'INVALID_TOKEN' => 'Invalid token.'
    ],

    /*
    * Add success messages
    */
    'SUCCESS_MESSAGES' => [
        'SUCCESS_MESSAGES' => 'Comment deleted successfully.',
        'COMMENT_ADDED' => 'Comment added successfully.',
        'COMMENT_UPDATED' => 'Comment updated successfully.',
        'TASK_CREATED' => 'Task created successfully.',
        'TASK_UPDATED' => 'Task updated successfully.',
        'EOD_CREATED' => 'EOD created successfully.',
        'EOD_UPDATED' => 'EOD updated successfully.',
        'MAIL_SEND' => 'We have sent you an email. Please check your mail.',
        'RESET_PASSOWRD' => 'Your password reset successfully. Please login.',
        'EOD_ALREADY_SENT' => 'EOD already sent for given date.'
    ],

    'SUCESS_CODE' => '200',
    'ERROR_CODE' => '200',
    'SUCESS_MSG'=>'Success',

    /*
	* Add status constants
	*/
    'STATUS_CONSTANT' => [
        'PENDING' => 'Pending',
        'ON-GOING' => 'On-going',
        'HOLD' => 'On-hold',
        'CLOSED' => 'Closed',
        'PAUSE' => 'Pause',
        'DELETED' => 'Deleted',
        'ACTIVE' => 'Active',
        'RESOLVED' => 'Resolved',
        'IN_PROGREDD' => 'In-progress',
        'ASSIGNED' => 'Assigned',
        'COMPLETED' => 'Completed',
        'START' => 'Start',
        'STOP' => 'Stop',
        'PENDING_APPROVED' => 'Pending-approved',
        'APPROVED' => 'Approved'
    ],

    /*
	* Add status constants with ids
	*/
    'STATUS_CONSTANT_IDS' => [
        '1' => 'Pending',
        // '6' => 'Deleted',
        // '4' => 'Closed',
        "TASK_STATUS_CONS" => [
            '4' => 'Closed',
            '5' => 'Pause',
            // '2' => 'On-going',
            '8' => 'Resolved',
            '9' => 'In-progress',
            '10' => 'Assigned',
            '12' => 'Start',
            '13' => 'Stop'
        ],
        "PROJECT_STATUS_CONS" => [
            '7' => 'Active',
            '3' => 'On-hold'
        ],
        "MILESTONE_STATUS_CONS" => [
            '9' => 'In-progress',
            '3' => 'On-hold',
            '11' => 'Completed'
        ]
    ],

    /*
	* URL identifier
	*/
    'URL_CONSTANTS' => [
        'MILESTONE' => 'milestone',
        'TASK' => 'task',
        'PROJECT' => 'project'
    ],

    /*
    * Web URL identifier
    */
    'WEB_URL_CONSTANTS' => [
        'MILESTONE_VIEW' => '/milestone/view?id=',
        'TASK_VIEW' => 'task',
        'USER_VIEW' => '/user/add/',
        'PROJECT_VIEW' => '/project/view/'
    ],

    /*
    * Add comment identifiers constants
    */
    'COMMENT_IDENTIFIER_CONST' => [
        'MILESTONE' => 'MILESTONE',
        'TASK' => 'TASK'
    ],

    /*
    * Priority constants
    */
    'PRIORITY_CONST' => [
        'HIGH' => 1,
        'MEDIUM' => 2,
        'LOW' => 3
    ],

    'PRIORITY_CONST_NAME' => [
        1 => 'High',
        2 => 'Medium',
        3 => 'Low'
    ],

		'FIXED_COL'=>[
				'Test_Case_1'=>[
						'Test Case'=>1,
						'Test Condition'=>'0.2 sec < t < 1 sec With TAP on PCB',
						'Valid for Modes'=>'TIMER, IMPACT, T+I',
						'Mode'=>[
										'Timer Mode'=>[
														'Time (ms)'=>100,
														'Voltage (V)'=>0.5,
															'Excepted' => [
																'test_point_3_time'=>'200-1000',
																'test_point_4_time'=>0,
																'test_point_1_voltage'=>3.3,
																'test_point_2'=>'',
																'test_point_3_voltage'=>3.3,
																'number_of_pulse'=>0,
																'test_point_4_pulse_high'=>'0-0-0',
																'test_point_4_pulse_low'=>'0-0-0',
																'test_point_4_voltage'=>0,
																'test_point_5'=>'',
																'test_point_6'=>'',
																'test_point_7_V'=>3.3,
																'test_point_7_V2'=>0
															],
															'Actual' => [
															]
															],
										'Impact Mode'=>[
																'Time (ms)'=>100,
																'Voltage (V)'=>0.5,
																'Excepted' => [
                                  'test_point_3_time'=>'200-1000',
  																'test_point_4_time'=>0,
  																'test_point_1_voltage'=>3.3,
  																'test_point_2'=>'',
  																'test_point_3_voltage'=>3.3,
  																'number_of_pulse'=>0,
  																'test_point_4_pulse_high'=>'0-0-0',
  																'test_point_4_pulse_low'=>'0-0-0',
  																'test_point_4_voltage'=>0,
  																'test_point_5'=>'',
  																'test_point_6'=>'',
  																'test_point_7_V'=>3.3,
  																'test_point_7_V2'=>0
																],
																'Actual' => [
																]
															],
										'Timer & Impact Mode'=>[
																'Time (ms)'=>100,
																'Voltage (V)'=>0.5,
																'Excepted' => [
                                  'test_point_3_time'=>'200-1000',
  																'test_point_4_time'=>0,
  																'test_point_1_voltage'=>3.3,
  																'test_point_2'=>'',
  																'test_point_3_voltage'=>3.3,
  																'number_of_pulse'=>0,
  																'test_point_4_pulse_high'=>'0-0-0',
  																'test_point_4_pulse_low'=>'0-0-0',
  																'test_point_4_voltage'=>0,
  																'test_point_5'=>'',
  																'test_point_6'=>'',
  																'test_point_7_V'=>3.3,
  																'test_point_7_V2'=>0
																],
																'Actual' => [
																]
															]
										]
				],
				'Test_Case_2'=>[
					'Test Case'=>2,
					'Test Condition'=>'0.2 sec < t < 1 sec Without TAP on PCB',
					'Valid for Modes'=>'TIMER, IMPACT, T+I',
					'Mode'=>[
									'Timer Mode'=>[
													'Time (ms)'=>100,
													'Voltage (V)'=>0.5,
														'Excepted' => [
															'test_point_3_time'=>0,
															'test_point_4_time'=>0,
															'test_point_1_voltage'=>3.3,
															'test_point_2'=>'',
															'test_point_3_voltage'=>0,
															'number_of_pulse'=>0,
															'test_point_4_pulse_high'=>'0-0-0',
															'test_point_4_pulse_low'=>'0-0-0',
															'test_point_4_voltage'=>0,
															'test_point_5'=>'',
															'test_point_6'=>'',
															'test_point_7_V'=>3.3,
															'test_point_7_V2'=>0
														],
														'Actual' => [
														]
														],
									'Impact Mode'=>[
															'Time (ms)'=>100,
															'Voltage (V)'=>0.5,
															'Excepted' => [
                                'test_point_3_time'=>0,
                                'test_point_4_time'=>0,
                                'test_point_1_voltage'=>3.3,
                                'test_point_2'=>'',
                                'test_point_3_voltage'=>0,
                                'number_of_pulse'=>0,
                                'test_point_4_pulse_high'=>'0-0-0',
                                'test_point_4_pulse_low'=>'0-0-0',
                                'test_point_4_voltage'=>0,
                                'test_point_5'=>'',
                                'test_point_6'=>'',
                                'test_point_7_V'=>3.3,
                                'test_point_7_V2'=>0
															],
															'Actual' => [
															]
														],
									'Timer & Impact Mode'=>[
															'Time (ms)'=>100,
															'Voltage (V)'=>0.5,
															'Excepted' => [
                                'test_point_3_time'=>0,
  															'test_point_4_time'=>0,
  															'test_point_1_voltage'=>3.3,
  															'test_point_2'=>'',
  															'test_point_3_voltage'=>0,
  															'number_of_pulse'=>0,
  															'test_point_4_pulse_high'=>'0-0-0',
  															'test_point_4_pulse_low'=>'0-0-0',
  															'test_point_4_voltage'=>0,
  															'test_point_5'=>'',
  															'test_point_6'=>'',
  															'test_point_7_V'=>3.3,
  															'test_point_7_V2'=>0
															],
															'Actual' => [
															]
														]
									]
				],
				'Test_Case_3'=>[
					'Test Case'=>3,
					'Test Condition'=>'1 sec < t < 4 sec With TAP on PCB',
					'Valid for Modes'=>'Timer Mode',
					'Mode'=>[
									'Timer Mode'=>[
													'Time (ms)'=>100,
													'Voltage (V)'=>0.5,
														'Excepted' => [
                              'test_point_3_time'=>0,
															'test_point_4_time'=>0,
															'test_point_1_voltage'=>3.3,
															'test_point_2'=>'',
															'test_point_3_voltage'=>0,
															'number_of_pulse'=>0,
															'test_point_4_pulse_high'=>'0-0-0',
															'test_point_4_pulse_low'=>'0-0-0',
															'test_point_4_voltage'=>0,
															'test_point_5'=>'',
															'test_point_6'=>'',
															'test_point_7_V'=>3.3,
															'test_point_7_V2'=>0
														],
														'Actual' => [
														]
														]

									]
				],
				'Test_Case_4'=>[
					'Test Case'=>4,
					'Test Condition'=>'1 sec < t < 4 sec Without TAP on PCB',
					'Valid for Modes'=>'Timer Mode',
					'Mode'=>[
									'Timer Mode'=>[
													'Time (ms)'=>100,
													'Voltage (V)'=>0.5,
														'Excepted' => [
                              'test_point_3_time'=>0,
															'test_point_4_time'=>0,
															'test_point_1_voltage'=>3.3,
															'test_point_2'=>'',
															'test_point_3_voltage'=>0,
															'number_of_pulse'=>0,
															'test_point_4_pulse_high'=>'0-0-0',
															'test_point_4_pulse_low'=>'0-0-0',
															'test_point_4_voltage'=>0,
															'test_point_5'=>'',
															'test_point_6'=>'',
															'test_point_7_V'=>3.3,
															'test_point_7_V2'=>0
														],
														'Actual' => [
														]
														]

									]
				],
				'Test_Case_5'=>[
					'Test Case'=>5,
					'Test Condition'=>'t = 4 sec With TAP on PCB',
					'Valid for Modes'=>'TIMER, T+I',
					'Mode'=>[
									'Timer Mode'=>[
													'Time (ms)'=>100,
													'Voltage (V)'=>0.5,
														'Excepted' => [
															'test_point_3_time'=>0,
															'test_point_4_time'=>'4000',
															'test_point_1_voltage'=>3.3,
															'test_point_2'=>'',
															'test_point_3_voltage'=>0,
															'number_of_pulse'=>3,
															'test_point_4_pulse_high'=>'20-20-20',
															'test_point_4_pulse_low'=>'50-50-0',
															'test_point_4_voltage'=>3.3,
															'test_point_5'=>'',
															'test_point_6'=>'',
															'test_point_7_V'=>3.3,
															'test_point_7_V2'=>0
														],
														'Actual' => [
														]
										],
										'Timer & Impact Mode'=>[
																'Time (ms)'=>100,
																'Voltage (V)'=>0.5,
																'Excepted' => [
                                  'test_point_3_time'=>0,
    															'test_point_4_time'=>'4000',
    															'test_point_1_voltage'=>3.3,
    															'test_point_2'=>'',
    															'test_point_3_voltage'=>0,
    															'number_of_pulse'=>3,
    															'test_point_4_pulse_high'=>'20-20-20',
    															'test_point_4_pulse_low'=>'50-50-0',
    															'test_point_4_voltage'=>3.3,
    															'test_point_5'=>'',
    															'test_point_6'=>'',
    															'test_point_7_V'=>3.3,
    															'test_point_7_V2'=>0
																],
																'Actual' => [
																]
											]
							]
				],
				'Test_Case_6'=>[
					'Test Case'=>6,
					'Test Condition'=>'t = 4 sec Without TAP on PCB',
					'Valid for Modes'=>'TIMER, T+I',
					'Mode'=>[
									'Timer Mode'=>[
													'Time (ms)'=>100,
													'Voltage (V)'=>0.5,
														'Excepted' => [
                              'test_point_3_time'=>0,
															'test_point_4_time'=>'4000',
															'test_point_1_voltage'=>3.3,
															'test_point_2'=>'',
															'test_point_3_voltage'=>0,
															'number_of_pulse'=>3,
															'test_point_4_pulse_high'=>'20-20-20',
															'test_point_4_pulse_low'=>'50-50-0',
															'test_point_4_voltage'=>3.3,
															'test_point_5'=>'',
															'test_point_6'=>'',
															'test_point_7_V'=>3.3,
															'test_point_7_V2'=>0
														],
														'Actual' => [
														]
										],
										'Timer & Impact Mode'=>[
																'Time (ms)'=>100,
																'Voltage (V)'=>0.5,
																'Excepted' => [
                                  'test_point_3_time'=>0,
    															'test_point_4_time'=>'4000',
    															'test_point_1_voltage'=>3.3,
    															'test_point_2'=>'',
    															'test_point_3_voltage'=>0,
    															'number_of_pulse'=>3,
    															'test_point_4_pulse_high'=>'20-20-20',
    															'test_point_4_pulse_low'=>'50-50-0',
    															'test_point_4_voltage'=>3.3,
    															'test_point_5'=>'',
    															'test_point_6'=>'',
    															'test_point_7_V'=>3.3,
    															'test_point_7_V2'=>0
																],
																'Actual' => [
																]
											]
							]
				],
				'Test_Case_7'=>[
					'Test Case'=>7,
					'Test Condition'=>'t>=6 sec With TAP on PCB',
					'Valid for Modes'=>'TIMER, IMPACT, T+I',
					'Mode'=>[
									'Timer Mode'=>[
													'Time (ms)'=>100,
													'Voltage (V)'=>0.5,
														'Excepted' => [
															'test_point_3_time'=>'6020',
															'test_point_4_time'=>0,
															'test_point_1_voltage'=>3.3,
															'test_point_2'=>'',
															'test_point_3_voltage'=>3.3,
															'number_of_pulse'=>0,
															'test_point_4_pulse_high'=>'0-0-0',
															'test_point_4_pulse_low'=>'0-0-0',
															'test_point_4_voltage'=>0,
															'test_point_5'=>'',
															'test_point_6'=>'',
															'test_point_7_V'=>3.3,
															'test_point_7_V2'=>0
														],
														'Actual' => [
														]
										],
										'Impact Mode'=>[
																'Time (ms)'=>100,
																'Voltage (V)'=>0.5,
																'Excepted' => [
                                  'test_point_3_time'=>'6020',
    															'test_point_4_time'=>0,
    															'test_point_1_voltage'=>3.3,
    															'test_point_2'=>'',
    															'test_point_3_voltage'=>3.3,
    															'number_of_pulse'=>0,
    															'test_point_4_pulse_high'=>'0-0-0',
    															'test_point_4_pulse_low'=>'0-0-0',
    															'test_point_4_voltage'=>0,
    															'test_point_5'=>'',
    															'test_point_6'=>'',
    															'test_point_7_V'=>3.3,
    															'test_point_7_V2'=>0
																],
																'Actual' => [
																]
											],
											'Timer & Impact Mode'=>[
																	'Time (ms)'=>100,
																	'Voltage (V)'=>0.5,
																	'Excepted' => [
                                    'test_point_3_time'=>'6020',
      															'test_point_4_time'=>0,
      															'test_point_1_voltage'=>3.3,
      															'test_point_2'=>'',
      															'test_point_3_voltage'=>3.3,
      															'number_of_pulse'=>0,
      															'test_point_4_pulse_high'=>'0-0-0',
      															'test_point_4_pulse_low'=>'0-0-0',
      															'test_point_4_voltage'=>0,
      															'test_point_5'=>'',
      															'test_point_6'=>'',
      															'test_point_7_V'=>3.3,
      															'test_point_7_V2'=>0
																	],
																	'Actual' => [
																	]
												]
							]
				],
				'Test_Case_8'=>[
					'Test Case'=>8,
					'Test Condition'=>'t>=6 sec Without TAP on PCB',
					'Valid for Modes'=>'TIMER, IMPACT, T+I',
					'Mode'=>[
									'Timer Mode'=>[
													'Time (ms)'=>100,
													'Voltage (V)'=>0.5,
														'Excepted' => [
                              'test_point_3_time'=>'6020',
                              'test_point_4_time'=>0,
                              'test_point_1_voltage'=>3.3,
                              'test_point_2'=>'',
                              'test_point_3_voltage'=>3.3,
                              'number_of_pulse'=>0,
                              'test_point_4_pulse_high'=>'0-0-0',
                              'test_point_4_pulse_low'=>'0-0-0',
                              'test_point_4_voltage'=>0,
                              'test_point_5'=>'',
                              'test_point_6'=>'',
                              'test_point_7_V'=>3.3,
                              'test_point_7_V2'=>0
														],
														'Actual' => [
														]
										],
										'Impact Mode'=>[
																'Time (ms)'=>100,
																'Voltage (V)'=>0.5,
																'Excepted' => [
                                  'test_point_3_time'=>'6020',
                                  'test_point_4_time'=>0,
                                  'test_point_1_voltage'=>3.3,
                                  'test_point_2'=>'',
                                  'test_point_3_voltage'=>3.3,
                                  'number_of_pulse'=>0,
                                  'test_point_4_pulse_high'=>'0-0-0',
                                  'test_point_4_pulse_low'=>'0-0-0',
                                  'test_point_4_voltage'=>0,
                                  'test_point_5'=>'',
                                  'test_point_6'=>'',
                                  'test_point_7_V'=>3.3,
                                  'test_point_7_V2'=>0
																],
																'Actual' => [
																]
											],
											'Timer & Impact Mode'=>[
																	'Time (ms)'=>100,
																	'Voltage (V)'=>0.5,
																	'Excepted' => [
                                    'test_point_3_time'=>'6020',
      															'test_point_4_time'=>0,
      															'test_point_1_voltage'=>3.3,
      															'test_point_2'=>'',
      															'test_point_3_voltage'=>3.3,
      															'number_of_pulse'=>0,
      															'test_point_4_pulse_high'=>'0-0-0',
      															'test_point_4_pulse_low'=>'0-0-0',
      															'test_point_4_voltage'=>0,
      															'test_point_5'=>'',
      															'test_point_6'=>'',
      															'test_point_7_V'=>3.3,
      															'test_point_7_V2'=>0
																	],
																	'Actual' => [
																	]
												]
							]
				],
				'Test_Case_9'=>[
					'Test Case'=>9,
					'Test Condition'=>'1 sec < t < 1.7 sec With TAP on PCB',
					'Valid for Modes'=>'TIMER, T+I',
					'Mode'=>[
									'Timer Mode'=>[
													'Time (ms)'=>100,
													'Voltage (V)'=>0.5,
														'Excepted' => [
															'test_point_3_time'=>'1000-1700',
															'test_point_4_time'=>'',
															'test_point_1_voltage'=>3.3,
															'test_point_2'=>'',
															'test_point_3_voltage'=>0,
															'number_of_pulse'=>0,
															'test_point_4_pulse_high'=>'0-0-0',
															'test_point_4_pulse_low'=>'0-0-0',
															'test_point_4_voltage'=>0,
															'test_point_5'=>'',
															'test_point_6'=>'',
															'test_point_7_V'=>3.3,
															'test_point_7_V2'=>0
														],
														'Actual' => [
														]
										],

									'Timer & Impact Mode'=>[
																	'Time (ms)'=>100,
																	'Voltage (V)'=>0.5,
																	'Excepted' => [
                                    'test_point_3_time'=>0,
      															'test_point_4_time'=>'',
      															'test_point_1_voltage'=>3.3,
      															'test_point_2'=>'',
      															'test_point_3_voltage'=>0,
      															'number_of_pulse'=>0,
      															'test_point_4_pulse_high'=>'0-0-0',
      															'test_point_4_pulse_low'=>'0-0-0',
      															'test_point_4_voltage'=>0,
      															'test_point_5'=>'',
      															'test_point_6'=>'',
      															'test_point_7_V'=>3.3,
      															'test_point_7_V2'=>0
																	],
																	'Actual' => [
																	]
												]
							]
				],
				'Test_Case_10'=>[
					'Test Case'=>10,
					'Test Condition'=>'1 sec < t < 1.7 sec Without TAP on PCB',
					'Valid for Modes'=>'TIMER, T+I',
					'Mode'=>[
									'Timer Mode'=>[
													'Time (ms)'=>100,
													'Voltage (V)'=>0.5,
														'Excepted' => [
                              'test_point_3_time'=>0,
                              'test_point_4_time'=>'',
                              'test_point_1_voltage'=>3.3,
                              'test_point_2'=>'',
                              'test_point_3_voltage'=>0,
                              'number_of_pulse'=>0,
                              'test_point_4_pulse_high'=>'0-0-0',
                              'test_point_4_pulse_low'=>'0-0-0',
                              'test_point_4_voltage'=>0,
                              'test_point_5'=>'',
                              'test_point_6'=>'',
                              'test_point_7_V'=>3.3,
                              'test_point_7_V2'=>0
														],
														'Actual' => [
														]
										],

									'Timer & Impact Mode'=>[
																	'Time (ms)'=>100,
																	'Voltage (V)'=>0.5,
																	'Excepted' => [
                                    'test_point_3_time'=>0,
                                    'test_point_4_time'=>'',
                                    'test_point_1_voltage'=>3.3,
                                    'test_point_2'=>'',
                                    'test_point_3_voltage'=>0,
                                    'number_of_pulse'=>0,
                                    'test_point_4_pulse_high'=>'0-0-0',
                                    'test_point_4_pulse_low'=>'0-0-0',
                                    'test_point_4_voltage'=>0,
                                    'test_point_5'=>'',
                                    'test_point_6'=>'',
                                    'test_point_7_V'=>3.3,
                                    'test_point_7_V2'=>0
																	],
																	'Actual' => [
																	]
												]
							]
				],
				'Test_Case_11'=>[
					'Test Case'=>11,
					'Test Condition'=>'1.7 sec < t < 6 sec With TAP on PCB',
					'Valid for Modes'=>'Impact Mode',
					'Mode'=>[
									'Impact Mode'=>[
													'Time (ms)'=>100,
													'Voltage (V)'=>0.5,
														'Excepted' => [
															'test_point_3_time'=>0,
															'test_point_4_time'=>'1700-6000',
															'test_point_1_voltage'=>3.3,
															'test_point_2'=>'',
															'test_point_3_voltage'=>0,
															'number_of_pulse'=>'!0',
															'test_point_4_pulse_high'=>20,
															'test_point_4_pulse_low'=>0,
															'test_point_4_voltage'=>3.3,
															'test_point_5'=>'',
															'test_point_6'=>'',
															'test_point_7_V'=>3.3,
															'test_point_7_V2'=>0
														],
														'Actual' => [
														]
										]
							]
				],
				'Test_Case_12'=>[
					'Test Case'=>12,
					'Test Condition'=>'1.7 sec < t < 6 sec Without TAP on PCB',
					'Valid for Modes'=>'Impact Mode',
					'Mode'=>[
									'Impact Mode'=>[
													'Time (ms)'=>100,
													'Voltage (V)'=>0.5,
														'Excepted' => [
                              'test_point_3_time'=>0,
                              'test_point_4_time'=>0,
                              'test_point_1_voltage'=>3.3,
                              'test_point_2'=>'',
                              'test_point_3_voltage'=>0,
                              'number_of_pulse'=>0,
                              'test_point_4_pulse_high'=>'0-0-0',
                              'test_point_4_pulse_low'=>'0-0-0',
                              'test_point_4_voltage'=>3.3,
                              'test_point_5'=>'',
                              'test_point_6'=>'',
                              'test_point_7_V'=>3.3,
                              'test_point_7_V2'=>0
														],
														'Actual' => [
														]
										]
							]
				],
				'Test_Case_13'=>[
					'Test Case'=>13,
					'Test Condition'=>'1.7 sec < t < 4 sec With TAP on PCB',
					'Valid for Modes'=>'T+I',
					'Mode'=>[
									'Timer & Impact Mode'=>[
													'Time (ms)'=>100,
													'Voltage (V)'=>0.5,
														'Excepted' => [
                              'test_point_3_time'=>0,
															'test_point_4_time'=>'1700-4000',
															'test_point_1_voltage'=>3.3,
															'test_point_2'=>'',
															'test_point_3_voltage'=>0,
															'number_of_pulse'=>'!0',
															'test_point_4_pulse_high'=>20,
															'test_point_4_pulse_low'=>0,
															'test_point_4_voltage'=>3.3,
															'test_point_5'=>'',
															'test_point_6'=>'',
															'test_point_7_V'=>3.3,
															'test_point_7_V2'=>0
														],
														'Actual' => [
														]
										]
							]
				],
				'Test_Case_14'=>[
					'Test Case'=>14,
					'Test Condition'=>'1.7 sec < t < 4 sec Without TAP on PCB',
					'Valid for Modes'=>'T+I',
					'Mode'=>[
									'Timer & Impact Mode'=>[
													'Time (ms)'=>100,
													'Voltage (V)'=>0.5,
														'Excepted' => [
                              'test_point_3_time'=>0,
                              'test_point_4_time'=>0,
                              'test_point_1_voltage'=>3.3,
                              'test_point_2'=>'',
                              'test_point_3_voltage'=>0,
                              'number_of_pulse'=>0,
                              'test_point_4_pulse_high'=>'0-0-0',
                              'test_point_4_pulse_low'=>'0-0-0',
                              'test_point_4_voltage'=>3.3,
                              'test_point_5'=>'',
                              'test_point_6'=>'',
                              'test_point_7_V'=>3.3,
                              'test_point_7_V2'=>0
														],
														'Actual' => [
														]
										]
							]
				],
		]
];


?>
