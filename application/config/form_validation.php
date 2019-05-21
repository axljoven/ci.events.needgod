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
            ]
      ]
];