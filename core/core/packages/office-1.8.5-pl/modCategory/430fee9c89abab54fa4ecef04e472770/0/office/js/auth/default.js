var OfficeConfig = OfficeConfig || {};

Office.Auth = {

    initialize: function (selector) {
        var elem = $(selector);
        if (!elem.length) {
            return false;
        }

        $(document).on('submit', selector, this.submit);

        return true;
    },

    submit: function (e) {
        e.preventDefault();
        $(this).ajaxSubmit({
            url: OfficeConfig['actionUrl'],
            dataType: 'json',
            type: 'post',
            data: {
                pageId: OfficeConfig['pageId'],
                csrf: OfficeConfig['csrf'],
            },
            beforeSubmit: function (formData, $form) {
                // Additional check for old version of form
                var found = false;
                for (var i in formData) {
                    if (formData.hasOwnProperty(i) && formData[i]['name'] == 'action') {
                        found = true;
                    }
                }
                if (!found) {
                    formData.push({name: 'action', value: 'auth/sendLink'});
                }
                // --
                $form.find('button, a, input, select, textarea').attr('disabled', true).addClass('tmp-disabled');
                return true;
            },
            success: function (response, status, xhr, $form) {
                $(document).trigger('office_submit', response);
                $form.find('.tmp-disabled').attr('disabled', false);

                if (response.success) {
                    Office.Message.success(response.message);
                    if (!response.data['sms']) {
                        $form.resetForm();
                    }
                }
                else {
                    Office.Message.error(response.message, false);
                }
                if (response.data['sms'] != undefined) {
                    if (response.data['sms'] == 1) {
                        $form.find('input').attr('readonly', true);
                        $form.find('[name="phone_code"]').attr('readonly', false)
                            .parents('.hidden').removeClass('hidden').addClass('not-hidden');
                    } else {
                        $form.find('input').attr('readonly', false);
                        $form.find('[name="phone_code"]').attr('readonly', true)
                            .parents('.not-hidden').removeClass('not-hidden').addClass('hidden');
                    }
                }
                if (response.data.refresh) {
                    document.location.href = response.data.refresh;
                }
            }
        });
    },

};

Office.Auth.initialize('#office-auth-form form');