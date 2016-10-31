<div class="span10">
  <article class="">
    <h1><?=strip_tags($topic->title,"<a><h1><h2><h3><h4><h5><ul><ol><li><img>")?></h1>
    <div>
      <div class="">
        <?=kdate($topic->created)?>
      </div>
      <?=strip_tags(auto_link($topic->description),"<a><h1><h2><h3><h4><h5><ul><ol><li><img>")?>
    </div>
  </article>
  <hr>
  <div class="">
    <a href="/dev/Ci/index.php/topic/add" class="btn">추가</a>
  </div>
</div>
