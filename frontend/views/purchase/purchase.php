<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="col-lg-9 col-sm-6 content">
    <div class="row">
        <div class="filter col-md-12">
            <div class="page-header">
                <h1>Purchase Quiz</h1>
                <ul class="nav nav-pills">
                        <li role="presentation" class="active"><button class="btn btn-primary"><?= $quiz->quiz_price; ?>/. INR.</button></li>
   
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-12">
    <form action="<?= BASE_URL;?>payu" method="post" name="payuForm">
        <input type="hidden" name="productinfo" value="<?= $quiz->quid; ?>"/>
        <table class="purchase">
        <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        <tr>
          <td>Amount: </td>
          <td><?= $quiz->quiz_price; ?>/. INR.</td>
        </tr>
        <tr>
            <td>First Name: </td>
          <td><input name="firstname" class="form-control" id="firstname" value="" /></td>
          <td>Last Name: </td>
          <td><input name="lastname" class="form-control" id="lastname" value="" /></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><input name="email" class="form-control" class="form-control" id="email" value="" /></td>
          <td>Phone: </td>
          <td><input name="phone" class="form-control" class="form-control" value="" /></td>
        </tr>
          <td>Address1: </td>
          <td><input name="address1" class="form-control" value="" /></td>
          <td>Address2: </td>
          <td><input name="address2" class="form-control" value="" /></td>
        </tr>
        <tr>
          <td>City: </td>
          <td><input name="city" class="form-control" value="" /></td>
          <td>State: </td>
          <td><input name="state" class="form-control" value="" /></td>
        </tr>
        <tr>
          <td>Country: </td>
          <td><input name="country" class="form-control" value="" /></td>
          <td>Zipcode: </td>
          <td><input name="zipcode" class="form-control" value="" /></td>
        </tr>
<!--        <tr>
          <td>UDF1: </td>
          <td><input name="udf1" value="" /></td>
          <td>UDF2: </td>
          <td><input name="udf2" value="" /></td>
        </tr>
        <tr>
          <td>UDF3: </td>
          <td><input name="udf3" value="" /></td>
          <td>UDF4: </td>
          <td><input name="udf4" value="" /></td>
        </tr>
        <tr>
          <td>UDF5: </td>
          <td><input name="udf5" value="" /></td>
          <td>PG: </td>
          <td><input name="pg" value="" /></td>
        </tr>-->
        <tr>
            <td colspan="4"><input type="submit" class="btn btn-primary" value="Pay Now" /></td>
        </tr>
      </table>
        </div>
        </div>
        </div>