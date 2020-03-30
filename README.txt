=== Korapay Payment Forms ===
Contributors: Korapay
Tags: korapay, payment form, payment gateway, bank account, credit card, debit card, nigeria, international, mastercard, visa
Requires at least: 4.4
Tested up to: 4.8
Requires PHP: 5.4
Stable tag: 1.0.0


Accept Credit card, Debit card and Bank account payment directly on your WordPress site with the Korapay payment gateway.




== Description ==

Signup for a korapay account at https://korapay.com


Korapay is available in:

* Nigeria

= Configuration options = 

* Pay Button Public Key (live/Test) - Enter your public key which can be retrieved from Settings > API on your Korapay account dashboard.
* Pay Button Secret Key (live/Test) - Enter your secret key which can be retrieved from Settings > API on your Korapay account dashboard.
* Go Live - Tick that section to turn your Korapay plugin live.
* Success Redirect URL - (Optional) The URL the user should be redirected to after a successful payment. Enter a full url (with 'http:\\'). Default: '\'.
* Failed Redirect URL - (Optional) The URL the user should be redirected to after a failed payment. Enter a full url (with 'http:\\'). Default: '\'.
* Pay Button Text - (Optional) The text to display on the button. Default: "PAY NOW".
* Charge Currency - (Optional) The currency the user is charged. Default: "NGN".
* Charge Country - (Optional) The country the merchant is serving. Default: "NG: Nigeria".
* Form Style - (Optional) Disable form default style and use the activated theme style instead.
* Click Save Changes to save your changes.

= Styling =

You can enable default theme's style to override default form style from the Settings page. Or you can override the formclass .kp-simple-pay-now-form from your stylesheet.

= Usage =

* a. Shortcode
Insert the shortcode anywhere on your page or post that you want the form to be displayed to the user.
Basic: requires the user to enter amount and email to complete payment
[kp-pay-button]


With button text:
[kp-pay-button]Button Text[/kp-pay-button]


With attributes: email or use_current_user_email with value "yes", amount
[kp-pay-button amount="1290" email="customer@email.com" ]

or

[kp-pay-button amount="1290" use_current_user_email="yes" ]


With attributes and button text: email, amount
[kp-pay-button amount="1290" email="customer@email.com" ]Button Text[/kp-pay-button]



With currency

[kp-pay-button custom_currency="NGN,GBP,USD"]

With attributes: email or use_current_user_email with value "yes", amount and currency
[kp-pay-button amount="1290" email="customer@email.com" custom_currency= "NGN, GBP, USD" ]

or

[kp-pay-button amount="1290" use_current_user_email="yes" custom_currency= "NGN, GBP, USD" ]

With currency:
[kp-pay-button custom_currency="NGN,GBP,USD"]

With attributes: email or use_current_user_email with value "yes", amount and currency
[kp-pay-button amount="1290" email="customer@email.com" custom_currency= "NGN, GBP, USD" ]

or

[kp-pay-button amount="1290" use_current_user_email="yes" custom_currency= "NGN, GBP, USD" ]


* b. Visual Composer
The shortcode can be added via Visual Composer elements.
On Visual Composer Add Element dialog, click on "Korapay Forms" and select the type of form you want to include on your page. 


On the "Form Settings" dialog, fill in the form attributes and click "Save Changes".

Payment Form successfully added to the page. 


= Transaction List =
All the payments made through the forms to Korapay can be accessed on Korapay > Transactions page.


= TODO =
* Add advanced forms to include customization where user can choose what fields to add to the form.
* Multiple Pay Button integrations.

= Suggestions / Contributions =
For issues, suggestions and feature request, click here. To contribute, fork the repo, add your changes and modifications, then create a pull request.


= Disbursement =
* You can pay your customers from the korapay tab on the admin dashboard,note that you will only be able to see your disbursement transactions on your korapay merchant dashboard

== Installation ==

Automatic Installation

* Login to your WordPress Dashboard.
* Click on "Plugins > Add New" from the left menu.
* In the search box type Korapay Payment Forms.
* Click on Install Now on Korapay Payment Forms to install the plugin on your site.
* Confirm the installation.
* Activate the plugin.
* Go to "Korapay > Settings" from the left menu to configure the plugin.


Manual Installation

* Download the plugin zip file.
* Login to your WordPress Admin. Click on \"Plugins > Add New\" from the left menu.
* Click on the \"Upload\" option, then click \"Choose File\" to select the zip file you downloaded. Click \"OK\" and \"Install Now\" to complete the installation.
* Activate the plugin.
* Go to \"Korapay > Settings\" from the left menu to configure the plugin.
* For FTP manual installation, check here.

= Configure the plugin =
To configure the plugin, go to Korapay > Settings from the left menu.


