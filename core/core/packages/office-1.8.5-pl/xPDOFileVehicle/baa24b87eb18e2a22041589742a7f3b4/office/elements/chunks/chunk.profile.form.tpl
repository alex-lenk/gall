<form action="" method="post" id="office-profile-form" enctype="multipart/form-data">
    <input type="hidden" name="photo" value="{$photo}"/>
    <input type="file" name="newphoto" id="profile-photo" class="hidden"/>

    <div class="alert alert-warning">
        {'office_profile_header' | lexicon}
    </div>

    <div class="form-group row avatar">
        <label class="col-md-2 col-form-label">{'office_profile_avatar' | lexicon}</label>
        <div class="col-md-10">
            <div class="d-flex align-items-center">
                <img src="{if $photo?}{$photo}{else}{$gravatar}?s=100{/if}" id="profile-user-photo"
                     class="rounded-circle mr-3" data-gravatar="{$gravatar}?s=100" width="100"/>
                <div>
                    <div>
                        <a href="#">
                            <label for="profile-photo">&plus; {'office_profile_avatar_select' | lexicon}</label>
                        </a>
                    </div>
                    <div>
                        <a href="#" id="office-user-photo-remove"{if !$photo} style="display:none;"{/if}>
                            &times; {'office_profile_avatar_remove' | lexicon}
                        </a>
                    </div>
                </div>
            </div>
            <div class="form-text text-muted">{'office_profile_avatar_desc' | lexicon}</div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label">{'office_profile_username' | lexicon}<sup class="red">*</sup></label>
        <div class="col-md-10">
            <input type="text" name="username" value="{$username}" placeholder="{'office_profile_username' | lexicon}"
                   class="form-control"/>
            <div class="help-block message">{$error_username}</div>
            <div class="form-text text-muted">{'office_profile_username_desc' | lexicon}</div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label">{'office_profile_fullname' | lexicon}<sup class="red">*</sup></label>
        <div class="col-md-10">
            <input type="text" name="fullname" value="{$fullname}" placeholder="{'office_profile_fullname' | lexicon}"
                   class="form-control"/>
            <div class="help-block message">{$error_fullname}</div>
            <div class="form-text text-muted">{'office_profile_fullname_desc' | lexicon}</div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label">{'office_profile_email' | lexicon}<sup class="red">*</sup></label>
        <div class="col-md-10">
            <input type="text" name="email" value="{$email}" placeholder="{'office_profile_email' | lexicon}"
                   class="form-control"/>
            <div class="help-block message">{$error_email}</div>
            <div class="form-text text-muted">{'office_profile_email_desc' | lexicon}</div>
        </div>
    </div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">
        {'office_profile_phone' | lexicon}{if $_modx->config.office_auth_mode == 'phone'}&nbsp;<span class="red">*</span>{/if}
    </label>
    <div class="col-md-10">
        <input type="text" name="mobilephone" placeholder="" value="{$mobilephone}" class="form-control"/>
        <div class="help-block message">{$error_mobilephone}</div>
        <div class="form-text text-muted">{'office_profile_phone_desc' | lexicon}</div>
    </div>
</div>

<div class="form-group row hidden">
    <label class="col-md-2 col-form-label">{'office_profile_phone_code' | lexicon}</label>
    <div class="col-md-10">
        <input type="text" name="phone_code" value="" class="form-control"/>
        <div class="help-block message">{$error_phone_code}</div>
        <div class="form-text text-muted">{'office_profile_phone_code_desc' | lexicon}</div>
    </div>
</div>

    <div class="form-group row">
        <label class="col-md-2 col-form-label">{'office_profile_password' | lexicon}</label>
        <div class="col-md-10">
            <input type="password" name="specifiedpassword" value="" placeholder="********" class="form-control"/>
            <div class="help-block message">{$error_specifiedpassword}</div>
            <div class="form-text text-muted">{'office_profile_specifiedpassword_desc' | lexicon}</div>
            <input type="password" name="confirmpassword" value="" placeholder="********" class="form-control"/>
            <div class="help-block message">{$error_confirmpassword}</div>
            <div class="form-text text-muted">{'office_profile_confirmpassword_desc' | lexicon}</div>
        </div>
    </div>

    {if $providers?}
        <div class="form-group row">
            <label class="col-md-2 col-form-label">{'ha.providers_available' | lexicon}</label>
            <div class="col-md-10">
                {$providers}
            </div>
        </div>
    {/if}

    <hr/>
    <div class="form-group row">
        <div class="offset-md-2 col-md-10 text-center text-md-left">
            <button type="submit" class="btn btn-primary">{'office_profile_save' | lexicon}</button>
            <a class="btn btn-danger" href="{$_modx->resource.id | url : [] : ['action' => 'auth/logout']}">{'office_profile_logout' | lexicon}</a>
        </div>
    </div>
</form>
