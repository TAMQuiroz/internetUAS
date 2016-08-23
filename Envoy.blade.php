@servers(['dev' => 'dp2'])

@setup
    $repo = 'git@github.com:yayoF/intranetUAS.git';
    $app_dir = '/var/www/dp2';
    $release_dir = '/var/www/releases';
    $shared_dir = '/var/www/shared';
    $release = 'release_' . date('YmdHis');
@endsetup

@macro('deploy', ['on' => 'dev'])
    fetch_repo
    run_composer
    update_permissions
    update_symlinks
@endmacro

@task('fetch_repo')
    cd {{ $release_dir }};
    git clone  --depth 1 --branch master {{ $repo }} {{ $release }};
@endtask

@task('run_composer')
    cd {{ $release_dir }}/{{ $release }};
    composer install --prefer-dist --no-scripts;
    php artisan clear-compiled --env=production;
    php artisan optimize --env=production;
@endtask

@task('update_permissions')
    cd {{ $release_dir }};
    chgrp -R www-data {{ $release }};
    chmod -R ug+rwx {{ $release }};
@endtask

@task('update_symlinks')
    ln -nfs {{ $release_dir }}/{{ $release }} {{ $app_dir }};
    chgrp -h www-data {{ $app_dir }};

    cd {{ $release_dir }}/{{ $release }};
    ln -nfs {{ $shared_dir }}/.env .env;
    chgrp -h www-data .env;

    rm -r {{ $release_dir }}/{{ $release }}/storage/logs;
    cd {{ $release_dir }}/{{ $release }}/storage;
    ln -nfs {{ $shared_dir }}/logs logs;
    chgrp -h www-data logs;
@endtask

@task('init')
    [ -d {{ $release_dir }} ] || mkdir -p {{ $release_dir }};
    [ -d {{ $shared_dir }}/logs ] || mkdir -p {{ $shared_dir }}/logs;
    touch {{ $shared_dir }}/.env;
@endtask

@task('clean_releases')
    rm -rf {{ $release_dir }};
    [ -d {{ $release_dir }} ] || mkdir -p {{ $release_dir }};
@endtask