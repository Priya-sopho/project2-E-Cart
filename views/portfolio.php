<div class="container">
    <table style="margin-left:auto; margin-right:auto; color: #333; font-family: Helvetica, Arial, sans-serif; width: 640px; border-collapse:collapse; border-spacing: 0;" >
            <tr>
                <th style="border: 1px solid #CCC; background: #F3F3F3; font-weight: bold; text-align:center;">Image</th>
                <th style="border: 1px solid #CCC; background: #F3F3F3; font-weight: bold; text-align:center;">Title</th>
                <th style="border: 1px solid #CCC; background: #F3F3F3; font-weight: bold; text-align:center;">Description</th>
                <th style="border: 1px solid #CCC; background: #F3F3F3; font-weight: bold; text-align:center;">Price</th>
                <th style="border: 1px solid #CCC; background: #F3F3F3; font-weight: bold; text-align:center;">Remove</th>
            </tr>    
            
            <?php foreach ($positions as $position): ?>
                <tr>
                    <td style="border: 1px solid #CCC;"><?= $position["image"] ?> </td>
                    <td style="border: 1px solid #CCC;"><?= $position["title"] ?></td>
                    <td style="border: 1px solid #CCC;"><?= $position["descrition"] ?></td>
                    <td style="border: 1px solid #CCC;"><?= $position["price"] ?></td>
                    <td style="border: 1px solid #CCC;"><?= '<input type="submit" value="Delete">' ?></td>
                </tr>
            <?php endforeach ?>
    </table>
</div>