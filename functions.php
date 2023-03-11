<?

function getPosts($connect) {
  $posts = mysqli_query($connect, 'SELECT * FROM `posts`');
  $posts_list = [];
  
  
  while($post = mysqli_fetch_assoc($posts)) {
    $posts_list[] = $post;
  }
  
  echo json_encode($posts_list);
}

function getPost($connect, int $id) {
  $post = mysqli_query($connect, "SELECT * FROM `posts` WHERE `id` = $id");
  if (mysqli_num_rows($post) === 0) {
    http_response_code(404);
    echo json_encode([
      'status' => 404,
      'message' => 'post not found'
    ]);
  }
  else {
    $post = mysqli_fetch_assoc($post);
    echo json_encode($post);
  }
}