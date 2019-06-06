<?php

$config = [
      "registration" => [
            [
                  'field' => 'lastname',
                  'label' => 'last name',
                  'rules' => 'trim|required|min_length[2]|max_length[32]|alpha'
            ],
            [
                  'field' => 'firstname',
                  'label' => 'first name',
                  'rules' => 'trim|required|min_length[2]|max_length[32]|alpha'
            ],
            [
                  'field' => 'middlename',
                  'label' => 'middle name',
                  'rules' => 'trim|required|min_length[2]|max_length[32]|alpha'
            ],
            [
                  'field' => 'gender',
                  'label' => 'gender',
                  'rules' => 'trim|required'
            ],
            [
                  'field' => 'email',
                  'label' => 'email',
                  'rules' => 'trim|required|min_length[5]|max_length[50]|valid_email'
            ],
            [
                  'field' => 'mobile-number',
                  'label' => 'mobile number',
                  'rules' => 'trim|required|integer|min_length[4]|numeric'
            ],
            [
                  'field' => 'church-name',
                  'label' => 'church / organization name',
                  'rules' => 'trim|required|min_length[2]|max_length[100]'
            ],
            [
                  'field' => 'church-city',
                  'label' => 'church / organization city',
                  'rules' => 'trim|required|min_length[2]|max_length[100]'
            ],
            [
                  'field' => 'role',
                  'label' => 'role',
                  'rules' => 'trim|required|min_length[2]|max_length[6]'
            ],
            [
                  'field' => 'email_per_event',
                  'label' => 'role',
                  'errors' => array(
                        'is_unique' => 'Your email is already registered for this event. Please use another email.',
                  ),
                  'rules' => 'trim|required|min_length[2]|is_unique[registrants.email_per_event_key]',
            ]
      ],
      "login" => [
            [
                  'field' => 'username',
                  'label' => 'username',
                  'rules' => 'trim|required|min_length[2]'
            ],
            [
                  'field' => 'password',
                  'label' => 'password',
                  'rules' => 'trim|required|min_length[2]'
            ]
      ],
      "update_event" => [
            [
                  'field' => 'title',
                  'label' => 'Title',
                  'rules' => 'trim|required|min_length[5]'
            ],
            [
                  'field' => 'status',
                  'label' => 'Status',
                  'rules' => 'trim|required'
            ],
            [
                  'field' => 'details',
                  'label' => 'Details',
                  'rules' => 'trim|required|min_length[10]'
            ],
            [
                  'field' => 'speakers',
                  'label' => 'Speakers',
                  'rules' => 'trim|required'
            ],
            [
                  'field' => 'venue',
                  'label' => 'Venue',
                  'rules' => 'trim|required|min_length[10]'
            ],
            [
                  'field' => 'reg_fee',
                  'label' => 'Registration fee',
                  'rules' => 'trim|required|numeric'
            ],
            [
                  'field' => 'reg_fee_details',
                  'label' => 'Registration fee details',
                  'rules' => 'trim|required|min_length[2]'
            ],
            [
                  'field' => 'image',
                  'label' => 'Banner image',
                  'rules' => 'trim'
            ],
            [
                  'field' => 'date_start',
                  'label' => 'Date start',
                  'rules' => 'trim|required'
            ],
            [
                  'field' => 'date_end',
                  'label' => 'Date end',
                  'rules' => 'trim|required'
            ],
            [
                  'field' => 'date',
                  'label' => 'Date details',
                  'rules' => 'trim|required'
            ],
      ]
];