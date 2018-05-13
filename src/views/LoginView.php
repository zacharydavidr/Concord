<?php

namespace Concord\views;

class LoginView extends View
{
    public function __construct(){
    }

    public function body(){
        return <<<HTML
    <form action="/~rayzacha/Concord/login/process" method="post">
      <div class="form-row">
        <div class="col-md-3 mb-3">
          <label for="email">Email</label>
          <input type="text" class="form-control" name="email" id="email" placeholder="email" required>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-3 mb-3">
          <label for="first_name">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
        </div>
      </div>
      <button class="btn btn-primary" type="submit">Sign in</button>
      <p><a href="/~rayzacha/Concord/Forgot-Password/">Forgot Password</a></p>
      <p><a href="/~rayzacha/Concord/account/register/">Create Account</a></p>
    </form>
HTML;

    }
}
