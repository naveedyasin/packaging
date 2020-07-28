<div class="tab-pane fade" id="email">
    <form action="{{route('admin.email.settings', $setting->id)}}" method="POST"
          class="form-validate-jquery" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Mail Driver:</label>
            <select name="mail_driver" id="mail_driver" class="select form-control">
                <option value="smtp" @if($setting->mail_driver == 'smtp') selected @endif>SMTP</option>
                <option value="mail" @if($setting->mail_driver == 'mail') selected @endif>Mail</option>
                <option value="sendmail" @if($setting->mail_driver == 'sendmail') selected @endif>SendMail</option>
                <option value="mailgun" @if($setting->mail_driver == 'mailgun') selected @endif>MailGun</option>
                <option value="mandrill" @if($setting->mail_driver == 'mandrill') selected @endif>Mandrill</option>
                <option value="ses" @if($setting->mail_driver == 'ses') selected @endif>Amazon SES</option>
                <option value="sparkpost" @if($setting->mail_driver == 'sparkpost') selected @endif>Sparkpost</option>
            </select>
        </div>
        <div class="form-group">
            <label>SMTP Protocol:</label>
            <input type="text" class="form-control"
                   name="smtp_protocol" value="{{ $setting->smtp_protocol }}">
        </div>
        <div class="form-group">
            <label>SMPT Username:</label>
            <input type="text" class="form-control"
                   name="smtp_username" value="{{ $setting->smtp_username }}">
        </div>
        <div class="form-group">
            <label>SMTP Password:</label>
            <input type="text" class="form-control" placeholder="12345" name="smtp_password"
                   value="{{ $setting->smtp_password }}">
        </div>
        <div class="form-group">
            <label>SMTP Port:</label>
            <input type="text" class="form-control" placeholder="12345" name="smtp_port"
                   value="{{ $setting->smtp_port }}">
        </div>
        <div class="form-group">
            <label>SMTP Security:</label>
            <input type="text" class="form-control" name="smtp_security"
                   value="{{ $setting->smtp_security }}">
        </div>
        <fieldset>
            <legend>SendMail - Pretend Settings:</legend>
            <div class="form-group ">
                <label for="mail_sendmail" class="bold">Mail Sendmail</label>
                <input class="form-control" id="mail_sendmail"
                       name="mail_sendmail" type="text" value="{{ $setting->mail_sendmail }}">

            </div>
            <div class="form-group ">
                <label for="mail_pretend" class="bold">Mail Pretend</label>
                <input class="form-control" id="mail_pretend"
                       name="mail_pretend" type="text" value="{{ $setting->mail_pretend }}">
            </div>
        </fieldset>
        <fieldset>
            <legend>MailGun Settings:</legend>
            <div class="form-group ">
                <label for="mailgun_domain" class="bold">Mailgun Domain</label>
                <input class="form-control" id="mailgun_domain"
                       name="mailgun_domain" type="text" value="{{ $setting->mailgun_domain }}">

            </div>
            <div class="form-group ">
                <label for="mailgun_secret" class="bold">Mailgun Secret</label>
                <input class="form-control" id="mailgun_secret"
                       name="mailgun_secret" type="text" value="{{ $setting->mailgun_secret }}">

            </div>
        </fieldset>
        <fieldset>
            <legend>Mandrill Settings:</legend>
            <div class="form-group ">
                <label for="mandrill_secret" class="bold">Mandrill Secret</label>
                <input class="form-control" id="mandrill_secret"
                       name="mandrill_secret" type="text" value="{{ $setting->mandrill_secret }}">

            </div>
        </fieldset>
        <fieldset>
            <legend>Sparkpost Settings:</legend>
            <div class="form-group ">
                <label for="sparkpost_secret" class="bold">Sparkpost Secret</label>
                <input class="form-control" id="sparkpost_secret"
                       name="sparkpost_secret" type="text" value="{{ $setting->sparkpost_secret }}">

            </div>
        </fieldset>
        <fieldset>
            <legend>AMAZON SES Settings:</legend>
            <div class="form-group ">
                <label for="ses_key" class="bold">SES Key</label>
                <input class="form-control" id="ses_key" name="ses_key"
                       type="text" value="{{ $setting->ses_key }}">

            </div>

            <div class="form-group ">
                <label for="ses_secret" class="bold">SES Secret</label>
                <input class="form-control" id="ses_secret"
                       name="ses_secret" type="text" value="{{ $setting->ses_secret }}">

            </div>
            <div class="form-group ">
                <label for="ses_region" class="bold">SES Region</label>
                <input class="form-control" id="ses_region"
                       name="ses_region" type="text" value="{{ $setting->ses_region }}">

            </div>
        </fieldset>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Update <i
                    class="icon-paperplane ml-2"></i></button>
        </div>
    </form>
</div>
