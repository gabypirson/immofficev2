 <footer class="footer-annonces">
                <p><span>Copyright</span> Immoffice © 2016-2017</p>
            </footer>
        </div>
        
        </div>
        <aside class="l-nav-aside hide-menu" >
            <ul class="l-nav-small">
                <li><a href=""><?php echo $this->lang->line('need_help'); ?>?</a></li>
                <!--<li><a href=""><?php echo $this->lang->line('notification'); ?> <span class="badge">1</span></a></li>-->
                <li><a href=""><?php echo $this->lang->line('logout'); ?></a></li>
                <li class="dropdown-container">
                    <a href="javascript:;" class="btn-grey btn-dropdown" data-id="langue"><?php echo $this->lang->line('lang'); ?></a>
                    <ul class="dropdown hidden" id="langue">
                        <li><a href=""><?php echo $this->lang->line('french'); ?></a></li>
                        <li><a href=""><?php echo $this->lang->line('dutch'); ?></a></li>
                    </ul>
                </li>
            </ul>
            <div class="m-map-marker"><i class="fa fa-map-marker"></i></div>
            <div class="dropdown-container dropdown-profile">
                <a href="javascript:;" class="btn-dropdown profile-btn" data-id="profile">
                    <span>Marie</span>
                    <?php echo $this->lang->line('my_account'); ?>
                </a>
                <ul class="dropdown hidden" id="profile">
                    <li><a href=""><?php echo $this->lang->line('edit_my_profil'); ?></a></li>
                    <li><a href=""><?php echo $this->lang->line('logout'); ?></a></li>
                </ul>
            </div>
            <ul class="l-nav-big">
                <li><a href="<?php echo site_url('annonces/index'); ?>" class='active'><i class="fa fa-search"></i><span><?php echo $this->lang->line('annonces'); ?></span></a></li>
                <li><a href=""><i class="fa fa-reddit"></i> <span><?php echo $this->lang->line('alert_mail'); ?></span></a></li>
                <li><a href="<?php echo site_url('favoris/index'); ?>"><i class="fa fa-heart"></i> <span><?php echo $this->lang->line('favoris'); ?></span></a></li>
                <li><a href="<?php echo site_url('rappels/index'); ?>"><i class="fa fa-phone"></i> <span ><?php echo $this->lang->line('my_remembers'); ?></span></a></li>
              <!--  <li><a href=""><i class="fa fa-user"></i> <span >Mes comptes</span></a></li>-->
                <li><a href="#"><i class="fa fa-calendar"></i> <span ><?php echo $this->lang->line('news'); ?></span></a></li>
                <li><a href="#"><i class="fa fa-at"></i> <span ><?php echo $this->lang->line('suggestions'); ?></span></a></li>
            </ul>
        </aside>
    </div>
</body>