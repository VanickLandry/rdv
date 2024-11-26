<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <a class="brand" href="<?php echo url_for("@homepage") ?>"><?php echo sfConfig::get('app_tmcTwitterBootstrapPlugin_dashboard_name', 'Administration') ?></a>
            <?php if ($sf_user->isAuthenticated()): ?>             <?php echo myAppHelper::getTopNavBarMenuContent($sf_user) ; ?>

            <div class="nav-collapse">
                <ul class="nav">
                    <?php foreach ($menus as $k => $menu): ?>
                        <?php $is_current_module = false; ?>
                        <?php $is_current_route = false; ?>
                        <?php if (isset($menu['module_name']) && $menu['module_name'] == $sf_context->getModuleName()): ?>
                            <?php $is_current_module = true; ?>
                        <?php endif; ?>

                        <?php $credentials = isset($menu['credentials']) ? $menu['credentials'] : null; ?>
                        <?php if ($credentials): ?>
                            <?php if (!$sf_user->hasCredential($credentials)): ?>
                                <?php continue; ?>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if (!array_key_exists('dropdown', $menu)): ?>
                            <?php $name = $k; ?>
                            <?php $route = $menu['route']; ?>
                            <?php if (!array_key_exists($route, $routes)): ?>
                                <?php continue; ?>
                            <?php endif; ?>
                            <?php $is_current_route = preg_match('/^'.$route.'/', $current_route) ?>
                            <li class="<?php echo $is_current_route || $is_current_module ? 'active' : '' ?>"><a href="<?php echo url_for('@' . $route); ?>"><?php echo __($name) ?></a></li>
                        <?php else: ?>
                            <?php $submenus = $menu['dropdown']; ?>
                            <li class="dropdown <?php echo $is_current_route || $is_current_module ? 'active' : '' ?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __($k) ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <?php foreach ($submenus as $k => $menu): ?>
                                        <?php $name = $k; ?>
                                        <?php $route = $menu['route']; ?>
                                        <?php $divider = isset($menu['divider']) ? $menu['divider'] : null; ?>
                                        <?php $credentials = isset($menu['credentials']) ? $menu['credentials'] : null; ?>
                                        <?php if ($credentials): ?>
                                            <?php if (!$sf_user->hasCredential($credentials)): ?>
                                                <?php continue; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if (!array_key_exists($route, $routes)): ?>
                                            <?php continue; ?>
                                        <?php endif; ?>
                                        <?php $is_current_route = preg_match('/^'.$route.'/', $current_route) ?>
                                        <li class="<?php echo $is_current_route ? 'active' : '' ?>"><a href="<?php echo url_for('@' . $route); ?>"><?php echo __($name) ?></a></li>
                                        <?php if ($divider): ?>
                                            <li class="divider"></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
                <p class="navbar-text pull-right"><?php echo __('Logged in as', null, 'tmcTwitterBootstrapPlugin') ?> <a href="<?php echo url_for(sfConfig::get('app_tmcTwitterBootstrapPlugin_profile_route', '@homepage?username=').$sf_user->getGuardUser()->getUsername()) ?>"><?php echo $sf_user->getGuardUser() ?></a> | <a href="<?php echo url_for('@sf_guard_signout') ?>"><?php echo __('Logout', null, 'tmcTwitterBootstrapPlugin') ?></a></p>
            </div>
            <?php endif ?>
        </div>
    </div>
</div>
  <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php /*    jquery.js,bootstrap-transition.js,bootstrap-alert.js,bootstrap-modal.js,bootstrap-dropdown.js,bootstrap-scrollspy.js,bootstrap-tab.js,bootstrap-tooltip.js,bootstrap-popover.js,bootstrap-button.js,bootstrap-collapse.js,bootstrap-carousel.js,bootstrap-typeahead.js  */ ?>
    <script src="<?php echo  javascript_path('{0}'); ?>"></script>

    <!-- <script src="../in_config/twitter_bootstrap/jquery.js"></script> -->
    
    <script src="<?php echo  javascript_path('jquery'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-transition'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-alert'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-modal'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-dropdown'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-scrollspy'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-tab'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-tooltip'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-popover'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-button'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-collapse'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-carousel'); ?>"></script>
    <script src="<?php echo  javascript_path('bootstrap-typeahead'); ?>"></script>


<script>
        /*
    $('.carousel').carousel({
    interval: 2000
    })
        */
</script>
  
