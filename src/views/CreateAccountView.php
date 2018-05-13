<?php

namespace Concord;

require_once('View.php');

/**
 * Class CreateAccountView
 * @package Concord\View
 */
class CreateAccountView extends View
{
    public function __construct(){
    }

    public function body(){
        return <<<HTML
<form>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email" placeholder="email" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="first_name">Password</label>
      <input type="password" class="form-control" id="password" placeholder="password" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="confirm_password">Confirm Password</label>
      <input type="password" class="form-control" id="confirm_password" placeholder="confirm password" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="first_name">First name</label>
      <input type="text" class="form-control" id="first_name" placeholder="first" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="last_name">Last name</label>
      <input type="text" class="form-control" id="last_name" placeholder="last" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="street_number">Street Number</label>
      <input type="text" class="form-control" id="street_number" placeholder="city" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="city">City</label>
      <input type="text" class="form-control" id="city" placeholder="city" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label for="state">State</label>
      <input type="text" class="form-control" id="state" placeholder="state" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label for="sip">Zip</label>
      <input type="text" class="form-control" id="zip" placeholder="zip" required>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Create Account</button>
</form>
HTML;

    }
}