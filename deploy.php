<?php

namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/npm.php';

// Config

set('repository', 'git@github.com:InnShh/arcadia.git');
set('branch', 'main');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('innash.net')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '~/arcadia');

// Tasks

task('npm:build', function () {
    run('cd {{release_path}} && npm run build');
});

// Hooks

after('deploy:failed', 'deploy:unlock');
after('deploy:update_code', 'npm:install');
after('npm:install', 'npm:build');
