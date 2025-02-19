<?php

$levelAmount = 'level';

if (Auth::User()->level() >= 2) {
    $levelAmount = 'levels';

}

?>

<div class="card">
    <div class="card-header <?php if (Auth::check() && Auth::user()->hasRole('admin',
            true)): ?> bg-secondary text-white <?php endif; ?>">

        Welcome <?php echo e(Auth::user()->name); ?>


        <?php if (Auth::check() && Auth::user()->hasRole('admin', true)): ?>
            <span class="pull-right badge badge-primary" style="margin-top:4px">
                Admin Access
            </span>
        <?php else: ?>
            <span class="pull-right badge badge-warning" style="margin-top:4px">
                User Access
            </span>
        <?php endif; ?>

    </div>
    <div class="card-body">
        <h2 class="lead">
            <?php echo e(trans('auth.loggedIn')); ?>

        </h2>
        <p>
            <em>Thank you</em> for checking this project out. <strong>Please remember to star it!</strong>
        </p>
        <p>
            <iframe src="https://ghbtns.com/github-btn.html?user=jeremykenedy&repo=laravel-auth&type=star&count=true"
                    frameborder="0" scrolling="0" width="170px" height="20px" style="margin: 0px 0 -3px .5em;"></iframe>
        </p>
        <p>
            This page route is protected by <code>activated</code> middleware. Only accounts with activated emails are
            able pass this middleware.
        </p>
        <p>
            <small>
                Users registered via Social providers are by default activated.
            </small>
        </p>

        <hr>

        <p>
            You have
            <strong>
                <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
                    Admin
                <?php endif; ?>
                <?php if (Auth::check() && Auth::user()->hasRole('user')): ?>
                    User
                <?php endif; ?>
            </strong>
            Access
        </p>

        <hr>

        <p>
            You have access to <?php echo e($levelAmount); ?>:
            <?php if (Auth::check() && Auth::user()->level() >= 5): ?>
                <span class="badge badge-primary margin-half">5</span>
            <?php endif; ?>

            <?php if (Auth::check() && Auth::user()->level() >= 4): ?>
                <span class="badge badge-info margin-half">4</span>
            <?php endif; ?>

            <?php if (Auth::check() && Auth::user()->level() >= 3): ?>
                <span class="badge badge-success margin-half">3</span>
            <?php endif; ?>

            <?php if (Auth::check() && Auth::user()->level() >= 2): ?>
                <span class="badge badge-warning margin-half">2</span>
            <?php endif; ?>

            <?php if (Auth::check() && Auth::user()->level() >= 1): ?>
                <span class="badge badge-default margin-half">1</span>
            <?php endif; ?>
        </p>

        <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>

            <hr>

            <p>
                You have permissions:
                <?php if (Auth::check() && Auth::user()->hasPermission('view.users')): ?>
                    <span class="badge badge-primary margin-half margin-left-0">
                        <?php echo e(trans('permsandroles.permissionView')); ?>

                    </span>
                <?php endif; ?>

                <?php if (Auth::check() && Auth::user()->hasPermission('create.users')): ?>
                    <span class="badge badge-info margin-half margin-left-0">
                        <?php echo e(trans('permsandroles.permissionCreate')); ?>

                    </span>
                <?php endif; ?>

                <?php if (Auth::check() && Auth::user()->hasPermission('edit.users')): ?>
                    <span class="badge badge-warning margin-half margin-left-0">
                        <?php echo e(trans('permsandroles.permissionEdit')); ?>

                    </span>
                <?php endif; ?>

                <?php if (Auth::check() && Auth::user()->hasPermission('delete.users')): ?>
                    <span class="badge badge-danger margin-half margin-left-0">
                        <?php echo e(trans('permsandroles.permissionDelete')); ?>

                    </span>
                <?php endif; ?>

            </p>

        <?php endif; ?>

    </div>
</div>
