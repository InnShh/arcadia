<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'git@github.com:InnShh/arcadia.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('innash.net')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '~/arcadia');

// Hooks

after('deploy:failed', 'deploy:unlock');
