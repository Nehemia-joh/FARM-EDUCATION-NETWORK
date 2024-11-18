<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forum</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital@1&display=swap" rel="stylesheet">
</head>

<body>
  <div class="comment-area hide" id="comment-area">
    <form action="submit_comment.php" method="post">
      <textarea name="comment" id="" placeholder="comment here ... "></textarea>
      <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">  <input type="submit" value="Submit Comment">
    </form>
  </div>

  <div class="comment-area hide" id="reply-area">
    <form action="submit_reply.php" method="post">
      <textarea name="reply" id="" placeholder="reply here ... "></textarea>
      <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">  <input type="hidden" name="parent_comment_id" value="">  <input type="submit" value="Submit Reply">
    </form>
  </div>

  <script src="main.js"></script>
</body>
</html>
