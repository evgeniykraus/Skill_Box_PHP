<?php
const SESSION_LIFETIME = 60 * 60;
session_set_cookie_params(SESSION_LIFETIME);
const COOKIES_LIFETIME = 2.628e+6;

define("LOGIN", trim($_POST['login'] ?? ''));
define("PASSWORD", trim($_POST['password'] ?? ''));