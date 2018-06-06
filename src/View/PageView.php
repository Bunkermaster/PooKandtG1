<?php

namespace View;

/**
 * Class PageView
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package View
 */
class PageView
{
    /**
     * @param array|null $data
     */
    public function index(?array $data): string
    {
        ob_start();
?>
        <h1>List pages</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
        <?php if(is_null($data)):?>
            <tr>
                <td colspan="3">No pages</td>
            </tr>
        <?php else:?>
        <?php foreach($data as $page):?>
            <tr>
                <td><a href="<?=\KANDT_ROOT_URI.\KANDT_ACTION_PARAM."=page.show&id=".$page['id']?>"><?=$page['id'] ?? '&nbsp;'?></a></td>
                <td><?=$page['slug'] ?? '&nbsp;'?></td>
                <td>
                    <a href="<?=\KANDT_ROOT_URI.\KANDT_ACTION_PARAM."=page.edit&id=".$page['id']?>">Edit</a>
                    <a href="<?=\KANDT_ROOT_URI.\KANDT_ACTION_PARAM."=page.delete&id=".$page['id']?>">Delete</a>
                </td>
            </tr>
        <?php endforeach;?>
        <?php endif;?>
        </table>
<?php
        echo $this->form();

        return \ob_get_clean();
    }

    public function form(array $data = [], $action = 'page.add', $buttonLabel = "Ajouter"): string
    {
        ob_start();
?>
        <form action="<?=KANDT_ROOT_URI.KANDT_ACTION_PARAM.'='.$action?>" method="post">
            <input type="hidden" name="page[id]" value="<?=$data['id'] ?? ''?>">
            <label>slug</label><br>
            <input type="text" name="page[slug]" value="<?=$data['slug'] ?? ''?>" /><br>
            <label>title</label><br>
            <input type="text" name="page[title]" value="<?=$data['title'] ?? ''?>" /><br>
            <label>h1</label><br>
            <input type="text" name="page[h1]" value="<?=$data['h1'] ?? ''?>" /><br>
            <label>p</label><br>
            <textarea name="page[p]" id="" cols="30" rows="10"><?=$data['p'] ?? ''?></textarea><br>
            <label>span-class</label><br>
            <input type="text" name="page[span-class]" value="<?=$data['span-class'] ?? ''?>" /><br>
            <label>span-text</label><br>
            <input type="text" name="page[span-text]" value="<?=$data['span-text'] ?? ''?>" /><br>
            <label>img-alt</label><br>
            <input type="text" name="page[img-alt]" value="<?=$data['img-alt'] ?? ''?>" /><br>
            <label>img-src</label><br>
            <input type="text" name="page[img-src]" value="<?=$data['img-src'] ?? ''?>" /><br>
            <label>nav-title</label><br>
            <input type="text" name="page[nav-title]" value="<?=$data['nav-title'] ?? ''?>" /><br>
            <input type="submit" value="<?=$buttonLabel?>">
        </form>
<?php

        return \ob_get_clean();
    }

    public function edit(array $data): string
    {
        ob_start();
        echo $this->form($data, 'page.edit', 'Modifier');

        return \ob_get_clean();
    }

    public function show(array $data): string
    {
        ob_start();
        var_dump($data);

        return \ob_get_clean();
    }

    public function delete(array $data): string
    {
        ob_start();
?>
        <form action="<?=\KANDT_ROOT_URI.\KANDT_ACTION_PARAM."=page.delete"?>" method="post">
            <h2>Êtes vous certain de vouloir supprimer <i><?=$data['slug']?></i></h2>
            <input type="hidden" name="page[id]" value="<?=$data['id'] ?? 0 ?>"><br>
            <input type="submit" value="Supprimer">
            <input type="button" value="Annuler" onclick="history.back()">
        </form>
<?php

        return \ob_get_clean();
    }
}