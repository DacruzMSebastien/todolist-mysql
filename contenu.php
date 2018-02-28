<section>
  <form method="post">
    <h1>To Be Done</h1>

    <?php
             $tbd = $tobedone->fetch();
             foreach ($tbd as $value) {
               if ($value['archives'] = 'false'){
               echo '<input type="checkbox" name="case[]" value="'.$tbd['task'].'">'.$tbd['task'];
             }
        }
        ?>
      <input class="button" type="submit" name="to_archive" value="Add to archives">
  </form>
</section>
<section>
  <form method="post">
    <h1>Archives</h1>
    <?php
         $arch = $archived->fetch();
         foreach ($arch as $value) {
           if ($value['archives'] = 'true'){
           echo '<input type="checkbox" name="case[]" value="'.$arch['task'].'">'.$arch['task'];
         }
    }

    ?>
    <input class="button" type="submit" name="clean" value="Clean archives">
  </form>
</section>
