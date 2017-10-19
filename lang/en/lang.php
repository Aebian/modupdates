<?php

return [
    'plugin' => [
        'name'        => 'ModUpdates',
        'description' => 'Utilize the GitLab API to show informations about the upcoming Mod Updates in the Gruppe W Repo.'
    ],
    'pagination' => [
        'per_page' => 'Items per Page',
        'group'    => 'Pagination'
    ],
    'list' => [
        'name'                => 'GitLab Issue List',
        'description'         => 'List public issues for the specified project.',
        'tracker_title'       => 'Project',
        'tracker_desc'        => 'The project name whose issues are displayed',
        'label_title'         => 'Label',
        'label_desc'          => 'The name of the label issues should be displayed with.',
        'state_title'         => 'State',
        'state_desc'          => 'Whether open or vlosed issues should be displayed. ',
        'state_opt_all'       => 'all',
        'state_opt_open'      => 'open',
        'state_opt_closed'    => 'closed',
        'accesstoken_title'   => 'Access Token',
        'accesstoken_desc'    => 'The Token that will be used to authetenticate against the API'
    ]
];
