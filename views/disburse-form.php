<?php

  if ( ! defined( 'ABSPATH' ) ) { exit; }

if (isset($_POST['disburse_amount'])){
    
    $amount =(int) $_POST['disburse_amount'];
    $customer_name =(string)$_POST['name'];
    $customer_email=$_POST['email'];
    $bank = $_POST['bank'];
    $account_number = $_POST['account_number'];
    $narration = $_POST['disburse_narration'];
     $base_url = 'https://gateway.korapay.com/merchant/api/v1/transactions/disburse';

      $dest['type']='bank_account';
      $dest['amount'] = $amount;
      $dest['currency']='NGN';
      $dest['narration']=$narration;
      $dest['bank_account']['bank']=$bank;
      $dest['bank_account']['account']=$account_number;
      $dest['customer']['name']=$customer_name;
      $dest['customer']['email']=$customer_email;

      
    if(!$admin_settings->get_option_value('secret_key')){

         echo '<div id="message" class="updated fade"><p>';
        echo 'No merchant secret key found or secret key invalid.Please check that your merchant secret key is valid and try again</p></div>';

        exit;
    }


    $headers = array(
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer '.$admin_settings->get_option_value( 'secret_key' )
			);
       
			$body = array(
				// 'reference'    => '' . time() . '',
				'destination' => $dest
			);

			$args = array(
				'headers' => $headers,
				'body'    => json_encode( $body ),
				'timeout' => 60,
      );
      
      $request = wp_remote_post( $base_url, $args );
            if ( ! is_wp_error( $request ) && 200 == wp_remote_retrieve_response_code( $request ) ) {
        $response         = json_decode( wp_remote_retrieve_body( $request ) );
        $request_status   = $response->status;
        $status           = $response->data->status;
		$message          = $response->message;
        $payment_currency = $response->data->currency;
        $reference        = $response->data->reference;
        $amount_paid      = $response->data->amount;
        $recipient        = $response->data->customer->name;
    
        echo '<div id="message" class="updated fade"><p>';
        echo '' . $message .'</p><p>Amount sent :'.$amount_paid .',Transaction reference: '.$reference.'.</p><p>Recipient :'.$recipient .'</p></div>';
         echo '<div id="message" class="updated fade"><p>';
        echo 'Please check Your korapay merchant dashboard for transaction updates</p><p>Transaction status: '. $status.'</p></div>';

    exit;
      }else{
             $response         = json_decode( wp_remote_retrieve_body( $request ) );
             print_r($response);
           echo '<div id="message" class="updated fade"><p>';
        echo 'Transaction error: ' . $response->message .'</p>';
      }
}

?>
<?php global $admin_settings; ?>

  <div class="wrap">
    <h1>Korapay Disbursement</h1>
    <form id="korapay-disburse" action="options-general.php?page=korapay-payment-forms" method="post">
      <table class="form-table">
        <tbody>


          <!-- Bank Account -->
          <tr valign="top">
            <th scope="row">
              <label for="bank_account">Recipient Account Number</label>
            </th>
            <td class="forminp forminp-text">
              <input class="regular-text code" type="text" name="account_number"/>
              <p class="description">Your recipient bank account number</p>
            </td>
          </tr>
      
             <!-- Bank -->
          <tr valign="top">
            <th scope="row">
              <label for="bank">Recipient Bank</label>
            </th>
            <td class="forminp forminp-text">
              <select class="regular-text code" name="bank">
              <option value="">Choose a bank</option>
                <option value="044">Access Bank Plc</option>
                <option value="063">Access Bank Plc(Diamond)</option>
                <option value="023">Citi Bank</option>
                <option value="050">Ecobank Nigeria</option>
                <option value="084">Enterprise Bank Plc</option>
                <option value="070">Fidelity Bank Plc</option>
                <option value="214">FCMB Plc</option>
                <option value="058">Guaranty Trust Bank Plc</option>
                <option value="030">Heritage Bank</option>
                <option value="301">Jaiz Bank</option>
                <option value="082">Keystone Bank</option>
                <option value="101">Providus Bank</option>
                <option value="232">Sterling Bank</option>
                <option value="221">Stanbic IBTC Bank</option>
                <option value="076">Skye Bank</option>
                <option value="068">Standard Chartered Bank</option>
                <option value="035">Wema Bank</option>
                <option value="215">Unity Bank</option>
                <option value="032">Union Bank</option>
                <option value="033">United bank for Africa</option>
                <option value="057">Zenith Bank</option>
              </select>
              <p class="description">Your recipient bank</p>
            </td>
          </tr>
          <!-- Amount -->
          <tr valign="top">
            <th scope="row">
              <label for="disburse_amount">Amount</label>
            </th>
            <td class="forminp forminp-text">
              <input class="regular-text code" type="text" name="disburse_amount"/>
              <p class="description">Amount to send</p>
            </td>
          </tr>

        <!-- Customer name -->
          <tr valign="top">
            <th scope="row">
              <label for="first_name">Name</label>
            </th>
            <td class="forminp forminp-text">
              <input class="regular-text code" type="text" name="name" required placeholder='Divine Olokor'/>
              <p class="description">Your recipient name</p>
            </td>
          </tr>

          <!-- Customer email -->
          <tr valign="top">
            <th scope="row"> 
              <label for="first_name">Name</label>
            </th>
            <td class="forminp forminp-text">
              <input class="regular-text code" type="text" name="email" required placeholder='olokor@gmail.com'/>
              <p class="description">Your recipient email</p>
            </td>
          </tr>

             <tr valign="top">
            <th scope="row">
              <label for="disburse_narration">Narration</label>
            </th>
            <td class="forminp forminp-text">
              <input class="regular-text code" type="text" name="disburse_narration" required/>
              <p class="description">Payment narration</p>
            </td>
          </tr>

        </tbody>
      </table>
      <?php submit_button('Transfer Funds'); ?>
    </form>

  </div>

      