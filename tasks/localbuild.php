<?php

namespace Deployer;

use Deployer\Task\Context;
use Deployer\Executor\SeriesExecutor;

/**
 * Builds to a local folder
 * @see https://deployer.org/docs/advanced/deploy-strategies#build-server
 */

set('local_build_path', '{{project_path}}/.silverstripe-deployer');

desc('Perform a deploy locally for upload to server.');

task('localbuild:config', function () {
    set('deploy_path', '{{local_build_path}}');
    set('keep_releases', 1);
})->onlyForStage('local');

task('localbuild',[
    'deploy:writable',
	'deploy:prepare',
	'deploy:release',
	'deploy:update_code',
	'deploy:vendors',
	'deploy:symlink',
	'cleanup'
])->onlyForStage('local');

task('localbuild:upload', function () {
	upload('{{local_build_path}}/current/', '{{release_path}}', array(
		'options' => array(
			'--exclude=\'.git/\'',
			'--exclude=\'assets/\'',
			'--exclude=\'silverstripe-cache/\''
		)
	));
});
