<?
header('Content-Type: application/json');
require 'connect.php';
require 'functions.php';

$q = explode('/', $_GET['q']);

$type = $q[0];
$id;
if (isset($q[1])) {
  $id = $q[1];
}

if ($type === 'posts') {
  if (isset($id)) {
    getPost($connect, $id);
  } else {
    getPosts($connect);
  }
}

