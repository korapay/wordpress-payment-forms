"use strict";

var form = jQuery(".kp-simple-pay-now-form"),
    redirectUrl;

if (form) {
    form.on("submit", function (evt) {
        evt.preventDefault();
        var config = buildConfigObj(this);
        processCheckout(config);
    });
}

/**
 * Builds config object to be sent to Korapay checkout modal
 *
 * @return object - The config object
 */
const buildConfigObj = function (form) {
    const formData = jQuery(form).data();
    const amount = formData.amount || jQuery(form).find("#kp-amount").val();
    const email = formData.email || jQuery(form).find("#kp-customer-email").val();
    const firstname =
        formData.firstname || jQuery(form).find("#kp-first-name").val();
    const lastname = formData.lastname || jQuery(form).find("#kp-last-name").val();

    return {
        amount: Number(amount),
        customer_email: email,
        customer_firstname: firstname,
        customer_lastname: lastname,
        payment_method: kp_korapay_options.method,
        public_key: kp_korapay_options.pbkey,
        reference: txref,
        onclose: function () {
            redirectTo(redirectUrl);
        },
        callback: function (res) {
            sendPaymentRequestResponse(res, form);
        },
    };
};

const processCheckout = function (opts) {
    Korapay.initialize({
        key: opts.public_key,
        amount: Number(opts.amount),
        currency: "NGN",
        customer: {
            name: `${opts.customer_firstname} ${opts.customer_lastname}`,
            email: opts.customer_email,
        },
        onClose: function () { },
        onSuccess: function (data) {
            const res = {
                ...data,
                status: "success",
                first_name: opts.customer_firstname,
                last_name: opts.customer_lastname,
                email: opts.customer_email,
            };
            opts.callback(res);
        },
        onFailed: function (data) {
            const res = {
                ...data,
                status: "failed",
                first_name: opts.customer_firstname,
                last_name: opts.customer_lastname,
                email: opts.customer_email,
            };
            opts.callback(res);
        },
    });
};

/**
 * Sends payment response from korapay to the process payment endpoint
 *
 * @param object Response object from korapay
 *
 * @return void
 */
const sendPaymentRequestResponse = function (res, form) {
    const args = {
        action: "process_payment",
        kp_sec_code: jQuery(form).find("#kp_sec_code").val(),
    };

    const dataObj = {
        ...args,
        ...res,
    };

    jQuery.post(kp_korapay_options.cb_url, dataObj).done(function (data) {
        var response = JSON.parse(data);
        redirectUrl = response.redirect_url;
        let message;
        if (response.status === "success") {
            message = "Payment Successful";
        } else {
            message =
                "Payment Failed,Please try again or contact the site administrator";
        }
        jQuery(form)
            .find("#notice")
            .text(message)
            .removeClass(function () {
                return jQuery(form).find("#notice").attr("class");
            })
            .addClass(response.status);
        setTimeout(redirectTo, 5000, redirectUrl);
    });
};

/**
 * Redirect to set url
 *
 * @param string url - The link to redirect to
 *
 * @return void
 */
const redirectTo = function (url) {
    if (url) {
        location.href = url;
    }
};
