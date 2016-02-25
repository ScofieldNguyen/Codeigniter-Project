<?php
function callCate($data, $parent, $text = "---", $select){
	if ($parent == 0 && $select == 0){
		echo "<option value='0' selected>root</option>";
	}
	foreach ($data as $i) {
		if ($i['cate_parent'] == $parent){
			if ($i['cate_id'] == $select)
				echo "<option value='".$i['cate_id']."' selected>".$text.$i['cate_title']."</option>";
			else echo "<option value='".$i['cate_id']."'>".$text.$i['cate_title']."</option>";
			callCate($data, $i['cate_id'], $text."------", $select);
		}
	}
}
?>