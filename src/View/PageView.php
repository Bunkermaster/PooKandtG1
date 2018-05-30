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
    public function index(?array $data): void
    {
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
                <td><?=$page['id'] ?? '&nbsp;'?></td>
                <td><?=$page['slug'] ?? '&nbsp;'?></td>
                <td>Action</td>
            </tr>
        <?php endforeach;?>
        <?php endif;?>
        </table>
<?php
    }
}