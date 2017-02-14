<div class="title-container">
    <h2><?php echo $this->lang->line('user'); ?></h2>
    <ul>
        <li>
            <a href=""><?php echo $this->lang->line('home'); ?></a>
            <a href="" class="active"><?php echo $this->lang->line('new'); ?></a>
        </li>
    </ul>
</div>
<section class="l-annonces-search l-annonces-section apparitionright">
    <!-- TODO ME : AJOUTER VERIFICATION FORM + LABELS -->
    <form action="" method="POST">
    <div class="l-annonces-form l-form">
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('email'); ?></label>
            <input type="text" name="email" value='' required>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('password'); ?></label>
            <input type="password" name="password" value='' required>
        </fieldset>
         <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('verify_password'); ?></label>
            <input type="password" name="verify_password" value='' required>
        </fieldset>
        <hr/>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('name'); ?></label>
            <input type="text" name="name" value='' >
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('firstname'); ?></label>
            <input type="text" name="firstname" value='' >
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('agence'); ?></label>
            <input type="text" name="agence" value='' >
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('tel'); ?></label>
            <input type="text" name="tel" value='' >
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('adress'); ?></label>
            <input type="text" name="adress" value='' >
        </fieldset>
        <hr/>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('owner_email'); ?></label>
            <input type="text" name="owner_email" value='' >
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('owner_commercial'); ?></label>
            <input type="text" name="owner_commercial" value='' >
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('price_htva'); ?></label>
            <input type="text" name="price_htva" value='' >
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('price_tvac'); ?></label>
            <input type="text" name="price_tvac" value='' >
        </fieldset>
        <fieldset class="radio-inline-cont ">
            <div>
                <input name="lang" type="radio" value="french" id="fr">
                <label for="fr"><?php echo $this->lang->line('french'); ?></label>
            </div><!--
             --><div>
                <input name="lang" type="radio" value="dutch" id="nl">
                <label for="nl"><?php echo $this->lang->line('dutch'); ?></label>
            </div>
        </fieldset>
        <fieldset>
            <button name="save" class="btn" value="save" type="submit"><?php echo $this->lang->line('save'); ?></button>
         </fieldset>
    </div>
    </form>
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>