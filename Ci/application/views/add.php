<form action="/dev/Ci/index.php/topic/add" method="post" class="span10">
  <?php echo validation_errors(); ?>
  <input type="text" name="title" value="" placeholder="제목" class="span12">
  <textarea name="description" rows="8" cols="40" placeholder="본문" class="span12"></textarea>
  <input type="submit" name="name" class="btn" value="전송">
</form>
