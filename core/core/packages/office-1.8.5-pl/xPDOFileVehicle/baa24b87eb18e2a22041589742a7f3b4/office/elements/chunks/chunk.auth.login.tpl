<div class="row" id="office-auth-form">
    <div class="col-12 col-md-6 office-auth-login-wrapper">
        <h4>{'office_auth_login' | lexicon}</h4>

        <form method="post" id="office-auth-login">
            <div class="form-group row">
                <label for="office-auth-login-email" class="col-md-3 col-form-label">
                    {'office_auth_login_username' | lexicon}&nbsp;<span class="red">*</span>
                </label>
                <div class="col-md-9">
                    <input type="text" name="username" placeholder="" class="form-control"
                           id="office-auth-login-username" value=""/>
                    <p class="help-block">
                        <small>{'office_auth_login_username_desc' | lexicon}</small>
                    </p>
                </div>
            </div>
            <div class="form-group hidden row">
                <label for="office-auth-login-phone-code" class="col-md-3 col-form-label">
                    {'office_auth_login_phone_code' | lexicon}
                </label>
                <div class="col-md-9">
                    <input type="text" name="phone_code" class="form-control" id="office-auth-login-phone-code"
                           value="" readonly/>
                    <p class="help-block">
                        <small>{'office_auth_login_phone_code_desc' | lexicon}</small>
                    </p>
                </div>
            </div>
            <div class="form-group row">
                <label for="office-auth-login-password" class="col-md-3 col-form-label">
                    {'office_auth_login_password' | lexicon}
                </label>
                <div class="col-md-9">
                    <input type="password" name="password" placeholder="" class="form-control"
                           id="office-login-form-password" value=""/>
                    <p class="help-block">
                        <small>{'office_auth_login_password_desc' | lexicon}</small>
                    </p>
                </div>
            </div>
            <div class="form-group row">
                <input type="hidden" name="action" value="auth/formLogin"/>
                <input type="hidden" name="return" value=""/>
                <div class="offset-md-3 col-md-9">
                    <button type="submit" class="btn btn-primary">{'office_auth_login_btn' | lexicon}</button>
                </div>
            </div>
        </form>

        {if $providers?}
            <label>{'office_auth_login_ha' | lexicon}</label>
            <div>{$providers}</div>
            <p class="help-block">
                <small>{'office_auth_login_ha_desc' | lexicon}</small>
            </p>
        {/if}
        {if $error?}
            <div class="alert alert-danger">{$error}</div>
        {/if}
    </div>

    <div class="col-12 col-md-6 office-auth-register-wrapper">
        <h4>{'office_auth_register' | lexicon}</h4>
        <form method="post" class="form-horizontal" id="office-auth-register">
            <div class="form-group row">
                <label for="office-auth-register-email" class="col-md-3 col-form-label">
                    {'office_auth_register_email' | lexicon}{if $_modx->config.office_auth_mode == 'email'}&nbsp;<span class="red">*</span>{/if}
                </label>
                <div class="col-md-9">
                    <input type="email" name="email" placeholder="" class="form-control" id="office-auth-register-email"
                           value=""/>
                    <div class="help-block">
                        <small>{'office_auth_register_email_desc' | lexicon}</small>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="office-auth-register-phone" class="col-md-3 col-form-label">
                    {'office_auth_register_phone' | lexicon}{if $_modx->config.office_auth_mode == 'phone'}&nbsp;<span class="red">*</span>{/if}
                </label>
                <div class="col-md-9">
                    <input type="text" name="mobilephone" placeholder="" class="form-control"
                           id="office-auth-register-phone" value=""/>
                    <div class="help-block">
                        <small>{'office_auth_register_phone_desc' | lexicon}</small>
                    </div>
                </div>
            </div>
            <div class="form-group hidden row">
                <label for="office-auth-register-phone-code" class="col-md-3 col-form-label">
                    {'office_auth_register_phone_code' | lexicon}
                </label>
                <div class="col-md-9">
                    <input type="text" name="phone_code" class="form-control" id="office-auth-register-phone-code"
                           value=""/>
                    <div class="help-block">
                        <small>{'office_auth_register_phone_code_desc' | lexicon}</small>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="office-auth-register-password" class="col-md-3 col-form-label">
                    {'office_auth_register_password' | lexicon}
                </label>
                <div class="col-md-9">
                    <input type="password" name="password" placeholder="" class="form-control"
                           id="office-register-form-password" value=""/>
                    <p class="help-block">
                        <small>{'office_auth_register_password_desc' | lexicon}</small>
                    </p>
                </div>
            </div>
            <div class="form-group row">
                <label for="office-auth-register-username" class="col-md-3 col-form-label">
                    {'office_auth_register_username' | lexicon}
                </label>
                <div class="col-md-9">
                    <input type="text" name="username" placeholder="" class="form-control"
                           id="office-register-form-username" value=""/>
                    <p class="help-block">
                        <small>{'office_auth_register_username_desc' | lexicon}</small>
                    </p>
                </div>
            </div>
            <div class="form-group row">
                <label for="office-auth-register-fullname" class="col-md-3 col-form-label">
                    {'office_auth_register_fullname' | lexicon}
                </label>
                <div class="col-md-9">
                    <input type="text" name="fullname" placeholder="" class="form-control"
                           id="office-register-form-fullname" value=""/>
                    <p class="help-block">
                        <small>{'office_auth_register_fullname_desc' | lexicon}</small>
                    </p>
                </div>
            </div>
            <div class="form-group">
                <input type="hidden" name="action" value="auth/formRegister"/>
                <div class="offset-md-3 col-md-9">
                    <button type="submit" class="btn btn-danger">{'office_auth_register_btn' | lexicon}</button>
                </div>
            </div>
        </form>
    </div>
</div>