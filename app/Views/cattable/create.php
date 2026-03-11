<h2>Einfügen einer neuen Katze</h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>
<h2>Ich soll weg</h2>
<form action="<?= base_url('cattable/create') ?>" method="post">
    <?= csrf_field() ?>

    <label for="stage_name">Stage Name</label>
    <input type="input" name="stage_name" value="<?= set_value('stage_name') ?>">
    <br>

    <label for="group_affilation">Group Affilation</label>
    <input type="input" name="group_affilation" value="<?= set_value('group_affilation') ?>">
    <br>

    <label for="soul_traits">Soul Traits</label>
    <input type="input" name="soul_traits" value="<?= set_value('soul_traits') ?>">
    <br>

    <label for="story_snippets">Story Snippets</label>
    <textarea name="story_snippets" cols="45" rows="4"><?= set_value('story_snippets') ?></textarea>
    <br>

    <label for="spotlight_song">Spotlight Song</label>
    <input type="input" name="spotlight_song" value="<?= set_value('spotlight_song') ?>">
    <br>

    <label for="memory_line">Memory Line</label>
    <input type="input" name="memory_line" value="<?= set_value('memory_line') ?>">
    <br>

    <label for="portrait_path">Portrait Path (später mit Upload bearbeiten)</label>
    <input type="input" name="portrait_path" value="<?= set_value('portrait_path') ?>">
    <br>

    <input type="submit" name="submit" value="Neuer Eintrag">

</form>