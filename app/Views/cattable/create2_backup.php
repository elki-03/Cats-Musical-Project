<h2>Einfügen einer neuen Katze (evtl extra, weil neu+bearbeiten in einem)</h2>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<form action="<?= !empty($single_cat['id'])  //single_cat muss definiert oder null sein, sonst Fehlermeldung
    ? base_url('cattable/update/' . $single_cat['id']) //Dynamisch: ? : --> damit mit id update, ohne id create aufgerufen wird im Controller
    : base_url('cattable/create'); ?>" method="post">
    <?= csrf_field() //Sicherheit Cross SIte Request?>

    <label for="stage_name">Stage Name</label>
    <input type="input" name="stage_name" value="<?= set_value('stage_name', $single_cat['stage_name'] ?? '') ?>">
    <!-- set_value() funktioniert so:

    Priorität 1 → Form Validation Fehler (User-Eingabe behalten)
    Priorität 2 → Datenbankwert (für Edit)
    Priorität 3 → leer -->
    <br>

    <label for="group_affilation">Group Affilation</label>
    <input type="input" name="group_affilation" value="<?= set_value('group_affilation', $single_cat['group_affilation'] ?? '') ?>">
    <br>

    <label for="soul_traits">Soul Traits</label>
    <input type="input" name="soul_traits" value="<?= set_value('soul_traits', $single_cat['soul_traits'] ?? '') ?>">
    <br>

    <label for="story_snippets">Story Snippets</label>
    <textarea name="story_snippets" cols="45" rows="4"><?= set_value('story_snippets', $single_cat['story_snippets'] ?? '') ?></textarea>
    <br>

    <label for="spotlight_song">Spotlight Song</label>
    <input type="input" name="spotlight_song" value="<?= set_value('spotlight_song', $single_cat['spotlight_song'] ?? '') ?>">
    <br>

    <label for="memory_line">Memory Line</label>
    <input type="input" name="memory_line" value="<?= set_value('memory_line', $single_cat['memory_line'] ?? '') ?>">
    <br>

    <label for="portrait_path">Portrait Path (später mit Upload bearbeiten)</label>
    <input type="input" name="portrait_path" value="<?= set_value('portrait_path', $single_cat['portrait_path'] ?? '') ?>">
    <br>













    


    
    <br>

    <input type="submit" name="submit" value="Bestätigen">

</form>