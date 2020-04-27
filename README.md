# Korapay Payment Forms

- **Contributors:** Korapay
- **Tags:** Korapay, payment form, payment gateway, bank account, credit card, debit card, nigeria, international, mastercard, visa

Take donations and payments for services on your WordPress site using Korapay.

## Description

Accept Credit card, Debit card and Bank account payment directly on your WordPress site with the Korapay payment gateway.

#### Take donations and payments easily and directly on your site

Signup for an account [here](https://Korapay.com)

Korapay is available in:

- **Nigeria**

## Installation

### Automatic Installation

- Login to your WordPress Dashboard.
- Click on "Plugins > Add New" from the left menu.
- In the search box type **Korapay Payment Forms**.
- Click on **Install Now** on **Korapay Payment Forms** to install the plugin on your site.
- Confirm the installation.
- Activate the plugin.
- Go to "Korapay > Settings" from the left menu to configure the plugin.

### Manual Installation

- Download the plugin zip file.
- Login to your WordPress Admin. Click on "Plugins > Add New" from the left menu.
- Click on the "Upload" option, then click "Choose File" to select the zip file you downloaded. Click "OK" and "Install Now" to complete the installation.
- Activate the plugin.
- Go to "Korapay > Settings" from the left menu to configure the plugin.

For FTP manual installation, [check here](http://codex.wordpress.org/Managing_Plugins#Manual_Plugin_Installation).

### Configure the plugin

To configure the plugin, go to **Korapay > Settings** from the left menu.

- **Pay Button Public Key** - Enter your public key which can be retrieved from "API Integrations" page on your korapay account dashboard.
- **Success Redirect URL** - (Optional) The URL the user should be redirected to after a successful payment. Enter a full url (with 'http'). Default: "".
- **Failed Redirect URL** - (Optional) The URL the user should be redirected to after a failed payment. Enter a full url (with 'http'). Default: "".
- **Pay Button Text** - (Optional) The text to display on the button. Default: "PAY NOW"..
- **Form Style** - (Optional) Disable form default style and use the activated theme style instead.
- Click **Save Changes** to save your changes.

### Styling

You can enable default theme's style to override default form style from the **Settings** page.
Or you can override the _form_ class `.kp-simple-pay-now-form` from your stylesheet.

## Usage

####1. Shortcode

Insert the shortcode anywhere on your page or post that you want the form to be displayed to the user.

Basic: _requires the user to enter amount and email to complete payment_

```
[kp-pay-button]
```

With button text:

```
[kp-pay-button]Button Text[/kp-pay-button]
```

With attributes: _email_ or _use_current_user_email_ with value "yes", _amount_

```
[kp-pay-button amount=1290 email="customer@email.com" ]

or

[kp-pay-button amount=1290 use_current_user_email="yes" ]
```

With attributes and button text: _email_, _amount_

```
[kp-pay-button amount=1290 email="customer@email.com" ]Button Text[/kp-pay-button]
```

## Transaction List

All the payments made through the forms to korapay can be accessed on **Korapay > Transactions** page.

## Disbursement

All the payments made through the forms from korapay to customers can only be accessed on your Korapay merchant dashboard.
