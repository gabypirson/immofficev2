<section class="l-annonces-search l-annonces-section apparitionright">
    <!-- TODO ME : AJOUTER VERIFICATION FORM + LABELS -->
    <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="back_path" value="<?php echo $back_path; ?>">
    <input type="hidden" name="id" value="<?php echo $favoris->id; ?>">
       
    <div class="l-annonces-form l-form">

        <input type="hidden" name="current_tab" id="current_tab" value="tab<?php echo $tab; ?>" >
        <ul class="tabs">
            <li><div id="tab1"  data-select="tab1" class="<?php if($tab == 1) echo 'active'; ?>"><?php echo $this->lang->line('general'); ?></div></li>
            <li><div id="tab2"  data-select="tab2" class="<?php if($tab == 2) echo 'active'; ?>"><?php echo $this->lang->line('rappel'); ?></div></li>
            <li><div id="tab3"  data-select="tab3" class="<?php if($tab == 3) echo 'active'; ?>"><?php echo $this->lang->line('add_infos'); ?></div></li>
            <li><div id="tab4" data-select="tab4" class="<?php if($tab == 4) echo 'active'; ?>"><?php echo $this->lang->line('following'); ?></div></li> 
            <li><div id="tab5" data-select="tab5" class="<?php if($tab == 5) echo 'active'; ?>"><?php echo $this->lang->line('owner'); ?></div></li> 

            <li><div id="tab6" data-select="tab6" class="<?php if($tab == 6) echo 'active'; ?>"><?php echo $this->lang->line('email'); ?></div></li> 
        </ul>
        <fieldset class="inputstyle select tabsselectcont">
            <select id="tabsselect" >
                <option value="tab1" <?php if($tab == 1) echo 'selected'; ?>><?php echo $this->lang->line('favoris'); ?></option>
                <option value="tab2" <?php if($tab == 2) echo 'selected'; ?>><?php echo $this->lang->line('rappel'); ?></option>
                <option value="tab3" <?php if($tab == 3) echo 'selected'; ?>><?php echo $this->lang->line('add_infos'); ?></option>
                <option value="tab4" <?php if($tab == 4) echo 'selected'; ?>><?php echo $this->lang->line('notes'); ?></option>
                <option value="tab5" <?php if($tab == 5) echo 'selected'; ?>><?php echo $this->lang->line('owner'); ?></option>
                 <?php if($current_user->role_id == 4){ ?>
                <option value="tab6" <?php if($tab == 6) echo 'selected'; ?>><?php echo $this->lang->line('email'); ?></option>
                 <?php } ?>
            </select>
         </fieldset>

        <div class="block">
            <div class='<?php if($tab == 1) echo 'active'; ?> tab tab1'>
                <fieldset>
                    <div><label for="mandataire"><?php echo $this->lang->line('favoris_id'); ?>:</label>
                    <?php echo $favoris->id; ?>
                    </div>
                </fieldset>
                <fieldset class="favoris-edit-assign ">
                    <div><label for="mandataire"><?php echo $this->lang->line('assign_to'); ?>:</label></div>
                    <div>
                        <select name="mandataire_user_id" id="mandataire" class="form-control">
                            <?php foreach($mandataires as $key => $mandataire){ ?> 
                                <option value="<?php echo $mandataire->id; ?>" <?php if($mandataire->id == $favoris->user_id) echo "selected"; ?>><?php echo $mandataire->name." ".$mandataire->firstname; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </fieldset>
                <!--<div class="error">
                    <p>Ceci n'est pas possible</p>
                </div>-->

                <fieldset class="inputstyle">
                    <label for="title"><?php echo $this->lang->line('title'); ?></label>
                    <input type="text" id="title" name="title" value="<?php echo $favoris->title; ?>" >
                </fieldset>

                 <fieldset class="inputstyle inputwithbtn">
                    <label for="url"><?php echo $this->lang->line('url'); ?></label>
                    <input type="text" id="url" name="url" value="<?php echo $favoris->url; ?>" >
                    <a href="<?php echo $favoris->url; ?>" class="btn-inverse" target="_blank"><i class="fa fa-link"></i></a>
                </fieldset>

                <fieldset  class="inputstyle">
                    <label for="tags"><?php echo $this->lang->line('tags'); ?></label>
                    <input type="text" id="tags" name="tags" value="<?php echo $favoris->tags; ?>">
                </fieldset>

                 <fieldset class="inputstyle">
                    <label for="tel"><?php echo $this->lang->line('tel'); ?></label>
                    <input type="text" name="tel" id="tel" value="<?php echo $favoris->tel; ?>">
                </fieldset>
                 <fieldset class="inputstyle">
                    <label for="owner_name_old"><?php echo $this->lang->line('owner_name'); ?></label>
                    <input type="text" name="owner_name_old" id="owner_name_old" value="<?php echo $favoris->owner_name_old; ?>">
                </fieldset>
                <div class="inputstyle">
                        <fieldset >
                            <select name="favoris_status" id="favoris_status" class="form-control">
                            <?php foreach($favoris_status as $key => $favoris_statut){ ?>
                                <option value="<?php echo $favoris_statut->id; ?>" <?php if($favoris->status_id == $favoris_statut->id) echo 'selected'; ?>><?php echo $favoris_statut->name; ?></option>
                            <?php } ?>
                            </select>
                        </fieldset>
                    </div>


                <fieldset class="inputstyle" style="clear: both;">

                    <label for="note"><?php echo $this->lang->line('note'); ?></label>
                    <textarea name="note" id="note"><?php echo $favoris->note; ?></textarea>
                </fieldset>


            </div>
            <div class="tab tab2 <?php if($tab == 2) echo 'active'; ?>">
                <input type="hidden" name="rappel_id" value="<?php echo $favoris->rappel_id; ?>">
                <fieldset>
                    <div><label for="mandataire"><?php echo $this->lang->line('rappel_id'); ?>:</label>
                    <?php echo $favoris->rappel_id; ?>
                    </div>
                </fieldset>
                <fieldset class="inputstyle">
                    <label for="rappel_tags"><?php echo $this->lang->line('tags'); ?></label>
                    <input type="text" name="rappel_tags" id="rappel_tags" value="<?php echo $favoris->rappel_tags; ?>">
                </fieldset>
                
                <fieldset class="date-desktop">
                    <label><?php echo $this->lang->line('date'); ?></label>
                    <?php if($favoris->date_rappel == '') { $date_rappel = ''; }else{ $date_rappel = date('d/m/Y H:i',$favoris->date_rappel); } ?>


                    <div class='input-group date datetimepicker ' id="datetimepicker_rappel">
                        <input type="text" class="form-control" id="date_rappel" name="rappel_date_rappel" value="<?php echo $date_rappel; ?>" >
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar">
                            </span>
                        </span>
                    </div>
                </fieldset>
                <fieldset class="date-mobile">
                    <label><?php echo $this->lang->line('date'); ?></label>
                    <div>
                        <?php $date = date('Y-m-d',$favoris->date_rappel); ?>
                        <?php $time = date('H:i',$favoris->date_rappel); ?>
                        <div class='input-group'>
                            <input type="date" class="form-control" id="date_rappel_date" name="rappel_date_rappel_mobile_date" value="<?php echo $date; ?>" >
                        </div>
                        <div class='input-group'>
                            <input type="time" class="form-control" id="date_rappel_time" name="rappel_date_rappel_mobile_time" value="<?php echo $time; ?>" >
                        </div>
                    </div>
                </fieldset>
                 <fieldset class="inputstyle">
                    <label for="rappel_note"><?php echo $this->lang->line('note'); ?></label>
                    <textarea name="rappel_note" id="rappel_note"><?php echo $favoris->rappel_note; ?></textarea>
                </fieldset>
            </div>
            <div class="tab tab3 <?php if($tab == 3) echo 'active'; ?>">
                 <div class='clearfix'>
                    <div class="float-middle input-separation">  
                        <fieldset class="inputstyle">
                            <label for="web_site"><?php echo $this->lang->line('web_site'); ?></label>
                            <input type="text" id="web_site" name="web_site" value="<?php echo $favoris->web_site; ?>" >
                        </fieldset>

                         <fieldset class="inputstyle">
                            <label for="price"><?php echo $this->lang->line('price'); ?></label>
                            <input type="text" id="price" name="price" value="<?php echo $favoris->price; ?>" >
                        </fieldset>
                        <!--<fieldset class="inputstyle">
                            <label><?php echo $this->lang->line('date'); ?></label>
                            <input type="date" name="date_publication" value="<?php echo date('d/m/Y',$favoris->date_publication); ?>" >
                        </fieldset>-->
                        <fieldset >
                            <label class="visuallyhidden"><?php echo $this->lang->line('date'); ?></label>
                            <div class='input-group date datetimepicker' id="datetimepicker_publication">
                                <input type="text" class="form-control" id="date_publication" name="date_publication" value="<?php echo date('d/m/Y',$favoris->date_publication); ?>">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar">
                                    </span>
                                </span>
                            </div>
                        </fieldset>
                        <fieldset class="inputstyle">
                            <label for="living_space"><?php echo $this->lang->line('living_space'); ?></label>
                            <input type="text" id="living_space" name="living_space" value="<?php echo $favoris->living_space; ?>">
                        </fieldset>
                    </div>
                    <div class="float-middle input-separation">
                        <fieldset class="inputstyle">
                            <label for="adress"><?php echo $this->lang->line('adress'); ?></label>
                            <input type="text" id="adress" name="adress" value="<?php echo $favoris->adress; ?>">
                        </fieldset>
                         <fieldset class="inputstyle">
                            <label for="city"><?php echo $this->lang->line('city'); ?></label>
                            <input type="text" id="city" name="city" value="<?php echo $favoris->city; ?>" >
                        </fieldset>
                        <fieldset class="inputstyle">
                            <label for="zip_code"><?php echo $this->lang->line('zip_code'); ?></label>
                            <input type="text" id="zip_code" name="zip_code" value="<?php echo $favoris->zip_code; ?>" >
                        </fieldset>
                        <fieldset class="inputstyle">
                            <label for="province"><?php echo $this->lang->line('province'); ?></label>
                            <input type="text" id="province" name="province" value="<?php echo $favoris->province; ?>" >
                        </fieldset>
                    </div>
                </div>
               
                <fieldset class="inputstyle">
                    <label for="old_prices"><?php echo $this->lang->line('old_prices'); ?></label>
                    <input type="text" id="old_prices" name="old_prices" value="<?php echo $favoris->old_prices; ?>" >
                </fieldset>

                <fieldset class="inputstyle">
                    <label for="old_publications"><?php echo $this->lang->line('old_publications'); ?></label>
                    <input type="text" id="old_publications" name="old_publications" value="<?php echo $favoris->old_publications; ?>" >
                </fieldset>

                <fieldset class="inputstyle">
                    <label for="description"><?php echo $this->lang->line('description'); ?></label>
                    <textarea name="description" id="description"><?php echo $favoris->description; ?></textarea>
                </fieldset>

                <?php if(isset($favoris->web_path)) {  ?>
                <fieldset class="inputstyle">
                    <a target="_blank" href="<?php echo $favoris->web_path; ?>"><?php echo $favoris->file_name; ?></a>
                </fieldset>
                <?php } ?>

                <fieldset class="inputstyle">
                    <input type="file" name="picture" id="picture">
                </fieldset>
            </div>
            <div class="tab tab4 <?php if($tab == 4) echo 'active'; ?>">
                <div class="">
                    <fieldset class="inputstyle">
                        <textarea name="new_remark"><?php echo $remark_placeholder; ?></textarea>
                    </fieldset>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" data-page-size="50" id="favoris_edit_table">
                        <thead>
                            <tr>
                                <th><?php echo $this->lang->line('note'); ?></th>
                                <th><?php echo $this->lang->line('date'); ?></th>
                                <th width="80px"><?php echo $this->lang->line('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($remarks as $key => $remark){ ?>
                            <tr>
                                <td><?php echo $remark->note; ?></td>
                                <td><span style="display:none;"><?php echo $remark->created; ?> </span><?php echo date('d/m/Y H:i:s',$remark->created); ?></td>
                                <td>
                                    <ul class="list-tables-buttons tes" data-id="<?php echo $remark->id; ?>">
                                        <li class="table-btn-edit"><a target="_blank" href="<?php echo site_url('favoris/edit?id='.$favoris->id.'&view=tab4&remark_edit='.$remark->id); ?>"><i class="fa fa-pencil"></i><span><?php echo $this->lang->line('edit'); ?></span></a></li>
                                        <li class="table-btn-edit"><a target="_blank" class="remove-remark" href="#"><i class="fa fa-remove"></i><span><?php echo $this->lang->line('delete'); ?></span></a></li>
                                    </ul> 
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
               
            </div>
            <div class="tab tab5 <?php if($tab == 5) echo 'active'; ?>">
                <input type="hidden" name="owner_id" id="owner_id" value="<?php echo $favoris->owner_id; ?>">


                


                <div class='clearfix'>
                    <div class="float-middle input-separation">
                       <fieldset class="inputstyle">
                            <label for="owner_name"><?php echo $this->lang->line('owner_name'); ?></label>
                            <input type="text" name="owner_name" id="owner_name" value="<?php echo $favoris->owner_name; ?>">
                        </fieldset>
                    </div>
                    <div class="float-middle input-separation">
                        <fieldset class="inputstyle">
                            <label for="owner_tel"><?php echo $this->lang->line('tel'); ?></label>
                            <input type="text" name="owner_tel" id="owner_tel" value="<?php echo $favoris->owner_tel; ?>">
                        </fieldset>
                    </div>
                </div>
                <div class='clearfix'>
                    <div class="float-middle input-separation">
                       <fieldset class="inputstyle">
                            <label for="owner_mail"><?php echo $this->lang->line('email'); ?></label>
                            <input type="email" name="owner_mail" id="owner_mail" value="<?php echo $favoris->owner_email; ?>">
                        </fieldset>
                    </div>
                    <div class="float-middle input-separation">
                        <fieldset >
                            <select name="owner_status" id="owner_status" class="form-control">
                                 <?php foreach($owners_status as $key => $owners_statu){ ?>
                                <option value="<?php echo $owners_statu->id; ?>" <?php if($favoris->owner_status_id == $owners_statu->id) echo 'selected'; ?>><?php echo $owners_statu->name; ?></option>
                            <?php } ?>
                            </select>
                        </fieldset>
                    </div>
                </div>


                <fieldset class="inputstyle" style="clear: both;">
                    <label for="note_owner"><?php echo $this->lang->line('note'); ?></label>
                    <textarea name="note_owner" id="note_owner"><?php echo $favoris->owner_note; ?></textarea>
                </fieldset>

                <hr/>
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" data-page-size="50" id="owner_table">
                    <thead>
                        <tr>
                            <th ><?php echo $this->lang->line('name'); ?></th>
                            <th ><?php echo $this->lang->line('email'); ?></th>
                            <th ><?php echo $this->lang->line('tel'); ?></th>
                            <th><?php echo $this->lang->line('status'); ?></th>
                            <th><?php echo $this->lang->line('actions'); ?></th>
                            <th class='none'><?php echo $this->lang->line('note'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($owners as $key => $owner){ ?>
                        <tr>
                            <td>
                                <?php echo $owner->name; ?>
                            </td>
                            <td>
                                <?php echo $owner->email; ?>
                            </td>
                            <td>
                               <?php echo $owner->tel; ?>
                            </td>
                            <td>
                                <div style="color:<?php echo $owner->status_color; ?>"><i class="fa fa-flag"></i> <?php echo $owner->status_name; ?></div>
                            </td>
                            <td>
                                <ul class="list-tables-buttons" data-id="<?php echo $owner->id; ?>" data-name="<?php echo $owner->name; ?>" data-email="<?php echo $owner->email; ?>" data-tel="<?php echo $owner->tel; ?>" data-status_name="<?php echo $owner->status_name; ?>" data-status_color="<?php echo $owner->status_color; ?>" data-status_id="<?php echo $owner->status_id; ?>" data-note="<?php echo $owner->note; ?>">
                                    <li class="table-btn-edit"><a class="load-owner" href="#"><i class="fa fa-external-link"></i><span><?php echo $this->lang->line('target'); ?></span></a></li>  
                                </ul> 
                            </td>
                            <td>
                                <?php echo $owner->note; ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>


            </div>

            <div class="tab tab6 <?php if($tab == 6) echo 'active'; ?>">
                 

                <div class=''>

                    <br/>
                    <?php if($newsletters_templates) {  ?>
                <select class="form-control" id="newsletter_generator_select_template">
                    <?php foreach($newsletters_templates as $key => $template){ ?>
                    <option value="mailto: <?php echo $favoris->owner_email; ?>
                ?subject=<?php echo $template->subject; ?>
                &cc=<?php echo $template->cc; ?>
                &bcc=<?php echo $template->bcc; ?>
                &body=<?php echo str_replace('+',' ',urlencode($template->value)); ?>
                " id=""><?php echo $template->title; ?></option>
                    <?php } ?>
                </select>
                <br/>

               
                <a href="
                mailto: <?php echo $favoris->owner_email; ?>
                ?subject=<?php echo $template->subject; ?>
                &cc=<?php echo $template->cc; ?>
                &bcc=<?php echo $template->bcc; ?>
                &body=<?php echo str_replace('+',' ',urlencode($template->value)); ?>
                " class="btn btn" id="button-search"><?php echo $this->lang->line('generate_email'); ?></a>

                <?php }else{ 

                     echo $this->lang->line('no_email_templates');
                } ?>

            </div>
        </div>

        <fieldset class="form-buttons">
            <button name="save" class="btn save" value="save" type="submit"><i class="fa fa-floppy-o"></i><span><?php echo $this->lang->line('save'); ?></span></button>
            <button name="delete" class="btn delete" value="delete" type="submit"><i class="fa fa-remove"></i><span><?php echo $this->lang->line('delete'); ?></span></button>

            <?php if($favoris->archive) { ?>
            <button name="desarchive" class="btn archive" value="archive" type="submit"><i class="fa fa-archive"></i><span><?php echo $this->lang->line('desarchiver'); ?></span></button>
            <?php }else{ ?>
            <button name="archive" class="btn archive" value="archive" type="submit"><i class="fa fa-archive"></i><span><?php echo $this->lang->line('archiver'); ?></span></button>
            <?php } ?>
        </fieldset>

    </div>
    </form>
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>
