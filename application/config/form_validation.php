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
      ]
];