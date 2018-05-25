<?php
/**
 * Created by PhpStorm.
 * User: zachary
 * Date: 5/24/18
 * Time: 9:03 PM
 */

namespace Concord\views;

class CreateTripView extends View
{
    public function __construct(){
    }

    public function body(){
        return <<<HTML
<form method="post" action="/~rayzacha/Concord/trips/create/">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="user_id">User ID</label>
      <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User ID" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
        <label class="control-label" for="arrival_date">Arrival Date</label>
        <input class="form-control" id="arrival_date" name="arrival_date" placeholder="MM/DD/YYY" type="text"/>
      </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
        <label class="control-label" for="departure_date">Departure Date</label>
        <input class="form-control" id="departure_date" name="departure_date" placeholder="MM/DD/YYY" type="text"/>
      </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="guests">Guests</label>
      <input type="text" class="form-control" name="guests" id="guests" placeholder="guests">
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Create Trip</button>
</form>
HTML;

    }
}