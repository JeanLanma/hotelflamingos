<?php

$config = array(
        'room_validation' => array(
                array(
                        'field' => 'name',
                        'label' => 'Nombre',
                        'rules' => 'required|max_length[60]'
                ),
                array(
                        'field' => 'description',
                        'label' => 'Descripción',
                        'rules' => 'required|max_length[400]'
                ),
                array(
                        'field' => 'image_cover',
                        'label' => 'URL Portada',
                        'rules' => 'trim|max_length[255]'
                ),
                array(
                        'field' => 'price',
                        'label' => 'Precio',
                        'rules' => 'required|decimal'
                ),
                array(
                        'field' => 'availability',
                        'label' => 'Disponibilidad',
                        'rules' => 'required|is_natural'
                )
        )
);
