<section>
  <form method="post">
    <h1>To Be Done</h1>

    <?php

             while ($tbd = $tobedone->fetch()) {
               echo '<input type="checkbox" name="case[]" value="'.$tbd['task'].'">'.$tbd['task'];
             }

        ?>
      <input class="button" type="submit" name="to_archive" value="Add to archives">
  </form>
</section>
<section>
  <form method="post">
    <h1>Archives</h1>
    <?php
         while ($arch = $archived->fetch()) {
           echo '<input type="checkbox" name="test[]" value="'.$arch['task'].'">'.$arch['task'];
         }


    ?>
    <input class="button" type="submit" name="clean" value="Clean archives">
  </form>
</section>
