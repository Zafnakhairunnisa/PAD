<?php
namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/npm.php';
require 'contrib/rsync.php';

///////////////////////////////////    
// Config
///////////////////////////////////

set('application', 'Dinas Perempuan');
set('repository', 'git@github.com:agungkes/komnas-perempuan.git'); // Git Repository
set('ssh_multiplexing', true);  // Speed up deployment
set('keep_releases', 2);
// set('writable_mode', 'chmod');
//set('default_timeout', 1000);

set('rsync_src', function () {
    return __DIR__; // If your project isn't in the root, you'll need to change this.
});

add('rsync', [
    'exclude' => [
        '.git',
        '/vendor/',
        '/node_modules/',
        '.github',
        'deploy.php',
    ],
]);

add('shared_files', []);
add('shared_dirs', []);

// Set up a deployer task to copy secrets to the server.
// Grabs the dotenv file from the github secret
// task('deploy:secrets', function () {
//     file_put_contents(__DIR__ . '/.env', getenv('DOT_ENV'));
//     upload('.env', get('deploy_path') . '/shared');
// });

///////////////////////////////////
// Hosts
///////////////////////////////////

host('staging')
    ->setSshArguments(['-o StrictHostKeyChecking=no'])
    ->setHostname('174.138.18.16')
    ->set('remote_user', 'deployer')
    ->set('branch', 'development')
    ->set('deploy_path', '~/dinas-perempuan');

after('deploy:failed', 'deploy:unlock');  // Unlock after failed deploy
after('deploy:info', 'deploy:unlock');  // Unlock after failed deploy

///////////////////////////////////
// Tasks
///////////////////////////////////

desc('Start of Deploy the application');

task('deploy', [
    'deploy:prepare',
    'rsync',                // Deploy code & built assets
    // 'deploy:secrets',       // Deploy secrets
    'deploy:vendors',
    'deploy:shared',        // 
    'artisan:storage:link', //
    'artisan:view:cache',   //
    'artisan:config:cache', // Laravel specific steps
    'artisan:migrate',      //
    'artisan:queue:restart',//
    'deploy:publish',       // 
]);

desc('End of Deploy the application');