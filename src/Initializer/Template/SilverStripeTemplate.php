<?php

namespace Deployer\Initializer\Template;

class SilverStripeTemplate extends Template
{

    protected function getTemplateContent($params)
    {
        $stats = $params['allow_anonymous_stats']
            ? ''
            : "set('allow_anonymous_stats', false);";

        $repository = $params['repository'];
        
        return <<<PHP
<?php
namespace Deployer;

require 'recipe/silverstripe-deployer.php';

// Configuration
set('repository', '${repository}');

// Hosts
server('example.com')
    ->user('SSHUSERNAME')
    ->stage('production');

server('staging.example.com')
    ->user('SSHUSERNAME')
    ->stage('staging');

${stats}
PHP;
    }

}
