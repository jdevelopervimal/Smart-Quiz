<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Merchant key here as provided by Payu
        $MERCHANT_KEY = $post['key'];
        $SALT = "eCwWELxi";
        $txnid = $post['txnid'];
        // Merchant Salt as provided by Payu
        // End point - change to https://secure.payu.in for LIVE mode
        $PAYU_BASE_URL = "https://test.payu.in";
        $action = '';
        $posted = array();
        if(!empty($post)) {
          foreach($post as $key => $value) {    
            $posted[$key] = $value; 

          }
        }
        $formError = 0;
        
        $hash = '';
        // Hash Sequence
        //$hashSequence = "key|txnid|amount|productinfo|firstname|email|surl|furl|service_provider|lastname|phone|address1|address2|city|state|country|zipcode";
        $hashSequence = "key|txnid|amount|productinfo|firstname|email||||||||||";  
        if(empty($posted['hash']) && sizeof($posted) > 0) {
          if(
                  empty($posted['key'])
                  || empty($posted['txnid'])
                  || empty($posted['amount'])
                  || empty($posted['firstname'])
                  || empty($posted['email'])
                  || empty($posted['phone'])
                  || empty($posted['productinfo'])
                  || empty($posted['surl'])
                  || empty($posted['furl'])
                  //|| empty($posted['service_provider'])
          ) {
            $formError = 1;
          } else {
            $hashVarsSeq = explode('|', $hashSequence);
            $hash_string = '';	
            foreach($hashVarsSeq as $hash_var) {
              $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
              $hash_string .= '|';
            }
            $hash_string .= $SALT;
            $hash = strtolower(hash('sha512', $hash_string));
            $action = $PAYU_BASE_URL . '/_payment';
          }
        } elseif(!empty($posted['hash'])) {
          $hash = $posted['hash'];
          $action = $PAYU_BASE_URL . '/_payment';
        }
        ?>

    <html>
      <head>
      <script>
        var hash = '<?php echo $hash ?>';
        function submitPayuForm() {
          if(hash == '') {
            return;
          }
          var payuForm = document.forms.payuForm;
          payuForm.submit();
        }
      </script>
      </head>
      <body onload="submitPayuForm()">
        <?php if($formError) { ?>
          <span style="color:red">Internal Error please contact to Administrator ...</span>  
        <?php }else{ ?>
          <span style="font-size: 20px;font-weight: bold;">Redirecting to Payu Payment Gateway please wait...</span>  
          
        <?php } ?>
        <form action="<?php echo $action; ?>" method="post" name="payuForm">
          
            <input type="hidden" name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" />
            <input type="hidden" name="productinfo" value='<?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?>'/>
            <input type="hidden" name="surl" value="<?php echo (empty($posted['surl'])) ? '' : $posted['surl'] ?>" size="64" />
            <input type="hidden" name="furl" value="<?php echo (empty($posted['furl'])) ? '' : $posted['furl'] ?>" size="64" />
            
            <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
            <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
            <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
            
            <input type="hidden" name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" />
            <input type="hidden" name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" />
            <input type="hidden" name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" />
            <input type="hidden" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" />
            <input type="hidden" name="service_provider" value="" size="64" />
            <input type="hidden" name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" />
            <input type="hidden" name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" />
            <input type="hidden" name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" />
            <input type="hidden" name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" />
            <input type="hidden" name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" />
            <input type="hidden" name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" />
         
        </form>
      </body>
    </html> 
    