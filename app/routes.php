<?php
// Routes

$app->get('/', 'App\Aleat\AleatController:index')
    ->setName('aleat_index');
