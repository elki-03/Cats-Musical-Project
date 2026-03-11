<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cat Table</title>
    </head>

    <body>
        <!-- <pre>
            <?php //print_r($cat_list); ?>
        </pre> -->

        <h1>Cats' Beloved Characters</h1>



        <a href="<?= base_url('/home') ?>"><button><img src= "<?= base_url('/images/home_button.png') ?>" alt="Home"></button></a>
        <?php //if ($cat_list !==[]): ?>
        <?php if (!empty($cat_list)): ?>

        <table border="1" style="margin-top: 20px; margin-bottom: 20px;">
            <tr>
                <th>Stage Name</th>
                <th>Group Affilation</th>
                <th>Soul Traits</th>   
                <th>Story Snippets</th>
                <th>Spotlight Song</th> 
                <th>Memory Line</th>
                <th>Portrait</th> 
                <th><a href="<?= base_url('/cattable/showCreate') ?>"><button><img src= "<?= base_url('/images/create_button.png') ?>" alt="Neue Katze"></button></a></th>
                 <!-- <th><a href="<?= base_url('/cattable/showCreate') ?>"><img src= "<?= base_url('/images/create_button.png') ?>" alt="Neue Katze"></a></th> -->
            </tr>
            <?php foreach ($cat_list as $single_cat): ?>
            <tr>
                <td><?= esc($single_cat['stage_name']) ?></td>
                <td><?= esc($single_cat['group_affilation']) ?></td> 
                <td><?= esc($single_cat['soul_traits']) ?></td>
                <td><?= esc($single_cat['story_snippets']) ?></td>
                <td><?= esc($single_cat['spotlight_song'])?></td>
                <td><?= esc($single_cat['memory_line']) ?></td>
               <td>
                    <!-- <img src="<?php //echo base_url(esc($single_cat['portrait_path'])) ?>" alt="cat"> -->
                    <!-- <img src="<?php //echo base_url('uploads/' . esc($single_cat['portrait_path'])) ?>" alt="cat"> -->
                     <img src="<?= base_url('cattable/managePortraitpath/' . esc($single_cat['portrait_path'])) ?>" alt="cat">
                    <!-- <img src="<?php //echo base_url('uploads/' . $filename) ?>"> -->
                </td>
                <td>
                    <!-- <form action="<?php// echo base_url('cattable/delete/' . esc($news['id'])) ?>" method="post">
                        <?php// echo csrf_field() ?>

                        <button type="submit"
                            onclick="return confirm('Wirklich löschen?')">
                            Löschen
                        </button>
                    </form> -->
                    <form action="<?php echo base_url('cattable/edit/' . $single_cat['id']) ?>" method="post">
                        <?php echo csrf_field() ?>
                        <button type="submit"> <img src= "<?= base_url('/images/update_button.png') ?>" alt="Bearbeiten"></button>
                    </form>

                    <form action="<?= base_url('cattable/delete/' . $single_cat['id']) ?>" method="post">
                        <?= csrf_field() ?>
                        <button type="submit"><img src= "<?= base_url('/images/delete_button.png') ?>" alt="Löschen"></button>
                    </form>

                </td>
                
                <!-- <td> -->

                <!-- Update and Delete-Buttons -->
                <!-- <a href="<?php //echo site_url('tasks/update/' . $task->task_id); ?>" class="btn">Task completed</a> -->
                <!-- <a href="<?php //echo site_url('tasks/delete/' . $task->task_id); ?>" class="btn" onclick="return confirm('Do you really want to delete this task?');">Delete</a>            
                </td>  -->
            </tr>
            <?php endforeach; ?>
        </table>

        <?php endif; ?>
    </body>
</html>