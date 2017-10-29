<?php
namespace Deployer;

require 'recipe/silverstripe-deployer.php';

// Configuration
set('repository', 'GIREPOSITORY');

// Hosts
server('example.com')
    ->user('SSHUSERNAME')
    ->stage('production');

server('staging.example.com')
    ->user('SSHUSERNAME')
    ->stage('staging');
