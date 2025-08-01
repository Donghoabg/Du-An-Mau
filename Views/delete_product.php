<?php
session_start();

require_once('../controllers/ProductController.php');
(new ProductController())->delete();
