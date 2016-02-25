
            <table align="center" width="450">
                <tr>
                    <td class="title">STT</td>
                    <td class="title">Categorie</td>
                    <td class="title">Edit</td>
                    <td class="title">Del</td>
                </tr>

                <?php
                $stt=0; 
                foreach ($info as $item) {
                    $stt++;
                    echo "<tr>";
                    echo "<td class='title'>$stt</td>";
                    echo "<td class='title'>".$item['cate_title']."</td>";
                    echo "<td class='title'><a href='".base_url()."admin/categorie/edit/".$item['cate_id']."'>Edit</a></td>";
                    echo "<td class='title'><a href='javascript:void(0)' class='delete' setid='".$item['cate_id']."' >Delete</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
